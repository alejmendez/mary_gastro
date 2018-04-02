<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncidenciasChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incidencias_id')->unsigned();
            $table->integer('personas_id')->unsigned();
            $table->text('msj');
            $table->string('archivo', 100);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('personas_id')
                ->references('id')->on('personas')
                ->onDelete('cascade')->onUpdate('cascade');
                
            $table->foreign('incidencias_id')
                ->references('id')->on('incidencias')
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
        Schema::dropIfExists('incidencias_chat');
    }
}
