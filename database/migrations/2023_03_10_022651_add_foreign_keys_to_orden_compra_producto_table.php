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
        Schema::table('orden_compra_producto', function (Blueprint $table) {
            $table->foreign(['producto_id'], 'orden_compra_productos_producto_id_foreign')->references(['id'])->on('productos')->onDelete('CASCADE');
            $table->foreign(['orden_compra_id'], 'orden_compra_productos_orden_compra_id_foreign')->references(['id'])->on('ordenes_compra')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_compra_producto', function (Blueprint $table) {
            $table->dropForeign('orden_compra_productos_producto_id_foreign');
            $table->dropForeign('orden_compra_productos_orden_compra_id_foreign');
        });
    }
};
