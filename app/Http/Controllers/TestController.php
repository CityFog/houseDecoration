<?php
/**
 * Created by PhpStorm.
 * User: Simple
 * Date: 2018/3/11
 * Time: 10:19
 */
namespace App\Http\Controllers;
use App\Customer;

class TestController extends Controller{
    public function hello(){


        $customer = new Customer();
        dd($customer);die;
        echo "<pre>";
        print_r( $customer);
//        return Customer::all();
    }
}