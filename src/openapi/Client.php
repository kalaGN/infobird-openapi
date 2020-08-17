<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:33:11
 * @LastEditors: afei
 * @LastEditTime: 2020-08-17 11:22:24
 */
namespace Infobird\Openapi;

use Infobird\Openapi\Core\Util;

/**
 * Clase Client
 *
 * Object store infobird openapi client class.
 */
class Client
{
    public function __construct()
    {
        //echo 'hello'
    }

    public function auth($token='tokenstr',$corp_id=0)
    {

        $params = array(
            'token'=>$token,
            'enterprise_identify'=>$corp_id,
            'isfz'=>0
        );
        //调用用户中心鉴权接口
        $info =  Util::verifyservice('v1/auth/verfytoken/?', $params, false, 'openapi');

        if($info){
            return $info;
        }else{
            return false;
        }
    }
}
