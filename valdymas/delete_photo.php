<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

if(!empty($_GET['id'])) {
    $photo = Photo::find_by_id($_GET['id']);
    $photo->delete_photo();
    $session->message("Ežiukas ištrintas");
//    redirect("items.php");?
    header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
    redirect("items.php");
}

?>