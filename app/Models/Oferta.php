<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    public $table = 'ofertas';

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'fecha_inicio',
        'fecha_fin',
        'estado_oferta',
        'precio_oferta',
    ];

    public $timestamps = true;

    public function producto()
    {
        return $this->hasOne(Producto::class);
    }

}
