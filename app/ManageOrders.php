<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ManageOrders extends Model
{
    use Notifiable;
    protected $table = "orders";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_name','phonenumber','total_cost','state','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
