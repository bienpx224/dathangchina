@extends('admin.layout.index')
@section('content')
    <div id="main" style="margin:5%;">
      <div class="container" style="margin-left:20%;width:80%;">
        <div>
            <h1>
            Tạo bộ trắc nghiệm
            </h1>
        </div>
        <div class="col-md-6">

                @if(count($errors)>0)
               <div class="alert alert-danger" style="width:50%">
                  @foreach($errors->all() as $er)
                            {{$er}} <br>
                  @endforeach
               </div>
               @endif

          <form action="{!! route('admin.test.postAdd') !!}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label class="control-label">Chọn chủ đề: </label>
            <select name="topic_id" class="form-control" >
             <option value="1" selected="selected">Lịch sử</option>
             <option value="2">Địa lí</option>
             <option value="3">Văn học</option>
             <option value="6">Thể thao</option>
             <option value="5">Khoa học -Xã hội</option>
             <option value="4">Toán học</option>
            </select>
          </div>
          <div class="form-group">
            <label  class="control-label">Đề mục bộ trắc nghiệm:</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label class="control-label">Url ảnh</label>
           <input type="file"  name="image_url">
          </div>

          <button type="submit" class="btn btn-default">Next</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </form>
        </div>
      </div>
    </div>
@endsection
