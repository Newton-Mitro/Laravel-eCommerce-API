<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        // $this->middleware('auth:api', ['except' => ['index','show','search','productsByBrand']]);
        $this->orderRepo = $orderRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->orderRepo->all(), Response::HTTP_OK);
    }

    public function getOrdersByUserId(int $id)
    {
        return response()->json($this->orderRepo->getOrdersByUserId($id), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $this->orderRepo->create($request->all());
        return response()->json($this->orderRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json($this->orderRepo->findById($order->id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return response()->json($this->orderRepo->update($order->id, $request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        return response()->json($this->orderRepo->deleteById($order->id), Response::HTTP_NO_CONTENT);
    }
}
