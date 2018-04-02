<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Incidencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personas_id')->unsigned();
            $table->integer('estatus')->default(0);//pendiente
            $table->string('caso', 100);
            $table->text('descripcion');
            $table->date('cierre')->nullable();
        
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('personas_id')
                ->references('id')->on('personas')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
