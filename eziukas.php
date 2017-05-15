<?php

require_once("valdymas/includes/init.php");

?>

<?php include_once ('includes/header.php');?>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/lt_LT/sdk.js#xfbml=1&version=v2.9&appId=1048416781954750";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<?php include_once ('includes/top-nav.php');?>

<?php
$item = Item::find_by_id($_GET['id']);
$photos = Photo::find_items($item->id);

$count = count($photos);
$suma = 0;
$sum = $suma++;
$sum1 = $suma++;
$sum2 = $suma++;



?>

<section class="section-photos js-section-nav-act">
    <div>
        &nbsp;
    </div>
    <div class="row">
        <h2><?php echo $item->title ?></h2>
    </div>
    <div class="row">
        <div class="col span-1-of-2">
         <div class="row">
         <div class="photo-borders photo-ez">
             <ul>

                <?php
                $sum = 0;
                foreach ($photos as $photo) { ?>
                  <li>
                <div class="photo-borders">
                    <a href="" data-toggle="modal" data-target="#myModal">
                    <img  src="/images/<?php echo $photo->filename; ?>"
                    alt="<?php echo $item->title; ?>">
                    </a>
                </div>
                   </li>
                <?php } ?>

             </ul>
         </div>
             <!-- Modal -->
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content ">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         </div>
                         <div class="modal-body">
                             <div>
                                 <img style="width: 100%;"  src="/images/<?php echo $photo->filename; ?>"
                                       alt="<?php echo $item->title; ?>">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
    </div>
            <div class="row">
                <?php echo $item->description; ?>
            </div>

    <div class="row photos_all">

    </div>
        </div>
        <div class="col span-1-of-2">
            <div
                    class="fb-like"
                    data-share="true"
                    data-width="450"
                    data-show-faces="true">
            </div>
            <div class="row">
                <div class="fb-comments" data-href="http://www.biruteseziukai.lt" data-width="100%" data-numposts="15"></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row">

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
                    <textarea name="name" placeholder="Jūsų žinutė"></textarea>
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

<!--                MODAL VIETA PRADŽIA -->
<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

        <?php foreach ($photos as $photo1) { ?>
            <div class="mySlides">
                <div class="numbertext"></div>
                <img src="/admin/images/<?php echo $photo1->filename ?>" style="width:100%">
            </div>
        <?php } ?>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>


        <?php
        foreach ($photos as $photo2) { ?>
            <div class="column">
                <img class="demo" src="/admin/images/<?php echo $photo2->filename ?>" onclick="currentSlide(<?php echo $sum1++ ?>)" alt="<?php echo $item->title ?>">
            </div>
        <?php } ?>


    </div>
</div>
<!--                MODAL VIETA PABAIGA-->

<script>
    $(".fb-comments").attr("data-href", window.location.href);
</script>
