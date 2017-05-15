<?php
$pagename = "Vartotojai";
include ("includes/admin_header.php");

if(!$session->is_signed_in()) {
  redirect("login.php");
}


$users = User::find_all();
$settings = Settings::find_all();
?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span><?php foreach ($settings as $setup) { echo $setup->sitename; } ?></span></a>
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
                <h3><?php echo $lang['text_users']; ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-2 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                      <a href="add_user.php"><button class="btn btn-primary" type="button" > <?php echo $lang['text_create_user']; ?> </button></a>
                  </div>
                </div>
              </div>
            </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="bg-success">
                          <?php
                          echo "<h2>".$session->message."</h2>";
                          ?>
                      </div>
                    <div class="row">



                      <div class="clearfix"></div>

                      <?php foreach ($users as $user) {  ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $user->username ?></h2>
                              <p><?php echo $user->firstname ?> <?php echo $user->lastname ?> </p>

                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>5.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-danger btn-xs"> <i class="fa fa-user">
                              </i> <i class="fa fa-trash-o"></i> <?php echo $lang['text_delete']; ?></button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> <?php echo $lang['text_edit']; ?>
                              </button>
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