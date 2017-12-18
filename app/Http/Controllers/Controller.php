<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;
use \Statickidz\GoogleTranslate;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function indexAction(){
      return view('home');
    }
    public function postTranslate(Request $req){
      $text = $req->text;
      Log::info('Showing user profile for user: '.$req->text);
      $source = 'vi';
      $target = 'zh-CN';
      $trans = new GoogleTranslate();
      $result = $trans->translate($source, $target, $text);
      Log::info('Result: '.$result);
      return $result;
    }
    public function postGetLink(Request $req){
      require "simple_html_dom.php";
      $url = "https://detail.tmall.com/item.htm?spm=a230r.1.14.13.1d76d49b9TSv9u&id=538504605056&cm_id=140105335569ed55e27b&abbucket=6";
      $linksp = $req->linksanpham;
      $html = file_get_html($url);
      $tins = $html->find('div.tm-clear',0);
      $title = $tins->find('h1',0);
      Log::info('Title: '.$title);
      return $html;
    }
}
