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

function shortDate($date) {
	$new_format = date_format(date_create($date), 'M j'); 
	return $new_format;
}

function formatTime($time) {
	$new_format = date_format(date_create($time), 'g.ia'); 
	return $new_format;
}

function onlyTime($time) {
	$new_format = date_format(date_create($time), 'g:i'); 
	return $new_format;
}

function onlyAmPm($time) {
	$new_format = date_format(date_create($time), 'a'); 
	return $new_format;
}

function getBorough($hood) {
	if ($hood == 'Dumbo' || $hood == 'Williamsburg' || $hood == 'Bushwick') {
		return 'Brooklyn';
	}
	if ($hood == 'Long Island City' || $hood == 'Jamaica' || $hood == 'Jackson Heights') {
		return 'Queens';
	}
	if ($hood == 'Chelsea' || $hood == 'East Village' || $hood == 'West Village') {
		return 'Manhattan';
	}
}

?>