<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:56
 */
namespace LogClean;

class Validate
{
    private static $invalid_dir = array(
        "/",
        "/boot",
        "/data",
        "/dev",
        "/etc",
        "/home",
        "/lib",
        "/lib64",
        "/media",
        "/mnt",
        "/opt",
        "/proc",
        "/root",
        "/sbin",
        "/srv",
        "/sys",
        "/tmp",
        "/usr",
        "/var",
    );

    public static function validDir($dir) {
        foreach (self::$invalid_dir as $d) {
            if ($dir == $d) {
                throw new \Exception("dir invalid");
            }
        }
    }
}