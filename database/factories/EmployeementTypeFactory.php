<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeementType;
use Faker\Generator as Faker;

$factory->define(EmployeementType::class, function (Faker $faker) {
    return [
        'name'=> $faker->randomElement(['Company','Supply']),
    ];
});
