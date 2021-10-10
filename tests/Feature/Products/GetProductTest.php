<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetProductTest extends TestCase
{
    /**
     * Route test for get products
     *
     * @return void
     */
    public function test_get_products_route()
    {
        $response = $this->get('http://127.0.0.1:8000/api/products');
        $response->assertStatus(200);
    }

    /**
     * Route test for get products
     *
     * @return void
     */
    public function test_get_products()
    {
        $response = $this->get('http://127.0.0.1:8000/api/products');
        $response->assertStatus(200);
    }


}
