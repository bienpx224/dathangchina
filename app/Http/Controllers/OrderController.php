<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Order;

class OrderController extends Controller
{
    //
    public function danhsachdonhang(){
        $donhang = DB::table('orders')->
        where('user_id', '=', Auth::id())->orderby('status', 'DESC')->get();

        $current_dh = DB::table('orders')->where(['user_id'=>Auth::id(), 'state'=>1])->first();
        $list_product = DB::table('products')->where('order_id','=',$current_dh->id)->get();
        $count = count($list_product);
        return view('personal/DanhSachDonHang', ['donhang'=>$donhang, 'count'=>$count]);
    }

    public function buyOrderUser(Request $req){
        $dh_sp = $req->dh_sp;
        $rs = DB::table('orders')->where('id','=',$dh_sp)->update(['status'=>2]);

        $list_product = DB::table('products')->where(['order_id'=>$dh_sp, 'state'=>1, 'status'=>2,'status'=>1])->get();
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

        DB::table('orders')->where('id','=',$dh_sp)->update(['total_cost'=>$total_cost, 'state'=>0]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->status = 1;
        $order->state = 1;
        $order->note = "";
        $order->total_cost = "chưa xác định";
        $order->save();
        // $data = json_encode([
        //         'list_product' => $list_product,
        //         'total_cost' => $total_cost,
        //         'dh_sp' => $dh_sp
        // ]);

        // print_r($data);
        return redirect('/danhsachdonhang');
    }

    public function cancelOrderUser(Request $req){
        $dh_sp = $req->dh_sp;
        $rs = DB::table('orders')->where('id','=',$dh_sp)->update(['status'=>0,'state'=>0]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->status = 1;
        $order->state = 1;
        $order->note = "";
        $order->total_cost = "chưa xác định";
        $order->save();

        return redirect('/danhsachdonhang');
    }

    public function buyOrderAdmin(Request $req){
        $order_id = $req->dh_sp;
        $rs = DB::table('orders')->where('id','=',$order_id)->update(['status'=>4]);

        return redirect()->back();
    }

}
