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

      return view('admin.order.list', ['donhang'=>$donhang]);
  }

  public function orderActionDelete($order_id){
      DB::table('orders')->where('id', '=', $order_id)->delete();

      return redirect('admin/order');
  }

  public function orderActionDetail($order_id){
        $sanpham = DB::table('products')->
        where('order_id', '=', $order_id)->get();

        return view('admin.order.detail', ['sanpham'=>$sanpham]);
    }

    public function orderActionEdit($order_id){
        $donhang = $sanpham = DB::table('orders')->
        where('id', '=', $order_id)->get();
        $sanpham = DB::table('products')->
        where('order_id', '=', $order_id)->get();

        return view('admin.order.edit', ['sanpham'=>$sanpham, 'donhang'=>$donhang]);
    }

    public function orderActionSearch(){
      if (isset($_GET['search'])){
          $status = $_GET['status'];
          $phonenumber = $_GET['phonenumber'];
      }
      $status = str_replace('+', ' ', $status);
      $donhang = DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id')->
            where('phonenumber','like', '%'.$phonenumber.'%')->
            where('status', 'like', '%'.$status.'%')->get();

      return view('admin.order.list', ['donhang'=>$donhang]);
    }

}
