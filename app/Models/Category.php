<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $cat_name
*/
class Category extends Model
{
    protected $table    = 'categories';
    protected $fillable = [
        'cat_name' ,
    ];
    public $timestamps = false ;
}
