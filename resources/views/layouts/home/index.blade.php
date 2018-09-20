<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$links = \App\Link::all();
	?>
	<meta charset="UTF-8">
	<title>vote</title>
	<link href="/login/images/T4.jpg" rel="shortcut icon" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="/home/css/home.css" type="text/css" />
	<script src="/home/js/home.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/holder/2.9.4/holder.min.js"></script>
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

	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">  
<script>   
(function (doc, win) {
        var docEl = doc.documentElement,
             resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
             recalc = function () {
                var clientWidth = docEl.clientWidth;
                if (!clientWidth) return;
                 if(clientWidth>=640){
                     docEl.style.fontSize = '100px';
                 }else{
                     docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
                 }
             };
 
         if (!doc.addEventListener) return;
         win.addEventListener(resizeEvt, recalc, false);
         doc.addEventListener('DOMContentLoaded', recalc, false);
     })(document, window);
 </script>

</head>
<body>
	<div id="has_login" has_login="{{Session::has('id')}}"></div>
	<div id="big">
		<div class="col-md-8 col-md-offset-2 col-sm-12" id="top">
			<div class='logo'>
				Vote
			</div>
			<div id="menu" onselectstart="return false;">
				&nbsp; <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
				<span>菜单</span> &nbsp;
			</div>
		</div>
		<div id="menu_top" onselectstart="return false;" class="col-md-2 col-md-offset-8">
			<ul>

				@if(Session::has('id'))
				<a href="/myindex"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;个人中心</li></a>
				@else
				<a href="/home/login"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;点击登录</li></a>
				@endif


				<a id="add_vote" href="/vote/create"><li><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> &nbsp;创建投票</li></a>


				<a href="/vote"><li><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> &nbsp;投票管理</li></a>


				<a href="/home/webset"><li><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> &nbsp;联系我们</li></a>


				<a href="/home/proposal"><li><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> &nbsp;给予建议</li></a>


				<a href="/helps"><li><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> &nbsp;查看帮助</li></a>

				@if(Session::has('id'))
				<a href="/loginout"><li><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> &nbsp;退出登录</li></a>
				@endif

			</ul>
		</div>
		<!-- <div class='col-md-12 top'>
			<div class='logo'>
				Vote
			</div>
			<div id="menu">
				三
			</div>
			@yield('add_option')
			<a href="/helps"><button type="button"  id="helps" class="btn btn-warning">帮助</button></a>
			<a href="/home/webset"><button type="button"  id="webset" class="btn btn-warning">联系我们</button></a>
			<a href="/home/proposal"><button type="button"  id="proposal" class="btn btn-warning">建议</button></a>
			
			@include('layouts.home.login')

		</div> -->
		
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