<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listapelicula extends Model
{
    protected $fillable = [
        'pelicula_id',
        'venta_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/listapeliculas/'.$this->getKey());
    }
}
