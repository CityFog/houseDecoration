<?php
/**
 * Created by PhpStorm.
 * User: Simple
 * Date: 2018/3/11
 * Time: 12:12
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{

//      protected $table = "customers";  //默认
//      protected $primaryKey ="id";    //默认
//      public $timestamps = true;      //默认
      /*自动填充的时间格式*/
      protected function getDateFormat() {
          return time();
      }
}