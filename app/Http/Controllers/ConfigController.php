<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    public function getRate(Request $req){
    	$type  = $req->type;
    	$config = DB::table('config')->where('type',$type)->first();

    	$data = json_encode([
	        'config' => $config
	     ]);    
      
      	print_r($data);
    }
    public function addTypeMoney(Request $req){
    	$config = new Config;
    	$config->type = $req->type;
    	$config->rate = $req->rate;
    	$rs = $config->save();

    	$data = json_encode([
	        'result' => $rs
	     ]);    
      
      	print_r($data);
    }
    public function editRate(Request $req){
    	$type = $req->type;
    	$rate = $req->rate;
    	$config = DB::table('config')->where('type',$type)->first();
    	$config->rate = $rate;
    	$rs = $config->update();
    	
    	$data = json_encode([
	        'result' => $rs,
	        'config' => $config
	     ]);    
      
      	print_r($data);
    }
    public function getAllRate(Request $req){
        $configs = DB::table('config')->get();
        $data = json_encode([
            'configs' => $configs
         ]);    
      
        print_r($data);
    }

}
