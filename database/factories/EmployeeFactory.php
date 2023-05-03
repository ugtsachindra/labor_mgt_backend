<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'employee_category_id'=>factory(App\EmployeeCategory::class),
        'employeement_type_id'=>factory(App\EmployeementType::class),
        
        'project_id'=>factory(App\Project::class),
        'supplier_id'=>factory(App\Supplier::class),
         'emp_no'=> $faker->unique()->numerify('X####'),
         'last_name'=>$faker->lastName,
         'initials'=>$faker->lexify('???'),
         'address'=>$faker->address,
         'phone'=>$faker->phoneNumber,
         'nic'=>$faker->unique()->numerify('#########V'),
         'photo'=>$faker->imageUrl(),

    ];
});
