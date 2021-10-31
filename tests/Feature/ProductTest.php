<?php

namespace Tests\Feature;

use App\Models\Product;
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

        $response->assertOk();
    }

    public function test_get_products()
    {
        $response = $this->get('/api/products');
        $response->assertOk();

    }

    public function test_add_product()
    {
        $this->postJson('/api/brands', [
            "name" => "ACI",
        ]);
        $this->assertDatabaseCount('brands', 1);

        $this->postJson('/api/categories', [
            "name" => "Kitchen",
        ]);
        $this->assertDatabaseCount('categories', 1);

        $this->postJson('/api/sub-categories', [
            "name" => "Oil",
            "category_id" => 1,
        ]);
        $this->assertDatabaseCount('subcategories', 1);

        $product_unit_response = $this->postJson('/api/product-units', [
            "unit_name" => "Bottle",
        ]);
        $product_unit_response->assertCreated();
        $this->assertDatabaseCount('product_units', 1);

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
            ]
        );
        $product_response->assertCreated();
        $this->assertDatabaseCount('products', 1);
    }

    public function test_product_delete()
    {
        $this->postJson('/api/brands', [
            "name" => "ACI",
        ]);

        $this->postJson('/api/categories', [
            "name" => "Kitchen",
        ]);

        $this->postJson('/api/sub-categories', [
            "name" => "Oil",
            "category_id" => 1,
        ]);

        $this->postJson('/api/product-units', [
            "unit_name" => "Bottle",
        ]);
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
            ]
        );
        $product_response->assertCreated();
        $this->assertDatabaseCount('products', 1);
        $product = Product::find(1);
        $product->delete();
        $this->assertModelMissing($product);
        $this->assertDatabaseCount('products', 0);
    }

    public function test_product_update()
    {
        $this->postJson('/api/brands', [
            "name" => "ACI",
        ]);

        $this->postJson('/api/categories', [
            "name" => "Kitchen",
        ]);

        $this->postJson('/api/sub-categories', [
            "name" => "Oil",
            "category_id" => 1,
        ]);

        $this->postJson('/api/product-units', [
            "unit_name" => "Bottle",
        ]);
        $this->postJson('/api/products', [
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
            ]
        );
        $product = Product::first();
        $update_response = $this->put('/api/products/' . $product->id, [
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
        $this->postJson('/api/brands', [
            "name" => "ACI",
        ]);

        $this->postJson('/api/categories', [
            "name" => "Kitchen",
        ]);

        $this->postJson('/api/sub-categories', [
            "name" => "Oil",
            "category_id" => 1,
        ]);

        $this->postJson('/api/product-units', [
            "unit_name" => "Bottle",
        ]);
        $this->postJson('/api/products', [
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
            ]
        );
        $product = Product::first();
        $update_response = $this->patch('/api/products/' . $product->id, [
            "active" => 0,
        ]);
        $update_response->assertOk();
        $this->assertEquals(0, Product::first()->active);

    }

}
