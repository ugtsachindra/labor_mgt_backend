<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProjectRole;
use Faker\Generator as Faker;

$factory->define(UserProjectRole::class, function (Faker $faker) {
    return [
        'user_project_id'=> factory(App\UserProject::class),
        'role_id'=> factory(App\Role::class),
    ];
});
