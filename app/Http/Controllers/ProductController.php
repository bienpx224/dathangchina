<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;

class ProductController extends Controller
{
    public function addProduct(Request $req){
    	$link = $req->link;
    	$image = $req->image;
    	$title = $req->title;
    	$price = $req->price;
    	$quantity = $req->quantity;
    	$cost = $req->cost;
    	$color = $req->color;
    	$note = $req->note;
    	$size = $req->size;

    	$data = json_encode([
	        'signal' => 1
	     ]);    
      
      	print_r($data);
    }
}
