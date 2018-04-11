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

class IndexController extends Controller{
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