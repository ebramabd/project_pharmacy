<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int prod_id
 * @property string prod_name
 */
class Product extends Model
{
    protected $table = 'products';
    protected $fillable =[
        'prod_name' ,
    ];
    public $timestamps = false ;
}
