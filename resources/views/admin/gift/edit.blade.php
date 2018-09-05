@extends('layouts.admin')
@section('content')
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 分类更新
                    </div>
                    


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form action="/gift/{{$gifts['id']}}" method="post" class="am-form am-form-horizontal">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">礼物名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" value="{{$gifts['gift_name']}}" name="gift_name">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">礼物价格</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" value="{{$gifts['price']}}" name="price">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">礼物图片</label>
                                    <div class="am-u-sm-9" style='font-size:13px;'>
                                        <input type="file"  id="file" value="{{$gifts['gift_pic']}}" name="gift_pic">
                                    </div>
                                </div>



                               
                                

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary">提交更新</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>
@endsection