<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    public $table = 'carritos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'total',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad_carrito');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
