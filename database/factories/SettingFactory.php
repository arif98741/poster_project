<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'contact' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'facebook' => $faker->address,
        'twitter' => 'https://'.$faker->domainName,
        'pinterest' => 'https://'.$faker->domainName,
        'facebook' => 'https://'.$faker->domainName,
        'instagram' => 'https://'.$faker->domainName,
    ];
});
