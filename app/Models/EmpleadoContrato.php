<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpleadoContrato extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'empleado_contratos';

    protected $dates = [
        'fecha_asignacion',
        'fecha_retiro',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'empleado_id',
        'contrato_laboral_id',
        'fecha_asignacion',
        'fecha_retiro',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function empleado()
    {
        return $this->belongsTo(AgregarEmpleado::class, 'empleado_id');
    }

    public function contrato_laboral()
    {
        return $this->belongsTo(ContratoLaboral::class, 'contrato_laboral_id');
    }

    public function getFechaAsignacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAsignacionAttribute($value)
    {
        $this->attributes['fecha_asignacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaRetiroAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaRetiroAttribute($value)
    {
        $this->attributes['fecha_retiro'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
