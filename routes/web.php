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
/*------------------------------------*/
Route::get('index',function(){
    return view('index');
});


Route::get('register',function(){
    return view('register');
});


Route::get('login',function(){
    return view('login');
});


Route::get('account',function(){
    return view('account');
});

Route::get('password',function(){
    return view('password');
});

Route::match(['get','post'],'customer/login',
    ['uses'=>'CustomerController@login']
);


Route::match(['get','post'],'customer/register',
    ['uses'=>'CustomerController@register']
);

Route::match(['get','post'],'customer/password',
    ['uses'=>'CustomerController@password']
);

Route::match(['post'],'customer/getCustomerInfo',
    ['uses'=>'CustomerController@getCustomerInfo']
);

/*------------------------------------*/



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