<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryInformation;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\DeliveryInformation\DeliveryInformationRepositoryInterface;

class DeliveryInformationController extends Controller
{
    private $deliveryInfoRepo;

    public function __construct(DeliveryInformationRepositoryInterface $deliveryInfoRepo)
    {
        $this->deliveryInfoRepo = $deliveryInfoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->deliveryInfoRepo->all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($this->deliveryInfoRepo->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryInformation $deliveryInformation)
    {
        return response()->json($this->deliveryInfoRepo->findById($deliveryInformation->id), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryInformation $deliveryInformation)
    {
        return response()->json($this->deliveryInfoRepo->update($deliveryInformation->id,$request->all()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryInformation  $deliveryInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryInformation $deliveryInformation)
    {
        return response()->json($this->deliveryInfoRepo->deleteById($deliveryInformation->id), Response::HTTP_NO_CONTENT);
    }
}
