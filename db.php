<?php
//a db class for connecting to the database
class Db{
    private static $instance = null;
    private function __construct(){}
    private function __clone(){}
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new mysqli("localhost","root","", "scandiweb_db");
        }
        return self::$instance;
    }
}

?>