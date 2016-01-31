<?php

ob_start();
session_start();


//This is the part I'm not too proud of. 
//I know there's a better way, but time woudln't allow

$path = '';

$full_url = explode("?", $_SERVER['REQUEST_URI']);

$url_path = explode("/", $full_url[0]);

if ($_SERVER['HTTP_HOST'] == "localhost") {
	$i = 0;
} else {
	$i = 1;
}

switch ($url_path[2-$i]) {
    case '':
        $borough 	= 'home';
        break;
    case 'admin':
        $path 		= '../';
        break;
    default:
    	$borough    = $url_path[2-$i];
}

if (isset($url_path[3-$i])) {
  $league_id  = $url_path[3-$i];
}

include $path . "db/con.php";
include $path . "functions/helpers.php";
include $path . "functions/db_helpers.php";

?>
