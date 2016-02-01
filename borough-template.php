<?php
include "functions/init.php";


$location_borough 	= ucfirst($borough);
$leagues 			      = fetchActiveLeaguesByBorough($location_borough);

$locations 			    = fetchLocationsByBorough($location_borough);

$fields 			      = fetchFieldsByBorough($location_borough);

$active_season		  = fetchActiveSeason();
$season_name 		     = $active_season['season_name'];

include "includes/head.php";
include "includes/main-nav.php";


echo '
<div class="jumbotron">
<div class="container">
<h1>'.$location_borough.' Soccer Leagues</h1>
<p class="lead">We play on the best fields in '.$location_borough.', including ';

for ($i = 0 ; $i < count($fields) ; $i++) {
	echo '<a class="link" target="_blank" href="'.$fields[$i]['location_map_link'].'">'.$fields[$i]['location_field'].'</a>';
	if ($i < count($fields)-3) {
		echo ', ';
	}
	elseif ($i == count($fields)-2) {
		echo ' and ';
	}
	else {
	}
}
echo '.</p>


</div>
</div>

<div class="container container-main">
  <div class="page-header">
    <h2>Join one of our '.$season_name.' leagues:</h2>
  </div>';


if ($leagues == 0) {
  echo '<p>No leagues available this season.</p>';
}
  else {

    echo '<ul class="leagues-list">';

    	for ($ii = 0 ; $ii < count($leagues) ; $ii++) {

    		$result = $leagues[$ii];

    		include "functions/league_data.php";

    		echo '<li><a href="'.$borough.'/'.$league_id.'">'.$league_name_long.'</a></li>';
    	}
  }


  echo '</ul>



</div>';



include "includes/main-footer.php";
include "includes/footer.php";
include "functions/close.php";
?>
