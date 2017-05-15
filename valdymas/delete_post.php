<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

if(empty($_GET['id'])) {
    redirect("items.php");
}
$post = Post::find_by_id($_GET['id']);

if($post) {
    $post->delete();
    $target_path = SITE_ROOT.DS.'images'.DS.$post->photo;
    unlink($target_path);
    $session->message("Ežiukas ištrintas");
    redirect("posts.php");
} else {
    redirect("posts.php");
}

?>