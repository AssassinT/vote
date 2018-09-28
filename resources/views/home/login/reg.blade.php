<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>

	<link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login/css/main.css">
	<link rel="stylesheet" href="/login/yzm/css/jigsaw.css">
	<style>
			/*content: "\f06a";
			font-family: FontAwesome;
			display: block;
			position: absolute;
			color: #c80000;
			font-size: 16px;
			bottom: calc((100% - 20px) / 2);
			-webkit-transform: translateY(50%);
			-moz-transform: translateY(50%);
			-ms-transform: translateY(50%);
			-o-transform: translateY(50%);
			transform: translateY(50%);
			right: 8px;*/
	</style>
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="/home/doreg" method="post">
					<span class="login100-form-title p-b-49" style="padding:5px" >注册</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名" style="margin:0px">
						<input class="input100" type="text" name="user_name" placeholder="请输入用户名" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf206;" ></span>						
					</div>
					<div id="aa"></div>
					<div class="wrap-input100 validate-input" data-validate="请输入密码">
						<input class="input100" type="password" name="password" placeholder="请输入密码">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div id="bb"></div>
					<div class="wrap-input100 validate-input" data-validate="请输入手机号">
						<input class="input100" type="text" name="user_phone" placeholder="请输入手机号">
						<span class="focus-input100" data-symbol="&#xf237;"></span>
					</div>
					<div id="cc"></div>					
					<div class="flex-col-c p-t-25">					
					</div>
					<div id="captcha" style="position: relative"></div>
					<div id="msg"></div>
					<div id="captcha" style="position: relative">
					<div class="flex-col-c p-t-25">
						
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">提 交</button>
						</div>
					</div>

					
				{{csrf_field()}}
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!-- <script src="/login/yzm/vendor/jquery/jquery-3.2.1.min.js"></script> -->
	<script src="/login/yzm/js/main.js"></script>
	<script type="text/javascript" src="/login/yzm/js/jigsaw.js"></script>
	<script type="text/javascript">
		
		 var CODE = false;
		jigsaw.init(document.getElementById('captcha'), function () {
			document.getElementById('msg').innerHTML = '验证成功！';
			 CODE = true;
		});



		var CUSER = false;
		var CPASS = false;
		var CPHONE = false;
		$('input[name=user_name]').focus(function(){
			$('#aa').show().html('<span style="color:#bbb;margin-left:43px">输入6~16位字母数字下划线</span>');
		}).blur(function(){
			// $('#aa').hide().html();
			var v = $(this).val();
			var reg = /^[a-zA-Z0-9_]{6,16}$/;
			if(!reg.test(v)){
				//文字提醒
				$('#aa').html('<span style="color:red;margin-left:43px">格式不正确</span>').show();
				CUSER = false;
			}else{
				$.ajax({
					url: '/home/req',
					type:'POST',
					data:{user_name: v},
					// dataType:'json',
					headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},				        
					success: function(data){
						if(data != '1'){
							$('#aa').html('<span style="color:red;margin-left:43px">该用户名太受欢迎, 请换一个</span>').show();
							CUSER = false;
						}else{
							$('#aa').html('<span style="color:green;font-size:16px;font-weight:bold;margin-left:43px">&nbsp;&nbsp;√</span>').show();
							CUSER = true;
						}
					},
					async: false
				})
			}
			
		})
		
		//密码
		$('input[name=password]').focus(function(){
			//提示语显示
			$('#bb').show().html('<span style="color:#bbb;margin-left:43px">输入6~16数字、字母、特殊字符</span>');
		}).blur(function(){
			// $('#aa').hide().html();
			var v = $(this).val();
			//正则
			var reg = /^[0-9a-zA-Z!@#$^]{6,18}$/;

			if(!reg.test(v)) {
				//文字提醒
				$('#bb').html('<span style="color:red;margin-left:43px">格式不正确</span>').show();
				CPASS = false;
			}else{
				//文字提醒
				$('#bb').html('<span style="color:green;font-size:16px;font-weight:bold;margin-left:43px">&nbsp;&nbsp;√</span>').show();
				CPASS = true;

			}
		})

		
		//手机号
		$('input[name=user_phone]').focus(function(){
			//提示语显示
			$('#cc').show().html('<span style="color:#bbb;margin-left:43px">输入您的手机号</span>');
		}).blur(function(){
			//获取用户的输入值
			var v = $('input[name=user_phone]').val();
			//正则
			var reg = /^[1][3,4,5,6,7,8,9][0-9]{9}$/;
			if(!reg.test(v)) {
				//文字提醒
				$('#cc').html('<span style="color:red;margin-left:43px">手机号格式不正确</span>').show();
				CPHONE = false;
			}else{
				//文字提醒
				$('#cc').html('<span style="color:green;font-size:16px;font-weight:bold;margin-left:43px">&nbsp;&nbsp;√</span>').show();
				CPHONE = true;

			}
		})


		// 表单的提交事件
		$('form').submit(function(){
			//触发错误提醒
			$('input').trigger('blur');
			// console.log(CUSER);
			//判断输入值是否都正确
			if(CUSER  && CPASS && CPHONE && CODE ) {
				return true;
			}else{
				return false;
			}
		});
	</script>
</body>

</html>