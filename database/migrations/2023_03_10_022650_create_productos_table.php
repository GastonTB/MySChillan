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
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->string('descripcion', 9999);
            $table->string('imagenes', 999)->nullable();
            $table->unsignedBigInteger('categoria_id')->index('productos_categoria_id_foreign');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->unsignedBigInteger('oferta_id')->nullable()->index('productos_oferta_id_foreign');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
