<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->longText('description');
            $table->string('image');
            $table->string('slug');
            $table->unsignedBigInteger('blog_category_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('set null')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropForeign('admin_id');
        Schema::dropForeign('blog_category_id');
        Schema::dropIfExists('blog_posts');
    }
}