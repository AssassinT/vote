
@extends('layouts.home.index')
@section('content')
<div id="index" has_show="1"></div>
		<style>
    #contens{
        display:block !important;
    }
  </style>
	<div style="height:30px"></div>

                         <?php

						function time2Units ($time)
{
   $year   = floor($time / 60 / 60 / 24 / 365);
   $time  -= $year * 60 * 60 * 24 * 365;
   $month  = floor($time / 60 / 60 / 24 / 30);
   $time  -= $month * 60 * 60 * 24 * 30;
   $week   = floor($time / 60 / 60 / 24 / 7);
   $time  -= $week * 60 * 60 * 24 * 7;
   $day    = floor($time / 60 / 60 / 24);
   $time  -= $day * 60 * 60 * 24;
   $hour   = floor($time / 60 / 60);
   $time  -= $hour * 60 * 60;
   $minute = floor($time / 60);
   $time  -= $minute * 60;
   $second = $time;
   $elapse = '';

   $unitArr = array('年'  =>'year', '个月'=>'month',  '周'=>'week', '天'=>'day',
                    '小时'=>'hour', '分钟'=>'minute', '秒'=>'second'
                    );

   foreach ( $unitArr as $cn => $u )
   {
       if ( $$u > 0 )
       {
           $elapse .= $$u . $cn;
           break;
       }
   }

   return $elapse;
}



	?>
<!-- start -->
@foreach($votes as $v)
	<?php
		$arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$v->id);
	        $arrys = $arry[0]->total;

	        $past = strtotime($v->end_time);      
			$now  = strtotime($v->created_at);     
			$diff = $past-$now;

	?>

<div class="col-md-4">
    <div class="entry-margin">
        <h3 class="auto-hidden"><a href="/vote/{{$v->id}}" style="color:black;">{{$v->vote_title}}</a></h3>
        <span class="glyphicon glyphicon-time"> <?php echo  time2Units($diff).'后投票结束';  ?></span>
    </div>
    <div class="carousel-image">
        <div class="entry-image">
            <a href="/vote/{{$v->id}}"><img class="image-middle" src="{{$v->vote_pic}}" height="150px" width="250" alt=""></a>
        </div>
        <div class="entry-icon" style="height:10px">
          
        </div>
    </div>
    <div class="entry-margin"><br>
        <p>
            <span class="glyphicon glyphicon-user"> 创建人：{{$v->user->user_name}}</span>
            <br><span class="glyphicon glyphicon-heart"> 总票数：{{$arrys}}</span>
            <br><span class="glyphicon glyphicon-eye-open"> 浏览量：{{$v->id*43}}</span>
        </p>
    </div>
</div >

@endforeach	
@endsection

<!-- 置顶 -->

@section('contents')
	@foreach($tops as $val)

		<?php
			$arry1 = DB::select('select  sum(vote_num) as total from options where vote_id ='.$v->id);
	        $arrys1 = $arry1[0]->total;

	        $past1 = strtotime($val->end_time);      
			$now1  = strtotime($val->created_at);     
			$diff1 = $past1-$now1;

	?>
<div class="col-md-12" style="margin-top:30px">
    <div class="entry-margin" style="width:100px;float:left">
    	<img src="{{$val->user->head_pic}}" alt="" height="80px" width="80">
       
        
    </div>
    <div style="float:left" > <h1 class="auto-hidden"><a href="/vote/{{$val->id}}"  style="color:black">{{$val->vote_title}}</a></h1>
    </div>
	
	<div style="margin-top: 100px;">
		<hr>
		<span class="glyphicon glyphicon-user"> {{$val->user->user_name}}
		</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class="glyphicon glyphicon-time"> <?php echo  time2Units($diff).'后投票结束';  ?>
		</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class="glyphicon glyphicon-eye-open"> {{$val->id*267}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 
		 <a href="/vote/{{$val->id}}"><span class="fa fa-commenting-o" style="color:green"> {{$val->id*7+9}}</span>
		</a><hr>
	</div>
    <div class="carousel-image" style="margin-top:50px;margin-left: 12%;margin-bottom:60px" >
        <div class="entry-image" >
            <a href="/vote/{{$val->id}}"><img class="image-middle" src="{{$val->vote_pic}}" height="100%" width="600" alt=""></a>
        </div>     
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    &nbsp; 无情分割线&nbsp; &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus"></span> &nbsp;
    <span class="fa fa-minus" style="margin-bottom: 66px"></span> &nbsp;
</div >

	@endforeach
@endsection
