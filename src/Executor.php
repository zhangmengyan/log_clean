<?php

/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/12
 * Time: 10:55
 */

namespace LogClean;

class Executor
{
    public static function execute($conf)
    {
        try {
            $configure = Configure::getInstance($conf);
            $clear = new Clearer();
            foreach ($configure as $key => $model) {
                $clear->run($model);
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}