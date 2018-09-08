<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>

	<link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login/css/main.css">
	<link rel="stylesheet" href="/login/yzm/css/jigsaw.css">
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

					<div class="wrap-input100 validate-input" data-validate="请输入密码">
						<input class="input100" type="password" name="password" placeholder="请输入密码">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="请输入密码">
						<input class="input100" type="text" name="user_phone" placeholder="请输入手机号">
						<span class="focus-input100" data-symbol="&#xf237;"></span>
						<!-- <span class="focus-input100" ><i class="fa fa-mobile" aria-hidden="true" style="font-size:30px"></i></span> -->
					</div>
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
	
	<script src="/login/yzm/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/login/yzm/js/main.js"></script>
	<script type="text/javascript" src="/login/yzm/js/jigsaw.js"></script>
	<script type="text/javascript">
		jigsaw.init(document.getElementById('captcha'), function () {
			document.getElementById('msg').innerHTML = '验证成功！'
		})
	</script>
</body>

</html>