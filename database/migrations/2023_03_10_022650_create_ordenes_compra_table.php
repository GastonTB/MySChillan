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
        Schema::create('ordenes_compra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('comuna_id')->nullable()->index('ordenes_compra_comuna_id_foreign');
            $table->boolean('envio')->nullable();
            $table->unsignedBigInteger('user_id')->index('ordenes_compra_user_id_foreign');
            $table->integer('total');
            $table->integer('estado');
            $table->timestamps();
            $table->integer('estado_retiro');
            $table->string('correo', 50);
            $table->string('codigo_seguimiento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_compra');
    }
};
