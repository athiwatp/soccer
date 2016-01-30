<?php 

function dbTime($original_time) {
  $format_time    = DateTime::createFromFormat( 'H:i A', $original_time);
  $db_ready       = $format_time->format( 'H:i:s');
  return $db_ready;
}


function getDay($start_date) {
	$time_stamp 	= strtotime($start_date);
	$day 			= date('l', $time_stamp);
	return $day;
}


function dbCreateLeague($values) {

	global $con;

	$league_start_time 		= dbTime($values['league-start-time'] . $values['league-start-ampm']); 
	$league_end_time 		= dbTime($values['league-end-time'] . $values['league-end-ampm']);
	$league_day       		= getDay($values['league-start']);

	$query = $con->prepare("
		INSERT INTO leagues
		(	location_id, 
			league_season, 
			league_deadline, 
			league_start, 
			league_end, 
			league_start_time, 
			league_end_time,
			league_day, 
			league_minpergame, 
			league_games, 
			league_playoff_teams, 
			league_roster, 
			league_onfield, 
			league_femsonfield, 
			league_price, 
			league_freeagents, 
			league_captains, 
			league_teamplayers, 
			league_note, 
			league_laid, 
			league_enabled
			)
		VALUES 
		(	:location_id, 
			:league_season, 
			:league_deadline, 
			:league_start, 
			:league_end, 
			:league_start_time, 
			:league_end_time, 
			:league_day,
			:league_minpergame, 
			:league_games, 
			:league_playoff_teams, 
			:league_roster, 
			:league_onfield, 
			:league_femsonfield, 
			:league_price, 
			:league_freeagents, 
			:league_captains, 
			:league_teamplayers, 
			:league_note, 
			:league_laid, 
			:league_enabled)
		");
	
	$query->execute([
    ':location_id'			=> $values['location-id'], 
	':league_season'		=> $values['league-season'], 
	':league_deadline'		=> $values['league-deadline'], 
	':league_start'			=> $values['league-start'], 
	':league_end'			=> $values['league-end'], 
	':league_start_time'	=> $league_start_time, 
	':league_end_time'		=> $league_end_time, 
	':league_day'			=> $league_day, 
	':league_minpergame'	=> $values['league-minpergame'], 
	':league_games'			=> $values['league-games'], 
	':league_playoff_teams'	=> $values['league-playoff-teams'], 
	':league_roster'		=> $values['league-roster'], 
	':league_onfield'		=> $values['league-onfield'], 
	':league_femsonfield'	=> $values['league-femsonfield'], 
	':league_price'			=> $values['league-price'], 
	':league_freeagents'	=> $values['league-freeagents'], 
	':league_captains'		=> $values['league-captains'], 
	':league_teamplayers'	=> $values['league-teamplayers'], 
	':league_note'			=> $values['league-note'], 
	':league_laid'			=> $values['league-laid'], 
	':league_enabled'		=> $values['league-enabled']
	]);

}


function fetchLeague($league_id) {
	
	global $con;
	$query = $con->prepare("
	SELECT * FROM leagues
	LEFT JOIN locations
	ON leagues.location_id = locations.location_id
	WHERE league_id = :league_id
	");

	$query->execute([
	':league_id' => $league_id
	]);

	$result = $query->fetch(PDO::FETCH_ASSOC);

	return $result;
 	
 
}


?>