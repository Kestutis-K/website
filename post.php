<?php

require_once("valdymas/includes/init.php");

?>

<?php include_once ('includes/header.php');?>

<body>

<?php include_once ('includes/top-nav.php');?>



<section class="section-posts js-section-nav-act">
    <div class="row js-wp-3">
        <?php
        $post = Post::find_by_id($_GET['id']);
        ?>
            <div class="box">
                <img src="images/<?php echo $post->photo; ?>" alt="<?php echo $post->title; ?>">
                <h2><?php echo $post->title; ?></h2>
                <div class="city-feature">
                    <?php
                    echo substr($post->content, 0, 200); ?>
                </div>

            </div>


    </div>
</section>


<?php include_once('includes/footer.php') ?>

</body>

</html>
