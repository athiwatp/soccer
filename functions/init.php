<?php

ob_start();
session_start();
date_default_timezone_set('America/New_York');

//This is the part I'm not too proud of. 
//I know there's a better way, but time woudln't allow

$path = '';

$full_url = explode("?", $_SERVER['REQUEST_URI']);

$url_path = explode("/", $full_url[0]);

if ($_SERVER['HTTP_HOST'] == "localhost") {
    $i = 0;
    $base_ref = 'http://localhost/soccer/';
} else {
    $i = 1;
    $base_ref = $_SERVER['HTTP_HOST'];
}

switch ($url_path[2-$i]) {
    case '':
        $borough 	= 'home';
        $auth       = 0;
        break;
    case 'admin':
        $auth       = 1;
        $path 		= '../';
        break;
    case 'preview':
        $auth       = 1;
        $preview    = 1;
        break;
    default:
        $auth       = 0;
    	$borough    = $url_path[2-$i];
}

if (isset($url_path[3-$i])) {
  $league_id  = $url_path[3-$i];
}

include $path . "db/con.php";
include $path . "functions/helpers.php";
include $path . "functions/db_helpers.php";

if (isset($auth) && $auth == 1) {
    require $path . "functions/session_validate.php";
    sessionValidate();
}

?>
