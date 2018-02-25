<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Notifiable;
    protected $table = "products";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','order_id', 'title', 'image', 'link','price','rate', 'vnd','quantity','cost','color','size','note','state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
