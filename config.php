<?php
define( 'SITE_ROOT', dirname(__FILE__) . '/' ); // site root
define( 'SITE_URL',  'http://' . $_SERVER['HTTP_HOST'] . '/english/' ); // site url

define( 'DB_SERVER',   'localhost' );
define( 'DB_USERNAME', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_NAME',     'english' );

define( 'SITE_LIB',  SITE_ROOT . 'lib/' );
define( 'SITE_JS',   SITE_URL  . 'js/' );
define( 'SITE_AJAX', SITE_URL  . 'ajax/' );

header("Content-Type: text/html; charset=utf-8");
//session_start();

require_once SITE_LIB . 'database.php';
require_once SITE_LIB . 'words.php';


//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
