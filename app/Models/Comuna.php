<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    public $table = 'comunas';
    protected $primaryKey = 'id';


    use HasFactory;

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function userMetadata()
    {
        return $this->hasMany(UserMetadata::class);
    }

    public function ordenesCompra()
    {
        return $this->hasMany(OrdenCompra::class);
    }
}
