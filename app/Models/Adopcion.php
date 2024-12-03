<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Adopcion extends Model
{
    use HasFactory;

    protected $table = 'adopciones'; // Asegúrate de que coincida con el nombre de tu tabla

    protected $fillable = [
        'mascota_id',  // Relación con la mascota
        'nombre_mascota',
        'edad',
        'descripcion',
        'imagen_url',
        'estado_adopcion',
        'activo'
    ];

    protected static function booted()
    {
        static::addGlobalScope('activo', function (Builder $builder) {
            $builder->where('activo', true);
        });
    }

    // Relación con el modelo Mascota
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'mascota_id'); // Definir la relación
    }
}
