<style>
#tiao{
  display:block !important;
}
</style>
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

  <!-- 轮播 -->
<style>
  .jssora05l, .jssora05r {
    display: block;
    position: absolute;
    /* size of arrow element */
    width: 40px;
    height: 40px;
    cursor: pointer;
    background: url('/home/a17.png') no-repeat;
    overflow: hidden;
  }
  .jssora05l { background-position: -10px -40px; }
  .jssora05r { background-position: -70px -40px; }

</style>

<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden; visibility: hidden; background-color: #f6f5f2;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
      <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
      
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 880px; height: 356px; overflow: hidden;">


      <div  data-p="144.50" style="display: none;">
        @foreach($votes as $k=>$v)

        <?php
        if($k==3){
          break;
        }
    $arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$v->id);
          $arrys = $arry[0]->total;

          $past = strtotime($v->end_time);      
      $now  = strtotime($v->created_at);     
      $diff = $past-$now;

  ?>
      <div style="margin-left:0px">
        
        <div class="col-md-3" style="margin-left:40px">
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


      </div>
      @endforeach
      </div>
      





      <div  data-p="144.50" style="display: none;">
      
 @foreach($votes as $k=>$v)

        <?php
        if($k<=2){
          continue;
        }
    $arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$v->id);
          $arrys = $arry[0]->total;

          $past = strtotime($v->end_time);      
      $now  = strtotime($v->created_at);     
      $diff = $past-$now;

  ?>
      <div style="margin-left:0px">
        
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


      </div>
      @endforeach

      </div>

      <a data-u="any" href="http://www.jssor.com" style="display:none">Image Gallery</a>
    </div>
    <!-- Thumbnail Navigator -->
    
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
    <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
  </div>
  <!-- #endregion Jssor Slider End -->



<script type="text/javascript">
  jQuery(document).ready(function ($) {

    var jssor_1_SlideshowTransitions = [
      {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
      {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
    ];

    var jssor_1_options = {
      $AutoPlay: true,
      $SlideshowOptions: {
      $Class: $JssorSlideshowRunner$,
      $Transitions: jssor_1_SlideshowTransitions,
      $TransitionsOrder: 1
      },
      $ArrowNavigatorOptions: {
      $Class: $JssorArrowNavigator$
      },
      $ThumbnailNavigatorOptions: {
      $Class: $JssorThumbnailNavigator$,
      $Cols: 10,
      $SpacingX: 8,
      $SpacingY: 8,
      $Align: 360
      }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*responsive code begin*/
    /*you can remove responsive code if you don't want the slider scales while window resizing*/
    function ScaleSlider() {
      var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
      if (refSize) {
        refSize = Math.min(refSize, 800);
        jssor_1_slider.$ScaleWidth(refSize);
      }
      else {
        window.setTimeout(ScaleSlider, 30);
      }
    }
    ScaleSlider();
    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    /*responsive code end*/
  });
</script>






  <!-- 轮播 -->
<!-- start -->

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
