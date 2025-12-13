<?php

namespace App\Repositories;

use App\Dtos\ProductNumReportsDto;
use Illuminate\Support\Collection;

interface IReportsRepo
{
    /**
     * @return \Illuminate\Support\Collection<\App\Models\Branch> Collection of Branch
     *
     * Each branch model has
     * - int $id
     * - string $branch_name
    */
    public function getAllBranchRepo(): Collection;

    /**
     *
     * @param array{
     *     branch?: int|null,
     *     period?: string|null
     * } $data Data extracted from BranchesOrdersReportsDto.
     *
     * @return \Illuminate\Support\Collection  Collection of report results.
     */
    public function BranchesOrdersReportsRepo(array $data): Collection;

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
    public function showOrderDetailsRepo(int $id): Collection;

    /**
     * @param array{
     *     'period':int|null,
     *     'product':int|null,
     *     'branch':int|null,
     *     }$data Data extracted from ProductNumReportsDto.
     *
     * @return string
    */
    public function getNumProductRepo(array $data): string;

    /**
     * @return \Illuminate\Support\Collection<int, array{
     *     'id',
     *     'price',
     *     'price'
     *     }>
     */
    public function showAllOrderOfBranchRepo(): Collection;
}
