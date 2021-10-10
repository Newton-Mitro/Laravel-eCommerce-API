<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_discription');
            $table->integer('stock')->default(0);
            $table->decimal('price');
            $table->decimal('discount')->default(0);
            $table->boolean('is_active')->default(false);
            $table->string('product_image_url');
            $table->timestamps();
            // $table->unsignedBigInteger('brand_id');
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('product_unit_id');
            // $table->unsignedBigInteger('subcategory_id');
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('product_unit_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
