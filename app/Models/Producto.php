<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $table = 'productos';

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'nombre_producto',
        'precio',
        'cantidad',
        'descripcion',
        'imagenes'

    ];

    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }

}
