<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $type
 * @property int $branch_id
 */
class Admin extends Model
{
    use HasApiTokens, Notifiable ;
    protected $table = 'users';
    protected $fillable =[
        'user_name' ,
        'password',
        'type',
        'branch_id',
    ];
    public $timestamps = false ;
}
