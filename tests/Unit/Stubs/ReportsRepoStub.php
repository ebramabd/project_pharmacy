<?php

namespace Tests\Unit\Stubs;

use App\Repositories\IReportsRepo;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Tests\Unit\Collections;

class ReportsRepoStub implements IReportsRepo
{
    use Collections;

    public function __construct()
    {
    }

    public function getAllBranchRepo(): Collection
    {
        return $this->branchesCollectionsTrait();
    }

    /**
     *
     * @param array{
     *     branch?: int|null,
     *     period?: string|null
     * } $data Data extracted from BranchesOrdersReportsDto.
     *
     * @return \Illuminate\Support\Collection  Collection of report results.
     */
    public function BranchesOrdersReportsRepo(array $data): Collection
    {
        $period = $data['period'];
        $startDate = Carbon::now()->subDays($period);
        $endDate = Carbon::now();

         return $this->orderCollectionTrait()
        ->map(function ($order) {
            $order->created_at = Carbon::parse($order->created_at);
            return $order;
        })
        ->where('branch_id', $data['branch'])
        ->whereBetween('created_at', [$startDate, $endDate])
        ->map(function ($order) {
            $user = $this->userCollectionTrait()->firstWhere('id', $order->admin_id);
            return (object)[
                'id' => $order->id,
                'user_name' => $user->name,
                'price' => $order->price,
                'created_at' => $order->created_at,
            ];
        });

    }

    /**
     * Get all product details for a specific order.
     *
     * @param int $id The order ID.
     *
     * @return \Illuminate\Support\Collection<int, array{
     *     prod_name: string,
     *     quantity: int
     * }>  A collection of order item details.
     *
     * Each collection item contains:
     * - string  prod_name   Product name.
     * - int     quantity    Quantity ordered.
     */
    public function showOrderDetailsRepo(int $id): Collection
    {
        return $this->orderDetailsCollection()
            ->where('order_id', $id)
            ->map(function ($item) {
                $product = $this->productCollection()->firstWhere('id', $item->prod_id);

                return (object)[
                    'prod_name' => $product->prod_name,
                    'quantity' => $item->quantity,
                ];
            });
    }

    /**
     * Simulate the query that sums product quantity for a given branch + product + period.
     *
     * This method filters the mock order and order_details collections, replicating the
     * following SQL query:
     *
     * SELECT SUM(order_details.quantity)
     * FROM order
     * JOIN order_details ON order.id = order_details.order_id
     * WHERE order.branch_id = ?
     *   AND order_details.prod_id = ?
     *   AND order.created_at BETWEEN startDate AND endDate;
     *
     * @param array $data ['period' => int, 'branch' => int, 'product' => int]
     *
     * @return string  Total quantity for the specified product in the time period.
     */
    public function getNumProductRepo(array $data): string
    {
        $period = $data['period'];
        $startDate = Carbon::now()->subDays($period);
        $endDate = Carbon::now();

        $orders = $this->orderCollectionTrait()
            ->filter(function ($order) use ($data, $startDate, $endDate) {
                return $order->branch_id == $data['branch']
                    && $order->created_at >= $startDate
                    && $order->created_at <= $endDate;
            });

        $orderIds = $orders->pluck('id')->toArray();

        $orderDetails = $this->orderDetailsCollection()
            ->whereIn('order_id', $orderIds)
            ->where('prod_id', $data['product']);

        return $orderDetails->sum('quantity');
    }


    /**
     * Simulate the query that retrieves all orders with their branch names.
     *
     * This method replicates the following SQL:
     *
     * SELECT order.id, order.price, branches.branch_name
     * FROM order
     * JOIN branches ON order.branch_id = branches.id;
     *
     * @return \Illuminate\Support\Collection<int, object>
     */
    public function showAllOrderOfBranchRepo(): Collection
    {
        $orders = $this->orderCollectionTrait();
        $branches = $this->branchesCollectionsTrait();

        return $orders->map(function ($order) use ($branches) {
            $branch = $branches->firstWhere('id', $order->branch_id);
            return (object)[
                'id' => $order->id,
                'price' => $order->price,
                'branch_name' => $branch ? $branch->branch_name : null,
            ];
        });
    }

}
