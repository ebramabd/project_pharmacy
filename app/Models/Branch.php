<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property string $branch_name
 */
class Branch extends Model
{
    protected $table = 'branches';
    protected $fillable =[
        'branch_name' ,
    ];
    public $timestamps = false ;
}
