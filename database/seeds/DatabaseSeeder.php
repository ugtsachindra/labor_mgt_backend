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
         $this->call([
            LocationSeeder::class,
            SupplierSeeder::class,
            UserProjectRoleSeeder::class,
            EmployeeActivitySeeder::class,
         ]);
    }
}
