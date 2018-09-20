<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$links = \App\Link::all();
	?>
	<meta charset="UTF-8">
	<title>vote</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="/home/css/home.css" type="text/css" />
	<script src="/home/js/home.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 框 -->
<link rel="stylesheet" href="/home/css/main.css">
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/ads.js"></script>
	<style>
html,body,h2{margin:0;}
img{border:none}
#pop{background:#fff;width:310px; height:210px;font-size:12px;position:fixed;right:0;bottom:0;z-index:100;}
#popHead{line-height:32px;background:#e4e4e4;border-radius:2px;border-bottom:2px solid #e0e0e0;font-size:12px;padding:0 0 0 10px;}
#popHead h2{font-size:14px;color:black;line-height:32px;height:32px;}
#popHead #popClose{position:absolute;right:10px;top:1px;}
#popHead a#popClose:hover{color:#f00;cursor:pointer;}
</style>
<!-- 框 -->
</head>
<body>
	<div id="big">
		<div class='col-md-8 col-md-offset-2 top'>
			<div class='logo'>
				Vote
			</div>
			@yield('add_option')
			<a href="/helps"><button type="button"  id="helps" class="btn btn-warning">帮助</button></a>
			<a href="/home/webset"><button type="button"  id="webset" class="btn btn-warning">联系我们</button></a>
			<a href="/home/proposal"><button type="button"  id="proposal" class="btn btn-warning">建议</button></a>
			
			@include('layouts.home.login')

		</div>
		
		<div class='main col-md-8 col-md-offset-2'>

			@yield('content')

		</div>
		@include('layouts.home.link')
		

	<div class='col-md-8 col-md-offset-2 bottom'>
			
	
	</div>
<!-- 广告框 -->
<?php
		$users = \App\User::all();
	$a_dsss = \App\aD::where('position',1)->get();
		
 // dd($a_ds);
	?>

@if(!$users[0]['has_vip']==0)
	@if(count($a_dsss)<=0)
		<div class="one" style="display:none"></div>
	@endif
	@foreach($a_dsss as $v )
		@if($v['position']==1)
<div id="main">
  <div id="pop" style="display:none;">
  	<div id="popHead">
		<a id="popClose" title="关闭" style="color:black"><b>关闭</b></a>
		<h2><b>赞助广告</b></h2>
	</div>
	<div id="popContent">
	<a href="{{$v['a_d_url']}}" target="_blank"><img width="100%" src="{{$v['a_d_pic']}}"></a>
	</div>
  </div>
<script>
var popad=new Pop();
</script>
		@else
			<div class="one" style="display:none"></div>
		@endif
	@endforeach
		@if(count($a_dsss)<=0)
			<div id="main">
			  <div id="pop" style="display:none;">
			  	<div id="popHead">
					<a id="popClose" title="关闭" style="color:black"><b>关闭</b></a>
					<h2><b>赞助广告</b></h2>
				</div>
				<div id="popContent">
				<a target="_blank"><img width="100%" src="/vo/广告空缺.png"></a>
				</div>
			  </div>
			<script>
			var popad=new Pop();
			</script>
			</div>
		@endif
			<script type="text/javascript">
				if($('.one').css('display')=='none'){
					$('#ones').show();
				}else{
					$('#ones').hide();
				}
			</script>
@endif
<!-- 广告框 end -->

	</div>
</body>
</html>