<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $branch_id
 * @property int $prod_id
 * @property int $quantity_of_prod
*/
class Requests_of_product extends Model
{
    protected $table = 'requests_of_product';
    protected $fillable =[
        'branch_id' ,
        'prod_id' ,
        'quantity_of_prod' ,
    ];
}
