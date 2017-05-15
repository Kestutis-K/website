<?php
$pagename = "Vartotojai";
include ("includes/admin_header.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}


$items = Item::find_by_id($_GET['id']);
$photos_edit = Photo::find_items($_GET['id']);
$photos = new Photo();
$settings = Settings::find_all();


if(isset($_POST['submit'])) {
    $photos->add_photo_item($_FILES['file'], $_POST['show_title'], $_GET['id']);
    $items->create_item_photo($_POST);
    redirect("items.php");
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
                        <h3>Redaguoti ežiuką</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Redaguoti ežiuką</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <?php
                                echo "<h2>".$session->message."</h2>";
                                ?>

                                <br />
                                <form action="" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ežiuko pavadinimas <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="title" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $items->title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Aprašymas <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea rows="14" name="description" class="form-control col-md-7 col-xs-12"><?php echo $items->description; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nuotraukos
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="file" class="date-picker form-control col-md-7 col-xs-12" type="file" name="file" >
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" name="submit" class="btn btn-success">Keisti</button>
                                            </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Nuotraukos</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="row">

                                    <?php foreach ($photos_edit as $phe) {?>
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="/images/<?php echo $phe->filename ?>" alt="image" />
                                                <div class="mask">
                                                    <div class="tools tools-bottom">
                                                        <a href="/images/<?php echo $phe->filename ?>" target="_blank"><i class="fa fa-link"></i></a>
                                                        <a href="delete_photo.php?id=<?php echo $phe->id ?>" onclick="return confirm('Ar tikrai ištrinti nuotrauką?')"><i class="fa fa-trash-o"></i></a>
                                                        <?php if($phe->show_title == 1) { ?>
                                                            <a href="show_title.php?id=<?php echo $phe->id ?>&show_title=0" ><i class="fa fa-eye"></i></a>
                                                            <?php } else {?>
                                                            <a href="show_title.php?id=<?php echo $phe->id ?>&show_title=1"><i class="fa fa-eye"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
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
