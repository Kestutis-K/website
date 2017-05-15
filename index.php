<?php

    require_once("valdymas/includes/init.php");

?>

<?php include_once ('includes/header.php');?>
   
   <body>
       <header>
           <?php include_once ('includes/top-nav-index.php');?>

           <div class="hero-text-box">
              <h1>Birutės ežiukų kolekcija</h1>
              <a class="btn btn-full js-scroll-to-eziukai" href="#">Ežiukų kolekcija</a>
              <a class="btn btn-ghost js-scroll-to-contact" href="#">Susisiekite</a>
           </div>
       </header>

       <section class="section-about js-section-nav-act">
           <div class="row">
               <h2>Apie Birutės ežiukus</h2>
               <p class="long-copy">
                   <?php
                   $settings = Settings::find_by_id(1);
                   echo $settings->about;
                   ?>
               </p>
           </div>
           <div class="row photos_all">
               <a href="eziukai.php" class="btn btn-full">Skaityti plačiau</a>
           </div>

       </section>
       
       <section class="section-photos js-section-nav-eziukai">
           <div class="row">
               <h2>Ežiukų kolekcija</h2>
           </div>
           <ul class="photos-showcase clearfix">
               <?php
               $photos = Photo::find_all_title();

               foreach ($photos as $photo) {
                   ?>
                   <li>
                       <figure class="photo">
                           <img src="/images/<?php echo $photo->filename; ?>" alt="">
                           <div class="photo-text">
                               <?php
                               $item = Item::find_by_id($photo->item_id);
                               echo $item->title;
                               ?>
                           </div>
                       </figure>

                   </li>
               <?php } ?>
           </ul>
           <div class="row photos_all">
               <a href="eziukai.php" class="btn btn-full bigger">Žiūrėti visą kolekciją</a>
           </div>

       </section>

       <section class="section-posts">
          <div class="row">
              <h2>Apie ežiukus</h2>
          </div>
           <div class="row js-wp-3">
               <?php
               $posts = Post::find_active_3();
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
                       <a href="post.php?id=<?php echo $post->id; ?>" class="btn btn-ghost">Skaityti</a>
                   </div>
               </div>
               <?php } ?>

            </div>
           <div class="row photos_all">
               <a href="apie_eziukus.php" class="btn btn-full bigger">Skaityti daugiau</a>
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
