<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Route test for getting all products
     *
     * @return void
     */
    public function test_get_orders_route()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email' => $email, 'password' => bcrypt($password), 'role_id' => 1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;

        $response = $this->get('/api/orders', ['access_token' => $access_token]);
        $response->assertOk();
    }

    public function test_place_order()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email' => $email, 'password' => bcrypt($password), 'role_id' => 1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        OrderStatus::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();
        Product::factory()->count(100)->create();

        $product_response = $this->postJson('/api/orders', json_decode('{
    "total_price": "2890.00",
    "created_by": 1,
    "updated_by": 1,
    "order_status_id": 1,
    "delivery_information": {
        "customer_name": "Customer",
        "mobile_number": "01704222222",
        "email": "Customer@email.com",
        "address": "Customer Address",
        "city": "Customer City",
        "post_code": "Customer Post Code",
        "country": "Customer Country"
    },
    "order_items": [
        {
            "product_id": "1",
            "qty": 2,
            "unit_price": "949.00"
        },
        {
            "product_id": "2",
            "qty": 5,
            "unit_price": "992.00"
        }
    ]
}', true), ['access_token' => $access_token]
        );
        $product_response->assertCreated();
        $this->assertDatabaseCount('orders', 1);
    }

    public function test_order_update()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email' => $email, 'password' => bcrypt($password), 'role_id' => 1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        OrderStatus::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();
        Product::factory()->count(100)->create();
        Order::factory()->create();

        $update_response = $this->put('/api/orders/1', json_decode('{
    "total_price": "2890.00",
    "created_by": 1,
    "updated_by": 1,
    "order_status_id": 1,
    "delivery_information": {
        "customer_name": "Customer 555",
        "mobile_number": "01704222222",
        "email": "Customer@email.com",
        "address": "Customer Address",
        "city": "Customer City",
        "post_code": "Customer Post Code",
        "country": "Customer Country"
    },
    "order_items": [
        {
            "product_id": "1",
            "qty": 20,
            "unit_price": "949.00"
        },
        {
            "product_id": "2",
            "qty": 50,
            "unit_price": "992.00"
        }
    ]
}', true), ['access_token' => $access_token]);
        $update_response->assertOk();

    }

    public function test_product_update_status()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email' => $email, 'password' => bcrypt($password), 'role_id' => 1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        OrderStatus::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();
        Product::factory()->count(100)->create();
        Order::factory()->create();
        $update_response = $this->patch('/api/orders/status/1', [
            "order_status_id" => 2,
        ], ['access_token' => $access_token]);
        $update_response->assertOk();
        $this->assertEquals(2, Order::first()->order_status_id);

    }
}
