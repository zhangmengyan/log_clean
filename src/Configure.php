<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:54
 */


namespace LogClean;

use Iterator;

class Configure implements Iterator
{
    private $instances = array();
    private static $_instance = null;
    private $position = 0;
    private $keys = array();

    public function __construct($conf)
    {
        $conf_file = CONF_PATH . "/" . $conf;

        $configs = parse_ini_file($conf_file, true);
        $this->keys = array_keys($configs);
        foreach($configs as $k => $c) {
            $model = new ConfModel($k, $c);

            $model->valid();
            $this->instances[$k] = $model;
        }
    }

    public static function getInstance($conf)
    {
        if (self::$_instance == null) {
            self::$_instance = new Configure($conf);
        }

        return self::$_instance;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->instances[$this->keys[$this->position]];
    }

    public function key() {
        return $this->keys[$this->position];
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        if(count($this->keys) <= $this->position) {
            return false;
        }
        return isset($this->instances[$this->keys[$this->position]]);
    }
}