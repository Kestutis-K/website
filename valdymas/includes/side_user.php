<?php
$user = User::find_by_id($_SESSION['user_id']);
?>

<div class="profile clearfix">
  <div class="profile_pic">
    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span><?php echo $lang['text_user']; ?>,</span>
    <h2><?php echo $user->firstname; ?> <?php echo $user->lastname; ?></h2>
  </div>
</div>
