<?php

ob_start();
session_start();


//$ignore 	= 3; // The count of forward slashes in a URL path ends up counting a extra by default.

$path = '';

$url_path = explode("/", $_SERVER['REQUEST_URI']);

if ($_SERVER['HTTP_HOST'] == "localhost") {
	$i = 0;
} else {
	$i = 1;
}
  	$borough    = $url_path[2-$i];
  	
	if ($borough == 'admin') {
		$path = '../';
	}
	if (isset($url_path[3-$i])) {
	  $league_id  = $url_path[3-$i];
	}


// if ()
// $path_count = count($url_path) - $ignore;
// $path = "";
// for ($i = 0 ; $i < $path_count ; $i++) {
// 	$path .= "../"; 
// }

include $path . "db/con.php";
include $path . "functions/helpers.php";
include $path . "functions/db_helpers.php";

?>
