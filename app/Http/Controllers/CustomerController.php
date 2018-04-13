<?php
/**
 * Created by PhpStorm.
 * User: chenxinghua
 * Date: 2018/4/11
 * Time: 14:02
 */

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use Libraries\ResponseFormat;
class CustomerController extends Controller {
    public function register(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        //$password = md5($password.'cxh');
        $repeatPassword = $request->input('repeatPassword');
        $registerIp = $request->getClientIp();
        $registerTime = time();

        $customer = new Customer();
        $customer->username = $username;
        $customer->password = $password;
        $customer->register_ip = $registerIp;
        $customer->register_time = $registerTime;
        $customer->status = 1;
        $result = $customer->save();
        if($result){
            $response = ResponseFormat::successFormatData();
        }else{
            $response = ResponseFormat::failedFormatData();
        }
        //虽然laravel会自动将数组转换为json，但是还是显示的写出来好一些
        return response()->json($response);
    }
}