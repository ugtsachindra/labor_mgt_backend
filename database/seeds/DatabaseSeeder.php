<?php

use App\EmployeeActivity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $projects = factory('App\Project')->create();
        $projects = factory('App\EmployeeActivity')->create();
        $agreement = factory('App\Agreement')->create()
        ->each(function ($ag) {
            $ag->rates()->save(factory('App\AgreementRate')->make());
        });
        $user_project_role = factory('App\UserProjectRole',3)->create();
        //  $this->call([
        //     LocationSeeder::class,
        //     SupplierSeeder::class,
        //     UserProjectRoleSeeder::class,
        //     EmployeeActivitySeeder::class,
        //  ]);
    }
}
