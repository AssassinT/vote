@extends('layouts.home.index')
@section('content')

<div class="col-md-10 col-md-offset-1 col-sm-12">
                <header>
                        <div style="font-size:30px!important">
                            <b style="color:#666666">会员特权</b></div>
                </header><hr>
            <table class="" style="width:100%;text-align:center;!important;">
                <thead style="padding-left:70px;">
                    <tr style="font-size:18px;width:85px;height:45px">
                        <th style="background: #ffffff;"></th>
                        <th style="background: #5bc0de;text-align:center;color:#fff"><b>普通用户</b></th>&nbsp
                        <th style="background: #5bc0de;text-align:center;color:#fff"><b>会员</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>上传头像</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>创建投票</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr >
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>选项图片</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px' >
                        <td>选项视频</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>选项简介</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>单选/多选</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>多选限制</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>投票评论</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>首页置顶</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>投票广告</td>
                        <td><b style="color:red">显示</b></td>
                        <td><b style="color:#33CCFF">可关闭</b></td>
                    </tr>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>投票密码</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>票数上限</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>允许重复投票</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>投票后显示结果</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>只能在微信里投票</td>
                        <td>支持</td>
                        <td>支持</td>
                    </tr>
                 
                    <tr style='height:40px;font-size:15px;color:#666666;height:35px'>
                        <td>所需费用</td>
                        <td>免费</td>
                        <td><h4 style="color:#33CCFF">40元/月</h4></td>
                    </tr>
                        
                </tbody>
            </table>
            <div class="col-md-8 col-md-offset-2" >
                <button style="float:left;" class="btn btn-info" onclick="window.history.go(-1)"><b>返回</b></button>
                <a href="/help/nonet"><button style="float:right" class="btn btn-info">现在购买</button></a>
            </div>
            <div class="col-md-12" style="height:40px"></div>
        </div>


@endsection
