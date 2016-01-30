<?php

ob_start();
session_start();


$ignore 	= 2; // The count of forward slashes in a URL path ends up counting 1 extra by default.
if ($_SERVER['HTTP_HOST'] == "localhost") {
	$ignore = 3; // For local dev purposes to keep the path pointing to the right root directory. 
}
$path_count = count(explode("/", $_SERVER['REQUEST_URI'])) - $ignore;
$path = "";
for ($i = 0 ; $i < $path_count ; $i++) {
	$path .= "../"; 
}

include $path . "db/con.php";
include $path . "functions/helpers.php";
include $path . "functions/db_helpers.php";

?>
