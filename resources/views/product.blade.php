
	<div class="col-md-12 col-xs-6">
	  <div class="col-md-4">
	     <img id="image" src="https://cdn.browshot.com/static/images/not-found.png" class="c_preview">
	     <div style="margin: 30px 10px; position: center;">
		     <button class="btn btn-success" type="button" name="" id="btnAddProduct" style="width: 100%;height: 50px; font-size: 18px;">
	        <span class="glyphicon glyphicon-shopping-cart pull-left" style="padding:0px 10px;"></span>Thêm vào giỏ hàng
	      </button>
	     </div>
	  </div>
	  <div class="col-md-8">
	    <div class="content">
	    	<input id="link2" hidden >
	      <h3 id="title" class="product-name"></h3>
	      <hr>

	      <div class="price-table">
	        <div class="price-table-row">
	            <span class="row-label">Hàng còn</span>
	            <span class="price-table-column">≥1</span>
	            <span class="row-label">Số lượng</span>
	            <span class="price-table-column">
	              <input id="quantity" class="input-table-product" type="number" min="1" name="" value="1" />
	            </span>
	        </div>
	      </div>

	      <div class="price-table">
	        <div class="price-table-row">
	            <span class="row-label">Giá : </span>
	            <span id="price" class="price-table-column"></span>
	            <input id="price2" hidden >
	        </div>
	      </div>

	      <div class="price-table">
	        <div class="price-table-row">
	        	<div class="col-lg-12 col-md-12 col-xs-12">
	        		<div class="col-lg-6 col-md-6 col-xs-12">
			            <span class="row-label">Tỷ giá Yên/VNĐ : </span>
			            <input id="yen-rate" readonly class="input-getL price-table-column form form-control " >
	        		</div>
	        		<div class="col-lg-6 col-md-6 col-xs-12">
	        			<span class="row-label">Giá VND :</span>
			            <input id="vnd" class="price-table-column form form-control input-getL" readonly>
			            <input id="vnd2" hidden >
	        		</div>
	        	</div>
	        </div>
	      </div>

	      <div class="price-table">
	        <div class="price-table-row">
	        	<div class="col-lg-12 col-md-12 col-xs-12">
		        	<div class="col-lg-6 col-md-6 col-xs-12">
			            <span class="row-label">Màu :</span>
			            <input id="color" placeholder="nếu có" class="input-getL price-table-column form form-control " />
			        </div>
			        <div class="col-lg-6 col-md-6 col-xs-12">
			            <span class="row-label">Kích thước :</span>
		            	<input id="size" class="input-getL price-table-column form form-control" placeholder="nếu có" />
			        </div>
			    </div>
	        </div>
	      </div>

	      <div class="price-table">
	        <div class="price-table-row">
	        	<div class="col-lg-12 col-md-12 col-xs-12">
	            <span class="row-label">Ghi chú :</span>
	            <input id="note" class="input-getL price-table-column form form-control" placeholder="Yêu cầu, ghi chú cho sản phẩm..." />
	          </div>
	        </div>
	      </div>

	      <div class="price-table"  style="background-color:#f3d2b0;">
	        <div class="price-table-row">
	            <span class="row-label">Tổng giá :</span>
	            <input id="total_cost" class="price-table-column form form-control" readonly  >
	            <input id="total_cost2" hidden>
	        </div>
	      </div>


	    </div>
	  </div>
	  <p style="float: left; margin:20px 10px;">
	    <span class="col-md-12" style="color: #968989;"><b> Mặc định chọn màu như trong ảnh, nếu có yêu cầu cụ thể màu khác, vui lòng nhập vào ô Màu bên trên<br>Nếu hệ thống lấy được thông tin sản phẩm nhưng chưa lấy được giá sản phẩm, chúng tôi sẽ liên lạc với bạn để báo giá sớm nhất.</b></span>
	  </p>
	</div>

