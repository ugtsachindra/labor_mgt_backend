<?php

use Illuminate\Database\Seeder;

class EmployeeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_activity = factory('App\EmployeeActivity',5)->create();
        
    }
}
