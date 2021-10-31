<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product\ProductResource;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProductResource::collection($this->productRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);
        return response()->json(new ProductResource($this->productRepo->create($request->all())), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(string $name)
    {
        return ProductResource::collection($this->productRepo->searchByProductName($name));
    }

    /**
     * Show products from specific brand
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function productsByBrand(Brand $brand)
    {
        return ProductResource::collection($this->productRepo->productsByBrand($brand->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        return response()->json($this->productRepo->update($product->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        return response()->json($this->productRepo->deleteById($product->id), Response::HTTP_NO_CONTENT);
    }
}
