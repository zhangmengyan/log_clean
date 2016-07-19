<?php
/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/14
 * Time: 14:32
 */

namespace LogClean;

class Clearer
{
    public function run(ConfModel $model)
    {
        $path = $model->getDirectory();
        $my_dir = dir($path);
        $expire = $model->getExpire();
        $date_type = $model->getDateType();

        echo "log_clean begin" . PHP_EOL;

        while ($file = $my_dir->read()) {
            if ($file == "." || $file == "..") {
                continue;
            }

            try {
                if (!$this->isMatch($file, $date_type, $expire)) {
                    continue;
                }

                $delFile = $path . "/" . $file;
                if ($this->validDelFile($delFile) == false) {
                    continue;
                }

                $cmd = "rm -rf " . $delFile;

                exec($cmd);

                echo "delete file" . $delFile . PHP_EOL;
            } catch (\Exception $e) {
                continue;
            }
        }
    }

    private function validDelFile($delFile)
    {
        $delFile = trim($delFile);

        $delFile = str_replace('//', "/", $delFile);

        if (in_array($delFile, array("", "/", "/root", "/home"))) {
            return false;
        }

        return true;
    }

    private function isMatch($file, $date_type, $expire)
    {
        $time = DateMatcher::match($file, $date_type);

        $now = strtotime(date("Ymd"));

        // todo 夏令时优化
        if ($time + $expire * 86400 <= $now) {
            return true;
        }

        return false;
    }
}