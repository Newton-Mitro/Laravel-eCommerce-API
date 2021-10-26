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
        $response = $this->get('/products/a');
        // $response = $this->getJson(route('product.search'));
        $response->assertStatus(200);
    }

    /**
     * Route test for get products
     *
     * @return void
     */
    public function test_get_products()
    {
        $products = $this->getJson(route('products.index'));
        $this->assertGreaterThan(0,count($products->json()));
    }


}
