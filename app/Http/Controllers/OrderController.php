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
}
