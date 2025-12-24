<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBranches\OrderRequest;
use App\Services\IOrderService;

class OrderController extends Controller
{
    public function __construct(private IOrderService $orderService) {}

    public function store(OrderRequest $request)
    {
        $result = $this->orderService->storeService(
            $request->getDto()
        );

        return response()->json([
            'message' => $result,
        ], 201);
    }
}
