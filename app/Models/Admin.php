<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $type
 * @property int $branch_id
 */
class Admin extends Authenticatable
{
    use HasFactory;
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
