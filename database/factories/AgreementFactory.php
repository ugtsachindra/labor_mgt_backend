<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agreement;
use Faker\Generator as Faker;

$factory->define(Agreement::class, function (Faker $faker) {
    return [
        'ref'=> $faker->unique()->numerify($string = 'AG\#####'),
        'project_id'=> factory(App\Project::class),
        'supplier_id' =>factory(App\Supplier::class),
        
    ];
});
