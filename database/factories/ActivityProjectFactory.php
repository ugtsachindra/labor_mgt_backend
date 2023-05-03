<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use App\ActivityProject;
use App\Project;
use Faker\Generator as Faker;

$factory->define(ActivityProject::class, function (Faker $faker) {
    return [
        'project_id'=>factory(Project::class),
        'activity_id'=>factory(Activity::class),
        'code'=>$faker->numerify('########')
    ];
});
