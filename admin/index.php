<?php
include "../functions/init.php";
include $path . "functions/session_check.php";
include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

?>


<div class="container container-main">

<!-- SEASON START-->
	<div class="table-responsive">
		<h2>Spring <small><a href="#">Activate</a></small></h2>
		<table class="table table-striped table-hover table-condensed">
		  <thead>
		  	<tr> 
		  		<th>League</th> 
		  		<th>Status</th> 
		  		<th>Borough</th> 
		  		<th>Dates</th> 
		  		<th>Price</th> 
		  		<th>LA</th>
		  		<th></th> 
		  	</tr> 
		  </thead> 
		  <tbody> 
		  	<tr> 
		  		<th scope="row"><a href="#">Monday 7v7 Co-ed @ Bushwick Inlet Park</a></th> 
		  		<td>Active</td> 
		  		<td>Brooklyn</td> 
		  		<td>Mar 14 - May 30</td> 
		  		<td>$160</td>
		  		<td>349587</td>
		  		<td><a href="#">Edit</a></td>
		  	</tr> 
		  	<tr> 
		  		<th scope="row"><a href="#">Monday 7v7 Co-ed @ Bushwick Inlet Park</a></th> 
		  		<td>Active</td> 
		  		<td>Brooklyn</td> 
		  		<td>Mar 14 - May 30</td> 
		  		<td>$160</td>
		  		<td>349587</td>
		  		<td><a href="#">Edit</a></td>
		  	</tr> 
		  </tbody>
		</table>
	</div>
	<!-- SEASON END-->
</div>



<?php 

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
