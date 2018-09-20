			<style>
				
				#sell{
					width:80px;
					height:80px;
					position:absolute;
					top:50px;
					display:none;
				}
			</style>	
			@if(!Session::has('id'))
			<div class='login'>
				<span>&nbsp; &nbsp; <a href="/home/login">登录</a></span>
			</div>
			@else
			<div class='login'>
			<div class='head_pic' id="sel">
				<div id="sell">
				<a href="/myindex">个人中心</a><br>
				<a href="/loginout">退出登录</a>
				</div>
			</div>
			
			</div>
			@endif

			<script>
			$('#sel').click(function(){
				if($('#sell').css('display')=='none'){
				$('#sell').show();
			}else{
				$('#sell').hide();
			}
			})
			</script>