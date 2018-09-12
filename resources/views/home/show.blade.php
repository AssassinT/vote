@extends('layouts.home.index')
@section('content')
<!-- 密码判断 -->
@if(!$votes->has_password==0)
<script>
	 var psw = prompt('请输入密码进行投票');
	 var psw2 = {{$votes->has_password}};
	 if(psw!=psw2){
	 	window.location.href='/vote';
	 }
</script>
@endif
<!-- 密码判断 -->

<!-- 微信判断 -->

@if($votes->has_wechat=='1' && $wechat)
<div>
		请用微信扫描二维码进行投票
		<div style="width:200px;height:200px;border:1px solid black">
			<img id="qrcode" src="http://bshare.optimix.asia/barCode?site=weixin&url=" width="100%" alt="">

		</div>
		<script>
			var url = 'http://bshare.optimix.asia/barCode?site=weixin&url='+window.location.href;
			$("#qrcode").attr('src',url);
		</script>
</div>
@endif
<!-- 微信判断 -->







	<style>
		.home_option{
			height:210px;
			/*border:1px solid #eee;*/
		}

		.home_title{
			height:100px;
			margin-bottom:10px;
			border-bottom:solid 1px #eee;
			font-size:30px;
			line-height:100px;
		}
		.home_img{
			float:left;
			width:100px;
			height:100px;
			border-radius:50%;
			overflow:hidden;
			/*border:solid 1px black;*/
		}
		#option_main{
			padding:10px;
		}
			</style>
	<div class="col-md-12 home_title">
		<div class='home_img'>
			<img src="{{$votes->vote_pic}}" width='160%' alt="">
		</div>
		<div>
			&nbsp; &nbsp; {{$votes->vote_title}}
		</div>

	</div>
	<div class="shi"></div>


<div id="option_main" class='col-md-6'>
	@foreach($votes->option as $v)
	<div class='home_option col-md-6'>
		<div class="col-md-12" style="height:140px;background:#ddd">
		<img src="{{$v->option_pic}}" width="100%" alt="">
		</div>
		<div>{{$v->option_title}}</div>
		<div>
			<button class='col-md-12 btn btn-success'>投票</button>
		</div>
	</div>
	@endforeach
</div>


@endsection