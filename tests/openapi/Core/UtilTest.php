<?php
/*
 * @Descripttion: infobird
 * @version: 1.0
 * @Author: afei
 * @Date: 2020-08-18 15:05:24
 * @LastEditors: afei
 * @LastEditTime: 2020-11-19 15:39:35
 */

namespace Infobird\Tests;
use \Infobird\Openapi\Core\Util;
class UtilTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @coversNothing
     */
    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }


    /**
     * @depends testProducerFirst
     */
    public function testcallRemote($action, $param='', $type=false, $name = 'corpscope')
    {

        $this->assertFalse(Util::callRemote('',''));
        $this->assertEquals(
            ['first'],
            func_get_args()
        );
       
    }


     /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }

 
}



