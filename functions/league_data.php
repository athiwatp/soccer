<?php 

//LOCATION INFO
$location_hood        = $result['location_hood'];
$location_field       = $result['location_field'];
$location_map_link    = html_entity_decode($result['location_map_link']);
$location_map_embed   = html_entity_decode($result['location_map_embed']);

//LEAGUE DETAILS
$league_id 			= $result['league_id'];
$season_id			= $result['season_id']; 
$season_name        = $result['season_name']; 
$league_deadline    = formatDate($result['league_deadline']); 
$league_start       = formatDate($result['league_start']); 
$league_end         = formatDate($result['league_end']); 
$league_start_time  = formatTime($result['league_start_time']); 
$league_end_time    = formatTime($result['league_end_time']);
$league_day         = $result['league_day']; 
$league_minpergame  = $result['league_minpergame']; 
$league_games       = $result['league_games']; 
$league_playoff_teams = $result['league_playoff_teams']; 
$league_roster      = $result['league_roster']; 
$league_onfield     = $result['league_onfield']; 
$league_femsonfield = $result['league_femsonfield']; 
$league_price       = $result['league_price']; 
$league_freeagents  = $result['league_freeagents']; 
$league_captains    = $result['league_captains']; 
$league_teamplayers = $result['league_teamplayers']; 
$league_note        = $result['league_note']; 
$league_laid        = $result['league_laid']; 
$league_status      = $result['league_status'];

//COMPILED INFO
if ($league_femsonfield > 0) {
  $league_format = 'Co-Ed';
}
else {
  $league_format = 'Men\'s';
}

if ($league_status == 1) {
	$league_status = 'Open';
}
else {
	$league_status = 'Sold Out';
}

$league_headline  	= $league_onfield . 'v' . $league_onfield . ' ' . $league_format . ' Soccer';
$league_subhead   	= $league_day . 's @ ' . $location_field . ', ' . $location_hood; 
$league_name 		= $league_day.' '.$league_headline.' @ '.$location_field;
$league_name_long	= $league_name.', '.$location_hood;

?>