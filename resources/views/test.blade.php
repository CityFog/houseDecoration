
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的生活</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

</head>
<body>
<div class="page">

    <header class="bar bar-nav">
        <a class="button button-link button-nav pull-left" href="/demos/card" data-transition='slide-out'>
            <span class="icon icon-left"></span>
            返回
        </a>
        <h1 class="title">我的生活</h1>
    </header>
    <nav class="bar bar-tab">
        <a class="tab-item active" href="#">
            <span class="icon icon-home"></span>
            <span class="tab-label">首页</span>
        </a>

        <a class="tab-item" href="#">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-star"></span>
            <span class="tab-label">收藏</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-settings"></span>
            <span class="tab-label">设置</span>
        </a>
    </nav>
    <div class="content">
        <div class="page-index">
            <div id="app">
                <input type="text" v-text="foo" value="">
                <p v-text="foo">@{{ foo }}</p>
                <!-- 这里的 `foo` 不会更新！ -->
                <button v-on:click="foo = 'baz'">Change it</button>
            </div>
            <div class="card">
                <div style="background-image:url(//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250.3.0q60.jpg)" valign="bottom" class="card-header color-white no-border">旅途的山</div>
                <div class="card-content">
                    <div class="card-content-inner">
                        <p class="color-gray">发表于 2015/01/15</p>
                        <p>此处是内容...</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="link">赞</a>
                    <a href="#" class="link">更多</a>
                </div>
            </div>
            <div class="card">
                <div style="background-image:url(//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250.3.0q60.jpg)" valign="bottom" class="card-header color-white no-border">旅途的山</div>
                <div class="card-content">
                    <div class="card-content-inner">
                        <p class="color-gray">发表于 2015/01/15</p>
                        <p>此处是内容...</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="link">赞</a>
                    <a href="#" class="link">更多</a>
                </div>
            </div>
            ... 可以多放几张卡片
        </div>
    </div>
</div>
{{--<div class="page-group">
    <div class="page page-current">

    </div>
</div>--}}
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.17.1/dist/axios.js"></script>


<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>

</body>
</html>


<script>
    var obj = {
        foo: 'bar'
    };
    new Vue({
        el: '#app',
        data: obj,
        methods:{
           login: function(){

               axios.post('/customer/login', {
                   firstName: 'Fred',
                   lastName: 'Flintstone'
               })
               .then(function (response) {
                   console.log(response.data);
               })
               .catch(function (error) {
                   console.log(error);
               });
           }
        }
    })
</script>