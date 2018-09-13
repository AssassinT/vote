@extends('layouts.home.index')
@section('content')

<div style="">
                <header>
                        <div style="padding-left:70px;font-size:30px!important">
                            <b style="color:#666666">会员特权</b></div>
                </header><hr>
            <table style="text-align:center;margin-left:70px;!important;width:85%;">
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
                    <tr style='background:#eee;height:40px;font-size:15px;color:#666666;height:35px'>
                        <td> </td>
                        <td> <a href="/vote/create"><button class="btn btn-info "style="margin-left:3%;width:38%;height:38px"><b>返回</b></button></a></td>
                        <td >
                        <a href="/help/nonet"><button  class="btn btn-info "style="margin-left:3%;width:38%;height:38px"><b>现在购买</b></button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


@endsection
