<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product\ProductResource;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'search', 'productsByBrand']]);
        $this->productRepo = $productRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection($this->productRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        return response()->json($this->productRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response(new ProductResource($this->productRepo->findById($product->id)), Response::HTTP_OK);
    }

    /**
     * Search product by it's name
     *
     * @param string $name
     * @return Collection
     */
    public function search(string $name)
    {
        return response()->json(ProductResource::collection($this->productRepo->searchByProductName($name)), Response::HTTP_OK);
    }

    /**
     * Show products from specific brand
     *
     * @param Brand $brand
     * @return Collection
     */
    public function productsByBrand(Brand $brand)
    {
        return response()->json(ProductResource::collection($this->productRepo->productsByBrand($brand->id)), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        return response()->json($this->productRepo->update($product->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return response()->json($this->productRepo->deleteById($product->id), Response::HTTP_NO_CONTENT);
    }
}
