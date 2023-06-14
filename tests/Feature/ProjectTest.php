<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;


class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

   public function setUp():void
   {
        parent::setUp();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

   }

    public function test_fetch_project_data()
    {
        $this->withoutExceptionHandling();

        $project = factory(Project::class,1)->create();

        $response = $this->getJson('api/project')->assertOk()->json();

        
        $this->assertEquals(1,count($response['data']));
    }

    public function test_fetch_single_project(){

        // preperation
        $project = factory(Project::class)->create();

        // action
        $response = $this->getJson("api/project/".$project->id)->assertOk()->json();


        
        $this->assertEquals($response['data']['name'] , $project->name);

        // assertion

    }


    public function test_store_new_project(){

        $project = factory(Project::class)->make();
        
        $response = $this->postJson('api/project',['name'=>$project->name, 'contract_id'=>$project->contract_id, 'active'=>$project->active])->json();
        
        $this->assertEquals(true,$response['status']);
        $this->assertDatabaseHas('projects',['name'=>$project->name]);
    }

    public function test_delete_a_project(){

        $project = factory(Project::class)->create();
        
        $this->deleteJson('api/project/'.$project->id)->assertOk();

        $this->assertDatabaseMissing('projects',['id'=>$project->id]);
    }

    public function test_fetch_active_projects(){

        $location1 = factory(Project::class)->create(['active'=>false]);
        
        $location2 = factory(Project::class)->create(['active'=>true]);
        
        $response = $this->getJson('api/project_active')->assertOk()->json();
        
        $this->assertEquals(1,count($response['data']));

    }
}
