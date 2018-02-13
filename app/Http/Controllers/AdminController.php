<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminController extends Controller
{
  //
  public function indexAction(){
    return view('admin.index');
  }
  public function orderAction(){
      $donhang = DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id')->get();
      //where('user_id', '=', Auth::id())->get();
      return view('admin.order', ['donhang'=>$donhang]);
      //return view('admin.order');
  }

  public function orderActionDelete($order_id){
      //$donhang = DB::table('orders')->get();
      DB::table('orders')->where('id', '=', $order_id)->delete();
      //$this->orderAction();
      return redirect('admin/order');
      //return view('admin.order', ['donhang'=>$donhang]);
      //return view('admin.order');
  }
    public function orderActionDetail($order_id){
        $sanpham = DB::table('products')->
        where('order_id', '=', $order_id)->get();
        return view('admin/orderDetail', ['sanpham'=>$sanpham]);
    }


}
