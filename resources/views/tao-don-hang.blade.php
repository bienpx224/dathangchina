@extends('index')
@section('title','Nhập hàng China - Nhanh gọn lẹ')
@section('content')

<!-- <div id="google_translate_element"></div> -->
<?php
  // $url = 'https://world.taobao.com/item/540822395124.htm?spm=a312a.7700714.0.0.1a3f444cIQifB2#detail';
  $url = 'https://detail.tmall.com/item.htm?spm=a230r.1.14.24.5eee5ff60OiZAW&id=555271819135&ns=1&abbucket=6';
  $html = file_get_contents($url);
  echo $html;
  ?>

<script type="text/javascript">
    $(document).ready( ()=>{
      // document.cookie = ('googtrans','/zh-CN/vi');
      $("#google_translate_element").css('display','none');
      $("#:1.container").css('display','none');
      $("#J_SiteNav").css('display','none');
      $("#J_7607074463").css('display','none');
      $("#footer").css('display','none');

    })
    // function googleTranslateElementInit() {
    // new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    // }
  </script>

@endsection