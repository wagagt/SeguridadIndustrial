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

class ContratoDocumento extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    protected $appends = [
        'archivo',
    ];

    public $table = 'contrato_documentos';

    protected $dates = [
        'fecha_subida',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPO_DOCUMENTO_SELECT = [
        'matriz_de_riesgo'  => 'Matriz de riesgo',
        'planes_de_calidad' => 'Planes de calidad',
    ];

    protected $fillable = [
        'tipo_documento',
        'fecha_subida',
        'contrato_id',
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

    public function getArchivoAttribute()
    {
        return $this->getMedia('archivo')->last();
    }

    public function getFechaSubidaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaSubidaAttribute($value)
    {
        $this->attributes['fecha_subida'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function contrato()
    {
        return $this->belongsTo(ContratoLaboral::class, 'contrato_id');
    }
}
