<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Subcategory\SubcategoryRepositoryInterface;

class SubcategoryController extends Controller
{
    private $subcategoryRepo;

    public function __construct(SubcategoryRepositoryInterface $subcategoryRepo)
    {
        $this->subcategoryRepo = $subcategoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->subcategoryRepo->all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->subcategoryRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Subcategory $subcategory)
    {
        return response()->json($this->subcategoryRepo->findById($subcategory->id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        return response()->json($this->subcategoryRepo->update($subcategory->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Subcategory $subcategory)
    {
        return response()->json($this->subcategoryRepo->deleteById($subcategory->id), Response::HTTP_NO_CONTENT);
    }
}
