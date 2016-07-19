<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:54
 */

require_once dirname(__FILE__) . "/../vendor/autoload.php";

define("SRC_ROOT", __DIR__);
define("CONF_PATH", SRC_ROOT . "/../etc");
define("LOG_ROOT", SRC_ROOT . "/../logs");

ini_set("display_errors", "1");
ini_set("date.timezone", "PRC");

