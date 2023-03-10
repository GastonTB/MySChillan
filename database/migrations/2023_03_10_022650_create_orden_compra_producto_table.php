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
        Schema::create('orden_compra_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('orden_compra_id')->index('orden_compra_productos_orden_compra_id_foreign');
            $table->unsignedBigInteger('producto_id')->index('orden_compra_productos_producto_id_foreign');
            $table->integer('cantidad_orden_compra');
            $table->integer('precio_orden_compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_compra_producto');
    }
};
