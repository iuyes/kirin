<?php
class DB {
    
    private static $mysqli = null;
    private static $db = null;

    public static function getInstance(){
        if(! self::$db) {
            self::$db = new DB();
            $config = DBConfig::getConfig();
            $host = $config['host'];
            $port = $config['port'];
            $uname = $config['uname'];
            $passwd = $config['passwd'];
            $dbname = $config['dbname'];
            self::$mysqli = new mysqli($host, $uname, $passwd, $dbname, $port);
            self::$mysqli->set_charset('utf8');
        }
        return self::$db;
    }

    public function getMysqli() {
        return self::$mysqli;
    }

    public function __destruct() {
        self::$mysqli->close();
        self::$mysqli = null;
    }
}
