@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                         <h1 align="center">
                            <span class="label label-info">Test :  {{$data2}}</span>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px;margin-top: 20px ">

                       <?php $dem=0; ?>
                       @foreach($data as $dt)
                       <?php $dem=$dem+1; ?>
                       <ul class="list-group" >
                       <li class="list-group-item qs{{$dem}}" style="cursor: pointer;" >Question {{$dem}}: {{$dt->question}}
                         <span class="pull-right left{{$dem}}" >
                         <i class="glyphicon glyphicon-chevron-left" ></i>
                         </span>
                         <span class="down{{$dem}} pull-right hidden" >
                         <i class="glyphicon glyphicon-chevron-down" ></i>
                         </span>
                       </li>
                       </ul>
                       <ul class="x{{$dem}} list-group " style="margin-left:10;margin-right: 10" hidden>
                       <li class="list-group-item" <?php if ($dt->correct_answer==1) echo" style='color:blue'" ?> >Đáp án A   :  {{$dt->answer_a}}</li>
                       <li class="list-group-item" <?php if ($dt->correct_answer==2) echo" style='color:blue'" ?> >Đáp án B   :  {{$dt->answer_b}}</li>
                       <?php if($dt->answer_c!=NULL) {
                        if ($dt->correct_answer==3){
                        echo("<li class='list-group-item'  style='color:blue' >Đáp án C   :   {$dt->answer_c}</li>")
                        ;}else echo("<li class='list-group-item' >Đáp án C   :   {$dt->answer_c}</li>");} ;
                       ?>
                       </ul>
                       @endforeach

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>



@endsection


 <script src="{{url('public/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/js/jquery-3.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/mycript.js')}}"></script>

<script type='text/javascript'>

 $(document).ready(function () {
             <?php for ($i=1; $i <= $dem; $i++) {
             echo "


             $('.qs{$i}').click(function(){
          if( $('.down{$i}').hasClass('hidden')){
            $('.x{$i}').show(500);
          $('.down{$i}').removeClass('hidden').addClass('show');
          $('.left{$i}').addClass('hidden');
         }
         else if($('.down{$i}').hasClass('show')){
          $('.x{$i}').hide(500);
          $('.down{$i}').addClass('hidden');
          $('.left{$i}').removeClass('hidden');

        }
    });
 ";
            } ?>
 });
</script>
