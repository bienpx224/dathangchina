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

    public function getprice(Request $req){
      $link = $req->link;
      $dirPhantom = public_path().'/../phantomjs/bin/phantomjs';
      $file = public_path().'/js/content.js';
      // $output = shell_exec($dirPhantom.' '.$file.' https://youtube7.download//mini.php?id='.$id);
      $output = shell_exec($dirPhantom.' '.$file.' '.$link);
      Log::info('GET PRICE : '.$output);
       return $output;
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

    public function postlink(Request $req){
      $source = 'zh-CN';
      $target = 'vi';
      $trans = new GoogleTranslate();
      $link = $req->link;
      // $link = substr($link, 1, strlen($link)-1);
      // $link = "https://detail.tmall.com/item.htm?spm=a230r.1.14.13.1d76d49b9TSv9u&id=538504605056&cm_id=140105335569ed55e27b&abbucket=6";
      require "simple_html_dom.php";

      $html = file_get_contents($link);
      if(strpos($link,"tmall")>1) $html = mb_convert_encoding($html, 'utf-8', "gb18030");
      $html = str_get_html($html);

      // // DATA
      $msg = "";
      $signal = 0;
      $images = array();
      $image = "";
      $title = "Không tìm thấy";
      $price = "Không tìm thấy";
      // $price2 = "";
      $total_product = "Không tìm thấy";

/////////////////////////    TMALL   ////////////////////////////////////////////////////////
      if(strpos($link,".tmall.")>1){
        $signal = 1; $msg = "tmall";

        $div_product = $html->find('div.tm-clear',0);
        if($div_product) $image = $div_product->find('img',0)->src;

        $div_detail = $html->find('div .tb-detail-hd',0);
        if($div_detail) $title = $div_detail->find('h1',0)->innertext;
        $title = $trans->translate($source, $target, $title);

        // $div_price = $html->find('span .tm-price',0);
        // $price = $div_price;

      }
////////////////////////    TAOBAO   /////////////////////////////////////////////////////

      if(strpos($link,"world.taobao.")>1){
        $signal = 1;  $msg = "taobao";

        $div_product = $html->find('div #galleryPic',0);
        if($div_product) $image = $div_product->find('img',0)->src;

        $div_detail = $html->find('div .title',0);
        if($div_detail) $title = $div_detail->find('h1',0)->innertext;
        $title = $trans->translate($source, $target, $title);

        $div_price = $html->find('div .price .promotionPrice',0);
        if($div_price) $price = $div_price->innertext;

      }
////////////////////////    1688   /////////////////////////////////////////////////////
      if(strpos($link,".1688.")>1){
        $signal = 1;  $msg = "1688";

        // $div_product = $html->find('div.tm-clear',0);
        // $image = $div_product->find('img',0)->src;

        // $div_detail = $html->find('div .tb-detail-hd',0);
        // $title = $div_detail->find('h1',0)->innertext;
        // $title = $trans->translate($source, $target, $title);

        // $div_price = $html->find('span .tm-price',0);
        // $price = $div_price;

      }
      $data = json_encode([
        'signal'=> $signal,
        'msg' => $msg,
        'image'=>$image,
        'title'=>$title,
        'price'=>$price,
        'total_product'=>$total_product
      ]);
////////////////////////    KHÔNG ĐÚNG TRANG LẤY SẢN PHẨM   ////////////////////////////////      
      
      print_r($data);
    }

    public function getLink(){
       return view('get-link');
    }
    public function getGetLink(){
    }

}
