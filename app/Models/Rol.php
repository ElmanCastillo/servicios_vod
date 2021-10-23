<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'guard_name',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/rols/'.$this->getKey());
    }
}
