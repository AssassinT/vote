@extends('layouts.home.index')
@section('content')

    <h3>礼物提现</h3>
            <table id='table_list' class="table table-hover">
                <tr>
                    <th>标题</th>
                    <th class="hide_phone">状态</th>
                    <th class="hide_phone">礼物总额(元)</th>
                    
                </tr>
@foreach($votes as $v)
<?php
    $arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$v->id);
        $arrys = $arry[0]->total;

    $giftnum = DB::select('select sum(price) as total from gift_gxes where zt = 4 and vote_id ='.$v->id);

        $giftnums = $giftnum[0]->total;

?>                 

                <tr class="active">
                    <td  class="hide_phone">{{$v->vote_title}}</td>
                   
                    <?php
                        $time = strtotime(substr($v->end_time,0,10));
                        $newtime = time();
                        if($time>$newtime){
                            $str = '<font color="2ecc71">投票中</font>';
                        }else{
                            $str = '<font color="red">已截止</font>';
                        }
                    ?>
                    <td class="hide_phone">{!!$str!!}</td>

                    <td class="hide_phone">{{$giftnums}}</td>
                    </td>
                </tr>
@endforeach
            </table> 
 <form action="/order" method="post">
     <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">可提现金额</span>
            <input type="text" class="form-control"  readonly aria-describedby="basic-addon1" value="{{$users->balance*0.8}}&nbsp;元" name="kt">
        </div>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">支付宝账号</span>
            <input type="text" class="form-control"   aria-describedby="basic-addon1" value="" name="info">
        </div>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">支付宝姓名</span>
            <input type="text" class="form-control"   aria-describedby="basic-addon1" value="" name="mode">
        </div>
        <br>
        <div class=" input-group col-md-4">
            <span class="input-group-addon" id="basic-addon1" style="width:82px">提现金额</span>
            <input type="text" class="form-control"   aria-describedby="basic-addon1" value="" name="money">

        </div>
        <br>
         <button name="submit" style="margin-left:80px" class="btn btn-success">确认提现</button>
          {{csrf_field()}}
 </form>   

    <script>
        $('form').submit(function(){
            if($('input[name=money]').val() > $('input[name=kt]').val()){
                alert('提现金额不能大于可提金额')
               return false;

            }
                

        })
    </script>
@endsection