@extends('layouts.home.index')

			


			
@section('content')
<style>
	.pic{

		display:black;
	}
	.option_video{
		display:none;
	}
</style>
<div id="has_edit" data_edit = "0"></div>
			<h3>创建投票</h3><hr>
			<form action="/vote" method='post' enctype="multipart/form-data" onSubmit="return check(this)";>

			<div class='leixing' style="color:#888;margin-bottom:10px">
				<span style="font-size:16px">投票类型：</span> 
				<label>
			        <input type="radio" name="vote_type" id="" value='0' class="a-radio">
			        <span class="b-radio"></span>文字类型
				</label> &nbsp; 
				<label>
			        <input type="radio" name="vote_type" checked id="" value='1' class="a-radio">
			        <span class="b-radio"></span>图片类型
				</label> &nbsp; 
				<label>
			        <input type="radio" name="vote_type" id="" value='2' class="a-radio">
			        <span class="b-radio"></span>视频类型
				</label>
			</div>

			<div class="input-group col-md-6">
			  <span class="input-group-addon" id="basic-addon1">标题</span>
			  <input type="text" name='vote_title' class="form-control" placeholder="请填写投票标题" aria-describedby="basic-addon1">
			</div><br>
			

			<div class="input-group col-md-6">
			  <span class="input-group-addon" id="basic-addon1">说明</span>
			  <input type="text" class="form-control" name="vote_explain" placeholder="请填写投票说明" aria-describedby="basic-addon1">
			</div><br>
			<span class="btn btn-success fileinput-button">
		            <span><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;添加封面</span>
		            <input type="file" id="vote_picc"   name='vote_pic'>
		        </span><br>

			
			<div id="content" class='col-md-6'>

				
			<div class='option'>
				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项</span>
					
				  <input type="text" has='option_title' name='option1000[option_title]' class="form-control" placeholder="" aria-describedby="basic-addon1">

				</div><br>

				<div class='video'>
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">视频地址</span>
				  <input type="text" class="form-control" name='option1000[video]' placeholder="" aria-describedby="basic-addon1">
				</div>
				<div class='shi'></div>
				</div>


				<div class='content'>
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项说明</span>
				  <input type="text" class="form-control" name='option1000[option_content]' placeholder="" aria-describedby="basic-addon1">
				</div>
				<div class='shi'></div>
				</div>
				


				
		        <span class="btn btn-info pic fileinput-button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		            <span>添加图片</span>
		            <input type="file" name='option1000[option_pic]'>
		        </span>


				<button type="button" class="add_video btn option_video btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加视频</button>
				<button type="button" class="add_content btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加说明</button>
				
			</div>
			<br>

<div class='option'>
				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项</span>
				  <input type="text" has='option_title' name='option1001[option_title]' class="form-control" placeholder="" aria-describedby="basic-addon1">
				</div><br>

				<div class='video'>
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">视频地址</span>
				  <input type="text" class="form-control" name='option1001[video]' placeholder="" aria-describedby="basic-addon1">
				</div>
				<div class='shi'></div>
				</div>


				<div class='content'>
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项说明</span>
				  <input type="text" class="form-control" name='option1001[option_content]' placeholder="" aria-describedby="basic-addon1">
				</div>
				<div class='shi'></div>
				</div>
				


				
		        <span class="btn btn-info pic fileinput-button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		            <span>添加图片</span>
		            <input type="file" name='option1001[option_pic]'>
		        </span>


				<button type="button" class="add_video btn option_video btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加视频</button>
				<button type="button" class="add_content btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加说明</button>
				
			</div>

		</div>

<div class="col-md-7">
	<button type="button" id="add" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 增加选项</button>

</div>


				
			
		</div>
		

	<div id='gg' class='main col-md-8 col-md-offset-2'>
		<div class='col-md-6'>
		<table class=" table table-bordered">
			<caption><h3>功能设置</h3></caption>
		  <tr>
				<th width='40%'>选项</th>
				<th>是</th>
				<th width='20%'>否</th>
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
				        <input type="radio" name="has_gift" value="1" id="" class="a-radio">
				        <span class="b-radio"></span><a href="/gift/brush" style="font-size:13px;">同意礼物协议</a>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" checked="" name="has_gift" value="0" id="" class="a-radio">
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
				<td >
				 <a href="/help/none"><span style="color:#FFCC00;">★去除广告</span></a>
				</td>
				<td>
					<label>
				        <input type="radio" checked name="has_a_d" id="" value='0' class="a-radio">
				        <span class="b-radio"></span><!-- 
				        <b style="color:#FFCC00;font-size:10px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b> -->
				    </label>
				</td>
				

		  </tr>
		  
		  <tr class='success'>
				<td>首页置顶</td>
				<td>
					<label id="jf">
				        <input type="radio" name="has_top" value='1' id="" class="a-radio">
				        <span class="b-radio" ></span><span style="font-size: 12px;color:#337ab7">消耗50积分</span>
				      
				    </label>   
				    <a href="/help/none" id="jj" style="display:none">
				      <span style="font-size: 12px;color:red">获取积分</span></a>
				</td>
					 <script>
				   		$('#jf').click(function(){
				   			if({{$user->integral < 50}})
				   				alert('积分不足,办理会员每月可领取500积分哦! ^^');
				   				$('#jj').show();
				   				return false;
				   		})

					</script>
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
				  <input type="text" class="form-control" name="has_password" placeholder="默认无密码" aria-describedby="basic-addon1" >
				</div><br>


				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">截止时间</span>
				  <input type="date" name="end_time" class="form-control" placeholder="" aria-describedby="basic-addon1">
				</div><br>
			<div col-md-12>
				<button style="width:100%" id="tijiaoanliu" class="btn btn-success">发布投票</button>
			</div>

			<br><br><br>
			</div>
			{{csrf_field()}}
			<input type="hidden" value="1003" id='num' name='num'>
		</form>
		<style>
			#tan{
				display:none;
				z-index:101;
				width:300px;
				height:140px;
				position:fixed;
				left:500px;
				top:200px;
				background:#09c;
				border:1px solid #000;
			}
			#tishi{
				font-size:20px;
				line-height:40px;
				color:white;
				width:280px;
				height:40px;
				position:absolute;
				border:1px solid white;
				top:20px;
				left:10px;
			}
			#close{
				position:absolute;
				bottom:20px;
				left:120px;
			}
		</style>
		<div id="tan">
			<div id="tishi">
				
			</div>
			<button id="close" class='btn-danger btn'>关闭</button>
		</div>

<script>
	$(function(){
		var vote_type_num = $('input[name=vote_type]:checked').val();
		$('input[name=vote_type]').change(function(){
			// alert(123);
			var vote_type_num = $('input[name=vote_type]:checked').val();
			if(vote_type_num=='2'){
				$('.pic').hide();
				$('.option_video').show();
			}
			if(vote_type_num=='1'){
				$('.pic').show();
				$('.option_video').hide();
			}
			if(vote_type_num=='0'){
				$('.pic').hide();
				$('.option_video').hide();
			}

		});


		$('#close').click(function(){
			$("#tan").hide();
		});
	});
	function tc(str){
		$('#tan').show();
		$('#tishi').html(' &nbsp;&nbsp;'+str);
	}


</script>

	

	@endsection
	
