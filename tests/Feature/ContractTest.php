<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContractTest extends TestCase
{
    
    public function testExample()
    {
        //preperation - prepare

        //action - perform
        $response = $this->getJson('api/contract');
        
        //assertion - predict
        
        $this->assertNotEmpty($response->json());

    }
}
