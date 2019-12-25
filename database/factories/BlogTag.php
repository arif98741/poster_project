<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogTag;
use Faker\Generator as Faker;

$factory->define(BlogTag::class, function (Faker $faker) {
    return [
        'name'     => ucfirst($faker->text(10)),
    ];
});