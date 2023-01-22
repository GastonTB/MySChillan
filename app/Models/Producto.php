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
        'imagenes',
        'oferta_id'

    ];

    public $timestamps = true;
    
    

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }

    public function carritos()
    {
        return $this->belongsToMany(Carrito::class)->withPivot('cantidad_carrito');
    }

    public function ordenes_compra()
    {
        return $this->belongsToMany(OrdenCompra::class)->withPivot('cantidad_orden_compra', 'precio_orden_compra');
    }

}
