<?php

namespace Tests\Feature;

use App\Supplier;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    

    use RefreshDatabase;

    public function setUp():void{

        parent::setUp();

        $user = factory(User::class)->create();
        Passport::actingAs($user);
    }
    
    public function test_fetch_all_suppliers()
    {
        $supplier = factory(Supplier::class)->create();
        $response = $this->getJson('api/supplier')->assertOk()->json();

        $this->assertEquals(1,count($response['data']));

    }

    public function test_store_a_supplier(){

        $supplier = factory(Supplier::class)->make();

        
        $response = $this->postJson('api/supplier',$supplier->toArray())->assertCreated()->json();

        $this->assertDatabaseHas('suppliers',['name'=>$supplier->name]);
    }

    public function test_fetch_a_single_supplier(){

        $supplier = factory(Supplier::class)->create();

        $response = $this->getJson('api/supplier/'.$supplier->id)->assertOk()->json();
       
        $this->assertEquals($supplier->name,$response['data']['name']);


    }

    public function test_update_a_supplier(){
        $supplier = factory(Supplier::class)->create();
        $supplier->name = 'Updated Name';
        $response = $this->putJson('api/supplier/'.$supplier->id, $supplier->toArray())->assertOk()->json();

        $this->assertDatabaseHas('suppliers',['name'=>'Updated Name']);

    }

    public function test_delete_a_supplier(){
        $supplier = factory(Supplier::class)->create();
        $response = $this->deleteJson('api/supplier/'.$supplier->id)->assertOk();
        $this->assertDatabaseMissing('suppliers',['name'=>$supplier->name]);
    }
    
}
