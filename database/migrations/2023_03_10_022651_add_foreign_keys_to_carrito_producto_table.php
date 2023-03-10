<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrito_producto', function (Blueprint $table) {
            $table->foreign(['producto_id'], 'carritos_productos_producto_id_foreign')->references(['id'])->on('productos')->onDelete('CASCADE');
            $table->foreign(['carrito_id'], 'carritos_productos_carrito_id_foreign')->references(['id'])->on('carritos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrito_producto', function (Blueprint $table) {
            $table->dropForeign('carritos_productos_producto_id_foreign');
            $table->dropForeign('carritos_productos_carrito_id_foreign');
        });
    }
};
