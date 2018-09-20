@extends('layouts.home.index')
@section('content')
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
	<style>
		.xuanshou{
			height:100px;
			border:solid 1px #ddd;
		}
		
		.gift{

		}
		li{
			margin-top:10px;
		}
		ul,li{
			list-style:none;
		}
	</style>

	<div class="xuanshou col-md-12">
		显示option信息: <br>
		判断显示option_pic <br>
		option_title: <br>
		option_content: <br>
	</div>

	<div class="gift col-md-6">
		<form action="/wechat/pay/pay" method="post">
		<input type="hidden" name="option_id" value="{{$options->id}}">
		<input type="hidden" name="username" value="{{$username}}">
		<input type="hidden" name="avatar" value="{{$avatar}}">
		<input type="hidden" name="openid" value="{{$openid}}">

		<table class=" table table-bordered">
			<caption><h4>礼物列表</h4></caption>
			<tr>
				<th>选择</th>
				<th>礼物名称</th>
				<th>价格</th>
				<th>火力值</th>
			</tr>

			@foreach($gifts as $k=>$v)
			<tr class='active'>
				<td>
					<label>
						<input type="radio" name="gift_id" class="a-radio" value="{{$v->id}}">
						<span class="b-radio"></span>
					</label>
				</td>
				<td>{{$v->gift_name}}</td>
				<td>{{$v->price}}.00元</td>
				<td>{{$v->price*10}}票</td>
			</tr>
			@endforeach
		</table>
		<button class="btn btn-success col-md-4 col-md-offset-4">微信支付</button>
		{{csrf_field()}}
	</form>
	</div>
<div class="col-md-7">
	<table class="table table-bordered">
			<caption><h4>赠送列表</h4></caption>
			<tr>
				<th>ID</th>
				<th>赠送者</th>
				<th>礼物名称</th>
				<th>赠送时间</th>
			</tr>
			
			@foreach($gift_gxs as $k=>$v)
			<tr class='active'>
				<td>{{$k+1}}</td>
				<td>{{$v->user_name}}</td>
				<td>{{$v->gift->gift_name}}</td>
				<td>{{$v->created_at}}</td>
			</tr>
			@endforeach
		</table>
	</div>
@endsection