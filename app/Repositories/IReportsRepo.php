<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Support\Collection;

interface IReportsRepo
{
    public function getAllBranchRepo():Collection;
    public function BranchesOrdersReportsRepo(array $data): Collection;
    public function showOrderDetailsRepo(int $id): Collection;
    public function getNumProductRepo(array $data): string;
    public function showAllOrderOfBranchRepo():Collection;
}
