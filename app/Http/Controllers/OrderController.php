<?php

namespace App\Http\Controllers;

use App\Events\OrderReceivedEvent;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->middleware('auth:api', ['except' => ['store']]);
        $this->orderRepo = $orderRepo;
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(OrderResource::collection($this->orderRepo->all()), Response::HTTP_OK);
    }

    /**
     * Get order by user id
     *
     * @param integer $id
     * @return void
     */
    public function getOrdersByUserId(int $id)
    {
        return response()->json(OrderResource::collection($this->orderRepo->getOrdersByUserId($id)), Response::HTTP_OK);
    }

    /**
     * Store a newly created order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        return response()->json(new OrderResource($this->orderRepo->create($request->all())), Response::HTTP_CREATED);

    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json(new OrderResource($this->orderRepo->findById($order->id)), Response::HTTP_OK);
    }

    /**
     * Update the specified order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        return response()->json($this->orderRepo->update($order->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified order from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        return response()->json($this->orderRepo->deleteById($order->id), Response::HTTP_NO_CONTENT);
    }
}
