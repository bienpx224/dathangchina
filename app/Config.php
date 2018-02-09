<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    public $timestamps = true;
    protected $table = "config";
    protected $fillable=['type','rate','name'];
}
