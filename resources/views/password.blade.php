@extends('layout')
@section('title')
    修改密码
@stop
@section('content')
<div class="page-group" id="register">
    <div id="page-layout" class="page page-current">
        <header class="bar bar-nav">
            <a class="button button-link button-nav pull-left back">
                <span class="icon icon-left"></span>
                返回
            </a>
            <h1 class="title">修改密码</h1>
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
                                <div class="item-title label">当前用户</div>
                                <div class="item-input">
                                    <p v-text="username"></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-password "></i></div>
                            <div class="item-inner">
                                <div class="item-title label">原密码</div>
                                <div class="item-input">
                                    <input type="password" placeholder="请输入原密码" v-model="oldPassword">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-password"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">新密码</div>
                                <div class="item-input">
                                    <input type="password" placeholder="6到20位之间" v-model="newPassword">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content-block">
                <div class="row">
                    <div class="col-100"><a href="#" class="button button-big button-fill button-warning" v-on:click="modifyPassword()">确认修改</a></div>
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
            oldPassword:'',
            newPassword:''
        };
        var vm = new Vue({
            el: '#register',
            data: userInfo,
            mounted: function(){
                //为了使用vm实例
                this.$nextTick(function(){
                    vm.initData();
                })
            },
            methods:{
                initData: function(){
                    {{--获取用户基本信息--}}
                    axios.post('/customer/getCustomerInfo')
                        .then(function (response) {
                            if(response.data.status === 1 ){
                                userInfo.username = response.data.data.username;
                            }else {
                                location.href='/login';
                            }
                        })
                },
                modifyPassword: function(){
                    if(vm.modifyPasswordCheck()){
                        $.showPreloader();
                        setTimeout(function () {
                            vm.modifyPasswordRequest();
                        }, 500);
                    }
                },
                modifyPasswordCheck:function(){
                    if(userInfo.newPassword.length<6||userInfo.newPassword.length>20){
                        $.alert('新密码6到20位之间');
                        return false;
                    }
                    return true;
                },
                modifyPasswordRequest: function(){
                    axios.post('/customer/password', userInfo)
                        .then(function (response) {
                            $.hidePreloader();
                            if(response.data.status === 1 ){
                                $.alert('修改成功',function(){
                                    userInfo.oldPassword = '';
                                    userInfo.newPassword = '';
                                })
                            }else if( response.data.status === -1 ){
                                $.alert(response.data.msg);
                            }else{
                                $.alert('修改失败，请联系管理员')
                            }
                        })
                        .catch(function (error) {
                            $.hidePreloader();
                            $.alert('修改失败，请联系管理员')
                        });
                }
            }
        });
    }
</script>