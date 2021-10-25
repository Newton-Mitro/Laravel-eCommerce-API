<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;

class OrderStatusController extends Controller
{
    private $orderStatusRepo;

    public function __construct(OrderStatusRepositoryInterface $orderStatusRepo)
    {
        $this->orderStatusRepo = $orderStatusRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->orderStatusRepo->all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($this->orderStatusRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        return response()->json($this->orderStatusRepo->findById($orderStatus->id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        return response()->json($this->orderStatusRepo->update($orderStatus->id,$request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        return response()->json($this->orderStatusRepo->deleteById($orderStatus->id), Response::HTTP_NO_CONTENT);
    }
}
