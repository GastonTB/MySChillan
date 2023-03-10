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
        Schema::create('users_metadata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('direccion', 100);
            $table->unsignedBigInteger('comuna_id')->index('users_metadata_comuna_id_foreign');
            $table->unsignedBigInteger('user_id')->index('users_metadata_user_id_foreign');
            $table->unsignedBigInteger('rol_id')->index('users_metadata_rol_id_foreign');
            $table->string('apellido_paterno', 35);
            $table->string('apellido_materno', 35);
            $table->string('telefono', 9);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_metadata');
    }
};
