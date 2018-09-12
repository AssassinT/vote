<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$links = \App\Link::all();
	?>
	<meta charset="UTF-8">
	<title>vote</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="/home/css/home.css" type="text/css" />
	<script src="/home/js/home.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div id="big">
		<div class='col-md-8 col-md-offset-2 top'>
			<div class='logo'>
				Vote
			</div>
			@yield('add_option')
			<a href="/helps"><button type="button"  id="helps" class="btn btn-warning">帮助</button></a>
			<a href="/home/webset"><button type="button"  id="webset" class="btn btn-warning">联系我们</button></a>
			<a href="/home/proposal"><button type="button"  id="proposal" class="btn btn-warning">建议</button></a>
			
			<a href="/myindex"><button type="button"  id="my" class="btn btn-warning">个人中心</button></a>
			@include('layouts.home.login')

		</div>
		
		<div class='main col-md-8 col-md-offset-2'>

			@yield('content')

		</div>
		@include('layouts.home.link')
		

	<div class='col-md-8 col-md-offset-2 bottom'>
			
		

	</div>
	</div>
</body>
</html>