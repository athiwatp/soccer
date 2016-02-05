<?php
include "../functions/init.php";


//Need some authentication around this? 
if (isset($_POST['create-location'])) {
  $success = dbCreateLocation($_POST);
}

include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

if (isset($success) && $success == 1) {
  echo '<div class="alert alert-success alert-dismissible"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> 
        Success! Location created.
        </div>';
}


?>

<div class="container container-main">

<a href="admin/locations.php"><i class="fa fa-arrow-left"></i> Back to all locations</a>

<h1>Create a Location</h1>

<!-- FORM START-->
<form method="post" class="col-md-6">
  

<!-- HOOD START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Hood</label>
       <select class="form-control medium-input" name="location-hood">
        <option value="Chelsea">Chelsea</option>
        <option value="Dumbo">Dumbo</option>
        <option value="East Village">East Village</option>
        <option value="Long Island City">Long Island City</option>
        <option value="West Village">West Village</option>
        <option value="Williamsburg">Williamsburg</option>
      </select>
  </div>
<!-- HOOD  END -->

<!-- FIELD NAME START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Field Name</label>
       <input type="text" class="form-control" name="location-field">
  </div>
<!-- FIELD NAME    END -->


<!-- MAP LINK START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Map Link</label>
       <input type="text" class="form-control" name="location-map-link">
  </div>
<!-- MAP LINK   END -->

<!-- MAP EMBED START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Map Embed</label>
       <textarea class="form-control" name="location-map-embed" rows="10"></textarea>
  </div>
<!-- MAP EMBED    END -->

 
<button type="submit" name="create-location" class="btn btn-success btn-block">Create Location</button>
  </form>
	<!-- FORM END-->
</div>



<?php 

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
