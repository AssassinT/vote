<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>
	<meta name="keywords" content="HTML5,美观,简洁大气,响应式,第三方登录,网页模板" />
	<meta name=""> 

	<link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login/css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="/home/dologin" method="post">
					<span class="login100-form-title p-b-49">登录</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate="请输入用户名" style=margin:0px>
						<span class="label-input100">用户名</span>
						<input class="input100" type="text" name="user_name" placeholder="请输入用户名" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="请输入密码">
						<span class="label-input100">密码</span>
						<input class="input100" type="password" name="password" placeholder="请输入密码">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<a href="/home/fp">忘记密码？</a>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">登 录</button>
						</div>
					</div>

					

					<div class="flex-col-c p-t-25">
						<a href="/home/reg" class="txt2">立即注册</a>
					</div>
					{{csrf_field()}}
				</form>
			</div>
		</div>
	</div>

	<script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/login/js/main.js"></script>
</body>

</html>