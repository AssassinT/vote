@extends('layouts.home.index')
@section('content')
			<a href="/vote/create"><button type="button" class="btn btn-warning">创建投票</button></a>
			<a href="/vote"><button type="button" class="btn btn-warning">投票管理</button></a>
	<div style="height:30px"></div>
<!-- start -->
<div class="col-md-4">
                        <div class="entry-margin">
                            <h6 class="auto-hidden"><a href="/Vote/36533">{{$votes[0]->vote_title}}</a></h6>
                            <span>
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

$past = strtotime($votes[0]->end_time);      // Some timestamp in the past
$now  = strtotime($votes[0]->created_at);     // Current timestamp
$diff = $past-$now;

$past1 = strtotime($votes[1]->end_time);      // Some timestamp in the past
$now1  = strtotime($votes[1]->created_at);     // Current timestamp
$diff1 = $past1-$now1;

$past2 = strtotime($votes[2]->end_time);      // Some timestamp in the past
$now2  = strtotime($votes[2]->created_at);     // Current timestamp
$diff2 = $past2-$now2;
echo  time2Units($diff2).'后投票结束';

						?>
					</span>
                        </div>

                        
                        <div class="carousel-image">
                            
                            <div class="entry-image">
                                
                                <a href="/Vote/36533"><img class="image-middle" src="/login/images/0022.jpg" height="150px" width="250" alt=""></a>
                                
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
                                创建人： {{$votes[0]->user->user_name}}<br>
                                总票数：374<br>
                                浏览量：1583
                            </p>
                        </div>
                    </div>
<div class="col-md-4">
                        <div class="entry-margin">
                            <h6 class="auto-hidden"><a href="/Vote/36533">{{$votes[1]->vote_title}}</a></h6>
                            <span><?php echo  time2Units($diff1).'后投票结束'; ?> </span>
                        </div>

                        
                        <div class="carousel-image">
                            
                            <div class="entry-image">
                                
                                <a href="/Vote/36533"><img class="image-middle" src="/login/images/0022.jpg" height="150px" width="250" alt=""></a>
                                
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
                                创建人： {{$votes[1]->user->user_name}}<br>
                                总票数：374<br>
                                浏览量：1583
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="entry-margin">
                            <h6 class="auto-hidden"><a href="/Vote/36533">{{$votes[2]->vote_title}}</a></h6>
                            <span><?php echo  time2Units($diff2).'后投票结束'; ?></span>
                        </div>

                        
                        <div class="carousel-image">
                            
                            <div class="entry-image">
                                
                                <a href="/Vote/36533"><img class="image-middle" src="/login/images/0022.jpg" height="150px" width="250" alt=""></a>
                                
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
                                创建人：{{$votes[2]->user->user_name}}<br>
                                总票数：374<br>
                                浏览量：1583
                            </p>
                        </div>
                    </div>               




@endsection