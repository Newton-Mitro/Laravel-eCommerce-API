<?php

namespace App\Http\Controllers;

use App\Events\OrderReceivedEvent;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->middleware('auth:api');
        $this->orderRepo = $orderRepo;
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        return response()->json(OrderResource::collection($this->orderRepo->all()), Response::HTTP_OK);
    }

    /**
     * Get order by user id
     *
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrdersByUserId(int $id)
    {
        $this->authorize('viewOnly', Order::class);
        return response()->json(OrderResource::collection($this->orderRepo->getOrdersByUserId($id)), Response::HTTP_OK);
    }

    /**
     * Store a newly created order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return OrderResource
     */
    public function store(OrderRequest $request)
    {
        $this->authorize('create', Order::class);
        return response()->json(new OrderResource($this->orderRepo->create($request->all())),Response::HTTP_CREATED);

    }

    /**
     * Display the specified order.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return response()->json(new OrderResource($this->orderRepo->findById($order->id)), Response::HTTP_OK);
    }

    /**
     * Update the specified order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderRequest $request, Order $order)
    {
        $this->authorize('update', $order);
        return response()->json($this->orderRepo->update($order->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Update the specified order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        return response()->json($this->orderRepo->updateStatus($order->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified order from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        return response()->json($this->orderRepo->deleteById($order->id), Response::HTTP_NO_CONTENT);
    }
}
