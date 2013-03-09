<?php
define( 'SITE_ROOT', dirname(__FILE__) . '/' ); // site root
define( 'SITE_URL',  'http://' . $_SERVER['HTTP_HOST'] . '/english/' ); // site url
define( 'THIS_SCRIPT', end( explode( '/', $_SERVER['SCRIPT_NAME'] ) ) ); // site url

define( 'DB_SERVER',   'localhost' );
define( 'DB_USERNAME', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_NAME',     'english' );

define( 'SITE_LIB',  SITE_ROOT . 'lib/' );
define( 'SITE_JS',   SITE_URL  . 'js/' );
define( 'SITE_AJAX', SITE_URL  . 'ajax/' );

define( 'TRANSLATE_YANDEX_API', 'http://translate.yandex.net/api/v1/tr.json/translate?' );


header("Content-Type: text/html; charset=utf-8");
//session_start();

require_once SITE_LIB . 'database.php';
require_once SITE_LIB . 'words.php';


//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
//echo "<pre>";
//var_dump(THIS_SCRIPT);
//echo "</pre>";
