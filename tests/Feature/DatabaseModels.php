<?php

namespace Tests\Feature;

use App\Dtos\BranchDto;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Category_of_product;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait DatabaseModels
{

    /**
     * @return \App\Models\Admin
     *
     */
    public function getAdmin(): Admin
    {
        return Admin::where('user_name', 'ebram')->first();
    }

    /**
     * Notes:
     * - Uses `insert()` for performance (no Eloquent events fired).
     * - Timestamps are not automatically handled.
     * - Intended mainly for testing or seeding purposes.
     *
     * @return void
     */
    public function storeBranch(): void
    {
        $dtoObj = new BranchDto();
        $dtoObj->setBranchName('branch1');

        $dtoObj2 = new BranchDto();
        $dtoObj2->setBranchName('branch2');

        Branch::insert([
            ['branch_name' => $dtoObj->getBranchName()],
            ['branch_name' => $dtoObj2->getBranchName()],
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\Branch>
     */
    public function getBranches(): Collection
    {
        return Branch::all();
    }

    protected function createCategoryWithProducts()
    {
        $category = Category::create([
            'cat_name' => 'test'
        ]);
        $products = Product::factory()->count(3)->create();
        foreach ($products as $product){
            Category_of_product::create([
                'prod_id'=>$product->id,
                'cat_id'=>$category->id,
            ]);
        }
        return $category;
    }

    protected function createProductInBranch(int $branchId)
    {
        $product = \App\Models\Product::factory()->create();

        DB::table('stores')->insert([
            'prod_id' => $product->id,
            'branch_id' => $branchId,
            'max_quantity' => 10,
            'min_quantity' => 30,
            'quantity_item' => 20,
            'price' => 20,
        ]);

        return $product;
    }

    protected function validAddRequestData(): array
    {
        return [
            'options' => [1, 2],
            'quantity' => [5, 3],
        ];
    }

    protected function validUpdateStoreData(): array
    {
        return [
            'product_id' => 1,
            'quantity' => 10,
        ];
    }

}
