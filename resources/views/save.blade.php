@extends('layout')
@section('page','Nhập link')
@section('title','Nhập link - Nhập hàng china')
@section('content-page')
<div class="blog-list">
  <div class="col-md-4">
     <img src="{{$image}}" class="c_preview">
  </div>
  <div class="col-md-8">
    <div class="content">
      <h3 class="product-name">{{$title}}</h3>
      <hr>

      <div class="price-table">
        <div class="price-table-row">
            <span class="row-label">Số lượng</span>
            <span class="price-table-column">≥1</span>
            <span class="row-label">Hàng còn trong kho</span>
            <span class="price-table-column ">{{$total_product}}</span>
        </div>
      </div>

      <div class="price-table">
        <div class="price-table-row">
            <span class="row-label">Giá</span>
            <span class="price-table-column ">{{ $price }}</span>
        </div>
      </div>

      <div class="price-table">
        <div class="price-table-row">
            <span class="row-label">Màu :</span>
            <span class="price-table-column">
              <input class="input-table-product" type="text" name="" />
            </span>
            <span class="row-label">Số lượng</span>
            <span class="price-table-column">
              <input class="input-table-product" type="number" min="0" name="" value="1" />
            </span>


        </div>
      </div>

      <div class="price-table">
        <div class="price-table-row">
            <span class="row-label">Ghi chú :</span>
            <span style="width: 80%;display: inline-block;" class="price-table-column">
              <input style="width: 100%; max-width:100%;font-weight: 100; font-size: 14px;" class="input-table-product" type="text" name="" placeholder="Yêu cầu, ghi chú cho sản phẩm..." />
            </span>
        </div>
      </div>

      <div class="price-table"  style="background-color:#f3d2b0;">
        <div class="price-table-row">
            <span class="row-label">Tổng số :</span>
            <span class="price-table-column ">{{ $price }}</span>
            <span class="row-label">Tổng giá :</span>
            <span class="price-table-column ">{{ $price }}</span>
        </div>
      </div>

      <div class="col-md-4" style="float: left; padding:10px 40%;">
        <button class="btn btn-success" type="button" name="" style="padding-right: 30px;">
          <span class="glyphicon glyphicon-shopping-cart pull-left" style="padding-right: 10px;"></span>Thêm vào giỏ hàng
        </button>
      </div>

    </div>
  </div>
  <p style="float: left; margin:20px 10px;">
    <span class="col-md-12" style="color: #968989;"><b>(*)   </b>Mac định chọn màu nhu trong ảnh, nếu có yêu cầu cụ thể màu khác, vui lòng nhập vào ô Màu bên trên</span>
  </p>
</div>
@endsection
<script type="text/javascript">
</script>





// var list = $('#list-product');
    // for(var i = 0; i<3; i++){
    //  var html = '<div class="col-md-12 col-xs-6">'
   //     html+= '<div class="col-md-4">'
    //     html+= ' <img src="image" class="c_preview">'
    //    html+= '</div>'
    //    html+= '<div class="col-md-8">'
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
    //    html+= '</div>'
    //    html+= '<p style="float: left; margin:20px 10px;">'
    //     html+= '<span class="col-md-12" style="color: #968989;"><b>(*)   </b>Mặc định chọn màu như trong ảnh, nếu có yêu cầu cụ thể màu khác, vui lòng nhập vào ô Màu bên trên</span>'
    //    html+= '</p>'
    //  html+= '</div>'

    //  list.append(html);
    // }