@extends('admin.layout.index')
@section('content')
    <div id="main" style="margin:5%;">
      <div class="container" style="margin-left:20%;width:80%;">
        <div>
            <h1>
            <span class="fa fa-btc" style="padding-right: 30px;"></span>Danh sách Tỷ giá tiền tệ
            </h1>
        </div>
        <div class="container col-lg-12 col-xs-12" style="margin: 50px 20px;">
        	<table class="table table-hover">
        		<thead>
				    <tr>
				    	<th>Symbol</th>
				        <th>Name Money</th>
				        <th>Rate</th>
				        <th>Created At</th>
				        <th>Edit</th>
				    </tr>
			    </thead>
			    <tbody id="rate-body">    
				    <tr class="warning">
				    	<td><span class="fa fa-money"></span></td>
				        <td><input id="name" type="text" class="form-control" placeholder="Tên tiền" /></td>
				        <td><input id="rate" type="number" class="form-control" placeholder="Tỷ giá quy đổi VND" /></td>
				        <td>&nbsp;</td>
				        <td><button class="btn btn-info" id="addRate" >
          						<span class="fa fa-plus" style="padding-right: 2px;"></span>Tạo mới
        					</button>
        				</td>
				    </tr> 

				    @if($configs)
				    	@foreach($configs as $config)
				    		<tr class="success">
				    		<form action="{!! route('editRate') !!}" method="post" enctype="multipart/form-data">
				    			<input type="hidden" name="_token" value="{{csrf_token()}}">
					    		<td><input  hidden value="{{$config->id}}"" name="id">
					    			@if($config->name == "yen")<span class="fa fa-yen"></span>@endif
					    			@if($config->name == "dollar")<span class="fa fa-dollar"></span>@endif
					    		</td>
						        <td><input type="text" required name="name" value="{{$config->name}}" disabled class="form-control" placeholder="Tên tiền" /></td>
						        <td><input type="text" required name="rate" value="{{$config->rate}}" class="form-control" placeholder="Tỷ giá quy đổi VND" /></td>
						        <td>{{$config->created_at}}</td>
						        <td><button class="btn btn-success" type="submit" id="editRate" >
		          						<span class="fa fa-edit" style="padding-right: 2px;"></span>Cập nhật
		        					</button>

		        			</form>
		        					@if($config->name != "yen" && $config->name != "dollar")
		        					<form style="display: inline;" action="{!! route('deleteRate') !!}" method="post" enctype="multipart/form-data">
					    				<input type="hidden" name="_token" value="{{csrf_token()}}">
					    				<input type="hidden" name="id" value="{{$config->id}}">
			        					<button class="btn btn-warning" type="submit" id="deleteRate" >
			          						<span class="fa fa-warning" style="padding-right: 2px;"></span>Xóa
			        					</button>
			        				</form>
		        					@endif
		        				</td>
						    </tr>
				    	@endforeach
				    @endif

			    </tbody>
			</table>

        </div>
      </div>
    </div>

    
    <script type="text/javascript">
    	////////////////////////////////////////////// SCRIPT //////////////////////////////
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

    		getAllRate();

    		$('#addRate').click(function(){
    			var name = $('#name').val();	var rate = $('#rate').val();
    			if(name.length>100){
    				var $toast = toastr['warning']("Tên loại tiền quá dài !!", "Lỗi tạo mới");
    			}else
    			if(name.length == 0 || rate == null || rate <=0){
    				var $toast = toastr['warning']("Vui lòng nhập đủ thông tin !!", "Lỗi tạo mới");
    			}else{
    				$.ajax({
		            type: "post",
		            url: '{!! url("admin/config/addRate") !!}',
		            dataType: 'text',
		            data : {
		              name,
		              rate,
		              type : "money",
		              _token: CSRF_TOKEN
		            },
		            xhrFields: {
		                withCredentials: false
		            },
		            beforeSend: function() {
		            },
		            success : function(data) { 
		            	 data = JSON.parse(data);
		                if(data.result === true){
		                	location.reload();
		                }else{
		                	var $toast = toastr['error']("Không thể tạo được !!", "Lỗi tạo mới");
		                }
		            },
		            error : function (data) {
		                var $toast = toastr['error']("Không thể tạo được !!", "Lỗi hệ thống");
		            },
		            complete: function() {
		            }
		        });
    			}
    		});

		    function getAllRate(){
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
		                console.log(data);
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
		                
		            },
		            error : function (data) {
		                console.log("err getRate ");
		            },
		            complete: function() {
		            }
		        }); 
		    }
    	})

    </script>
@endsection