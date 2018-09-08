<style type="text/css">
	.link_content{
		border: solid 1px none;
		height:37px;
		width:120px;
		float:left;
		margin:3px;
		padding:5px;
	}
	.link_content div{
		float:left;
		cursor:pointer;
	}
	.fri_right{
		font-size:15px;
		float:left;
	}
</style>

<div class='main col-md-8 col-md-offset-2'>

	<div id="link" >
                @//foreach($links as $v)
                <div class="link_content">
                	<div class="link_neirong" date-src="{//{$v['link_url']}}">
	                    <div class="link_img"><img src="{//{$v['link_pic']}}" width="35" height="25"/></div>
	                    <div class="fri_right">
	                      <p><strong>&nbsp;&nbsp;{//{$v['link_name']}}</strong></p>
	                    </div>
                    </div>
                </div>
                @//endforeach
     </div>
</div>

<script type="text/javascript">
	$('.link_neirong').click(function(){
		window.location.href=$(this).attr('date-src');
	})
</script>

