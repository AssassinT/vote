<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>支付</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	 <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">  
<script>   
(function (doc, win) {
        var docEl = doc.documentElement,
             resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
             recalc = function () {
                var clientWidth = docEl.clientWidth;
                if (!clientWidth) return;
                 if(clientWidth>=640){
                     docEl.style.fontSize = '100px';
                 }else{
                     docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
                 }
             };
 
         if (!doc.addEventListener) return;
         win.addEventListener(resizeEvt, recalc, false);
         doc.addEventListener('DOMContentLoaded', recalc, false);
     })(document, window);
 </script>
</head>
<body>
	<div class="col-md-6">
		<table class="table table-bordered">
			<caption><h3>订单确认</h3></caption>
	  		<tr class="success">
				<td>所选选项</td>
				<td>{{$options->option_title}}</td>
	  		</tr>
	  		<tr class="info">
				<td>赠送者</td>
				<td>{{$username}}</td>
	  		</tr>
	  		<tr class="success">
				<td>礼物名称</td>
				<td>{{$gifts->gift_name}}</td>
	  		</tr>
	  		<tr class="info">
				<td>礼物价格</td>
				<td>{{$gifts->price}}</td>
	  		</tr>
	  		<tr class="success">
				<td>增加票数</td>
				<td>{{$gifts->price*5}}</td>
	  		</tr>
	  	<!-- 	<tr class="info">
				<td>6</td>
				<td>111111111111</td>
	  		</tr>
	  		<tr class="success">
				<td>7</td>
				<td>11111111111</td>
	  		</tr> -->
		</table>
		<div col-md-12><button style="width:100%" type="button" class="btn btn-success" id="pay">确认支付</button></div>
	</div>
	
</body>
<script>
		wx.config(<?php echo $baseJson; ?>);
		$('#pay').click(function(){
			wx.chooseWXPay({
			    timestamp: <?= $config['timestamp'] ?>,
			    nonceStr: '<?= $config['nonceStr'] ?>',
			    package: '<?= $config['package'] ?>',
			    signType: '<?= $config['signType'] ?>',
			    paySign: '<?= $config['paySign'] ?>', // 支付签名
			    success: function (res) {
			        // 支付成功后的回调函数
			        return 'success';
			    }
			});
		});
	</script>
</html>