<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use Hash;
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
        $product->rate = $req->rate;
        $product->vnd = $req->vnd;
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
    public function danhsachsanpham($order_id){
        $user_id = Auth::user()->id;
        $user_id_order = DB::table('orders')->where('id','=',$order_id)->first()->user_id;

        if($user_id_order == $user_id){
            $sanpham = DB::table('products')->
            where(['order_id'=>$order_id, 'state'=>1])->get();
            $donhang = DB::table('orders')->where('id','=',$order_id)->first();
            return view('personal/DanhSachSanPham', ['sanpham'=>$sanpham, 'donhang'=>$donhang]);
        }else{
            return view('error');
        }

    }

    public function updateProductUser(Request $req){
        $id_sp = $req->id_sp;
        $new_quantity = $req->quantity;

        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        $vnd = $product->vnd;
        if($vnd != "" && $vnd > 0){
            $cost = $vnd*$new_quantity;
            $rs = DB::table('products')->where('id','=',$id_sp)->update(['quantity'=>$new_quantity, 'cost'=>$cost]);
        }else{
            $rs = DB::table('products')->where('id','=',$id_sp)->update(['quantity'=>$new_quantity]);
        }
        return redirect('/danhsachsanpham/'.$order_id);
    }

    public function updateProductStaff(Request $req){

    }

    public function cancelProductUser(Request $req){
        $id_sp = $req->id_sp;
        $rs = DB::table('products')->where('id','=',$id_sp)->update(['status'=>0]);
        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        return redirect('/danhsachsanpham/'.$order_id);
    }

    public function buyProductUser(Request $req){
        $id_sp = $req->id_sp;
        $rs = DB::table('products')->where('id','=',$id_sp)->update(['status'=>1]);
        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        return redirect('/danhsachsanpham/'.$order_id);
    }

    public function deleteProductUser(Request $req){
        $id_sp = $req->id_sp;
        $rs = DB::table('products')->where('id','=',$id_sp)->update(['state'=>0]);
        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        return redirect('/danhsachsanpham/'.$order_id);
    }

    public function adminUpdateProductUser(Request $req){
        $id_sp = $req->id_sp;
        $new_price = $req->price;
        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        $vnd = $product->vnd;
            $vnd = $new_price * $product->rate;
            $cost = $vnd * $product->quantity;
            $rs = DB::table('products')->where('id','=',$id_sp)->update(['vnd'=>$vnd, 'cost'=>$cost, 'price'=>$new_price]);

        ////////////////////  Cập nhật lại total_cost mỗi khi Nhân viên cập nhật giá sản phẩm  //////////////////////    
        $list_product = DB::table('products')->where(['order_id'=>$order_id])->get();
        $total_cost = 0;
        foreach ($list_product as $product) {
          if( ($product->cost > 0)){
            print_r($product->cost);
            $total_cost += $product->cost;
          }else{
            $total_cost = "Chưa xác định";
            break;
          }
        }
        DB::table('orders')->where('id','=',$order_id)->update(['total_cost'=>$total_cost]);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

            return redirect('/admin/order/detail/'.$order_id);
    }

    public function adminOkProductUser(Request $req){
        $id_sp = $req->id_sp;
        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        DB::table('products')->where('id','=',$id_sp)->update(['status'=>2]);
        return redirect('/admin/order/detail/'.$order_id);
    }
    public function adminOutOfStockProductUser(Request $req){
        $id_sp = $req->id_sp;
        $product = DB::table('products')->where('id','=',$id_sp)->first();
        $order_id = $product->order_id;
        DB::table('products')->where('id','=',$id_sp)->update(['status'=>3]);
        return redirect('/admin/order/detail/'.$order_id);
    }

}
