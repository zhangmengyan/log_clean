<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/14
 * Time: 14:39
 */

namespace LogClean;

class DateMatcher
{
    private static $type_patterns = array(
        "Ymd" => "/(\\d{4})(\\d{2})(\\d{2})/",
        "Y-m-d" => "/(\\d{4})-(\\d{2})-(\\d{2})/",
        "y_m_d" => "/(\\d{2})_(\\d{2})_(\\d{2})/"
    );

    public static function match($file_name, $type)
    {
        if(!isset(self::$type_patterns[$type])) {
            throw new \Exception("not support type " . $type);
        }

        $pattern = self::$type_patterns[$type];

        if(preg_match($pattern, $file_name, $matches) == 0) {
            throw new \Exception("not match");
        }

        if(count($matches) < 4) {
            throw new \Exception("matches len error");
        }

        $year = $matches[1];
        if($year < 100) {
            $year = substr(date("Y"), 0, 2) . $year;
        }

        $month = $matches[2];
        $day = $matches[3];

        return strtotime($year . "-" . $month . "-" . $day);
    }
}