<?php

class User extends Main_class {

  protected static $db_table = "users";
  protected static $db_table_fields = array('id', 'username', 'password', 'firstname','lastname', 'email');
  public $id;
  public $username;
  public $password;
  public $firstname;
  public $lastname;
  public $email;


  public static function verify_user($username) {
		global $database;
		$username = $database->escape_string($username);
		$sql = "SELECT * FROM " . self::$db_table . " WHERE ";
		$sql .= "username = '{$username}' ";
		$sql .= "LIMIT 1";
		$the_result_array = self::find_by_query($sql);
		return !empty($the_result_array) ? array_shift($the_result_array) : FALSE;
  }


  public function add_user($user) {
      $this->username = $user['username'];
      $this->firstname = $user['firstname'];
      $this->lastname = $user['lastname'];
      $this->email = $user['email'];
      $this->password = $this->pass_hash($user['password']);
      $this->save();
      redirect("users.php");
  }




}


?>
