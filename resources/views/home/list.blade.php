@extends('layouts.home.index')
<style>
<style>
    .btn {
        color: blue;   
        border: 0px none;  //去边框
        font-family: "宋体";
        text-decoration:underline;  //加下划线
    }
    .btn:hover{
        color:red;
        border: none;
        cursor: hand;
        cursor: pointer;
        text-decoration:underline;  //加下划线
    }
    .btn:focus { 
        outline: none;    //去边框
    }
</style>
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
					<?php
						$time = strtotime(substr($v->end_time,0,10));
						$newtime = time();
						if($time>$newtime){
							$str = '<font color="2ecc71">投票中</font>';
						}else{
							$str = '<font color="red">已截止</font>';
						}
					?>
					<td>{!!$str!!}</td>

					<td>{{substr($v->end_time,0,10)}}</td>
					<td>12</td>
					<td>520</td>
					<td>
						|<a href="/vote/{{$v->id}}/edit">修改</a>|
						<a href="/vote/{{$v->id}}/count">统计</a>
						<form style="float:left"  action="/vote/{{$v->id}}" method="post" >
							<button class='btn' type='submit'>删除</button>
							{{method_field('DELETE')}}
							{{csrf_field()}}
						</form>


					</td>
				</tr>

@endforeach
				
			</table>	
@endsection


		