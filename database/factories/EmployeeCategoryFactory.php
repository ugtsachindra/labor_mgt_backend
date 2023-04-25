<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeCategory;
use Faker\Generator as Faker;

$factory->define(EmployeeCategory::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->randomElement(['Labour','Mason','Driller','Barbender','Carpenter']),
    ];
});
