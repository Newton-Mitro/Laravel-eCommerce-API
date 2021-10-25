<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\ProductReview\ProductReviewRepositoryInterface;

class ProductReviewController extends Controller
{
    private $productReviewRepo;

    public function __construct(ProductReviewRepositoryInterface $productReviewRepo)
    {
        $this->productReviewRepo = $productReviewRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->productReviewRepo->all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($this->productReviewRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        return response()->json($this->productReviewRepo->findById($productReview->id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        return response()->json($this->productReviewRepo->update($productReview->id,$request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        return response()->json($this->productReviewRepo->deleteById($productReview->id), Response::HTTP_NO_CONTENT);
    }
}
