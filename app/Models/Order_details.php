<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $order_id
 * @property int $prod_id
 * @property int $quantity
*/
class Order_details extends Model
{
    protected $table = 'order_details';
    protected $fillable =[
        'order_id' ,
        'prod_id' ,
        'quantity' ,
    ];
}
