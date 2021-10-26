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
            $table->string('product_code')->unique();
            $table->text('discription')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);
            $table->boolean('active')->default(false);
            $table->timestamps();
            // $table->unsignedBigInteger('brand_id');
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('product_unit_id');
            // $table->unsignedBigInteger('subcategory_id');
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_unit_id')->constrained()->onDelete('cascade');
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
