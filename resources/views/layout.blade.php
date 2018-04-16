<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','默认标题')</title>
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

    @yield('content')

<script type='text/javascript' src='SUI-Mobile-publish-0.6.2/docs/assets/js/zepto.js' charset='utf-8'></script>
<script type='text/javascript' src='SUI-Mobile-publish-0.6.2/dist/js/sm.js' charset='utf-8'></script>
<script type='text/javascript' src='SUI-Mobile-publish-0.6.2/dist/js/sm-extend.js' charset='utf-8'></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.17.1/dist/axios.js"></script>


</body>
</html>

