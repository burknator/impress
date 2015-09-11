<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('contents');
		Schema::create('contents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->text('text');
			$table->integer('type_id')->unsigned();
			$table->integer('author_id')->unsigned();
			$table->integer('last_editor_id')->unsigned();
			$table->integer('category_id')->nullable()->unsigned();
			$table->timestamp('published_at');
			$table->timestamps();

			$table->foreign('type_id')->references('id')->on('types');
			$table->foreign('author_id')->references('id')->on('authors');
			$table->foreign('last_editor_id')->references('id')->on('authors');
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contents');
	}

}
