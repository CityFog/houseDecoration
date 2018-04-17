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

                $session = [
                    'user_id'=>$userInfo['id'],
                    'username'=>$userInfo['username'],
                    'password'=>$userInfo['password'],
                    'mail'=>$userInfo['mail'],
                    'qq'=>$userInfo['qq'],
                    'current_login_ip'=>$loginIp,
                    'current_login_time'=>$loginTime,
                    'login_count'=>$userInfo['login_count'],
                ];
                $request->session()->put($session);
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


    /**
     * @date
     * @description 修改密码
     * @author cxh
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function password(Request $request){
        $userId = $request->session()->get('user_id');
        if(!$userId){
            $response = ResponseFormat::failedFormatDataWithMsg('用户未登录');
        }else{
            $oldPassword = md5($request->input('oldPassword'));
            $newPassword = md5($request->input('newPassword'));
            if($oldPassword!==$request->session()->get('password')){
                $response = ResponseFormat::failedFormatDataWithMsg('原密码不正确');
            }else{
                $where = [
                    'id' => $userId,
                    'password' => $oldPassword
                ];
                $result = Customer::where($where)->update(['password'=>$newPassword]);
                if($result){
                    $request->session()->put('password',$newPassword);
                    $response = ResponseFormat::successFormatData();
                }else{
                    $response = ResponseFormat::failedFormatData();
                }
            }
        }
        return response()->json($response);
    }


    public function getCustomerInfo(Request $request){
        $session = $request->session()->all();
        if(!$session['user_id']){
            $response = ResponseFormat::failedFormatDataWithMsg('用户未登录');
        }else{
            $data['username']  = $session['username'];
            $data['qq']  = $session['qq'];
            $data['mail']  = $session['mail'];
            $response = ResponseFormat::successFormatData($data);
        }
        return $response;
    }

    /*public function getCustomerInfo(Request $request){
        $userId = $request->session()->get('user_id');
        if(!$userId){
            $response = ResponseFormat::failedFormatDataWithMsg('用户未登录');
        }else{
            $where = [
                'id' => $userId,
                'status' => 1
            ];
            $customer = Customer::where($where)->first();
            if(!$customer){
                $response = ResponseFormat::failedFormatDataWithMsg('该用户不存在');
            }else{
                $data['username'] = $customer['username']
                $response = ResponseFormat::successFormatData($customer);
            }
        }
        return $response;
    }*/
}