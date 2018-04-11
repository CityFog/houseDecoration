<?php
/**
 * Created by PhpStorm.
 * User: chenxinghua
 * Date: 2018/4/11
 * Time: 14:02
 */

namespace app\Http\Controllers;
class CustomerController extends Controller {
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