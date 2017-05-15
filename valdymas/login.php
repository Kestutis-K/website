<?php
$pagename = "Prisijungimas" ;
include_once ("includes/admin_header.php");

if($session->is_signed_in()) {
  redirect("index.php");
}

if(isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $user_found = User::verify_user($username);

  if ($user_found) {

      if(password_verify($password,$user_found->password)) {
        $session->login($user_found);
        $_SESSION["username"]=$username;
        redirect("index.php");
      } else {
        $message = "Password incorrect";
      }
    } else {
      $message = "User does not exist";
    }
} else {
  $message = "";
  $username = "";
  $password = "";
}

?>


  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1><?php echo $lang['text_login2']; ?></h1>
              <h4 class="bg-danger"><?php echo $message; ?></h4>
              <div>
                <input name="username" type="text" class="form-control" placeholder="<?php echo $lang['text_username']; ?>" required="" />
              </div>
              <div>
                <input name="password"type="password" class="form-control" placeholder="<?php echo $lang['text_password']; ?>" required="" />
              </div>
              <div>
                <input type="submit" name="submit" value="<?php echo $lang['text_login']; ?>" class="btn btn-default submit">
                <a class="reset_pass" href="#"><?php echo $lang['text_forgot_pass']; ?></a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2017 Ežiukai</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
