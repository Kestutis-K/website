<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

        $photo = Photo::find_by_id($_GET['id']);
        $photo->show_title($_GET['id'], $_GET['show_title']);

        if($_GET['show_title'] == 0) {
        $session->message("<div class=\"bg-danger\">Ežiukas neberodomas tituliniame puslapyje</div>");
        } else {
            $session->message("<div class=\"bg-success\">Ežiukas rodomas tituliniame puslapyje</div>");
        }
    //    redirect("items.php");?
        header('Location: ' . $_SERVER['HTTP_REFERER']);



?>