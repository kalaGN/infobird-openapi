<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:33:11
 * @LastEditors: afei
 * @LastEditTime: 2020-08-17 11:35:23
 */
namespace Infobird\Openapi\Core;

/**
 * Class Util
 *
 * The common static function in here ,contain infobird code library
 */
class Util
{

        /**
     * 方舟调用
     * @param  string  $action 请求的地址
     * @param  array   $param  请求的参数
     * @param  string  $type   false post,true get
     * @return array   array
     */
    public static function verifyservice($action, $param, $type=false, $name = 'corpscope')
    {
        $param = http_build_query($param, '', '&');

        //self::writeLog($action.'::'.$param, 'fz');

        $config = self::loadConfig();
      
        $option = $config[$name.'.url'];
        $url = $option.$action;
        
        $response = self::_curl($url, $type, $param);

        self::writeLog('url::'.$url.$param.'# response::'.$response, 'openapi');

        $response = json_decode($response, true);

        return $response;
    }

    /**
     * 
     *
     * @param [type] $url
     * @param boolean $type
     * @param string $data
     * @return void
     */
    public static function _curl($url, $isget=true, $data='')
    {
        try {
            $ch2 = curl_init();
            curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 2);// 从证书中检查SSL加密算法是否存在
            curl_setopt($ch2, CURLOPT_URL, $url);
            curl_setopt($ch2, CURLOPT_HEADER, false);
            curl_setopt($ch2, CURLOPT_TIMEOUT, 30);
            if (!$isget) {
                curl_setopt($ch2, CURLOPT_POST, 1);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);
            }
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
            $orders = curl_exec($ch2);
            if ($orders == false) {
                self::writeLog('error:'.curl_error($ch2), 'curl_error');
            }
            self::writeLog('data:'.$orders, 'curl_return');
            curl_close($ch2);
            return $orders;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    

    /**
     * write log to local file
     *
     * @param [type] $message
     * @param string $file
     * @return void
     */
    public static function writeLog($message, $file = 'default')
    {
        //date_default_timezone_set("Asia/Shanghai");
        $file_name = self::getRootPath() . '/log/' . $file . date("_Y-m-d") . '.log';
        
        file_put_contents($file_name, date("Y-m-d H:i:s\n") . $message . "\n\n", FILE_APPEND);
    }

    /**
     * 
     *
     * @return void
     */
    public static function loadConfig(){

        $file = self::getRootPath().'/config.ini';
        return  parse_ini_file($file);
    }

    /**
     * for find the infobird config.ini
     *
     * @return void
     */
    public static function getRootPath()
    {
        return dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
    }
}
