<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $prod_id
 * @property int $branch_id
 * @property int $max_quantity
 * @property int $min_quantity
 * @property int $quantity_item
 * @property int $price
*/
class Store extends Model
{
    protected $table = 'stores';
    protected $fillable =[
        'prod_id' ,
        'branch_id',
        'max_quantity',
        'min_quantity',
        'quantity_item',
        'price',
    ];
    public $timestamps = false ;
}
