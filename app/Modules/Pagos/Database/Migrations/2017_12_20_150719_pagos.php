<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('banco_emisor_id')->unsigned();
            $table->integer('banco_receptor_id')->unsigned();
            $table->integer('tipo_deposito')->unsigned();
            $table->integer('cod_referencia')->unsigned()->nullable();
            $table->integer('planes_id')->unsigned();
            $table->string('url', 200);
            $table->date('fecha');
            $table->integer('estatus')->default(0)->unsigned();
            $table->decimal('monto', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('usuario_id')
                ->references('id')->on('app_usuario')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('planes_id')
                ->references('id')->on('planes')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('banco_emisor_id')
                ->references('id')->on('banco')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('banco_receptor_id')
                ->references('id')->on('banco')
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
        Schema::dropIfExists('pagos');
    }
}
