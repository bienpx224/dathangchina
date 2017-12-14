<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/formlogin.css') }}"  rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/jumbotron-narrow.css') }}" rel="stylesheet" type="text/css">

  </head>
  <body>

      <p id="question" style="cursor: pointer;">1+1=?</p>
      <div id="answer" hidden>
          <p>1</p>
          <p>2</p>
          <p>3</p>
          <p>4</p>
      </div>
      <div id="answer1">
          <p>1</p>
          <p>2</p>
          <p>3</p>
          <p>4</p>
      </div>
  </div>

  </body>
</html>

<script src="{{url('public/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/js/jquery-3.2.0.min.js')}}">
</script>
<script type="text/javascript">
     $(document).ready(function () {
        $("#question").click(function(){
            var question=$("#question");
            var answer=question.parent().children("#answer");
            answer.show(500);
        });
    });
</script>
