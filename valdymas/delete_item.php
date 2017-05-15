<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

if(empty($_GET['id'])) {
    redirect("items.php");
}
$item = Item::find_by_id($_GET['id']);
$photos = Photo::find_items($_GET['id']);
if($item) {
    $item->delete_item();
    foreach ($photos as $photo) {
        $photo->delete_photo();
    }
    $session->message("Ežiukas ištrintas");
    redirect("items.php");
} else {
    redirect("items.php");
}

?>