<?php
class Db{

    public static $instance = null;

    private function __construct(){
        
    }

    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance = new PDO('mysql:host=localhost;dbname=imiesphere_dev', 'root', '');
            return self::$instance;
        }
        else{
            return self::$instance;
        }
    }
}
?>