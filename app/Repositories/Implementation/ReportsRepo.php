<?php

namespace App\Repositories\Implementation;

use App\Models\Branch;
use App\Repositories\IReportsRepo;
use App\Trait\Crud;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReportsRepo implements IReportsRepo
{
    use Crud ;
    public function getAllBranchRepo():Collection
    {
        return $this->getAllObject(new Branch() );
    }

    public function BranchesOrdersReportsRepo(array $data): Collection
    {
        $period = $data['period'] ;
        $startDate = Carbon::now()->subDays($period) ;
        $endDate = Carbon::now() ;

        return $data = DB::table('order')
            ->join('users' , 'order.admin_id' , '=' , 'users.id')
            ->where('order.branch_id' ,$data['branch'] )
            ->whereBetween('order.created_at' , [$startDate , $endDate])
            ->get([
                'users.user_name',
                'order.price',
                'order.created_at',
                'order.id'
            ]);
    }

    public function showOrderDetailsRepo(int $id): Collection
    {
        return DB::table('order_details')
            ->join('products' , 'order_details.prod_id' , '=' , 'products.id')
            ->where('order_details.order_id',$id)
            ->get([
                'products.prod_name',
                'order_details.quantity'
            ]);
    }

    public function getNumProductRepo(array $data): string
    {
        $period = $data['period'] ;
        $startDate = Carbon::now()->subDays($period) ;
        $endDate = Carbon::now() ;

        return $data = DB::table('order')
            ->join('order_details' , 'order.id' , '=' , 'order_details.order_id')

            ->where('order.branch_id' , $data['branch'])
            ->where('order_details.prod_id' , $data['product'])
            ->whereBetween('order.created_at' , [$startDate , $endDate])
            ->sum('order_details.quantity') ;
    }

    public function showAllOrderOfBranchRepo():Collection
    {
        return DB::table('order')
            ->join('branches', 'order.branch_id' , '=' , 'branches.id')
            ->get([
                'order.id',
                'order.price',
                'branches.branch_name',
            ]);
    }

}
