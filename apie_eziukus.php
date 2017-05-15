<?php

require_once("valdymas/includes/init.php");

?>

<?php include_once ('includes/header.php');?>

<body>

<?php include_once ('includes/top-nav.php');?>



<section class="section-posts js-section-nav-act">
    <div class="row">
        <h2>Apie ežiukus</h2>
    </div>
    <div class="row js-wp-3">
        <?php
        $posts = Post::find_active();
        foreach ($posts as $post) { ?>
            <div class="col span-1-of-3 box">
                <div class="posts-img">
                <img src="images/<?php echo $post->photo; ?>" alt="<?php echo $post->title; ?>">
                </div>
                <h3><?php echo $post->title; ?></h3>
                <div class="city-feature">
                    <?php
                    echo substr($post->content, 0, 200); ?>
                </div>

                <div class="row photos_all">
                    <a href="post.php?id=<?php echo $post->id; ?>" class="btn btn-full">Skaityti</a>
                </div>
            </div>
        <?php } ?>

    </div>
</section>



<section class="section-form js-section-contact">
    <div class="row">
        <h2>Susisiekite</h2>
    </div>
    <div class="row">
        <form action="" class="contact-form">
            <div class="row">
                <div class="col span-1-of-3">
                    <label for="Name">Vardas</label>
                </div>
                <div class="col span-2-of-3">
                    <input type="text" name="name" placeholder="Jūsų vardas">
                </div>
            </div>

            <div class="row">
                <div class="col span-1-of-3">
                    <label for="email">El. paštas</label>
                </div>
                <div class="col span-2-of-3">
                    <input type="email" name="email" placeholder="Jūsų el. pašto adresas">
                </div>
            </div>

            <div class="row">
                <div class="col span-1-of-3">
                    <label for="Name">Žinutė</label>
                </div>
                <div class="col span-2-of-3">
                    <textarea ame="name" placeholder="Jūsų žinutė"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col span-1-of-3">
                    <label for="email"> </label>
                </div>
                <div class="col span-2-of-3">
                    <input type="submit" name="submit" value="Siųsti žinutę" class="button-pointer">
                </div>
            </div>

        </form>
    </div>
</section>

<?php include_once('includes/footer.php') ?>

</body>

</html>
