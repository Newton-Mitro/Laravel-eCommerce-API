<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderItem\OrderItemResource;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\OrderItem\OrderItemRepositoryInterface;

class OrderItemController extends Controller
{
    private $orderItemRepo;

    public function __construct(OrderItemRepositoryInterface $orderItemRepo)
    {
        $this->orderItemRepo = $orderItemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findByOrderId(int $orderId)
    {
        return response()->json(OrderItemResource::collection($this->orderItemRepo->findByOrderId($orderId)), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json($this->orderItemRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(OrderItem $orderItem)
    {
        return response()->json(new OrderItemResource($this->orderItemRepo->findById($orderItem->id)), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        return response()->json($this->orderItemRepo->update($request->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(OrderItem $orderItem)
    {
        return response()->json($this->orderItemRepo->deleteById($orderItem->id), Response::HTTP_NO_CONTENT);
    }
}
