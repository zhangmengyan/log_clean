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
        if (!isset(self::$type_patterns[$type])) {
            throw new \Exception("not support type " . $type);
        }

        $pattern = self::$type_patterns[$type];

        if (preg_match($pattern, $file_name, $matches) == 0) {
            throw new \Exception("not match filename:" . $file_name);
        }

        if (count($matches) < 2) {
            throw new \Exception("matches len error : " . implode(";", $matches));
        }

        // 年
        $year = $matches[1];
        if ($year < 100) {
            $year = substr(date("Y"), 0, 2) . $year;
        }

        // 月
        $month = 1;
        if (isset($matches[2])) {
            $month = $matches[2];
        }

        // 日
        $day = 1;
        if (isset($matches[3])) {
            $day = $matches[3];
        }

        // 返回日期时间戳
        return strtotime($year . "-" . $month . "-" . $day);
    }
}