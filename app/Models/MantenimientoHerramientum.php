<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MantenimientoHerramientum extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'mantenimiento_herramienta';

    protected $dates = [
        'fecha_mantenimiento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPO_MANTENIMIENTO_SELECT = [
        'programado' => 'Programada',
        'imprevisto' => 'Imprevisto',
    ];

    protected $fillable = [
        'herramienta_id',
        'tipo_mantenimiento',
        'fecha_mantenimiento',
        'descripcion',
        'resultado',
        'notificado',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function herramienta()
    {
        return $this->belongsTo(Herramientum::class, 'herramienta_id');
    }

    public function getFechaMantenimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaMantenimientoAttribute($value)
    {
        $this->attributes['fecha_mantenimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
