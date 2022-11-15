<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMetadata extends Model
{
    use HasFactory;

    public $table = 'users_metadata';
    protected $primaryKey = 'id'; 
    
    protected $fillable = [
        'direccion',
        'telefono',
        'apellido_paterno',
        'apellido_materno',
        'comuna_id',
        'user_id',
        'rol_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rol()
    {
        return $this->hasOne(Rol::class);
    }
}
