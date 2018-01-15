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
    public function postLink(Request $req){
      $link = $req->link;
      Log::info('Link: '.$link);
      $link = "https://detail.tmall.com/item.htm?spm=a230r.1.14.13.1d76d49b9TSv9u&id=538504605056&cm_id=140105335569ed55e27b&abbucket=6";

      // require "simple_html_dom.php";
      // $html = file_get_contents($link);
      // $html = mb_convert_encoding($html, 'utf-8', "gb18030");
      // $html = str_get_html($html);

      // $tins = $html->find('div.tb-gallery',0);
      return redirect()->route('get-link');
      // return $tins;
    }

    public function getLink(){

      $source = 'zh-CN';
      $target = 'vi';
      $trans = new GoogleTranslate();

      $link = "https://detail.tmall.com/item.htm?spm=a230r.1.14.13.1d76d49b9TSv9u&id=538504605056&cm_id=140105335569ed55e27b&abbucket=6";
      require "simple_html_dom.php";

      $html = file_get_contents($link);
      $html = mb_convert_encoding($html, 'utf-8', "gb18030");
      $html = str_get_html($html);

      // // DATA
      $images = array();
      $image = "";
      $title = "";
      $price = "15";
      $total_product = "";
      //////////////////    TMALL   ///////////////////
      if(strpos($link,"tmall")){
        // lay 1 anh chinh
        $div_product = $html->find('div.tm-clear',0);
        $image = $div_product->find('img',0)->src;

        $div_detail = $html->find('div .tb-detail-hd',0);
        $title = $div_detail->find('h1',0)->innertext;
        $title = $trans->translate($source, $target, $title);

        $div_price = $html->find('span .tm-price',0);
        // $price = $div_price;

      }

      return view('get-link', ['image'=>$image, 'images'=>$images, 'title'=>$title, 'price'=>$price,
       'total_product'=>$total_product]);
      // return view('get-link');
      // Log::info($images);
      // $data = [
      //   "images"=>$images
      // ];
      // $images = json_encode($images);
      $data = array(
        "images" => $images
      );
      // var_dump($data); exit();
      return view('get-link', ['data'=>$data]);
    }
    public function getGetLink(){
    }

}
