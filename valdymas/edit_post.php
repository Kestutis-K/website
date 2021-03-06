<?php
$pagename = "Apie ežiukus - Keisti įrašą";
include ("includes/admin_header.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

$post = Post::find_by_id($_GET['id']);

if(isset($_POST['submit'])) {
    $post->poster($_POST, $_FILES['file']);
    redirect("posts.php");
}


?>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <?php include ("includes/side_user.php"); ?>
                <!-- /menu profile quick info -->

                <br />
                <!-- sidebar menu -->
                <?php include_once ("includes/admin_sidemenu.php") ?>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <?php include_once ("includes/admin_footer_menu.php") ?>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <?php include_once ("includes/admin_topmenu.php") ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Pridėti įrašą</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">



                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Design <small>different form elements</small></h2>

                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view" src="/images/<?php echo $post->photo; ?>" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-9 col-sm-9 col-xs-12">


                                <br />
                                <form action="" method="post"data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pavadinimas <span class="required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <input type="text" name="title" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $post->title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Turinys <span class="required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <textarea rows="14" name="content" class="form-control col-md-7 col-xs-12"><?php echo $post->content; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Titulinė nuotrauka
                                        </label>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <input id="files" class="date-picker form-control col-md-7 col-xs-12" type="file" name="file">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Statusas
                                        </label>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <select name="active" >
                                                <?php if($post->avtive == 1) { ?>
                                                <option value="1" selected="selected">----- Aktyvus -----</option>
                                                <option value="0">----- Juodraštis -----</option>
                                                <?php } else { ?>
                                                    <option value="1" >----- Aktyvus -----</option>
                                                    <option value="0" selected="selected">----- Juodraštis -----</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-3">
                                            <button type="submit" name="submit" class="btn btn-success">Keisti</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include_once ("includes/admin_footer.php") ?>
        <!-- /footer content -->


</body>
</html>
