<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('index',function(){
    return view('index', ['name' => 'James']);
});

Route::get('login',function(){
    return view('login');
});

Route::get('register',function(){
    return view('register');
});

Route::match(['get','post'],'customer/register',
    ['uses'=>'CustomerController@register']
);

Route::match(['get','post'],'test',
    function(){
    return view('test');
    }
);


/*
Route::get('index',
    ['uses'=>'IndexController@index']
);
*/