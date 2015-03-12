<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('categories');
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->integer('color_id')->unsigned();
			$table->timestamps();

			$table->foreign('color_id')->references('id')->on('category_colors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
