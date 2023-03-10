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
        Schema::create('carrito_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('carrito_id')->index('carritos_productos_carrito_id_foreign');
            $table->unsignedBigInteger('producto_id')->index('carritos_productos_producto_id_foreign');
            $table->integer('cantidad_carrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_producto');
    }
};
