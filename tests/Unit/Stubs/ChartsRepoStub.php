<?php

namespace Tests\Unit\Stubs;

use App\Repositories\IChartsRepo;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Tests\Unit\Collections;

class ChartsRepoStub implements IChartsRepo
{
    use Collections;

    public function getChartBranchRepo(): array
    {
        $date = Carbon::now()->subDays(10);
        $branches = $this->branchesCollectionsTrait()->keyBy('id');
        $orders = $this->orderCollectionTrait();

        $topBranch = $orders
            ->filter(fn($order) => Carbon::parse($order->created_at)->gte($date))
            ->groupBy('branch_id')
            ->map(function (Collection $ordersOfBranch, $branchId) use ($branches) {
                return (object)[
                    'branch_name' => $branches[$branchId]->branch_name ?? 'Unknown',
                    'total_price' => $ordersOfBranch->sum('price'),
                ];
            })
            ->sortByDesc('total_price')
            ->values();

        return [
            'branchNames' => $topBranch->pluck('branch_name'),
            'prices' => $topBranch->pluck('total_price'),
        ];
    }

    public function getChartProductRepo(): array
    {
        $date = Carbon::now()->subDays(10);

        $products = $this->productCollection()->keyBy('prod_id');
        $orderDetails = $this->orderDetailsCollection();

        $topProducts = $orderDetails
            ->filter(function ($detail) use ($date) {
                return !isset($detail->created_at)
                    || Carbon::parse($detail->created_at)->gte($date);
            })
            ->groupBy('prod_id')
            ->map(function (Collection $detailsOfProduct, $prodId) use ($products) {
                return (object)[
                    'prod_name' => $products[$prodId]->prod_name ?? 'Unknown',
                    'total_quantity' => $detailsOfProduct->sum('quantity'),
                ];
            })
            ->sortByDesc('total_quantity')
            ->values();

        return [
            'productNames' => $topProducts->pluck('prod_name'),
            'productQuantities' => $topProducts->pluck('total_quantity'),
        ];
    }
}
