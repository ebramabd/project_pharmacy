<?php

namespace App\Http\Controllers\AdminBranches;

use App\Http\Requests\AdminBranches\OrderRequest;
use App\Services\Implementation\OrderService;
use App\Services\IOrderService;
use Illuminate\Http\Request;

class OrderController
{

    public function __construct(private IOrderService $orderSer)
    {
    }

    public function getView()
    {
        $data =  $this->orderSer->getDataToShowService();
        return view('adminBranches.order.make_order' , compact('data'));
    }

    public function store(OrderRequest $request)
    {
        return $this->orderSer->storeService($request->getDto());
    }
}


//"options": [
//    "13",
//    "13",
//    "13"
//],
//  "quantity": [
//    "2",
//    "2",
//    "2"
//]
//}
