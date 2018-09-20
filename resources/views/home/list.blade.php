@extends('layouts.home.index')

<style>
	#table_list tr{
		height:20px;
	}
    
</style>
@section('content')
			<h3>投票管理</h3>
			<table id='table_list' class="table table-hover">
				<tr>
					<th class="hide_phone">ID</th>
					<th>标题</th>
					<th class="hide_phone">状态</th>
					<th class="hide_phone">日期</th>
					<th class="hide_phone">评论数</th>
					<th class="hide_phone">总票数</th>
					<th>操作</th>
				</tr>
@foreach($votes as $v)
<?php
	$arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$v->id);
        $arrys = $arry[0]->total;

?>
				<tr class="active">
					<td class="hide_phone">{{$v->id}}</td>
					<td  width="30%" class="hide_phone">{{$v->vote_title}}</td>
					<td  width="58%" class="hide_pc">{{$v->vote_title}}</td>
					<?php
						$time = strtotime(substr($v->end_time,0,10));
						$newtime = time();
						if($time>$newtime){
							$str = '<font color="2ecc71">投票中</font>';
						}else{
							$str = '<font color="red">已截止</font>';
						}
					?>
					<td class="hide_phone">{!!$str!!}</td>

					<td class="hide_phone">{{substr($v->end_time,0,10)}}</td>
					<td class="hide_phone">12</td>
					<td class="hide_phone">{{$arrys}}</td>
					<td class="hide_phone">
						&nbsp;<a href="/vote/{{$v->id}}/edit"><button class='btn btn-success'>修改</button></a>
						<a href="/vote/{{$v->id}}/count"><button class='btn btn-success'>统计</button></a>
						<a href="/vote/{{$v->id}}"><button class='btn btn-success'>查看</button></a>
						<form style="float:left"  action="/vote/{{$v->id}}" method="post" >
							<button class='btn btn-success' type='submit'>删除</button>
							{{method_field('DELETE')}}
							{{csrf_field()}}
						</form>
					</td>
					<td class="hide_pc">
						&nbsp;<a href="/vote/{{$v->id}}/edit"><button class='btn btn-success'>修改</button></a>
						<a href="/vote/{{$v->id}}/count"><button class='btn btn-success'>统计</button></a><div></div>
						<a href="/vote/{{$v->id}}">&nbsp;<button class='btn btn-success'>查看</button></a>
						<form style="float:left"  action="/vote/{{$v->id}}" method="post" >
							&nbsp;<button class='btn btn-success' type='submit'>删除</button>
							{{method_field('DELETE')}}
							{{csrf_field()}}
						</form>
					</td>
				</tr>

@endforeach
				
			</table>	
			<script>
					$('form').submit(function(){
						if(!confirm('删除后不可恢复，您确定删除么')){
							return false;
						}
					});
			</script>
@endsection
