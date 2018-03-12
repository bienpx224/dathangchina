<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function danhsachdonhang(){
        $donhang = DB::table('orders')->
        where('user_id', '=', Auth::id())->get();
        return view('personal/DanhSachDonHang', ['donhang'=>$donhang]);
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

        DB::table('orders')->where('id','=',$dh_sp)->update(['total_cost'=>$total_cost]);
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
        $rs = DB::table('products')->where('id','=',$dh_sp)->update(['status'=>0]);
        return redirect('/danhsachdonhang');
    }

    public function totalCost(){

    }

}
