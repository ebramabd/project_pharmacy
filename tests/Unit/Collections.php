<?php

namespace Tests\Unit;

use App\Models\Order_details;
use Carbon\Carbon;
use Illuminate\Support\Collection;

trait Collections
{

    /**
     * Get a collection of branch objects.
     *
     * This method returns a Laravel Collection containing a list of branches.
     * Each branch is represented as a generic object with:
     *  - id (string)
     *  - branch_name (string)
     *
     * @return \Illuminate\Support\Collection<int, object>  A collection of branch objects.
     */
    public function branchesCollectionsTrait(): Collection
    {
        return collect([
            (object)[
                'id'=>'1',
                'branch_name'=>'branch1'
            ],
            (object)[
                'id'=>'2',
                'branch_name'=>'branch2'
            ],
        ]);
    }


    /**
     * Get a collection of order objects.
     *
     * This method returns a Laravel Collection containing a list of orders.
     * Each order is represented as a generic object with the following properties:
     *  - id (int)         : The unique identifier of the order.
     *  - admin_id (int)   : The ID of the admin who created the order.
     *  - branch_id (int)  : The ID of the branch associated with the order.
     *  - price (float|int): The total price of the order.
     *  - created_at (timestamp)
     *
     * @return \Illuminate\Support\Collection<int, object>  A collection of order objects.
     */
    public function orderCollectionTrait(): Collection
    {
        return collect([
            (object)[
                'id' => 1,
                'admin_id' => 1,
                'branch_id' => 1,
                'price' => 30,
                'created_at' => Carbon::now()->subDays(2)->format('Y-m-d H:i:s')
            ],
            (object)[
                'id' => 2,
                'admin_id' => 2,
                'branch_id' => 2,
                'price' => 30,
                'created_at' => Carbon::now()->subDays(2)->format('Y-m-d H:i:s')
            ],
        ]);
    }


    /**
     * Get a collection of user objects.
     *
     * This method returns a Laravel Collection containing a list of users.
     * Each user is represented as a simple object with the following properties:
     *  - id (int)       : The unique identifier of the user.
     *  - name (string)  : The user's full name.
     *  - email (string) : The user's email address.
     *
     * @return \Illuminate\Support\Collection<int, object>  A collection of user objects.
     */
    public function userCollectionTrait(): Collection
    {
        return collect([
            (object)[
                'id'=>1,
                'name'=>'user1',
                'email'=>'user1@gmail.com'
            ],
            (object)[
                'id'=>2,
                'name'=>'user2',
                'email'=>'user2@gmail.com'
            ],
        ]);
    }


    /**
     * Get a collection of order detail objects.
     *
     * This method returns a Laravel Collection containing a list of order details.
     * Each order detail record is represented as a simple object with the following properties:
     *  - id (int)         : The unique identifier of the order detail.
     *  - order_id (int)   : The ID of the order to which this detail belongs.
     *  - quantity (int)   : The number of units for the specified product.
     *  - prod_id (int)    : The ID of the associated product.
     *
     * @return \Illuminate\Support\Collection<int, object>  A collection of order detail objects.
     */
    public function orderDetailsCollection(): Collection
    {
        return collect([
            (object)[
                'id' => 1,
                'order_id' => 1,
                'quantity' => 50,
                'prod_id' => 1,
            ],
            (object)[
                'id' => 2,
                'order_id' => 1,
                'quantity' => 20,
                'prod_id' => 2,
            ],
        ]);
    }

    /**
     * Get a collection of product objects.
     *
     * This method returns a Laravel Collection containing a list of products.
     * Each product is represented as a simple object with the following properties:
     *  - prod_id (int)     : The unique identifier of the product.
     *  - prod_name (string): The human-readable name of the product.
     *
     * @return \Illuminate\Support\Collection<int, object>  A collection of product objects.
     */
    public function productCollection(): Collection
    {
        return collect([
            (object)[
                'prod_id' => 1,
                'prod_name' => 'product1'
            ],
            (object)[
                'prod_id' => 2,
                'prod_name' => 'product2'
            ]
        ]);
    }
}
