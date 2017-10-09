<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Noticias extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('categorias', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 250);
			$table->string('slug', 250)->unique();
			$table->text('descripcion', 250);
			$table->string('color', 25);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('noticias', function (Blueprint $table) {
			$table->increments('id');
			$table->string('titulo', 250);
			$table->string('slug', 250)->unique();
			$table->integer('categorias_id')->unsigned();
			$table->text('contenido');
			$table->text('contenido_html');
			$table->text('resumen');

			$table->timestamp('published_at')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('imagenes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('noticias_id')->unsigned();
			$table->string('archivo', 200);
			$table->string('descripcion', 200);
			$table->string('leyenda', 200);
			$table->string('tamano', 12);

			$table->foreign('noticias_id')
				->references('id')->on('noticias')
				->onDelete('cascade')->onUpdate('cascade');

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

		Schema::dropIfExists('imagenes');
		Schema::dropIfExists('noticias_categorias');
		Schema::dropIfExists('noticias');
		Schema::dropIfExists('categorias');
	}
}
