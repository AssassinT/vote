@extends('layouts.home.index')
@section('content')
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
		<form action="/gift_gx" method="post">
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
						<input type="radio" name="gift" class="a-radio" value="{{$v->id}}">
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
				<td>{{$v->gift['gift_name']}}</td>
				<td>{{$v->created_at}}</td>
			</tr>
			@endforeach
		</table>
	</div>
@endsection