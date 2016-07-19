<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:54
 */

namespace LogClean;

class Bootstrap
{
    public function run($conf) {
        Executor::execute($conf);
    }
}