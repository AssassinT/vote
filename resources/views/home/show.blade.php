@extends('layouts.home.index')
<div id="openid" openid="{{$openid}}"></div>
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

@if($votes->has_wechat=='1' && !$wechat)
<div class="col-md-4 col-md-offset-4">
		
		<div style="width:200px;height:200px;border:1px solid black">
			<img id="qrcode" src="http://bshare.optimix.asia/barCode?site=weixin&url=" width="100%" alt="">
		</div>
		<span style="color:red;margin-top:10px;display:block;"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>该投票设置只能微信投票</span>
		<span style="color:red;margin-top:10px;display:block;">请使用微信扫描二维码进行投票</span>
		<script>
			var url = 'http://bshare.optimix.asia/barCode?site=weixin&url='+window.location.href;
			$("#qrcode").attr('src',url);
		</script>
</div>
@endif
<!-- 微信判断 -->







	<style>
		.home_option{
			margin-top:20px;
			/*height:210px;*/
			/*border:1px solid #eee;*/
		}

		.home_title{
			height:100px;
			margin-bottom:10px;
			border-bottom:solid 1px #eee;
			font-size:20px;
			line-height:30px;
		}
		.home_img{
			float:left;
			width:80px;
			height:80px;
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
<?php
	$arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$votes->id);
        $arrys = $arry[0]->total;

?>
			<span>&nbsp; &nbsp; {{$votes->vote_title}}</span><br>
			<span style="color:#666;font-size:14px;">&nbsp; &nbsp; &nbsp; 总票数:{{$arrys}} &nbsp; &nbsp; 投票截止时间：{{$votes->end_time}}</span>
		</div>

	</div>


<div id="option_main" class='col-md-12'>
	@foreach($votes->option as $v)
	<div class='home_option col-md-4'>
		<!-- 判断类型 -->
		@if($votes->vote_type=='1')
		<div class="col-md-12" style="height:160px;">
		<img src="{{$v->option_pic}}" height="100%" alt="">
		</div>
		@endif

		@if($votes->vote_type=='0')
		<!-- <div class="col-md-12" style="background:#ddd">
			文字类型
		</div> -->
		@endif

		@if($votes->vote_type=='2')
		<a href="{{$v->video}}">点击查看对应视频</a>
		@endif
		<!-- 判断类型 -->

		<div>{{$v->option_title}}</div>
		<!-- 判断微信时只在微信显示投票 -->
					<?php //判断截止时间
						$time = (int)strtotime(substr($votes->end_time,0,10));
						$newtime = (int)time();
						if($time>$newtime){
							$str = true;
						}else{
							$str = false;
						}
					?>
		
		@if(!$str)
			<div class="col-md-12" style="text-align: center;color:red">
				已截止
			</div>
		@else
			@if(($votes->has_wechat=='1' && $wechat) ||$votes->has_wechat=='0')
				<!-- 礼物判断 -->
				@if($votes->has_gift)
					<div>
						@if(!in_array($v->id,$option_id))
						<button option_id="{{$v->id}}" style="margin-right:10px;" class='tou_vote col-md-5 btn btn-success'>投票</button>
						@else
						<button option_id="{{$v->id}}" style="margin-right:10px;" class='tou_vote col-md-5 btn btn-active'>已投票</button>
						@endif
						<a href="/gift_gx/{{$v->id}}"><button class='col-md-5 btn btn-success'>送礼</button></a>
					</div>
				@else
					<div>
						@if(!in_array($v->id,$option_id))
						<button option_id="{{$v->id}}" class='tou_vote col-md-12 btn btn-success'>投票</button>
						@else
						<button option_id="{{$v->id}}" class='tou_vote col-md-12 btn btn-active'>已投票</button>
						@endif
					</div>
				@endif
				<!-- 礼物判断 -->
			@else
			<div>
				请用微信投票
			</div>
			@endif


		@endif
		<!-- 判断微信时只在微信显示投票 -->

	</div>
	@endforeach


</div>

<!-- 判断允许评论 -->
@if($votes->comment=='1')
<div class="col-md-12" style="height:30px;"></div>
<form action="">
	<div class="col-md-6">
		<textarea name="" id="" cols="30" placeholder="留下你的评论吧" rows="4"></textarea><br><br>
		<button class='btn btn-success'>提交评论</button>
	</div>
</form>
@endif
<!-- 判断允许评论 -->
<script>
	$(function(){
		$('.tou_vote').click(function(){
			var nb = $(this);
			var openid = $('#openid').attr('openid');
			$.get('/option/'+$(this).attr('option_id')+'?openid='+openid,{},function(data){
				if(data=='投票成功'){
					nb.html('已投票');
					nb.css('background','#ddd');
					nb.css('border','1px solid #eee');
					nb.css('color','#000');
				}
				alert(data);
			});
		});
	});
</script>

@endsection