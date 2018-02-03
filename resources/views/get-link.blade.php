@extends('layout')
@section('page','Nhập link')
@section('title','Nhập link - Nhập hàng china')
@section('content-page')
  <div class="blog-list" id="list-product">
    
    <div class="col-lg-12" style="margin-bottom: 40px;">
      <div class="col-md-9">
        <input style="font-size: 12px;" type="text" name="" id="text-link" class="form-control">
      </div>
      <div class="col-md-3 col-xs-8">
        <button class="form-control btn btn-info" id="redirectLink" >
          <span class="glyphicon glyphicon-info-sign pull-left" style="padding-right: 2px;"></span>Lấy thông tin
        </button>
      </div>
    </div>
    @include('product')


  </div>

    <div id="other">

    </div>


<script type="text/javascript">

  $(document).ready(function(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-bottom-left",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "500",
        "timeOut": "3000",
        "extendedTimeOut": "500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };


    var url_string = window.location.href;
    var index = url_string.indexOf('url=')+4;

    var link = url_string.slice(index, url_string.length);

    index = link.indexOf("^");
    if(index>=0){
        link = link.replace("^","");
    }
    index = link.indexOf("^");
    if(index>=0){
        link = link.replace("^","");
    }

    getInfoProduct(link);

    // getPrice(link);

    $('#text-link').val(link);

    $('#redirectLink').click( ()=>{
      let textLink = $('#text-link').val();
      if(ValidURL(textLink)){
        getInfoProduct(textLink);
      }else{
        var shortCutFunction = 'error';
        var title = 'Link không hợp lệ !! ';
        var $toast = toastr[shortCutFunction]("Vui lòng nhập lại Link", title);
      }
    })


    $('#btnAddProduct').click( function(){

        addTypeMoney();

    });

    function ValidURL(str) {
        var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
        if(!regex .test(str)) {
          return false;
        } else {
          return true;
        }
    }

    function getInfoProduct(link){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log('link: ',link);
        console.log('CSRF: ',CSRF_TOKEN);
        $.ajax({
            type: "post",
            url: '{!! url("postlink") !!}',
            dataType: 'text',
            data : {
              link : ""+link,
              _token: CSRF_TOKEN
            },
            // type: "POST",
            // url: "{!! url('postlink') !!}",
            // data: {link: ""+link, _token: CSRF_TOKEN},
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
                $('#body').LoadingOverlay("show", {zIndex: 10000});
                var shortCutFunction = 'info';
                    var title = 'Đang lấy dữ liệu, đợi tý nhé !! ';
                    var $toast = toastr[shortCutFunction]("waiting", title);
            },
            success : function(data) {
                data = JSON.parse(data); console.log("postlink: ",data);

                if(data.signal == "1"){
                    $('#title').text(data.title);
                    if(data.image !== ""){
                        $('#image').attr('src',''+data.image);
                    }
                    $('#total_product').text(data.total_product);
                    $('#price').html(data.price);

                    var shortCutFunction = 'success';
                    var title = 'Thành công';
                    var $toast = toastr[shortCutFunction]("success", title);
                }else{
                    var shortCutFunction = 'warning';
                    var title = 'Thất bại';
                    var $toast = toastr[shortCutFunction]("Có vẻ Link bạn nhập không đúng hoặc hệ thống tạm thời không lấy được kết quả", title);
                }

                $('#body').LoadingOverlay("hide");

            },
            error : function (data) {
                $('#body').LoadingOverlay("hide");
                var shortCutFunction = 'error';
                    var title = 'Có lỗi xảy ra !!';
                    var $toast = toastr[shortCutFunction]("error", title);
            },
            complete: function() {
                $('#body').LoadingOverlay("hide");
            }
        });
    }

    function getPrice(link){
        $.ajax({
            type: "post",
            url: '{!! url("getprice") !!}',
            dataType: 'text',
            data : {
              link : link,
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("getPrice: ", data);
            },
            error : function (data) {
                console.log("err getprice ");
            },
            complete: function() {
            }
        });
    }

    function addTypeMoney(){
        var type = 'yen';
        $.ajax({
            type: "post",
            url: '{!! url("addTypeMoney") !!}',
            dataType: 'text',
            data : {
              type : 'yen',
              rate : '3.0',
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("addTypeMoney: ", data);
            },
            error : function (data) {
                console.log("err addTypeMoney ");
            },
            complete: function() {
            }
        });
    }

    function getRate(type){
        $.ajax({
            type: "post",
            url: '{!! url("getRate") !!}',
            dataType: 'text',
            data : {
              type : type,
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("getRate: ", data);
            },
            error : function (data) {
                console.log("err getRate ");
            },
            complete: function() {
            }
        });
    }

    function editRate(){
        $.ajax({
            type: "post",
            url: '{!! url("getRate") !!}',
            dataType: 'text',
            data : {
              type : 'yen',
              rate : '3.0',
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                console.log("getRate: ", data);
            },
            error : function (data) {
                console.log("err getRate ");
            },
            complete: function() {
            }
        });
    }

  });
</script>
@endsection
