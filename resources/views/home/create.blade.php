@extends('layouts.home.index')
@section('add_option')
			<button type="button" id="add" class="btn btn-warning">增加选项</button>
@endsection

			
@section('content')
			<h3>创建投票</h3><hr>
			<form action="/vote" method='post'>


			<div class="input-group col-md-6">
			  <span class="input-group-addon" id="basic-addon1">标题</span>
			  <input type="text" name='vote_title' class="form-control" placeholder="请填写投票标题" aria-describedby="basic-addon1">
			</div><br>

			<div class="input-group col-md-6">
			  <span class="input-group-addon" name='vote_explain' id="basic-addon1">说明</span>
			  <input type="text" class="form-control" placeholder="请填写投票说明" aria-describedby="basic-addon1">
			</div><br>

			
			<div id="content" class='col-md-6'>

				
			<div class='option'>
				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项</span>
				  <input type="text" name='option_content[]' class="form-control" placeholder="" aria-describedby="basic-addon1">
				</div><br>

				<div class='video'>
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">视频地址</span>
				  <input type="text" class="form-control" name='video[]' placeholder="" aria-describedby="basic-addon1">
				</div>
				<div class='shi'></div>
				</div>


				<div class='content'>
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项说明</span>
				  <input type="text" class="form-control" name='option_content' placeholder="" aria-describedby="basic-addon1">
				</div>
				<div class='shi'></div>
				</div>
				


				<span class="btn btn-default fileinput-button">
		            <span>添加封面</span>
		            <input type="file" name='vote_pic'>
		        </span>
		        <span class="btn btn-default fileinput-button">
		            <span>添加图片</span>
		            <input type="file" name='option_pic'>
		        </span>


				<button type="button" class="add_video btn btn-default">添加视频</button>
				<button type="button" class="add_content btn btn-default">添加说明</button>
				
			</div>
			<br>
		</div>


				
			
		</div>
		

	<div id='gg' class='main col-md-8 col-md-offset-2'>
		<div class='col-md-6'>
		<table class=" table table-bordered">
			<caption><h3>功能设置</h3></caption>
		  <tr>
				<th width='40%'>选项</th>
				<th>是</th>
				<th>否</th>
		  </tr>

		  <tr class='success'>
				<td>只允许微信投票</td>
				<td>
					<label>
				        <input type="radio" checked name="has_wechat" value='1' id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_wechat" value='0' id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>

		  <tr class='active'>
				<td>允许刷礼物</td>
				<td>
					<label>
				        <input type="radio" checked="" name="has_gift" value="1" id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_gift" value="0" id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>

		  <tr class='success'>
				<td>允许评论</td>
				<td>
					<label>
				        <input type="radio" name="has_comment" value="1" id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" checked name="has_comment" value="0" id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>
		 
		  <tr class='active'>
				<td>去除广告</td>
				<td>
					<label>
				        <input type="radio" name="has_a_d" id="" value='1' class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" checked name="has_a_d" id="" value='0' class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>
		  
		  <tr class='success'>
				<td>首页置顶</td>
				<td>
					<label>
				        <input type="radio" name="has_top" value='1' id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" checked name="has_top" value='0' id="" class="a-radio">
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>
		</table>

				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">单选多选</span>
				  <input type="text" name="has_checkbox" class="form-control" placeholder="默认为最多允许投一个选项" aria-describedby="basic-addon1">
				</div><br>

				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">重复投票</span>
				  <input type="text" class="form-control" name='has_repeat' placeholder="默认不允许重复投票" aria-describedby="basic-addon1">
				</div><br>

				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">投票密码</span>
				  <input type="text" class="form-control" name="has_password" placeholder="默认无密码" aria-describedby="basic-addon1">
				</div><br>


				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">截止时间</span>
				  <input type="date" class="form-control" placeholder="" aria-describedby="basic-addon1">
				</div><br>

			<button style="margin-left:40px" class="btn btn-success">保存修改</button>
			<br><br><br>
			</div>
			{{csrf_field()}}
		</form>
			
			
		
	

	@endsection
	
