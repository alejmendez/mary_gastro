<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AudioDB extends Migration
{

    public function up()
    {
      Schema::create('audio_noticia', function (Blueprint $table) {
        $table->increments('id');

        $table->string('titulo', 250);
        $table->text('descripcion')->nullable();

        $table->string('url', 500);
        $table->timestamp('published_at')->nullable();

        $table->timestamps();
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
        Schema::dropIfExists('audio');
    }
}
