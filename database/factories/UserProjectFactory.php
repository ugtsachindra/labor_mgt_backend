<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProject;
use Faker\Generator as Faker;

$factory->define(UserProject::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'project_id'=> factory(App\Project::class),
    ];
});
