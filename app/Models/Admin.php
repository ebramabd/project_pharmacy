<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $type
 * @property int $branch_id
 */
class Admin extends Model
{
    use HasApiTokens;
    use Notifiable ;
    protected $table    = 'users';
    protected $fillable = [
        'user_name' ,
        'password',
        'type',
        'branch_id',
    ];
    public $timestamps = false ;
}
