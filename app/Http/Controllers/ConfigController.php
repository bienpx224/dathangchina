<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ConfigController extends Controller
{
    public function getRateView(){
        $configs = DB::table('config')->get();
        return view('admin.config.index', compact('configs'));
    }

    public function getRate(Request $req){
    	$type  = $req->type;
    	$config = DB::table('config')->where('type',$type)->first();

    	$data = json_encode([
	        'config' => $config
	     ]);    
      
      	print_r($data);
    }
    public function addRate(Request $req){
    	$config = new Config;
    	$config->type = $req->type;
    	$config->rate = $req->rate;
        $config->name = $req->name;
    	$rs = $config->save();

    	$data = json_encode([
	        'result' => $rs
	     ]);    
      
      	print_r($data);
    }
    public function editRate(Request $req){
    	$id = $req->id;Log::info('id edit: '.$id);
    	$rate = $req->rate;
    	$rs = DB::table('config')->where('id',$id)->update(['rate'=>$rate]);
    	$configs = DB::table('config')->get();
        return view('admin.config.index', compact('configs'));
    }
    public function deleteRate(Request $req){
        $id = $req->id;
        $rs = DB::table('config')->where('id',$id)->delete();
        $configs = DB::table('config')->where('type','money')->get();
        return view('admin.config.index', compact('configs'));
    }
    public function getAllRate(Request $req){
        $configs = DB::table('config')->where('type','money')->get();
        $data = json_encode([
            'configs' => $configs
        ]);    
        
        print_r($data);
    }

}
