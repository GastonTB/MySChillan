<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'productos';

    protected $primaryKey = 'id';

    protected $fillable =
    [
        'nombre_producto',
        'precio',
        'cantidad',
        'descripcion',
        'imagenes',
        'oferta_id',
        'categoria_id'
    ];

    public $timestamps = true;

    protected $dates = ['deleted_at'];


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

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function getPromedio()
    {
        return $this->calificaciones->avg('puntuacion');
    }
}
