<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscriptore extends Model
{
    protected $fillable = [
        'estado',
        'users_id',
        'suscripcion',
    
    ];
   
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'suscripcion',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/suscriptores/'.$this->getKey());
    }
}
