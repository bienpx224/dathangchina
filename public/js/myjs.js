$(document).ready(function(){
  <!-- show more inf -->
  $(".btn-readmore").click(function(){
    $(".btn-read").hide(500);
    $(".info-hide").show(500);
  });
  $(".btn-hide").click(function(){
    $(".info-hide").hide(500);
    $(".btn-read").show(500);
  });
  <!-- pick style, theme -->
  $("#pink").click(function(){
    $("#body").css('background-color','#f28ad4');
    $(".tab-menu").css('background-color','#f76cd9');
    $(".tab-menu").css('color','red');
    $(".profile").css('background-color','#ee8cf2');      $(".profile").css('color','red');  $(".myName").css('color','red');
    $(".icon").css('background-color','#ffd1dc');
    $(".container").css('background-color','#f6def9');
    $(".tab-content").css('background-color','#ffddfc');
    $(".tab-pane").css('background-color','#f79ba4');     $(".tab-pane").css('color','red');  $(".myName").css('color','red');

  });
  $("#blue").click(function(){
    $("#body").css('background-color','#e5f1ff');
    $(".tab-menu").css('background-color','#8e3df7');
    $(".tab-menu").css('color','white');
    $(".profile").css('background-color','#eae5ff');      $(".profile").css('color','#232c3a'); $(".myName").css('color','#232c3a');
    $(".icon").css('background-color','#dad1fc');
    $(".container").css('background-color','#d6e1f9');
    $(".tab-content").css('background-color','#d4d0f2');
    $(".tab-pane").css('background-color','#a19bef');     $(".tab-pane").css('color','#232c3a');  $(".myName").css('color','#232c3a');

  });
  $("#dark").click(function(){
    $("#body").css('background-color','#414851');
    $(".tab-menu").css('background-color','#1c2533');
    $(".tab-menu").css('color','white');
    $(".profile").css('background-color','#4f6851');      $(".profile").css('color','white');   $(".myName").css('color','white');
    $(".icon").css('background-color','#5a6d3e');
    $(".container").css('background-color','#7c615b');
    $(".tab-content").css('background-color','#526d5f');
    $(".tab-pane").css('background-color','#424959');     $(".tab-pane").css('color','white');    $(".myName").css('color','white');

  });
});
