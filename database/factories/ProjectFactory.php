<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name'=> $faker-> name,
        'contract_id' => factory(App\Contract::class),
        'active'=>$faker->boolean()
    ];
});
