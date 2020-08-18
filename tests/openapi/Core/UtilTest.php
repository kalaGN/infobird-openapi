<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-18 15:05:24
 * @LastEditors: afei
 * @LastEditTime: 2020-08-18 15:07:02
 */

namespace Infobird\Tests;

class UtilTest extends \PHPUnit_Framework_TestCase
{



    public function testParseValidXml()
    {
        $response = new ResponseCore(array(), $this->validXml, 200);
        $result = new AclResult($response);
        $this->assertEquals("public-read", $result->getData());
    }

 
}



