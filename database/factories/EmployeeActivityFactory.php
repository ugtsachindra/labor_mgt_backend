<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeActivity;
use Faker\Generator as Faker;

$factory->define(EmployeeActivity::class, function (Faker $faker) {
    return [
        'date'=>$faker->date(),
        'employee_id'=>factory(App\Employee::class),
        'agreement_id'=>factory(App\Agreement::class),
        'activity_id'=>factory(App\Activity::class),
        'time_start'=>$faker->dateTime(),
        'time_end'=>$faker->dateTime(),
        'effective_hours'=>$faker->randomDigit(),
        'approved_hours'=>$faker->randomDigit(),
        'status'=>$faker->randomDigit(),
    ];
});
