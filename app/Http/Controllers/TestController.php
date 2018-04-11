<?php
/**
 * Created by PhpStorm.
 * User: Simple
 * Date: 2018/3/11
 * Time: 10:19
 */
namespace App\Http\Controllers;
use App\Customer;
use redis;

class TestController extends Controller{
    public function hello(){


        $redis = new redis();
        $redis->connect('127.0.0.1',6379);
        $result = $redis->set('b:bad',119);
        var_dump($result);
        echo "<br>";
        echo $redis->get('b:bad');
die;
        phpinfo();die;

        $customer = new Customer();
        dd($customer);die;
        echo "<pre>";
        print_r( $customer);
//        return Customer::all();
    }
    public function login(){
        $data = [
            'msg' => '很好',
            'status' => 1,
            'data' => []
        ];
        echo 123;die;
        //return json_encode($data);
    }
}