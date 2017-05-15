<?php

class Settings extends Main_class {

  protected static $db_table = "settings";
  protected static $db_table_fields = array('id', 'sitename', 'site_url', 'site_email', 'about');
  public $id;
  public $sitename;
  public $site_url;
  public $site_email;
  public $about;
}

?>
