<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('content_tag');
        Schema::create('content_tag', function (Blueprint $table) {
            $table->integer('content_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('content_id')->references('id')->on('contents');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('content_tag');
    }
}
