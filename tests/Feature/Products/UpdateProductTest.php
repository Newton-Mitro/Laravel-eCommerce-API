<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_product_route()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     /**
     * Route test for get products
     *
     * @return void
     */
    public function test_update_product()
    {
        $response = $this->get('http://127.0.0.1:8000/api/products');
        $response->assertStatus(200);
    }
}
