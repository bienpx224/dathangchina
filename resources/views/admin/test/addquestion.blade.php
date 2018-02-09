@extends('admin.layout.index')
@section('content')
  	<div id="main" style="margin:5%;">
  		<div class="container" style="margin-left:20%;width:80%;">
            <h1 class="page-header">
            Tạo bộ câu hỏi
            </h1>
  			<div>
          <div>
  				@if(count($errors)>0)
						   <div class="alert alert-danger">
						   	  @foreach($errors->all() as $er)
		                        {{$er}} <br>
						   	  @endforeach
						   </div>
						   @endif
				@if(Session::has('thongbao'))
				      <div class="alert alert-success">
						   	  {{Session::get('thongbao')}}
						   </div>
				@endif
      </div>
  				<form action="{!! route('admin.test.postquestion') !!}" method="post">
  				<input type="hidden" name="_token" value="{{csrf_token()}}">
          <css>
<style type="text/css">
  textarea{
    width: 70%;
  }
</style>
  				  <div class="form-group">
				    <label class="control-label">Bộ câu hỏi:</label>
				    <select name="test_id" class="form-control" >
				       @foreach($data as $me)
				           <option value="{{ $me->test_id }}">{{ $me->title}}</option>
				       @endforeach
				  	</select>
				  </div>

				  <div class="form-group">
				    <label class="control-label">Nội dung câu hỏi </label>
				    <textarea placeholder="write content of question" type="textarea" class="form-control" name="question"></textarea>
				  </div>
				  <div class="form-group">
				    <label class="control-label">Đáp án A </label>
				    <textarea type="text" class="form-control" name="answer_a"></textarea>
				  </div>
				  <div class="form-group">
				   <label class="control-label">Đáp án B </label>
				    <textarea type="text" class="form-control" name="answer_b"></textarea>
				  </div>
				  <div class="form-group">
				  	<label class="control-label">Đáp án C </label>
				    <textarea type="text" class="form-control" name="answer_c"></textarea>
				  </div>
				  <div class="form-group hidden">

				    <label class="control-label">Đáp án D</label>
				    <textarea type="text" class="form-control" name="answer_d"></textarea>
				  </div>
				  <div class="form-group">
				  	 <label class="control-label">Đáp án đúng : </label>
				    <select name="correct_answer" class="form-control" >
				     <option value="1">A</option>
				     <option value="2">B</option>
				     <option value="3">C</option>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label class="control-label">Thông tin thêm về đáp án</label>
				    <textarea type="text" class="form-control" name="content"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Add Question</button>
				  <button type="reset" class="btn btn-default" style="background-color:#deffad;color:black;">Reset</button>
				</form>
  			</div>
  		</div>
  	</div>

  </body>
</html>

@endsection
