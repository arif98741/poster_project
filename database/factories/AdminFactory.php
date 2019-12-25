<?php



use App\Models\Admin;
use Faker\Generator as Faker;

//username = admin@gmail.com
//password = admin


$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'Ariful Islam',
        'email' => 'admin@gmail.com',
        'password' => '$2y$10$50sKq9q2cOS0.phgaFkv..F.Eb1plpGzTJu//NKJnNzOMoY9B9fMe', // admin
        'remember_token' => Str::random(10),
    ];
});
