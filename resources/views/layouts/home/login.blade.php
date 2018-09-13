			@if(!Session::has('id'))
			<div class='login'>
				<div class='head_pic'></div>
				<span>&nbsp; &nbsp; <a href="/home/login">登录111</a></span>
			</div>
			@else
			<div class='login'>
			<div class='head_pic'></div>
			<a href="/myindex"><button type="button"  class="btn btn-warning">个人中心</button></a>
			</div>
			@endif