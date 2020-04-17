<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hospital;
use Faker\Generator as Faker;

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "address" => $faker->address,
        "description" => $faker->text,
        "kabkota_id" => $faker->randomDigit,
        "kec_id" => $faker->randomDigit,
        "kel_id" => $faker->randomDigit,
        "phone_numbers" => $faker->phoneNumber,
    ];
});
