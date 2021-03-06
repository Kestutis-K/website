<?php

class Session{

  private $signed_in = FALSE;
  public $user_id;
  public $message;

  function __construct() {
    session_start();
    $this->check_login();
    $this->check_message();
  }


  public function message($msg="") {
    if(!empty($msg)) {
      $_SESSION['message'] = $msg;
    } else {
      return $this->message;
    }
  }


  private function check_message() {
    if(isset($_SESSION['message'])) {
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
  }


  public function is_signed_in() {
    return $this->signed_in;
  }


  public function login($user) {
    if($user) {
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->signed_in = TRUE;
    }
  }


  public function logout() {
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->signed_in = FALSE;
    redirect("login.php");
  }


  private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->signed_in = TRUE;
    } else {
      unset ($this->id);
      $this->signed_in = FALSE;
    }
  }

}

$session = new Session();
$message = $session->message();

?>
