<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ActivityProject;
use App\EmployeeActivity;
use App\Location;
use Faker\Generator as Faker;

$factory->define(EmployeeActivity::class, function (Faker $faker) {
    return [
        'date'=>$faker->date(),
        'employee_id'=>factory(App\Employee::class),
        'agreement_id'=>factory(App\Agreement::class),
        'location_id'=>factory(Location::class),
        'activity_project_id'=>factory(ActivityProject::class),
        'time_start'=>$faker->dateTime(),
        'time_end'=>$faker->dateTime(),
        'effective_hours'=>$faker->numberBetween(1,12),
        'approved_hours'=>$faker->numberBetween(1,12),
        'status'=>0,
    ];
});
