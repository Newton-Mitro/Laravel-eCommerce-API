<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\ProductUnit\ProductUnitRepositoryInterface;

class ProductUnitController extends Controller
{
    private $productUnitRepo;

    public function __construct(ProductUnitRepositoryInterface $productUnitRepo)
    {
        $this->productUnitRepo = $productUnitRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->productUnitRepo->all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($this->productUnitRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductUnit $productUnit)
    {
        return response()->json($this->productUnitRepo->findById($productUnit->id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductUnit $productUnit)
    {
        return response()->json($this->productUnitRepo->update($productUnit->id,$request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductUnit $productUnit)
    {
        return response()->json($this->productUnitRepo->deleteById($productUnit->id), Response::HTTP_NO_CONTENT);
    }
}
