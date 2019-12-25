<?php


use App\Models\Comment;
use App\Models\BlogPost;
use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'blog_post_id' => BlogPost::all()->random(),
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->safeEmail,
        'comment' => $faker->text(25)
    ];
});