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

<script type="text/javascript" src="{{asset('public/js/getLink.js') }}"></script>
<script type="text/javascript">
//////////////////////////////////  SCRIPTs  //////////////////////////////////////////////
//////////////////////////////////  SCRIPTs  //////////////////////////////////////////////
//////////////////////////////////  SCRIPTs  //////////////////////////////////////////////
  $(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    getRate('yen');

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

    $('#text-link').val(link);

    $('#redirectLink').click( ()=>{
      let textLink = $('#text-link').val();
      if(ValidURL(textLink)){
        getInfoProduct(textLink);
      }else{
        swal({
          title: "Link không hợp lệ",
          text: "Vui lòng kiểm tra lại link sản phẩm",
          icon: "warning",
        });
      }
    })

    $('#btnAddProduct').click( function(){
        addProduct();
    });

    $('#quantity').on('change keyup', function(e){
        if($('#quantity').val()<1){
            var shortCutFunction = 'warning';
            var title = 'Số lượng không hợp lê !! ';
            var $toast = toastr[shortCutFunction]("Mua ít nhất 1 cái đi bạn, ủng hộ chúng mình nhé ;)", title);
            $('#quantity').val(1);
        }else{
            calculatePrice();
        }
    });


//////////////////////////////////  FUNCTION  //////////////////////////////////////////////
//////////////////////////////////  FUNCTION  //////////////////////////////////////////////
//////////////////////////////////  FUNCTION  //////////////////////////////////////////////
    function addProduct(){
        var arrErr = []

        var link = $('#link2').val();
        var image = $('#image').attr('src');
        var title = $('#title').text();
        var price = $('#price2').val();
        var quantity = $('#quantity').val();  quantity = parseInt(quantity);
        var cost = $('#total_cost2').val();
        var color = $('#color').val();
        var note = $('#note').val();
        var size = $('#size').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var data = {link, image, title, price, quantity, cost, color, note, size , _token: CSRF_TOKEN};
        console.log(data);
        var args = {
                    type : "post",
                    url: '{!! url("addProduct") !!}',
                    dataType : 'text',
                    data : data,
                    beforeSend: function() {
                        $('#body').LoadingOverlay("show", {zIndex: 10000});
                    },
                    success : function(data) {
                        data = JSON.parse(data);

                        if(data.signal == "1"){

                        swal({
                          title: "Đã thêm hàng!",
                          text: "Vui lòng kiểm tra đơn hàng!",
                          icon: "success",
                        });
                        }else{
                            var shortCutFunction = 'error';
                            var title = 'Thất bại';
                            var $toast = toastr[shortCutFunction]("Lỗi hệ thống !!", title);
                        }

                        $('#body').LoadingOverlay("hide");

                    },
                    error : function (data) {
                        $('#body').LoadingOverlay("hide");
                        var shortCutFunction = 'error';
                            var title = 'Có lỗi xảy ra, không gửi được request !!';
                            var $toast = toastr[shortCutFunction]("error", title);
                    },
                    complete: function() {
                        $('#body').LoadingOverlay("hide");
                    }
                };
        if(quantity >= 0){
        }else{
            arrErr.push("Số lượng sản phẩm không phù hợp !!");
        }
        if(color.length > 100){ arrErr.push("Màu sắc điền quá nhiều kí tự !!"); }
        if(size.length > 100){ arrErr.push("Kích thước điền quá nhiều kí tự !!"); }
        if(note.length > 250){ arrErr.push("Ghi chú điền quá nhiều kí tự !!"); }
        if(arrErr.length>0){
            var shortCutFunction = 'error';
            var msg = "<hr>";
            var title = 'Thêm sản phẩm bị lỗi';
            for (var i = 0; i <= arrErr.length-1; i++) {
                msg += "  "+i+": "+arrErr[i]+"  .<hr> ";
            }
            var $toast = toastr[shortCutFunction](msg, title);
        }else if(image=="" || title=="" || link==""  || quantity==""){
            swal({
              title: "Không có thông tin sản phẩm",
              text: "Vui lòng kiểm tra lại sản phẩm",
              icon: "error",
            });
        }else {

            @if(Auth::check())
                if(price == "" || cost == ""){
                    swal({
                      title: "Tiếp tục đặt hàng",
                      text: "Có vẻ chưa cập nhật được giá sản phẩm, Chúng tôi sẽ kiểm tra đơn hàng rồi báo lại với bạn để chốt đơn hàng.!",
                      icon: "info",
                      buttons: true,
                      dangerMode: false,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        $.ajax(args);
                      } else {

                      }
                    });
                }else{
                        $.ajax(args);
                }
            @else
                 $('#LogInModal').modal('show');
            @endif
        }

    }

    function calculatePrice(){
        var vnd2 = $('#vnd2').val();
        var quantity = $('#quantity').val();
        var total_cost = vnd2*quantity;
        $('#total_cost2').val(total_cost);
        total_cost = formatVND(total_cost);
        $('#total_cost').val(total_cost+ "  VND");

    }

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
        $.ajax({
            type: "post",
            url: '{!! url("postlink") !!}',
            dataType: 'text',
            data : {
              link : ""+link,
              _token: CSRF_TOKEN
            },
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
                data = JSON.parse(data);

                if(data.signal == "1"){
                    $('#title').text(data.title);
                    if(data.image !== ""){
                        $('#image').attr('src',''+data.image);
                    }
                    $('#total_product').val(data.total_product);

                    $('#price').html(data.price);
                    var price2 = filterGetNumber(data.price);
                    $('#price2').val(price2);
                    var rate = window.yen_rate;
                    rate = parseFloat(rate);  price2 = parseFloat(price2);
                    var priceVnd = price2*rate;
                    $('#vnd2').val(priceVnd);           $('#total_cost2').val(priceVnd);
                    priceVnd = formatVND(priceVnd);
                    $('#vnd').val(priceVnd + "  VND");  $('#total_cost').val(priceVnd + "  VND");

                    $('#link2').val(link);
                    var shortCutFunction = 'success';
                    var title = 'Thành công';
                    var $toast = toastr[shortCutFunction]("success", title);


                }else{
                    swal({
                      title: "Không tìm thấy thông tin sản phẩm",
                      text: "Vui lòng kiểm tra lại link sản phẩm",
                      icon: "warning",
                    });
                }

                $('#body').LoadingOverlay("hide");

            },
            error : function (data) {
                $('#body').LoadingOverlay("hide");
                swal({
                  title: "Có lỗi xảy ra",
                  text: "Vui lòng kiểm tra lại link sản phẩm",
                  icon: "error",
                });
            },
            complete: function() {
                $('#body').LoadingOverlay("hide");
            }
        });
    }

    function getRate(){
        var rate_num = ""
        $.ajax({
            type: "post",
            url: '{!! url("getAllRate") !!}',
            dataType: 'text',
            data : {
              _token: CSRF_TOKEN
            },
            xhrFields: {
                withCredentials: false
            },
            beforeSend: function() {
            },
            success : function(data) {
                data = JSON.parse(data);
                data = data.configs;
                for (var i = 0; i <= data.length-1; i++) {
                    if(data[i].name == "yen"){
                        $('#yen-rate').val(data[i].rate + " VND");
                        window.yen_rate = data[i].rate;
                        continue;
                    }
                    if(data[i].name == "dollar"){
                        window.dola_rate = data[i].rate;
                         continue;
                    }
                }
                return rate_num;
            },
            error : function (data) {
                console.log("err getRate ");
            },
            complete: function() {
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

            },
            error : function (data) {
                console.log("err getprice ");
            },
            complete: function() {
            }
        });
    }



  });
</script>
@endsection
