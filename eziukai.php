<?php

require_once("valdymas/includes/init.php");

?>

<?php include_once ('includes/header.php');?>

<body>

<?php include_once ('includes/top-nav.php');?>



<section class="section-photos js-section-nav-act">
    <div class="row">
        <h2>Ežiukų kolekcija</h2>
    </div>

    <div class="row">
        <div class="eziukai-showcase clearfix">
            <ul>
        <?php
        $items = Item::find_all();
        foreach ($items as $item) {
            ?>
            <li>
                <div class="photo-borders">
                    <a href="eziukas.php?id=<?php echo $item->id ?>"><img src="/images/<?php
                    $photo = Photo::find_item($item->id);
                    echo $photo->filename; ?>" alt=""></a>

                </div>
                <div class="photo-caption">
                    <?php
                    echo $item->title;
                    ?>
                </div>
            </li>



        <?php } ?>
            </ul>
    </div>
    </div>
    <div class="row photos_all">

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
