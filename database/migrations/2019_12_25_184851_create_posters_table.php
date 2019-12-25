<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostersTable extends Migration
{

    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('description');
            $table->string('image');
            $table->string('slug');
            $table->unsignedBigInteger('poster_category_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('poster_category_id')->references('id')->on('poster_categories')->onDelete('set null')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('posters');
        Schema::dropForeign('poster_category_id');
    }
}