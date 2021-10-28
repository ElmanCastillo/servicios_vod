<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'peliculas';
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'genero_id',
        'director_id',
        'url',
        'thumb',
    
    ];
}
