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
        'id','user_id','total_cost','note','state','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
