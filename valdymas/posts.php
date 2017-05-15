<?php
$pagename = "Apie ežiukus";
include ("includes/admin_header.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}


$posts = Post::find_all();
$settings = Settings::find_all();
?>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span><?php foreach ($settings as $setup) { echo $setup->sitename; } ?></span></a>
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
                        <h3>Apie ežiukus</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-2 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <a href="add_post.php"><button class="btn btn-primary" type="button" > Sukurti įrašą </button></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="x_content">
                <div class="bg-success">
                    <?php
                    echo "<h2>".$session->message."</h2>";
                    ?>
                </div>

            <!-- start project list -->
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 20%">Pavadinimas</th>
                    <th>Statusas</th>
                    <th style="width: 20%">#Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <td><?php echo $post->id; ?></td>
                    <td>
                        <a><?php echo $post->title; ?></a>
                        <br />
                        <small>Sukurta <?php echo $post->created_at; ?></small>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-xs">
                            <?php if($post->active == 1) { echo 'Aktyvus'; } else { echo 'Juodraštis'; }  ?>
                        </button>
                    </td>
                    <td>
                        <a href="/post.php?id=<?php echo $post->id; ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-folder"></i> Žiūrėti </a>
                        <a href="edit_post.php?id=<?php echo $post->id; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Keisti </a>
                        <a href="delete_post.php?id=<?php echo $post->id; ?>" onclick="return confirm('Ar tikrai ištrinti?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Trinti </a>
                    </td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
            <!-- end project list -->

        </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <?php include_once ("includes/admin_footer.php") ?>
    <!-- /footer content -->

</body>
</html>