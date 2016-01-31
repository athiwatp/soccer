<?php
include "../functions/init.php";
include $path . "functions/session_check.php";
include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

?>


<div class="container container-main">

<a href="create-location.php" class="btn btn-success"><i class="fa fa-plus"></i> Create Location</a>

<!-- BOROUGH START-->
	<div class="table-responsive">
		<h2>Brooklyn</h2>
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
		  <tbody> 
		  	<tr> 
		  		<th scope="row">Bushwick Inlet Park</th> 
		  		<td>Williamsburg</td> 
		  		<td><a href="http://goo.gl/maps/dR9YY">http://goo.gl/maps/dR9YY</a></td> 
		  		<td><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48383.29169292403!2d-73.98983852834188!3d40.718991026953645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x84dd509062cc29d!2sBushwick+Inlet+Park!5e0!3m2!1sen!2sus!4v1453697984306" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></td> 
		  		<td><a href="#">Edit</a></td>
		  	</tr> 
		  	<tr> 
		  		<th scope="row">Bushwick Inlet Park</th> 
		  		<td>Williamsburg</td> 
		  		<td><a href="http://goo.gl/maps/dR9YY">http://goo.gl/maps/dR9YY</a></td> 
		  		<td><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48383.29169292403!2d-73.98983852834188!3d40.718991026953645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x84dd509062cc29d!2sBushwick+Inlet+Park!5e0!3m2!1sen!2sus!4v1453697984306" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></td> 
		  		<td><a href="#">Edit</a></td>
		  	</tr> 
		  </tbody>
		</table>
	</div>
	<!-- BOROUGH END-->
</div>



<?php 

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
