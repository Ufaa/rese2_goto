<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HelloTest extends TestCase
{
    use RefreshDatabase;

    // public function testHello()
    // {
    //     User::factory()->create([
    //         'name' => 'aaa',
    //         'email' => 'bbb@ccc.com',
    //         'password' => 'test12345'
    //     ]);
    //     $this->assertDatabaseHas('users', [
    //         'name' => 'aaa',
    //         'email' => 'bbb@ccc.com',
    //         'password' => 'test12345'
    //     ]);
    // }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_mypage()
    {
        $response = $this->get('mypage');

        $response->assertStatus(200);
    }
    public function test_thanks()
    {
        $response = $this->get('thanks');

        $response->assertStatus(200);
    }
    public function test_shops()
    {
        $response = $this->get('/find');

        $response->assertStatus(200);
    }
}
