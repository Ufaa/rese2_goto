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
    public function test_reservation_add()
    {
        $response = $this->get('/add');

        $response->assertStatus(200);
    }
    public function test_reservation_done()
    {
        $response = $this->get('/done');

        $response->assertStatus(200);
    }
    public function test_like()
    {
        $response = $this->get('/shop/like/{id}');

        $response->assertStatus(200);
    }
    public function test_unlike()
    {
        $response = $this->get('/shop/unlike/{id}');

        $response->assertStatus(200);
    }
    public function test_reviewadd()
    {
        $response = $this->get('/reviewadd');

        $response->assertStatus(200);
    }
    public function test_shopmanage()
    {
        $response = $this->get('/shopmanage');

        $response->assertStatus(200);
    }
    public function test_shopcreate()
    {
        $response = $this->get('/shopcreate');

        $response->assertStatus(200);
    }
    public function test_shopmanage_shop()
    {
        $response = $this->get('/shopmanage/shop');

        $response->assertStatus(200);
    }
    public function test_shopmanage_shop_shop_id()
    {
        $response = $this->get('/shopmanage/shop/{shop_id}');

        $response->assertStatus(200);
    }
    public function test_shopcreate_request()
    {
        $response = $this->get('/shopcreate_request');

        $response->assertStatus(200);
    }
    public function test_shopmanager_create()
    {
        $response = $this->get('/shopmanager_create');

        $response->assertStatus(200);
    }
    public function test_shopmanagers()
    {
        $response = $this->get('/shopmanagers');

        $response->assertStatus(200);
    }
    public function test_email_reservation_id()
    {
        $response = $this->get('/email/{reservation_id}');

        $response->assertStatus(200);
    }
    public function test_send_email()
    {
        $response = $this->get('/send_email');

        $response->assertStatus(200);
    }
}
