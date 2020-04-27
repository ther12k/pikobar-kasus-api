<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RdtApplicant;
use Faker\Generator as Faker;

$factory->define(RdtApplicant::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\id_ID\Person($faker));

    $random = new PragmaRX\Random\Random();

    return [
        'registration_code' => $random->uppercase()->size(4)->get(),
        'nik'               => $faker->nik,
        'name'              => $faker->name,
    ];
});
