<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {
    $code_area = $faker->unique()->numberBetween(1, 40);
    return [
        'parent_id' => 1,
        'depth' => 2,
        'name' => $faker->unique()->name,
        'code_bps' => '32'.$code_area,
        'code_kemendagri' => '32.'.$code_area,
    ];
});
