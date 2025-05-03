<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $prod_id
 * @property int $cat_id
*/
class Category_of_product extends Model
{
    protected $table = 'category_of_product';
    protected $fillable =[
        'prod_id' ,
        'cat_id' ,
    ];
    public $timestamps = false ;
}
