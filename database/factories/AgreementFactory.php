<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agreement;
use Faker\Generator as Faker;

$factory->define(Agreement::class, function (Faker $faker) {
    return [
        'ref'=> $faker->unique()->numerify($string = 'AG\#####'),
        'project_id'=> factory(App\Project::class),
        'supplier_id' =>factory(App\Supplier::class),
        'pre_ref'=> $faker->numerify($string = 'AG\#####'),
    ];
});

// ->each(function ($agreement){
//     $agreement->rates()->save(factory(App\AgreementRate::class)->make());
// })
