<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
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

        $response->assertStatus(200);
    }

    // public function test_get_products()
    // {
    //     $response = $this->get('/api/products');

    //     $response->assertDatabaseCount(1);
    // }

    public function test_add_product()
    {
        $this->postJson('/api/products', [
            "product_name" => "Milk",
            "product_code" => "842899999",
            "discription" => "Liquid milk",
            "stock" => 3,
            "price" => "66.00",
            "discount" => "20.00",
            "active" => 0,
            "category_id" => 1,
            "subcategory_id" => 1,
            "brand_id" => 1,
            "product_unit_id" => 6
        ],[
            "Authorization" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzNTUwMjkwMCwiZXhwIjoxNjM1NTA2NTAwLCJuYmYiOjE2MzU1MDI5MDAsImp0aSI6Im1Ba2RlMmt5WnZhQ2R1bnIiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.ilSjy0oTfStPrkeOGtAp50VsxgL8T9hIqCW_opN04zU",
        ]
    );
        $this->assertDatabaseCount('products',1);
    }

    public function test_product_delete()
    {
        $user = User::find(1);
        $user->delete();
        // $this->assertDeleted($user);
        $this->assertModelMissing($user);
    }
}
