<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Herramientum extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'herramienta';

    protected $dates = [
        'fecha_adquisicion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ESTADO_SELECT = [
        'disponible'        => 'Disponible',
        'en_uso'            => 'En uso',
        'mantenimiento'     => 'Mantenimiento',
        'fuera_de_servicio' => 'Fuera de servicio',
    ];

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'estado',
        'fecha_adquisicion',
        'horas_para_mantenimiento',
        'horas_acumuladas',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaHerramientum::class, 'categoria_id');
    }

    public function getFechaAdquisicionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAdquisicionAttribute($value)
    {
        $this->attributes['fecha_adquisicion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
