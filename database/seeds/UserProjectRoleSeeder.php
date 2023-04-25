<?php

use Illuminate\Database\Seeder;

class UserProjectRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_project_role= factory('App\UserProjectRole',2)->create();
    }
}
