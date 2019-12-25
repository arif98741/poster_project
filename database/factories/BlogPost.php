<?php


use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Admin;
use App\Models\BlogPost;
use App\Models\BlogCategory;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->text(20)),
        'admin_id' => Admin::all()->random(),
        'description' => $faker->text(100),
        'slug' =>  Str::slug($faker->text(20), '-'),
        'blog_category_id' => BlogCategory::all()->random(),
        'image' 		=>  str_replace("storage/uploads/blog\\","",ltrim(strstr($faker->image('public/storage/uploads/blog',  640, 480, null, true), "/"),  "/"))
    ];
});