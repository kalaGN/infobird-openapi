<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:33:11
 * @LastEditors: afei
 * @LastEditTime: 2020-08-17 17:52:40
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
    //
    private $token;

    //
    private $systemId;
    
    //
    private $corpType;

    /**
     * 
     *
     * @param [type] $token
     * @param [type] $systemId
     * @param [type] $corpType
     */
    public function __construct($token,$systemId='',$corpType=1)
    {
        $this->token=$token;
        $this->systemId=$systemId;
        $this->corpType = $corpType;
    }

    public function auth()
    {

        $params = array(
            'token'=>$this->token,
            //'enterprise_identify'=>$corp_id,
            'isfz'=>$this->corpType,
            'system_identify'=>$this->systemId,
        );
        //调用用户中心鉴权接口
        $info =  Util::callRemote('v1/auth/verfytoken/?', $params, false, 'openapi');

        if($info){
            return $info;
        }else{
            return false;
        }
    }
}
