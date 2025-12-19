<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $branch_name
 */
class Branch extends Model
{
     use HasFactory;

    protected $table    = 'branches';
    protected $fillable = [
        'branch_name' ,
    ];
    public $timestamps = false ;
}
