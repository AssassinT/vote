@extends('layouts.home.index')
@section('content')

<h3><b>账号管理</b></h3>
<hr>
<style>
	.remind{
			display:none;
			font-size:12px;
			color:#aaa;
	}
	
	.active{
		border:solid 1px #2bf666;
	}
	.error{
		border:solid 1px red;
	}
	#pass_none{
		display:none;
	}
</style>
	<form action="/myindex/{{$user['id']}}" method="post" enctype="multipart/form-data">
		<img src="{{$user['head_pic']}}" width="120" height="120" id="usertx"  ><br><br>
		<span class="btn btn-default fileinput-button">
		    <span>上传头像</span>
		    <input type="file" id="user_head">
	    </span><br><br>

		<div class=" input-group col-md-4">
					  <span class="input-group-addon" id="basic-addon1">用户名</span>
					  <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" readonly value="{{$user['user_name']}}">
					 <!--  @if($user['has_vip'])	
					  <span style="float:right"><b>V</b></span>
					   @endif -->
					</div><br>
					 
		 
		
		@if(!$user['has_vip'])	
		<a href="/bcvip"><i class="fa fa-star"></i> 点击成为会员</a>
		@endif

		
		<div class=" input-group col-md-4">
					  <span class="input-group-addon" id="basic-addon1">积分</span>
					  <img src="" alt="">
					  <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" readonly value="{{$user['integral']}}" >
		</div><br>
		

		<div class=" input-group col-md-4">
					  <span class="input-group-addon" id="basic-addon1">手机号</span>
					  <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1"  value="{{$user['user_phone']}}" name="user_phone">
		</div><br>
		<div id="pass_none">
		<div class=" input-group col-md-4">
					  <span class="input-group-addon" id="basic-addon1" >新密码</span>
					  <input type="password" class="form-control" aria-describedby="basic-addon1" name="password">
		</div><br>

		<div class=" input-group col-md-4">
					  <span class="input-group-addon" id="basic-addon1" >再次输入</span>
					  <input type="password" class="form-control" aria-describedby="basic-addon1" name="repassword">
		</div><br>
		 </div>
		  <div><button type="button" id="pass">修改密码</button></div>
	
		 	


		<br>
		<br>
		<br>
		
			<p>
             <button name="submit" style="margin-left:80px" class="btn btn-success">保存修改</button>
           </p>
  	
	
	{{csrf_field()}}
	</form>




	<!-- <div class="input-group col-md-6">
			  <span class="input-group-addon" id="basic-addon1">标题</span>
			  <input type="text" class="form-control" placeholder="请填写投票标题" aria-describedby="basic-addon1">
	</div> -->



<script>

$(function () {
	var	CPASS = false;
	var CREPASS = false;
        $("#user_head").change(function () {
            var fil = this.files;
            for (var i = 0; i < fil.length; i++) {
                reads(fil[i]);
            }
        });

    
    		//密码
		$('input[name="password"]').blur(function(){
			$(this).removeClass('active');
			//获取用户输入的值
			var v = $(this).val();
			//正则
			var reg = /^\S{6,20}$/;  
			if(!reg.test(v)){
				//边框
				// $(this).addClass('error');
				//文字提醒
				// $(this).next().html('<span style="color:red">格式不正确</span>').show();
				CPASS = false;
			}else{
				//边框
				// $(this).removeClass('error');
				//文字提醒
				// $(this).next().html('<span style="color:green;font-size:16px;font-weight:bold">&nbsp;&nbsp;&nbsp;√</span>').show();
				CPASS = true;
			}
		})

		//确认密码
		$('input[name=repassword]').focus(function(){
			//边框颜色
			// $(this).addClass('active');
			// $(this).next().html('再次输入密码');
		}).blur(function(){
			// $(this).removeClass('active');
			//获取用户输入的值
			var v = $(this).val();
			//判断
			if(v != $('input[name=password]').val()){

				//边框
				// $(this).addClass('error');

				//文字提醒
				// $(this).next().html('<span style="color:red">两次输入密码不一致</span>').show();
				alert('两次输入的密码不一致');
				CREPASS = false;
			}else{
				// $(this).removeClass('active');
				// $(this).next().html('<span style="color:green;font-size:16px;font-weight:bold">&nbsp;&nbsp;√</span>').show();
				CREPASS = true;
			}
		});

		//表单的提交事件
		$('form').submit(function(){
			//触发错误时提醒
			// $('input').trigger('blur');
			// console.log(CUSER);
			//判断输入值是否都正确
			// alert(1);
			// alert(2);
			if(CREPASS && CPASS){
				return true;
			}else{
				return false;
			}

		}); 


		//修改密码
		$('#pass').click(function(){
			if($('#pass_none').css('display') == 'none'){
				$('#pass_none').show();
				$('#pass').html('取消修改');

			}else{
				$('#pass_none').hide();
				$('#pass').html('修改密码');

			}
		});





    });
    
    function reads(fil){
        var reader = new FileReader();
        reader.readAsDataURL(fil);
        reader.onload = function(){
            $('#usertx').attr("src",reader.result);
        };




    };


</script>
@endsection





