<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/14
 * Time: 17:20
 */

namespace LogClean;

class ConfModel
{
    private $name;
    private $directory;
    private $expire=7;
    private $date_type='ymd';

    public function __construct($name, $c) {
        $this->name = $name;
        $this->directory = $c['directory'];
        if (isset($c['expire'])) {
            $this->expire = $c['expire'];
        }

        if (isset($c['date_type'])) {
            $this->date_type = $c['date_type'];
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getExpire() {
        return $this->expire;
    }

    public function getDateType() {
        return $this->date_type;
    }

    public function getDirectory() {
        return $this->directory;
    }

    public function valid() {
        Validate::validDir($this->getDirectory());
    }
}