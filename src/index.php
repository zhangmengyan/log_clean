<?php
/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:50
 */

use LogClean\Executor;

require_once dirname(__FILE__) . "/bootstrap.php";

$opt = getopt("", array("conf::"));
$conf = isset($opt['conf']) ? $opt['conf'] : "default.ini";

Executor::execute($conf);
