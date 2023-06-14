<?php

namespace Tests\Feature;

use App\Project;
use App\Section;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SectionTest extends TestCase
{
    
    use RefreshDatabase;

    public function setUp():void{

        parent::setUp();

        $user = factory(User::class)->create();
        Passport::actingAs($user);
    }

    public function test_fetch_all_sections()
    {
        factory(Section::class)->create();

        $response = $this->getJson('api/section')->assertOk()->json();
        $this->assertEquals(1,count($response['data']));
        

    }

    public function test_store_a_section(){

        $project = factory(Project::class)->create();
        $response = $this->postJson('api/section',['name'=>'Test Section','project_id'=>$project->id, 'active'=>true])->assertCreated()->json();
        $this->assertEquals(true,$response['status']);
        $this->assertDatabaseHas('sections',['name'=>'Test Section']);
    }

    public function test_update_section(){

        $section = factory(Section::class)->create();

        $response = $this->putJson('api/section/'.$section->id,['name'=>'Updated name','project_id'=>$section->project_id, 'active'=>false])->assertOk()->json();
        $this->assertEquals(true,$response['status']);
        $this->assertDatabaseHas('sections',['name'=>'Updated name']);

    }

    public function test_fetch_a_single_section(){
        $section = factory(Section::class)->create();
        $response = $this->getJson('api/section/'.$section->id)->assertOk()->json();
        $this->assertEquals(true,$response['status']);
        $this->assertEquals($section->name,$response['data']['name']);
    }


    public function test_delete_a_section(){

        $section = factory(Section::class)->create();
        $response = $this->deleteJson('api/section/'.$section->id)->assertOk()->json();
        $this->assertEquals(true,$response['status']);
        $this->assertDatabaseMissing('sections',['name'=>$section->name]);
    }

    public function test_fetch_active_sections(){

        $section1 = factory(Section::class)->create(['active'=>false]);
        
        $section2 = factory(Section::class)->create(['active'=>true]);
        
        $response = $this->getJson('api/section_active')->assertOk()->json();
        
        $this->assertEquals(1,count($response['data']));

    }


}
