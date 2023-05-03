<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agreement;
use App\AgreementRate;
use App\EmployeeCategory;
use Faker\Generator as Faker;

$factory->define(AgreementRate::class, function (Faker $faker) {
    return [
        'agreement_id'=>factory(Agreement::class),
        'employee_category_id'=>factory(EmployeeCategory::class),
        'rate'=>$faker->numberBetween(500,1500),
    ];
});
