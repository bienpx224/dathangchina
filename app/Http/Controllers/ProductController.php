<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function addProduct(Request $req){

        $user_id = Auth::user()->id;
        $order_id = DB::table('orders')->select('id')->where([['state','=',1],['user_id','=',$user_id]])->first();
        $order_id = $order_id->id;

        $product = new Product();
    	$product->link = $req->link;
    	$product->image = $req->image;
    	$product->title = $req->title;
    	$product->price = $req->price;
    	$product->quantity = $req->quantity;
    	$product->cost = $req->cost;
    	$product->color = $req->color;
    	$product->note = $req->note;
    	$product->size = $req->size;
        $product->order_id = $order_id;
        $saved = $product->save();
        if($saved){
            $signal = 1;
            $msg = "success";
        }else{
            $signal = 0;
            $msg = "không thể thêm vào hệ thống!!";
        }

        $data = json_encode([
                'signal' => $signal,
                'msg' => $msg,
                'order_id' => $order_id
             ]);

        print_r($data);
    }
}
