<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Notifiable;
    protected $table = "orders";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'phonenumber', 'email', 'address','password','secret','bank_number','bank_name','bank_user_name','authority','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
