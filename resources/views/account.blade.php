@extends('layout')
@section('title')
    账户设置
@stop
@section('content')
<div class="page-group" id="login">
    <div id="page-layout" class="page page-current">
        <header class="bar bar-nav">
            <a class="button button-link button-nav pull-left back">
                <span class="icon icon-left"></span>
                返回
            </a>
            <h1 class="title">账户设置</h1>
        </header>
        <div class="content native-scroll">
            <div class="list-block">
                <ul>
                    <!-- Text inputs -->
                    <li>
                        <div class="item-content">
                            <div class="item-media">
                                <i class="icon icon-form-name"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">用户名</div>
                                <div class="item-input">
                                    <input type="text" placeholder="" v-model="username">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-password "></i></div>
                            <div class="item-inner">
                                <div class="item-title label">密码</div>
                                <div class="item-input">
                                    <input type="password" placeholder="" v-model="password">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content-block">
                <div class="row">
                    <div class="col-100"><a href="#" class="button button-big button-fill button-success" v-on:click="login()">登录</a></div>
                </div>
                <div class="row_top">
                    <a href="/register" class=" pull-right close-popup">注册新用户</a>
                </div>
            </div>
        </div>
    </div>

</div>
@stop



<script>
    window.onload = function(){
        var userInfo = {
            username: '',
            password:''
        };
        var vm = new Vue({
            el: '#login',
            data: userInfo,
            methods:{
               login: function(){
                   if(vm.loginCheck()){
                       $.showPreloader();
                       setTimeout(function () {
                           vm.loginRequest();
                       }, 500);
                   }
               },
               loginCheck:function(){
                   if(!userInfo.username){
                       $.alert('用户名不能为空');
                       return false;
                   }
                   if(!userInfo.password){
                       $.alert('密码不能为空');
                       return false;
                   }
                   return true;
               },
               loginRequest: function(){
                   axios.post('/customer/login', userInfo)
                       .then(function (response) {
                           $.hidePreloader();
                           if(response.data.status === 1 ){
                               if(document.referrer){
                                   location.href = document.referrer;
                               }else{
                                   location.href = '/index';
                               }
                           }else if( response.data.status === -1 ){
                               $.alert(response.data.msg);
                           }else{
                               $.alert('登录失败')
                           }
                       })
                       .catch(function (error) {
                           $.hidePreloader();
                           $.alert('登录失败，请联系管理员')
                       });
               }
            }
        })
    }
</script>