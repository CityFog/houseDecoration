<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.17.1/dist/axios.js"></script>

</head>
<body>

    <div id="app">
        <p>@{{ foo }}</p>
        <!-- 这里的 `foo` 不会更新！ -->
        <button v-on:click="login()">Change it</button>
    </div>
</body>
</html>

<script>
    var obj = {
        foo: 'bar'
    }
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