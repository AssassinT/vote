@extends('layouts.home.index')
@section('content')
  <style>
        .pagination{
            padding-left: 0;
            margin: 1.5rem 0;
            list-style: none;
            color: #999;
            text-align: left;
            padding: 0;
        }

        .pagination li{
            display: inline-block;
        }
        .pagination li a, .pagination li span{
            color: #23abf0;
            border-radius: 3px;
            padding: 6px 12px;
            position: relative;
            display: block;
            text-decoration: none;
            line-height: 1.2;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 0;
            margin-bottom: 5px;
            margin-right: 5px;
        }

        .pagination .active span{
            color: #23abf0;
            border-radius: 3px;
            padding: 6px 12px;
            position: relative;
            display: block;
            text-decoration: none;
            line-height: 1.2;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 0;
            margin-bottom: 5px;
            margin-right: 5px;
            background: #23abf0;
            color: #fff;
            border: 1px solid #23abf0;
            padding: 6px 12px;
        }
    </style>
    <h3>提现记录</h3>
        
            <table id='table_list' class="table table-hover">
                <tr>
                    <th>订单ID</th>
                    <th class="hide_phone">提现金额</th>
                    <th class="hide_phone">收款用户名</th>
                    <th class="hide_phone">收款账号</th>
                    <th class="hide_phone">订单状态</th>
                    <th class="hide_phone">提现时间</th>
                </tr>
    @foreach($orders as $v)
                <tr class="active">

                    <td  class="hide_phone">{{$v->id}}</td>
                    <td class="hide_phone">{{$v->money}}</td>
                    <td  class="hide_phone">{{$v->mode}}</td>
                    <td  class="hide_phone">{{$v->info}}</td>
                    
                    <td  class="hide_phone">{{$v->statue == 0 ? '支付中' : '已支付' }}</td>
                    
                    <td class="hide_phone">{{$v->updated_at}}</td>
                </tr>
    @endforeach
            </table> 
               <style>
        .am-cf ul{
            margin-top:0px !important;
        }
    </style>
    <div class="am-cf" style="height:40px !important;">
        <div class="am-fr" style="float:right;height:40px !important;"> 
            {{ $orders->appends(request()->all())->links() }}
        </div>
    </div>
@endsection