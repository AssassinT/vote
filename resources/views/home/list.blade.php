@extends('layouts.home.index')

@section('content')
			<h3>投票管理</h3><hr>
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>标题</th>
					<th>状态</th>
					<th>日期</th>
					<th>评论数</th>
					<th>总票数</th>
					<th>操作</th>
				</tr>
@foreach($votes as $v)
				<tr class="active">
					<td>{{$v->id}}</td>
					<td>{{$v->vote_title}}</td>
					<td>待定义</td>
					<td>{{$v->created_at}}</td>
					<td>12</td>
					<td>520</td>
					<td>
						<a href="/vote/1/edit">修改</a>|
						<a href="#">统计</a>|
						<a href="#">删除</a>
					</td>
				</tr>

@endforeach
				
			</table>	
@endsection


		