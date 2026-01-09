<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\JsonResponse;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function add(OrderAddRequest $request): JsonResponse
    {
        $orderData = $request->validated();

        $order = $this->orderService->add($orderData);
        // Log::info($order);
        $orderResource = new OrderResource($order);
        // Log::info($orderResource->response());

        return $orderResource->response()->setStatusCode(201);
    }
}
