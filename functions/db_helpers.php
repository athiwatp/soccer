<?php 

function dbTime($original_time) {
  	$format_time    = DateTime::createFromFormat('H:i A', $original_time);
  	if (gettype($format_time) == 'object') {
  		$db_ready       = $format_time->format('H:i:s');
  		return $db_ready;
  	} else {
  		return '';
  	}
}


function dbCreateLeague($values) {

	global $con;

	$league_start_time 		= dbTime($values['league-start-time'] . $values['league-start-ampm']); 
	$league_end_time 		= dbTime($values['league-end-time'] . $values['league-end-ampm']);

	$league_day       		= getDay($values['league-start']);

	$query = $con->prepare("
		INSERT INTO leagues
		(	location_id, 
			season_id, 
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
			league_status
			)
		VALUES 
		(	:location_id, 
			:season_id, 
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
			:league_status )
		");
	
	$query->execute([
    ':location_id'			=> htmlentities($values['location-id']), 
	':season_id'			=> htmlentities($values['season-id']), 
	':league_deadline'		=> htmlentities($values['league-deadline']), 
	':league_start'			=> htmlentities($values['league-start']), 
	':league_end'			=> htmlentities($values['league-end']), 
	':league_start_time'	=> htmlentities($league_start_time), 
	':league_end_time'		=> htmlentities($league_end_time), 
	':league_day'			=> htmlentities($league_day), 
	':league_minpergame'	=> htmlentities($values['league-minpergame']), 
	':league_games'			=> htmlentities($values['league-games']), 
	':league_playoff_teams'	=> htmlentities($values['league-playoff-teams']), 
	':league_roster'		=> htmlentities($values['league-roster']), 
	':league_onfield'		=> htmlentities($values['league-onfield']), 
	':league_femsonfield'	=> htmlentities($values['league-femsonfield']), 
	':league_price'			=> htmlentities($values['league-price']), 
	':league_freeagents'	=> htmlentities($values['league-freeagents']), 
	':league_captains'		=> htmlentities($values['league-captains']), 
	':league_teamplayers'	=> htmlentities($values['league-teamplayers']), 
	':league_note'			=> htmlentities($values['league-note']), 
	':league_laid'			=> htmlentities($values['league-laid']), 
	':league_status'		=> htmlentities($values['league-status'])
	]);
	
	return $con->lastInsertId();
}


function fetchLeague($league_id) {
	
	global $con;
	$query = $con->prepare("
	SELECT * FROM leagues
	LEFT JOIN locations
	ON leagues.location_id = locations.location_id
	LEFT JOIN seasons 
	ON leagues.season_id = seasons.season_id
	WHERE league_id = :league_id
	");

	$query->execute([
	':league_id' => $league_id
	]);

	$result = $query->fetch(PDO::FETCH_ASSOC);

	$count = $query->rowCount();

	if ($count != 1) {
		redirect('404.php');
	}

	return $result;
 	
}

function dbUpdateLeague($values) {

	global $con;

	$league_start_time 		= dbTime($values['league-start-time'] . $values['league-start-ampm']); 
	$league_end_time 		= dbTime($values['league-end-time'] . $values['league-end-ampm']);

	$league_day       		= getDay($values['league-start']);

	$query = $con->prepare("
		UPDATE leagues SET 
			location_id 		= :location_id, 
			season_id 			= :season_id, 
			league_deadline		= :league_deadline, 
			league_start 		= :league_start, 
			league_end 			= :league_end, 
			league_start_time 	= :league_start_time, 
			league_end_time 	= :league_end_time,
			league_day 			= :league_day, 
			league_minpergame	= :league_minpergame, 
			league_games		= :league_games, 
			league_playoff_teams	= :league_playoff_teams, 
			league_roster		= :league_roster, 
			league_onfield		= :league_onfield, 
			league_femsonfield	= :league_femsonfield, 
			league_price		= :league_price, 
			league_freeagents	= :league_freeagents, 
			league_captains		= :league_captains, 
			league_teamplayers	= :league_teamplayers, 
			league_note			= :league_note, 
			league_laid			= :league_laid, 
			league_status		= :league_status
		WHERE league_id 		= :league_id

		");
	
	$query->execute([
	':league_id'			=> htmlentities($values['league-id']),
    ':location_id'			=> htmlentities($values['location-id']), 
	':season_id'			=> htmlentities($values['season-id']), 
	':league_deadline'		=> htmlentities($values['league-deadline']), 
	':league_start'			=> htmlentities($values['league-start']), 
	':league_end'			=> htmlentities($values['league-end']), 
	':league_start_time'	=> htmlentities($league_start_time), 
	':league_end_time'		=> htmlentities($league_end_time), 
	':league_day'			=> htmlentities($league_day), 
	':league_minpergame'	=> htmlentities($values['league-minpergame']), 
	':league_games'			=> htmlentities($values['league-games']), 
	':league_playoff_teams'	=> htmlentities($values['league-playoff-teams']), 
	':league_roster'		=> htmlentities($values['league-roster']), 
	':league_onfield'		=> htmlentities($values['league-onfield']), 
	':league_femsonfield'	=> htmlentities($values['league-femsonfield']), 
	':league_price'			=> htmlentities($values['league-price']), 
	':league_freeagents'	=> htmlentities($values['league-freeagents']), 
	':league_captains'		=> htmlentities($values['league-captains']), 
	':league_teamplayers'	=> htmlentities($values['league-teamplayers']), 
	':league_note'			=> htmlentities($values['league-note']), 
	':league_laid'			=> htmlentities($values['league-laid']), 
	':league_status'		=> htmlentities($values['league-status'])
	]);
	
	return $values['league-id'];

}



function fetchLeaguesBySeason($season_id) {

	global $con;

	$query = $con->prepare("
	SELECT * FROM leagues
	LEFT JOIN locations
	ON leagues.location_id = locations.location_id
	LEFT JOIN seasons 
	ON leagues.season_id = seasons.season_id
	WHERE leagues.season_id = :season_id
	");

	$query->execute([
		':season_id'	=> $season_id
		]);

	$count = $query->rowCount();

	if ($count < 1) {
		return 'No leagues available';
	}
	else {
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}


function dbCreateLocation($values) {
	
	global $con;

	$query = $con->prepare("
		INSERT INTO locations
		(	location_borough,
			location_hood,
			location_field,
			location_map_link,
			location_map_embed )
		VALUES 
		(
			:location_borough,
			:location_hood,
			:location_field,
			:location_map_link,
			:location_map_embed )
	");

	$query->execute([
    ':location_borough'			=> htmlentities(getBorough($values['location-hood'])), 
    ':location_hood'			=> htmlentities($values['location-hood']),
	':location_field'			=> htmlentities($values['location-field']),
	':location_map_link'		=> htmlentities($values['location-map-link']),
	':location_map_embed'		=> htmlentities($values['location-map-embed'])
	]);


}

function fetchLocations() {

	global $con;

	$query = $con->prepare("
	SELECT * FROM locations
	");

	$query->execute();

	$count = $query->rowCount();

	if ($count < 1) {
		return 'No locations available';
	}
	else {
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	
}





?>