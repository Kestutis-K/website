<?php


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//define('SITE_ROOT', 'c:\\xampp' . DS . 'htdocs' . DS . 'website' );
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] );

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'valdymas'.DS.'includes');

defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'valdymas'.DS.'images');

require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."main_class.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."settings.php");
require_once(INCLUDES_PATH.DS."languages.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."photo.php");
require_once(INCLUDES_PATH.DS."item.php");
require_once(INCLUDES_PATH.DS."post.php");
require_once(INCLUDES_PATH.DS."class.upload.php");


 ?>
