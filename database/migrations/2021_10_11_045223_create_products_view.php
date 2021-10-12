<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateProductsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW view_products
        AS
        SELECT
            products.`product_name`,
            products.`product_discription`,
            products.`stock`,
            products.`price`,
            products.`discount`,
            products.`product_image_url`,
            brands.brand_name,
            categories.category_name,
            subcategories.subcategory_name,
            product_units.unit_name
        FROM
            products
            LEFT JOIN brands ON products.brand_id = brands.id
            LEFT JOIN categories ON products.category_id = categories.id
            LEFT JOIN subcategories ON products.subcategory_id = subcategories.id
            LEFT JOIN product_units ON products.product_unit_id = product_units.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS view_products;");
    }
}
