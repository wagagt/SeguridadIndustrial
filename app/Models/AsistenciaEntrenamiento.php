<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsistenciaEntrenamiento extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'asistencia_entrenamientos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'presente',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function entrenamientos()
    {
        return $this->belongsToMany(DescripcionEntrenamiento::class);
    }

    public function empleados()
    {
        return $this->belongsToMany(AgregarEmpleado::class);
    }
}
