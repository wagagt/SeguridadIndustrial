<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReciboPago extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'recibo_pagos';

    protected $appends = [
        'recibo_pago',
    ];

    protected $dates = [
        'fecha_emision',
        'periodo_fin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const METODO_PAGO_SELECT = [
        '1' => 'Efectivo',
        '2' => 'Transferencia',
        '3' => 'Cheque',
        '4' => 'Otro',
    ];

    protected $fillable = [
        'empleado_id',
        'numero_recibo',
        'fecha_emision',
        'periodo_fin',
        'salario_base',
        'horas_trabajadas',
        'pago_horas_extras',
        'total_bonificaciones',
        'total_comisiones',
        'otros_ingresos',
        'descuento_igss',
        'descuento_isr',
        'descuentos_prestamos',
        'descuentos_faltas_retardos',
        'otros_descuentos',
        'total_ingresos',
        'total_deducciones',
        'salario_neto',
        'metodo_pago',
        'banco',
        'numero_cuenta',
        'observaciones',
        'firma_empleado',
        'firma_rrhh',
        'numero_contrato_laboral',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function empleado()
    {
        return $this->belongsTo(AgregarEmpleado::class, 'empleado_id');
    }

    public function getFechaEmisionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaEmisionAttribute($value)
    {
        $this->attributes['fecha_emision'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPeriodoFinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPeriodoFinAttribute($value)
    {
        $this->attributes['periodo_fin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReciboPagoAttribute()
    {
        $files = $this->getMedia('recibo_pago');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
