<?php
/**
 * Created by PhpStorm.
 * User: chenxinghua
 * Date: 2018/4/11
 * Time: 14:02
 */

namespace App\Http\Controllers;
use App\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use Libraries\ResponseFormat;
class CustomerController extends Controller {
    public function register(Request $request){
        $username = $request->input('username');
        $password = md5($request->input('password'));
        $repeatPassword = md5($request->input('repeatPassword'));
        if($password!=$repeatPassword) {
            $response = ResponseFormat::failedFormatDataWithMsg('两次密码输入不一致');
        }else{
            $where = [
                'username' => $username,
                'status' => 1
            ];
            $exist = Customer::where($where)->count();
            if($exist){
                $response = ResponseFormat::failedFormatDataWithMsg('用户已存在');
            }else{
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
            }
        }
        //虽然laravel会自动将数组转换为json，但是还是显示的写出来好一些
        return response()->json($response);
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = md5($request->input('password'));

        $where = [
            'username' => $username,
            'status' => 1
        ];
        $exist = Customer::where($where)->count();
        if(!$exist){
            $response = ResponseFormat::failedFormatDataWithMsg('用户不存在');
        }else{
            $where = [
                'username' => $username,
                'password' => $password,
                'status' => 1
            ];
            $customer = Customer::where($where)->first();
            if($customer){
                $userInfo = $customer->toArray();
                $loginIp = $request->getClientIp();
                $loginTime = time();

                $_SESSION['user_id'] = $userInfo['id'];
                $_SESSION['username'] = $userInfo['username'];
                $_SESSION['mail'] = $userInfo['mail'];
                $_SESSION['qq'] = $userInfo['qq'];
                $_SESSION['current_login_ip'] = $loginIp;
                $_SESSION['current_login_time'] = $loginTime;
                $_SESSION['login_count'] = $userInfo['login_count'];

                $customer->last_login_ip = $userInfo['current_login_ip'];
                $customer->last_login_time = $userInfo['current_login_time'];
                $customer->current_login_ip = $loginIp;
                $customer->current_login_time = $loginTime;
                $customer->login_count = $userInfo['login_count']++;
                $customer->save();
                $response = ResponseFormat::successFormatData();
            }else{
                $response = ResponseFormat::failedFormatDataWithMsg('密码不正确');
            }
        }
        return response()->json($response);
    }
}