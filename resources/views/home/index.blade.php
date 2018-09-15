@extends('layouts.home.index') @section('content')
<a href="/vote/create">
    <button type="button" class="btn btn-warning">创建投票</button>
</a>
<a href="/vote">
    <button type="button" class="btn btn-warning">投票管理</button>
</a>
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
        <h6 class="auto-hidden"><a href="/vote/{{$v->id}}">{{$v->vote_title}}</a></h6>
        <span> <?php echo  time2Units($diff).'后投票结束';  ?></span>
    </div>
    <div class="carousel-image">
        <div class="entry-image">
            <a href="/vote/{{$v->id}}"><img class="image-middle" src="{{$v->vote_pic}}" height="150px" width="250" alt=""></a>
        </div>
        <div class="entry-icon">
            <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    
                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    
                                </span>
        </div>
    </div>
    <div class="entry-margin">
        <p>
            创建人： {{$v->user->user_name}}
            <br> 总票数：{{$arrys}}
            <br> 浏览量：1583
        </p>
    </div>
</div>
@endforeach
@endsection