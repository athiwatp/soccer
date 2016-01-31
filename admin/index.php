<?php
include "../functions/init.php";
include $path . "functions/session_check.php";

$season_ids = [1,2,3,4];

if (isset($_GET['activate_season']) && in_array($_GET['activate_season'], $season_ids)) {
	dbActivateSeason($_GET['activate_season']);
}

if (isset($_GET['delete_league'])) {
	$deleted_id = dbSoftDeleteLeague($_GET['delete_league']);
	$result	 = fetchLeague($deleted_id);
	include $path . "functions/league_data.php";
}

if (isset($_GET['undelete_league'])) {
	$undeleted_id 	= dbUnDeleteLeague($_GET['undelete_league']);
	$result	 	= fetchLeague($undeleted_id);
	include $path . "functions/league_data.php";
}


include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

	if (isset($deleted_id)) {
  		echo '<div class="alert alert-danger"> 
	        Deleted '.$league_name.' <a href="admin/?undelete_league='.$deleted_id.'">Undo</a>.
	        </div>';

		}
 if (isset($undeleted_id)) {
	  echo '<div class="alert alert-success"> 
	        Restored '.$league_name.'.
	        </div>';
	}

echo '
<div class="container container-main">

<a href="admin/create-league.php" class="btn btn-success"><i class="fa fa-plus"></i> Create League</a>';

//LOOPING THROUGH EACH SEASON
for ($i = 1 ; $i < 5 ; $i++) {
	
	$leagues 		= fetchLeaguesBySeason($i);
	$season_id		= $leagues[0]['season_id'];
	$season_name 	= $leagues[0]['season_name'];
	$season_status 	= $leagues[0]['season_status'];

	echo '<!-- SEASON START-->
	<div class="table-responsive">
		<h2>'.$season_name.' <small>';
		if ($season_status == 0) {
			echo ' Inactive <a class="btn btn-sm btn-default" href="admin/?activate_season='.$season_id.'">Activate</a>';
		} else {
			echo ' Active ';
		}
		echo '</small></h2>
		<table class="table table-striped table-hover table-condensed">
		  <thead>
		  	<tr> 
		  		<th>League</th> 
		  		<th>Status</th> 
		  		<th>Dates</th> 
		  		<th>Price</th> 
		  		<th>LA</th>
		  		<th></th> 
		  		<th></th>
		  	</tr> 
		  </thead> 
		  <tbody> ';

		//LOOP THROUGH ALL LEAGUES IN THAT SEASON
		for ($ii = 0 ; $ii < count($leagues) ; $ii++) {

		  	//LEAGUE DATA
		  	$league_id 			= $leagues[$ii]['league_id'];
		  	$location_field     = $leagues[$ii]['location_field'];
		  	$league_start       = shortDate($leagues[$ii]['league_start']); 
			$league_end         = shortDate($leagues[$ii]['league_end']); 
			$league_price		= $leagues[$ii]['league_price'];
			$league_laid		= $leagues[$ii]['league_laid'];
			$league_day         = $leagues[$ii]['league_day'];
			$league_onfield     = $leagues[$ii]['league_onfield'];
			$league_femsonfield = $leagues[$ii]['league_femsonfield'];
			$league_status		= $leagues[$ii]['league_status'];

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


		  	echo '<tr> 
		  		<th scope="row"><a href="#">'.$league_day.' '.$league_onfield.'v'.$league_onfield.' '.$league_format.' @ '.$location_field.'</a></th> 
		  		<td>'.$league_status.'</td> 
		  		<td>'.$league_start.' - '.$league_end.'</td> 
		  		<td>$'.$league_price.'</td>
		  		<td>'.$league_laid.'</td>
		  		<td><a href="admin/edit-league.php?id='.$league_id.'">Edit</a></td>
		  		<td><a class="text-danger" href="admin/?delete_league='.$league_id.'">Delete</a></td>
		  	</tr> ';

		  }


	echo '</tbody>
		</table>
	</div>
	<!-- SEASON END-->';

}


		  	
		  	// <tr> 
		  	// 	<th scope="row"><a href="#">Monday 7v7 Co-ed @ Bushwick Inlet Park</a></th> 
		  	// 	<td>Active</td> 
		  	// 	<td>Brooklyn</td> 
		  	// 	<td>Mar 14 - May 30</td> 
		  	// 	<td>$160</td>
		  	// 	<td>349587</td>
		  	// 	<td><a href="#">Edit</a></td>
		  	// </tr> 
		  
echo '</div>';

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
