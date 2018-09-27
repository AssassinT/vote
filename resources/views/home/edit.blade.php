@extends('layouts.home.index')

			
@section('content')
<div id="has_edit" data_edit = "1"></div>
<style>
	.pic{

		display:block;
	}
	.option_video{
		display:none;
	}
	
	
	

</style>
			<h3>投票修改</h3><hr>
			<form action="/vote/{{$votes->id}}" method='post' enctype="multipart/form-data">

			<div class='leixing' style="color:#888;margin-bottom:10px" >
				<span style="font-size:16px">投票类型：</span> 
				<label>
			        <input type="radio" name="vote_type" id="" value='0' class="a-radio" disabled {{$votes -> vote_type == 0 ? 'checked' : ''}}>
			        <span class="b-radio"></span>文字类型
				</label> &nbsp; 
				<label>
			        <input type="radio" name="vote_type" id="" value='1' class="a-radio" disabled {{$votes -> vote_type == 1 ? 'checked' : ''}}>
			        <span class="b-radio"></span>图片类型
				</label> &nbsp; 
				<label>
			        <input type="radio" name="vote_type" id=""   value='2' class="a-radio" disabled {{$votes -> vote_type == 2 ? 'checked' : ''}}>
			        <span class="b-radio"></span>视频类型
				</label>
			</div>


			<div class="input-group col-md-6">
			  <span class="input-group-addon" id="basic-addon1">标题</span>
			  <input type="text" name='vote_title' class="form-control" placeholder="请填写投票标题" aria-describedby="basic-addon1" value="{{$votes->vote_title}}">

			</div><br>
			

			<div class="input-group col-md-6">
			  <span class="input-group-addon" id="basic-addon1">说明</span>
			  <input type="text" class="form-control" name="vote_explain" placeholder="请填写投票说明" aria-describedby="basic-addon1" value="{{$votes->vote_explain}}">
			</div><br>
              <div><img src ="{{$votes->vote_pic}}" height='200px' id="fmpicc"></div>
			<br>
			<span class="btn btn-success fileinput-button">
		            <span>修改封面</span>
		            <input type="file" name='vote_pic' id="vote_picc">

		        </span><br>
			
			<div id="content" class='col-md-6'>

			@foreach($votes->option  as $k=>$v)	
			<input type="hidden" value="{{$v->id}}" name = "option{{$k}}[option_id]">
			<div class='option'>
				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项</span>
				  <input type="text" has='option_title' name='option{{$k}}[option_title]' class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{$v->option_title}}">
				</div><br>

				@if(empty(!$v->video))
				<div class='video' style="display:block">
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">视频地址</span>
				  <input type="text" class="form-control" name='option{{$k}}[video]' placeholder="" aria-describedby="basic-addon1" value="{{$v->video}}">
				</div>
				<div class='shi'></div>
				</div>
				@endif

				@if(empty($v->option_content))
				<div class='content' >
				@else
				<div class='content' style="display:block;">
				@endif
				<div class=" input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">选项说明</span>
				  <input type="text" class="form-control" name='option{{$k}}[option_content]' placeholder="" aria-describedby="basic-addon1" value="{{$v->option_content}}">
				</div>
				<div class='shi'></div>
				</div>
				

				<img src="{{$v->option_pic}}" alt="" height=200  width="362" ;>
		        <span class="btn btn-info pic fileinput-button" >
		            <span>修改图片</span>
		            <input type="file" name='option{{$k}}[option_pic]' class="img">
		        </span>
				
				
				<button type="button" class="add_video btn option_video btn-info">修改视频</button>
				<button type="button" class="modify_content btn btn-info">修改说明</button>
				
				<button type="button" class="removee btn btn-danger">删除该项</button><br>
				
			</div>

			<br> 
	@endforeach

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
				<th>否</th>
		  </tr>

		  <tr class='success'>
				<td>只允许微信投票</td>
				<td>
					<label>
				        <input type="radio"  name="has_wechat" value='1' id="" class="a-radio" {{$votes['has_wechat']==1 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_wechat" value='0' id="" class="a-radio" {{$votes['has_wechat']==0 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>

		  <tr class='active'>
				<td>允许刷礼物</td>
				<td>
					<label>
				        <input type="radio" {{$votes['has_gift']==1 ? 'checked' : ''}} name="has_gift" value="1" id="" class="a-radio">
				        <span class="b-radio"></span><a href="/gift/brush" style="font-size:13px;">同意礼物协议</a>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_gift" value="0" id="" class="a-radio" {{$votes['has_gift']==0 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>

		  <tr class='success'>
				<td>允许评论</td>
				<td>
					<label>
				    <input type="radio" name="comment" value="1" id="" class="a-radio" {{$votes['comment']==1 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio"   name="comment" value="0" id="" class="a-radio" {{$votes['comment']==0 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>
		 @if($votes->user->has_vip)
		  <tr class='active'>
				<td>去除广告</td>
				<td >
				 <a href="/help/none"><span style="color:#FFCC00;">★去除广告</span></a>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_a_d" id="" value='0' class="a-radio" {{$votes['has_a_d']==0 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>
		   @endif
		   @if(!$votes->user->has_vip)
		  <tr class='active'>
				<td>去除广告</td>
				<td >
				 <a href="/help/none"><span style="color:#FFCC00;">★去除广告</span></a>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_a_d" id="" value='0' class="a-radio" {{$votes['has_a_d']==0 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>
		   @endif
		  <tr class='success'>
				<td>首页置顶</td>
				<td>
					<label>
				        <input type="radio" name="has_top" value='1' id="" class="a-radio" {{$votes['has_top']==1 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
				<td>
					<label>
				        <input type="radio" name="has_top" value='0' id="" class="a-radio" {{$votes['has_top']==0 ? 'checked' : ''}}>
				        <span class="b-radio"></span>
				    </label>
				</td>
		  </tr>

		  <tr class='success'>
		<script>
			$('#many').click(function(){
					
				$('.duoxuan').show();

			});
			$('#one').click(function(){
			$('.duoxuan').hide();			
				

			})
				
		
		</script>
		</table>
				<!-- <div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">单选多选</span>
				  <input type="select" name="has_checkbox" class="form-control" placeholder="默认为最多允许投一个选项" aria-describedby="basic-addon1">
				   
				</div><br> -->

				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">单选多选</span>
				  <input type="text" class="form-control" name='has_checkbox' placeholder="" aria-describedby="basic-addon1" value="{{$votes->has_checkbox}}">
				</div><span style="color:red;font-size:12px;display:block"  >可以在规定间隔时间内给几个选项投票,默认只能给一个选项投票</span><br>
				

				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">重复投票</span>
				  <input type="text" class="form-control" name='has_repeat' placeholder="间隔几小时可以再次投票,默认不允许重复投票" aria-describedby="basic-addon1" value="{{$votes->has_repeat}}">
				</div><span style="color:red;font-size:12px;display:block"  >间隔几小时可以再次投票,默认0表示不允许再次投票</span><br>

				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">投票密码</span>
				  <input type="text" class="form-control" name="has_password" placeholder="默认无密码" aria-describedby="basic-addon1" value="{{$votes->has_password}}">
				</div><span style="color:red;font-size:12px;display:block"  >请设置投票密码,默认0表示没有密码</span><br>


				<div class="input-group col-md-12">
				  <span class="input-group-addon" id="basic-addon1">截止时间</span>
				  <input type="date" name="end_time" class="form-control" placeholder="" aria-describedby="basic-addon1" value="{{$votes->end_time}}">
				</div><br>
				 <input type="hidden" name="vote_type" value="{{$votes->vote_type}}">
			<button style="margin-left:40px" class="btn btn-success">修改投票</button>
			<br><br><br>
			</div>
			{{csrf_field()}}
			{{method_field('PUT')}}
			<input type="hidden" value="{{$k+1}}"  name='num'>
			<input type="hidden" value=""  id="num" name='numm'>
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
		$('input[name=end_time]').change(function(){

			var newtime = $(this).val();
			<?php
			 // $newtime->lt($stop);
			$ti

			 ?>
			 
			alert(nowtime);
		})

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

	$("input[name=vote_type]").trigger("change");

		$('#close').click(function(){
			$("#tan").hide();
		});

	//重复投票
	// $('input[name=has_repeat]').focus(function(){
	// 	$(this).parent().next().show();
	// }).blur(function(){
	// 	$(this).parent().next().hide();

	// });

	// $('input[name=has_password]').focus(function(){
	// 	$(this).parent().next().show();
	// }).blur(function(){
	// 	$(this).parent().next().hide();	
	// });
	});
	function tc(str){
		$('#tan').show();
		$('#tishi').html(' &nbsp;&nbsp;'+str);
	}

$(function () {
        $("#vote_picc").change(function () {
            var fil = this.files;
            for (var i = 0; i < fil.length; i++) {
                reads(fil[i]);
            }
        });


$('.modify_content').off('click').on('click',function(){
			if({{$votes->vote_type}}==0){
				n = 2;
			}else{
				n = 3;
			}
			var content_has_down = $(this).parent().children().eq(n).css('display');
			if(content_has_down=='block'){
				$(this).parent().children().eq(n).hide();
			}else{
				$(this).parent().children().eq(n).show();
			}
		});


    });
    
    function reads(fil){
        var reader = new FileReader();
        reader.readAsDataURL(fil);
        reader.onload = function(){
            $('#fmpicc').attr("src",reader.result);
        };
    };

    $(function () {
        $('.img').change(function () {

            var fil = this.files;

           var reader = new FileReader();
	        reader.readAsDataURL(fil[0]);
	        var nb = $(this);
	        // alert(123)
	        reader.onload = function(){
	        	console.log(reader.result);
	           	nb.parent().prev().attr('src',reader.result);
	        };

        });

    $('.removee').click(function(){
    	if(confirm('删除后不可撤销')){
    		// $(this).firstChild().next().remove();
    			th = $(this);
				$.get('/del/{{$v->id}}',{},function(data){
					if(data){
						alert('删除成功');
						th.parent().remove();
					}
				});
    	}else{
    		$(".remove").unbind("click");
    	}
		});

    });
    
    


</script>

	

	@endsection
	
