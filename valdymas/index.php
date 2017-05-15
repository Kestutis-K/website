<?php
$pagename = "Pradžia";
include_once ("includes/admin_header.php");

if(!$session->is_signed_in()) {
  redirect("login.php");
}

$settings = Settings::find_all();
$items = Item::find_all();
$posts = Post::find_all();

?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-gear"></i> <span>
                <?php foreach ($settings as $setup) { echo $setup->sitename; } ?></span></a>
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
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Viso ežiukų</span>
              <div class="count green">
                  <?php
                  echo count($items);
                  ?>
              </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Viso "Apie ežiukus"</span>
              <div class="count green">
                  <?php
                  echo count($posts);
                  ?>
              </div>
            </div>

          </div>
          <!-- /top tiles -->



                </div>
                <!-- end of weather widget -->
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
