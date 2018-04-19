@extends('layout')
@section('content')
<!-- page集合的容器，里面放多个平行的.page，其他.page作为内联页面由路由控制展示 -->
<div id="index">
    <div class="page-group">
        <!-- 单个page ,第一个.page默认被展示-->
        <div class="page">
            <!-- 标题栏 -->
            <header class="bar bar-nav">
                <a class="icon icon-me pull-left open-panel"></a>
                <h1 class="title">首页</h1>
            </header>

            <!-- 工具栏 -->
            <nav class="bar bar-tab">
                <a class="tab-item external active" href="#">
                    <span class="icon icon-home"></span>
                    <span class="tab-label">首页</span>
                </a>
                <a class="tab-item external" href="#">
                    <span class="icon icon-star"></span>
                    <span class="tab-label">收藏</span>
                </a>
                <a class="tab-item external" href="#">
                    <span class="icon icon-settings"></span>
                    <span class="tab-label">设置</span>
                </a>
            </nav>

            <!-- 这里是页面内容区 -->
            <div class="content">
                <div class="content-block">这里是content</div>
            </div>
        </div>

        {{--<!-- 其他的单个page内联页（如果有） -->
        <div class="page">...</div>--}}
    </div>

    <!-- popup, panel 等放在这里 -->
    <div class="panel-overlay"></div>
    <!-- Left Panel with Reveal effect -->
    <div class="panel panel-left panel-reveal" >
        <div class="content-block">
            <h4>用户名: @{{username}}</h4>
            <h4>QQ：@{{qq}}</h4>
            <h4>邮箱：@{{mail}}</h4>
            <p><a href="/password" class="close-panel">修改密码</a></p>
            <template v-if="username">
            <p><a href="#" class="close-panel" v-on:click="logout">退出登录</a></p>
            </template>
            <!-- Click on link with "close-panel" class will close panel -->
        </div>
    </div>
</div>
@stop


<script>
    window.onload = function(){
        var userInfo = {
            username: '',
            qq:'',
            mail:''
        };
        var vm = new Vue({
            el: '#index',
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
                                userInfo.qq = response.data.data.qq;
                                userInfo.mail = response.data.data.mail;
                            }else {
                                //location.href='/login';
                            }
                        })
                },
                logout:function(){
                    axios.post('/customer/logout')
                        .then(function (response) {
                            location.reload();
                        })
                        .catch(function(){
                            location.reload();
                        })
                }


            }
        });
    }
</script>