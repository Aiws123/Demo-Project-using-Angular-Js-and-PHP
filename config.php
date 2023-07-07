<?php

    define("DB_HOST", "server");
		define("DB_USERNAME", "server");
		define("DB_PASSWORD", "");
		define("DB_NAME", "signup_data");
		define("DB_PORT", 3306);

  class db {
  public $conn;
  public $error;
  public $ip;
  public $time;

  public function __construct() {
  try {
    $this->conn = new PDO("mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME."",DB_USERNAME,DB_PASSWORD);			
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    ////////////$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);            
          $this->conn->exec('set NAMES  utf8 collate utf8_bin');
          
      $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
      $this->conn->exec('set SQL_MODE=""');
          
          // global $dCON;
          // $dCON = $this->conn;
          
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
      
     $this->ip = isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';
     $this->time = date("Y-m-d H:i:s");

  
}

}


define("ADMIN_TBL", 'users_data');
define("CONSTANT_PASSWORD_KEY", "id");


?>