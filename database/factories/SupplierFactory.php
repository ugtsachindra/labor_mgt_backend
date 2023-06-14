<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'br_no'=> $faker->unique()->numerify($string = '######'),
        'bp_code' => $faker->unique()->numerify($string = 'BP######'),
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'active'=>$faker->boolean()
    ];
});
