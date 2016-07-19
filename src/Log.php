<?php
/**
 * Created by PhpStorm.
 * User: myzhang
 * Date: 2016/7/19
 * Time: 15:52
 */

namespace LogClean;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log {
    private static $_instance = null;

    private $logger;

    private function __construct()
    {
        $this->logger = new Logger("logClean");

        $log_file = sprintf("%s/logClean_%s.log", LOG_ROOT, date("Ymd"));
        $this->logger->pushHandler(new StreamHandler($log_file, Logger::INFO));
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new Log();
        }

        return self::$_instance;
    }

    public function warning($message, array $context = array()) {
        $this->logger->log(Logger::WARNING, $message, $context);
    }

    public function info($message, array $context = array()) {
        $this->logger->log(Logger::INFO, $message, $context);
    }

    public function debug($message, array $context = array()) {
        $this->logger->log(Logger::DEBUG, $message, $context);
    }

    public function error($message, array $context = array()) {
        $this->logger->log(Logger::ERROR, $message, $context);
    }
}