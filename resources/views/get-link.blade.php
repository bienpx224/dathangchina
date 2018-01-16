@extends('layout')
@section('page','Nhập link')
@section('title','Nhập link - Nhập hàng china')
@section('content-page')
	<div class="blog-list" id="list-product">

		@include('product')


	</div>


<script type="text/javascript">
	$(document).ready(function(){
		var url_string = window.location.href;
		var url = new URL(url_string);
		var c = url.searchParams.get("url");
		console.log(c);
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
                        "timeOut": "1500",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
        
		// var list = $('#list-product');
		// for(var i = 0; i<3; i++){
		// 	var html = '<div class="col-md-12 col-xs-6">'
	 //  		html+= '<div class="col-md-4">'
		//     html+= ' <img src="image" class="c_preview">'
		//   	html+= '</div>'
		//   	html+= '<div class="col-md-8">'
		//     html+= '<div class="content">'
		//     html+= '  <h3 class="product-name">title</h3>'
		//     html+= '  <hr>'
		//     html+= '  <div class="price-table">'
		//     html+= '    <div class="price-table-row">'
		//     html+= '        <span class="row-label">Số lượng</span>'
		//     html+= '        <span class="price-table-column">≥1</span>'
		//     html+= '        <span class="row-label">Hàng còn trong kho</span>'
		//     html+= '        <span class="price-table-column ">total_product</span>'
		//     html+= '    </div>'
		//     html+= '  </div>'
		//     html+= '  <div class="price-table">'
		//     html+= '    <div class="price-table-row">'
		//     html+= '        <span class="row-label">Giá</span>'
		//     html+= '        <span class="price-table-column ">price</span>'
		//     html+= '    </div>'
		//     html+= '  </div>'
		//     html+= '  <div class="price-table">'
		//     html+= '    <div class="price-table-row">'
		//     html+= '        <span class="row-label">Màu :</span>'
		//     html+= '        <span class="price-table-column">'
		//     html+= '          <input class="input-table-product" type="text" name="" />'
		//     html+= '        </span>'
		//     html+= '        <span class="row-label">Số lượng</span>'
		//     html+= '        <span class="price-table-column">'
		//     html+= '          <input class="input-table-product" type="number" min="0" name="" value="1" />'
		//     html+= '        </span>'
		//     html+= '    </div>'
		//     html+= '  </div>'
		//     html+= '  <div class="price-table">'
		//     html+= '    <div class="price-table-row">'
		//     html+= '        <span class="row-label">Ghi chú :</span>'
		//     html+= '        <span style="width: 80%;display: inline-block;" class="price-table-column">'
		//     html+= '          <input style="width: 100%; max-width:100%;font-weight: 100; font-size: 14px;" class="input-table-product" type="text" name="" placeholder="Yêu cầu, ghi chú cho sản phẩm..." />'
		//     html+= '        </span>'
		//     html+= '    </div>'
		//     html+= '  </div>'
		//     html+= '  <div class="price-table"  style="background-color:#f3d2b0;">'
		//     html+= '    <div class="price-table-row">'
		//     html+= '        <span class="row-label">Tổng số :</span>'
		//     html+= '        <span class="price-table-column ">price</span>'
		//     html+= '        <span class="row-label">Tổng giá :</span>'
		//     html+= '        <span class="price-table-column ">price</span>'
		//     html+= '    </div>'
		//     html+= '  </div>'
		//     html+= '  <div class="col-md-4" style="float: left; padding:10px 40%;">'
		//     html+= '    <button class="btn btn-success" type="button" name="" style="padding-right: 30px;">'
		//     html+= '      <span class="glyphicon glyphicon-shopping-cart pull-left" style="padding-right: 10px;"></span>Thêm vào giỏ hàng'
		//     html+= '    </button>'
		//     html+= '  </div>'
		//     html+= '</div>'
		//   	html+= '</div>'
		//   	html+= '<p style="float: left; margin:20px 10px;">'
		//     html+= '<span class="col-md-12" style="color: #968989;"><b>(*)   </b>Mặc định chọn màu như trong ảnh, nếu có yêu cầu cụ thể màu khác, vui lòng nhập vào ô Màu bên trên</span>'
		//   	html+= '</p>'
		// 	html+= '</div>'

		// 	list.append(html);
		// }
		
		// $.ajax({
  //           type: "POST",
  //           url: "{!! url('postlink') !!}",
  //           data : {
  //               'link': 'facebook.com.vn',
  //                _token: CSRF_TOKEN
  //           },
  //           beforeSend: function() {
  //               $('#body').LoadingOverlay("show", {zIndex: 10000});
  //               var shortCutFunction = 'info';
		//         var title = 'Đang lấy dữ liệu, đợi tý nhé !! ';
		        
		//         var $toast = toastr[shortCutFunction]("hihi", title);
  //           },
  //           success : function(data) {
  //               $('#body').LoadingOverlay("hide");
  //               var shortCutFunction = 'success';
		//         var title = 'Thành công';
		//         var $toast = toastr[shortCutFunction]("hihi", title);
  //           },
  //           error : function (data) {
  //               $('#body').LoadingOverlay("hide");
  //               var shortCutFunction = 'error';
		//         var title = 'Có lỗi xảy ra !!';
		//         var $toast = toastr[shortCutFunction]("hihi", title);
  //           },
  //           complete: function() {
  //               $('#body').LoadingOverlay("hide");
 
  //           }

  //       });

		$('#btnAddProduct').click( function(){
			var shortCutFunction = 'error';
	        var title = 'Có lỗi xảy ra !!';
	        var $toast = toastr[shortCutFunction]("hihi", title);
		})
		
	});
</script>
@endsection
