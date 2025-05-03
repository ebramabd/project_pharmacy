<?php

namespace App\Repositories\Implementation;

use App\Repositories\IChartsRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsRepo implements IChartsRepo
{
    public function getChartBranchRepo(): array
    {
        $date = Carbon::now()->subDay(10);
        $topBranch = DB::table('order')
            ->join('branches' , 'order.branch_id' , '=' , 'branches.id')
            ->select('branches.branch_name' , DB::raw('SUM(order.price) as total_price'))
            ->where('order.created_at' , '>=' , $date)
            ->groupBy('branches.branch_name')
            ->orderByDesc('total_price')
            ->get();
        $data = [
            'branchNames' => $topBranch->pluck('branch_name'),
            'prices' => $topBranch->pluck('total_price')
        ];
        return $data ;
    }
    public function getChartProductRepo(): array
    {
        $date = Carbon::now()->subDay(10);
        $topProducts = DB::table('order_details')
            ->join('products', 'order_details.prod_id', '=', 'products.id')
            ->select('products.prod_name', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->where('order_details.created_at', '>=', $date)
            ->groupBy('products.prod_name')
            ->orderByDesc('total_quantity')
            ->get();
        $data = [
            'productNames' => $topProducts->pluck('prod_name'),
            'productQuantities' => $topProducts->pluck('total_quantity')
        ];
        return $data ;
    }
}
