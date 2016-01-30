<?php


function redirect($location) {
    return header("Location: {$location}");
}

function generateToken() {
    $token = md5(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
    return $token;
}

function getDay($start_date) {
	$time_stamp 	= strtotime($start_date);
	$day 			= date('l', $time_stamp);
	return $day;
}

function formatDate($date) {
	$new_format = date_format(date_create($date), 'F jS'); 
	return $new_format;
}

function formatTime($time) {
	$new_format = date_format(date_create($time), 'ga'); 
	return $new_format;
}

?>