<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> <?php echo $lang['text_home']; ?> <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="index.php"><?php echo $lang['text_dashboard']; ?></a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> <?php echo $lang['text_items']; ?> <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="items.php"><?php echo $lang['text_all_items']; ?></a></li>
          <li><a href="add_item.php"><?php echo $lang['text_add_item']; ?></a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-table"></i> Apie ežiukus <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="posts.php">Visi įrašai</a></li>
          <li><a href="add_post.php">Sukurti įrašą</a></li>
        </ul>
      </li>
        <li><a><i class="fa fa-desktop"></i> <?php echo $lang['text_page_info']; ?> <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="settings.php"><?php echo $lang['text_page_settings']; ?></a></li>
                <li><a href="users.php"><?php echo $lang['text_users']; ?></a></li>
            </ul>
        </li>

  </div>

</div>
