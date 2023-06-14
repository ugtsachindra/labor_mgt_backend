<?php

namespace Tests\Feature;

use App\Location;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void{

        parent::setUp();

        $user = factory(User::class)->create();
        Passport::actingAs($user);
    }
    
    public function test_fetch_all_locations()
    {
        $location = factory(Location::class)->create();
        $response = $this->getJson('api/location')->assertOk()->json();

        $this->assertEquals(1,count($response['data']));

    }

    public function test_store_a_location(){

        $location = factory(Location::class)->make();

        $response = $this->postJson('api/location',
        ['section_id'=>$location->section_id,
        'name'=>$location->name,
        'active'=>true])->assertCreated()->json();

        $this->assertDatabaseHas('locations',['name'=>$location->name]);
    }

    public function test_fetch_a_single_location(){

        $location = factory(Location::class)->create();

        $response = $this->getJson('api/location/'.$location->id)->assertOk()->json();
       
        $this->assertEquals($location->name,$response['data']['name']);


    }

    public function test_update_a_location(){
        $location = factory(Location::class)->create();
        $response = $this->putJson('api/location/'.$location->id,[
            'name'=>'Updated Name',
            'section_id'=>$location->section_id,
            'active'=>$location->active
        ])->assertOk()->json();

        $this->assertDatabaseHas('locations',['name'=>'Updated Name']);

    }

    public function test_delete_a_location(){
        $location = factory(Location::class)->create();
        $response = $this->deleteJson('api/location/'.$location->id)->assertOk();
        $this->assertDatabaseMissing('locations',['name'=>$location->name]);
    }

    public function test_fetch_active_locations(){

        $location1 = factory(Location::class)->create(['active'=>false]);
        
        $location2 = factory(Location::class)->create(['active'=>true]);
        
        $response = $this->getJson('api/location_active')->assertOk()->json();
        
        $this->assertEquals(1,count($response['data']));

    }
}
