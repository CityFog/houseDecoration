<?php
/**
 * Created by PhpStorm.
 * User: chenxinghua
 * Date: 2018/4/13
 * Time: 16:33
 */

namespace Libraries;
class ResponseFormat {

    const STATUS_SUCCESS = 1;
    const STATUS_FAILED = 0;
    const STATUS_FAILED_INFO = -1;

    private static $response = [
        'status' => '',
        'code'   => '',
        'msg'    => '',
        'data'   => []
    ];

    /**
     * @date
     * @description 设置当前成功状态数组，并返回
     * @author cxh
     * @param array $data
     * @param string $msg
     * @param string $code
     * @return array
     */
    public static function successFormatData(array $data = [], $msg = '请求成功！',  $code = '') {
        $response = [
            'status' => self::STATUS_SUCCESS,
            'code'   => $code,
            'msg'    => $msg,
            'data'   => $data
        ];
        self::$response = $response;
        return $response;
    }

    /**
     * @date
     * @description 设置当前失败状态数组，并返回
     * @author cxh
     * @param array $data
     * @param string $msg
     * @param string $code
     * @return array
     */
    public static function failedFormatData(array $data = [],$msg = '请求失败！',$code = '') {
        $response = [
            'status' => self::STATUS_FAILED,
            'code'   => $code,
            'msg'    => $msg,
            'data'   => $data
        ];
        self::$response = $response;
        return $response;
    }

    /**
     * @date
     * @description 设置当前失败状态数组，并需要输入失败信息
     * @author cxh
     * @param array $data
     * @param string $msg
     * @param string $code
     * @return array
     */
    public static function failedFormatDataWithMsg($msg,array $data = [],$code = '') {
        $response = [
            'status' => self::STATUS_FAILED_INFO,
            'code'   => $code,
            'msg'    => $msg,
            'data'   => $data
        ];
        self::$response = $response;
        return $response;
    }

    /**
     * @date
     * @description 设置所有数据数组，并返回
     * @author cxh
     * @param array $data
     * @param $status
     * @param $msg
     * @param string $code
     * @return array
     */
    public static function allFormatData($status, $msg, array $data = [], $code = '') {
        $response = [
            'status' => $status,
            'code'   => $code,
            'msg'    => $msg,
            'data'   => $data
        ];
        self::$response = $response;
        return $response;
    }

    /**
     * @date
     * @description 获取当前数组
     * @author cxh
     * @return array
     */
    public static function getCurrentFormatData() {
        return self::$response;
    }

}