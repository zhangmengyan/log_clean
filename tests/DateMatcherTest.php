<?php
namespace LogCleanTest;

use LogClean\DateMatcher;

/**
 * Created by PhpStorm.
 * User: zhangxing
 * Date: 2016/7/19
 * Time: 15:52
 */
class DateMatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testMatch()
    {
        $filename = "log_20160719";
        DateMatcher::match($filename, "Ymd");

        $filename = "log_2016-07-19";
        DateMatcher::match($filename, "Y-m-d");

        $filename = "log_16_07_19";
        DateMatcher::match($filename, "y_m_d");
    }
}