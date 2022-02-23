<?php
class Database{
    private static string $host = "localhost";
    private static string $dbname = "peinture2000";
    private static string $username = "root";
    private static string $pwd = "";

    private PDO $_conn;

    public function __construct(){
        try{
            $this->_conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$pwd);
        }catch(){
            $this->_conn = null;
        }
    }
}
?>