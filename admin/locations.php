<?php
include "../functions/init.php";
include $path . "functions/session_check.php";

$boroughs = fetchLocationBoroughs();

include $path . "includes/head.php";
include $path . "includes/admin-nav.php";



echo '
<div class="container container-main">

<a href="admin/create-location.php" class="btn btn-success"><i class="fa fa-plus"></i> Create Location</a>';



for ($i = 0 ; $i < count($boroughs) ; $i++) {

	$location_borough 	= $boroughs[$i]['location_borough'];
	$locations			= fetchLocationsByBorough($location_borough);

	echo '
	<!-- BOROUGH START-->
	<div class="table-responsive">
		<h2>'.$location_borough.'</h2>
		<table class="table table-striped table-hover table-condensed">
		  <thead>
		  	<tr> 
		  		<th>Field</th>
		  		<th>Hood</th> 
		  		<th>Map Link</th> 
		  		<th>Map Embed</th> 
		  		<th></th>
		  	</tr> 
		  </thead> 
		  <tbody>';
		
		  for ($ii = 0 ; $ii < count($locations) ; $ii++) {

		  	$location_id        	= $locations[$ii]['location_id'];
		  	$location_hood        	= $locations[$ii]['location_hood'];
			$location_field       	= $locations[$ii]['location_field'];
			$location_map_link    	= html_entity_decode($locations[$ii]['location_map_link']);
			$location_map_embed   	= html_entity_decode($locations[$ii]['location_map_embed']);

		  	echo '<tr> 
		  		<th scope="row">'.$location_field.'</th> 
		  		<td>'.$location_hood.'</td> 
		  		<td><a href="'.$location_map_link.'">'.$location_map_link.'</a></td> 
		  		<td>'.$location_map_embed.'</td> 
		  		<td><a href="admin/edit-location.php?id='.$location_id.'">Edit</a></td>
		  	</tr>';
		  }
		  	
	

	echo '</tbody>
		</table>
	</div>
	<!-- BOROUGH END-->';

}



echo '</div>';
 

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
