@extends('layouts.home.index')
@section('content')
    <style type="text/css">
        .input-group input{
            height:40px;
        }
    </style>
	<form class="am-form tpl-form-line-form" method="post" action="/proposal">
        <div class="input-group col-md-6" style="margin-left:70px; padding-top:10px;!important">
			<span class="input-group-addon" id="basic-addon1">建议标题</span>
			<input type="text" name='proposal_name' class="form-control" placeholder="请填写建议标题" aria-describedby="basic-addon1">
		</div><br>

		<div class="input-group col-md-6" style="margin-left:70px; padding-top:10px;!important">
			<span class="input-group-addon" name='vote_explain' id="basic-addon1">建议内容</span>
			<textarea class="form-control" placeholder="请填写建议内容" aria-describedby="basic-addon1" rows="6" name='proposal_content'>
			</textarea>
		</div><br>

                    
		{{csrf_field()}}
        <div class="am-form-group">
           	<div class="am-u-sm-9 am-u-sm-push-3" style="margin-left:300px; padding-top:10px;!important">
                <button class="am-btn am-btn-primary tpl-btn-bg-color-success btn" style="background-color:#1E90ff;color:white;">提交</button>
            </div>
       	</div>
        <div style="float:right;margin-top:-263px;margin-right:110px;">
            <input type="text" value="{{request()->keywords}}" name="keywords" id="keywords" style="height:33px ;" class="form-control"/>
            <input type="submit" id="searchsubmit" value="搜索" class="btn" style="background-color:#1E90ff;color:white;"/>

        </div>
    </form>
    <hr>

    <header>
        <div style="padding-left:70px;font-size:40px!important">
        <b style=" color:#666666;">建议LIST</b></div>
    </header>
    <hr>

    @foreach($proposals as $v)
        <div style="margin-left:70px; padding-top:10px;">
            <b style="font-size:22px; color:#666666;">建议标题:&nbsp;&nbsp;{{$v['proposal_name']}}</b>
            <b style="font-size:5px; color:#666666;float:right;margin-right:70px;">{{$v['created_at']}}</b>
        </div>
        <div style="margin-right:63px; padding-top:10px;">
            <p style="font-size:17px;margin-left:71px; color:#666666;">
                <b>建议内容:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$v['proposal_content']}}</p>
            <br>
        </div>
    @endforeach

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
                <div class="am-cf" style="margin-left:70px; padding-top:10px;!important">
                    <div class="am-fr" > 
                        {{ $proposals->appends(request()->all())->links() }}
                    </div>
                </div>

@endsection