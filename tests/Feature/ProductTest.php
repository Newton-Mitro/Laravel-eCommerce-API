<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Role;
use App\Models\Subcategory;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Route test for getting all products
     *
     * @return void
     */
    public function test_get_products_route()
    {
        $response = $this->get('/api/products');

        $response->assertOk();
    }

    public function test_get_products()
    {
        $response = $this->get('/api/products');
        $response->assertOk();

    }

    public function test_add_product()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email'=>$email,'password'=>bcrypt($password),'role_id'=>1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();

        $product_response = $this->postJson('/api/products', [
                "product_name" => "Teer Oil",
                "product_code" => "842899999",
                "discription" => "Fresh oil",
                "stock" => 3,
                "price" => "66.00",
                "discount" => "20.00",
                "active" => 1,
                "category_id" => 1,
                "subcategory_id" => 1,
                "brand_id" => 1,
                "product_unit_id" => 1
            ],['access_token'=>$access_token]
        );
        $product_response->assertCreated();
        $this->assertDatabaseCount('products', 1);
    }

    public function test_product_delete()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email'=>$email,'password'=>bcrypt($password),'role_id'=>1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();
        Product::factory()->create();

        $product_response = $this->delete('/api/products/1', [],['access_token'=>$access_token]
        );
        $product_response->assertNoContent();
        $this->assertDatabaseCount('products', 0);
    }

    public function test_product_update()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email'=>$email,'password'=>bcrypt($password),'role_id'=>1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();
        Product::factory()->create();

        $update_response = $this->put('/api/products/1' , [
            "product_name" => "Teer Soyabin Oil",
            "product_code" => "842899999",
            "discription" => "Fresh oil",
            "stock" => 3,
            "price" => "66.00",
            "discount" => "20.00",
            "active" => 1,
            "category_id" => 1,
            "subcategory_id" => 1,
            "brand_id" => 1,
            "product_unit_id" => 1
        ]);
        $update_response->assertOk();
        $this->assertEquals("Teer Soyabin Oil", Product::first()->product_name);

    }

    public function test_product_update_status()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';
        User::factory()->create(['email'=>$email,'password'=>bcrypt($password),'role_id'=>1]);
        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $access_token = json_decode($response->content())->access_token;
        Brand::factory()->count(10)->create();
        Category::factory()->count(3)->create();
        Subcategory::factory()->count(20)->create();
        ProductUnit::factory()->count(5)->create();
        Product::factory()->create();
        $update_response = $this->patch('/api/products/1', [
            "active" => 0,
        ]);
        $update_response->assertOk();
        $this->assertEquals(0, Product::first()->active);

    }

}
