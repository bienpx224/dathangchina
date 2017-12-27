@extends('layout')
@section('page','Nhập link')
@section('title','Nhập link - Nhập hàng china')
@section('content-page')
<div class="blog-list">
  hello
  <?php echo json_encode($data); ?>
  @if(($data->images))
    ton tai
    @foreach ($data->images as $img)
      {{ $img }}
    @endforeach
  @endif
</div>
@endsection
<script type="text/javascript">
  // console.log("{{$data}}");
</script>