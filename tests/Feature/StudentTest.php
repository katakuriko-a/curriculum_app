<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_making_an_api_request()
    {
        $response = $this->postJson('/api/store',
        [
            'name' => '小林 空晏',
            'age' => '21',
            'birth' => '2000/02/29',
            'mail' => 'kkk@gmail.com',
            'tel' => '000-0000-0000',
            'plan' => 'STANDARD',
            'level' => '初級',
            ]
    );

        $response
            ->assertStatus(200);
    }
}
