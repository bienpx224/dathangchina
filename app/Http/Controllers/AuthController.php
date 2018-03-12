<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    public function changePassword(){
      return view('gethtml');
    }
    //
    public function login(Request $request){
      $phonenumber = $request['phonenumber'];
      $password = $request['password'];
      /*
      $user = User::find(2);
      Auth::login($user);
      return view('home',['user'=>$user]);
      */
      if (Auth::attempt(['phonenumber'=>$phonenumber, 'password'=>$password])){
        return redirect()->back();
        //view('index',['user'=>Auth::user()]);
        //return redirect()->route('home', ['user' => Auth::user()]);
        //view('home',['user'=>Auth::user()]);
        //return redirect()->route('/');
      }
      else{
        return redirect()->back()->with('loginfailed', "Đăng nhập thất bại");
        //return view('bang-gia',['error'=>'Login failed']);
      }
    }
    public function logout(){
      Auth::logout();
      return redirect()->route('getHome');
    }
    public function signup(Request $request){
      $this->validate($request,
        [
          'email'=>'unique:users,email',
          'phonenumber'=>'unique:users,phonenumber',
          'password'=>'min:6|max:20',
          'repassword'=>'same:password'
        ],
        [
          'email.unique' => 'Email đã có người sử dụng',
          'phonenumber.unique' => 'Số điện thoại đã có người sử dụng',
          'repassword.same'=>'Mật khẩu không giống nhau',
          'password.min'=>'Mật khẩu tối thiểu 6 ký tự'
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phonenumber=$request->phonenumber;
        $user->address=$request->address;
        $secret = strrev($request->password);
        $user->secret = $secret;
        $user->password=Hash::make($request->password);
        $user->save();

        Log::info("id: ".$user->id);
        $order = new Order();
        $order->user_id = $user->id;
        $order->status = 1;
        $order->state = 1;
        $order->note = "";
        $order->total_cost = "chưa xác định";
        $order->save();

        return redirect()->back()->with('signupsuccess','Đã tạo tài khoản thành công');
    }
}
