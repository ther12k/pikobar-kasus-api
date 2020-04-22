<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'code' => substr($name, 0,2),
    ];
});
