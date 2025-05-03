<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $admin_id
 * @property int $branch_id
 * @property int $price
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
*/
class Order extends Model
{
    protected $table = 'order';
    protected $fillable =[
        'admin_id' ,
        'branch_id' ,
        'price' ,
    ];
    public $timestamps = true ;
}
