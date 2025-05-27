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

class DocumentoEmpleado extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    protected $appends = [
        'archivo',
    ];

    public $table = 'documento_empleados';

    protected $dates = [
        'fecha_emision',
        'fecha_vencimiento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPO_DOCUMENTO_SELECT = [
        '1' => 'Formulario seguro',
        '2' => 'Certificado Medico',
        '3' => 'Seguro de vida',
        '4' => 'Otro',
    ];

    protected $fillable = [
        'empleado_id',
        'tipo_documento',
        'fecha_emision',
        'fecha_vencimiento',
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
        // $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        // $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function empleado()
    {
        return $this->belongsTo(AgregarEmpleado::class, 'empleado_id');
    }

    public function getArchivoAttribute()
    {
        return $this->getMedia('archivo');
    }

    public function getFechaEmisionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaEmisionAttribute($value)
    {
        $this->attributes['fecha_emision'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaVencimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaVencimientoAttribute($value)
    {
        $this->attributes['fecha_vencimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
