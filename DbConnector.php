<?php 
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('Db_NAME','btc3205');

class DBConnector{
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,Db_NAME) or die("Error:".mysqli_error($this->conn));
    }

    public function closeDatabase(){
        mysqli_close($this->conn);
    }
}
?>