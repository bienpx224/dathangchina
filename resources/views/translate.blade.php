<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Translator</title>
		<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php
	include(app_path().'/includes/simple_html_dom.php');
	use \Statickidz\GoogleTranslate;

	$source = 'vi';
	// $target = 'zh-CN';
	$target = 'en';
	$text = 'Chào bạn, tôi yêu bạn. Đây là trang gì đó';

	$trans = new GoogleTranslate();
	$result = $trans->translate($source, $target, $text);

	echo "<br>".$result."<br>";

	// $url = 'https://world.taobao.com/item/540822395124.htm?spm=a312a.7700714.0.0.1a3f444cIQifB2#detail';
	$url = 'http://www.nhaphang247.com/tao-don-hang-trung-quoc?url=https%3A%2F%2Fdetail.tmall.com%2Fitem.htm%3Fspm%3Da230r.1.14.24.5eee5ff60OiZAW%26id%3D555271819135%26ns%3D1%26abbucket%3D6&extension=1';
	// $title = '';
	// $dom = new DOMDocument();
	// if (@$dom->loadHTMLFile($url))
	// {
	//   $elements = $dom->getElementById('js-repo-pjax-container');
	// }

	$html = file_get_contents($url);
	echo $html;
	?>

	@if(Session::has('link'))
				      <div class="alert alert-success">
						   	  {{Session::get('link')}}
						   </div>
	@endif
	@if(Session::has('ten'))
				      <div class="alert alert-success">
						   	  {{Session::get('ten')}}
						   </div>
	@endif
	</body>
	<script type="text/javascript">
		$(document).ready( ()=>{
			document.cookie = ('googtrans','/zh-CN/vi');
			$("#J_SiteNav").css('display','none');
			$("#J_7607074463").css('display','none');
			$("#footer").css('display','none');
			google.language.translate("hello everyone", 'en', 'vn', function(result) {
         console.log(result);
     });
		})
	</script>
</html>