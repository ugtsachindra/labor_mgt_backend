<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->artisan('passport:install');
    }

    public function test_user_can_register()
    {
        $user = factory(User::class)->create();
        $response = $this->postJson('api/user-register',$user->toArray())->assertOk()->json();
        $this->assertDatabaseHas('users',['id'=>$user->id]);
    }

    public function test_user_can_login(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $response = $this->postJson('api/login',['email'=>$user->email, 'password'=>'password'])->json();

        
        $this->assertEquals(true,$response['status']);

    }
}
