<?php

require_once ("config.php");

class Database {

  public $connection;

  function __construct() {
    $this->connect();
    $this->connection->set_charset("utf8");
  }


  public function connect() {
    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($this->connection->connect_errno) {
      DIE ("Prisijungimas prie duomenų bazės nepavyko" . "<br />" . $this->connection->connect_erno);
    }
  }


  public function myquery($sql) {
    $result = $this->connection->query($sql);
    $this->check_query($result);
    return $result;
  }

  public function check_query($result) {
    if(!$result) {
      DIE("Užklausa nepavyko" . "<br />" . $this->connection->error);
    }
  }

  public function escape_string($string) {
    $escaped_string = $this->connection->real_escape_string($string);
    return $escaped_string;
  }

  public function the_insert_id() {
    return $this->connection->insert_id;
  }
}

$database = new Database();

?>
