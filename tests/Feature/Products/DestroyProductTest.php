<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroyProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_destroy_product_route()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     /**
     * Route test for get products
     *
     * @return void
     */
    public function test_destroy_product()
    {
        $response = $this->delete('http://127.0.0.1:8000/api/products/2');
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
