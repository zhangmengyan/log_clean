<?php
/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:50
 */

use LogClean\Bootstrap;

require_once dirname(__FILE__) . "/../vendor/autoload.php";

define("SRC_ROOT", __DIR__);
define("CONF_PATH", SRC_ROOT . "/../etc");

$opt = getopt("", array("conf::"));
$conf = isset($opt['conf']) ? $opt['conf'] : "default.ini";

ini_set("display_errors", "1");
ini_set("date.timezone", "PRC");

$boot_strap = new Bootstrap();
$boot_strap->run($conf);