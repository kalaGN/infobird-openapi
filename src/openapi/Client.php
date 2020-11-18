<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-14 13:33:11
 * @LastEditors: afei
 * @LastEditTime: 2020-11-18 16:49:51
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

    //
    private $passKey;

    
    /**
     * 
     *
     * @param [type] $token
     * @param [type] $systemId
     * @param [type] $corpType
     */
    public function __construct($token,$systemId='',$corpType=1, $corpId=0)
    {
        $this->token=$token;
        $this->systemId=$systemId;
        $this->corpType = $corpType;
        $this->corpId = $corpId;
    }

    public function setSecret($passkey){
        $this->passKey = $passkey;
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
        try{
            $info =  Util::callRemote('v1/auth/verfytoken/?', $params, false, 'openapi');

        }catch(\Exception $e){
            echo $e->getMessage();exit;
        }

        if($info){
            return $info;
        }else{
            return false;
        }
    }

    public function authtoken()
    {
        $time = time();      
        if (empty($this->passKey)) {
            return 'no auth to access!';
            exit;
        
        }
      
        if (empty($this->systemId)) {
            return 'systemId is empty!';
            exit;
        }
        $sign = sha1($this->systemId.$this->passkey.$time);
        $params = array(
            'token'=>$this->token,
            'enterprise_identify'=>$this->corpId,
            'isfz'=>$this->corpType,
            'system_identify'=>$this->systemId,
            'time'=>$time,
            'sign'=>$sign
        );
        //调用用户中心鉴权接口
        try{
            $info =  Util::callRemote('ver1/auth/verfytoken/?', $params, false, 'openapi');

        }catch(\Exception $e){
            echo $e->getMessage();exit;
        }

        if($info){
            return $info;
        }else{
            return false;
        }
    }

    public function getpriv(){
        $time = time();      
        if (empty($this->passKey)) {
            return 'no auth to access!';
            exit;
        
        }
      
        if (empty($this->systemId)) {
            return 'systemId is empty!';
            exit;
        }
        $sign = sha1($this->systemId.$this->passkey.$time);
        $params = array(
            'token'=>$this->token,
            'enterprise_identify'=>$this->corpId,
            'isfz'=>$this->corpType,
            'system_identify'=>$this->systemId,
            'time'=>$time,
            'sign'=>$sign
        );
        //调用用户中心鉴权接口
        try{
            $info =  Util::callRemote(' v2/rbac/getaccountprivlist/?', $params, false, 'openapi');

        }catch(\Exception $e){
            echo $e->getMessage();exit;
        }
        if($info){
            return $info;
        }else{
            return false;
        }
    }
}
