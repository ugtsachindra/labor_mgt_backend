<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'project_id'=>factory(Project::class),
        'code'=>$faker->numerify('########'),
        'description'=>$faker->sentence(),
    ];
});
