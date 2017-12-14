<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
  public function getUserInformation(){
    return view('personal/user-information');
  }
  public function updateUserInformation(Request $req){
    return 1;
  }
  public function getChangePassword(){
    return view('personal/change-password');
  }
  ///////////////////////////////////////////////////////////////////////////////////////////
  public function updatePassword(Request $request){
      $this->validate($request, [
          'old_password'     => 'required',
          'new_password'     => 'required|min:6',
          'confirm_password' => 'required|same:new_password',
      ]);
      $data = $request->all();

      $user = User::find(auth()->user()->id);
      if(!Hash::check($data['old_password'], $user->password)){
           return redirect()->back()
                      ->with('wrongPassword','The specified password does not match the database password');
      }else{
        DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['password' => Hash::make($request->new_password),
                  'secret' => strrev($request->new_password)]);
                return redirect()->back()->with('changePasswordSuccess','Change password completed');
      }

    }
  //////////////////////////////////////////////////////////////////////////////////////
  public function getListUser(){
    $user = DB::table('users')->where('authority',1)->orWhere('authority',2)->get();
    return view('admin.user.list',compact('user'));
  }
  //////////////////////////////////////////////////////////////////////////////////////
  public function getEdit($id){
    $user = DB::table('users')->where('id',$id)->first();
    return view('admin.user.edit',compact('user'));
  }
  //////////////////////////////////////////////////////////////////////////////////////
  public function postEdit(Request $req){
    $id = $req->id; $authority = $req->authority;
    DB::table('users')->where('id',$id)->update(['authority'=>$authority]);
    $user = DB::table('users')->where('id',$id)->first();
    return view('admin.user.edit',compact('user'));
  }
  //////////////////////////////////////////////////////////////////////////////////////
  public function getDelete($id){
    DB::table('users')->where('id',$id)->delete();
    return redirect()->route('admin.user.list');
  }
}
