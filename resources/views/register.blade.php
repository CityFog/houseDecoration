<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>新用户注册</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="SUI-Mobile-publish-0.6.2/dist/css/sm.css">
    <link rel="stylesheet" href="SUI-Mobile-publish-0.6.2/dist/css/sm-extend.css">
    <link rel="stylesheet" href="SUI-Mobile-publish-0.6.2/docs/assets/css/demos.css">
    <link rel="stylesheet" href="css/my.css">


</head>
<body>
<div class="page-group" id="register">
    <div id="page-layout" class="page page-current">
        <header class="bar bar-nav">
            <a class="button button-link button-nav pull-left back">
                <span class="icon icon-left"></span>
                返回
            </a>
            <h1 class="title">新用户注册</h1>
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
                                    <input type="text" placeholder="3位到20位之间" v-model="username">
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
                                    <input type="password" placeholder="请输入密码" v-model="password">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-password"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">重复密码</div>
                                <div class="item-input">
                                    <input type="password" placeholder="请再次输入密码" v-model="repeatPassword">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content-block">
                <div class="row">
                    <div class="col-100"><a href="#" class="button button-big button-fill button-success" v-on:click="register()">注册</a></div>
                </div>
            </div>
        </div>
    </div>

</div>



<script type='text/javascript' src='SUI-Mobile-publish-0.6.2/docs/assets/js/zepto.js' charset='utf-8'></script>
<script type='text/javascript' src='SUI-Mobile-publish-0.6.2/dist/js/sm.js' charset='utf-8'></script>
<script type='text/javascript' src='SUI-Mobile-publish-0.6.2/dist/js/sm-extend.js' charset='utf-8'></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.17.1/dist/axios.js"></script>


</body>
</html>


<script>
    var userInfo = {
        username: '',
        password:'',
        repeatPassword:''
    };
    var vm = new Vue({
        el: '#register',
        data: userInfo,
        methods:{
            register: function(){
                if(vm.registerCheck()){
                    $.showPreloader();
                    setTimeout(function () {
                        vm.registerRequest();
                    }, 500);
                }
            },
            registerCheck:function(){
                if(userInfo.username.length<3||userInfo.username.length>10){
                    $.alert('用户名3到20位之间');
                    return false;
                }
                if(!userInfo.password){
                    $.alert('密码不能为空');
                    return false;
                }
                if(userInfo.password!==userInfo.repeatPassword){
                    $.alert('两次密码输入不一致');
                    return false;
                }
                return true;
            },
            registerRequest: function(){
                axios.post('/customer/register', userInfo)
                    .then(function (response) {
                        $.hidePreloader();
                        if(response.data.status === 1 ){
                            $.alert('注册成功',function(){
                                //$.router.load("/login", true);
                                location.href='/login';
                            })
                        }else if( response.data.status === -1 ){
                            $.alert(response.data.msg);
                        }else{
                            $.alert('注册失败，请联系管理员')
                        }
                    })
                    .catch(function (error) {
                        $.hidePreloader();
                        $.alert('注册失败，请联系管理员')
                    });
            }
        }
    });
</script>