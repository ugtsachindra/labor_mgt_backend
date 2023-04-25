<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'project_id'=>factory(App\Project::class),
        'code'=>$faker->numerify('########'),
        'description'=>$faker->sentence(),
    ];
});
