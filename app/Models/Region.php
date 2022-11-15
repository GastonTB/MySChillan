<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{   
    public $table = 'regiones';
    protected $primaryKey = 'id';
    use HasFactory;

    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }

}
