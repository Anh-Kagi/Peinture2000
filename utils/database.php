<?php
class Database{
    private static $host = "localhost";
    private static $dbname = "peinture2000";
    private static $username = "root";
    private static $pwd = "";

    public static function getConnection(){
        try{
            return new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$username,self::$pwd);
        }catch(PDOException $exception){
			http_response_code(500);
        }
    }
	
	public static function query($sql){
		$conn = self::getConnection();
		$result = $conn->query($sql);
		if ($result == false) {
			http_response_code(500);
			echo 'The SQL query failed with error :<br/>';
			foreach($conn->errorInfo() as $e){
				echo $e.'<br/>';
			}
		} else {
			return $result;
		}
	}
}
?>