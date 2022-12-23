<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{   
    protected $table = 'ordenes_compra';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 
        'total', 
        'estado',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withPivot('cantidad_orden_compra', 'precio_orden_compra');
    }

    use HasFactory;
}
