<?php
include "../functions/init.php";

//Need some authentication around this 
if (isset($_POST['update-location'])) {
  $success = dbUpdateLocation($_POST);
}

if (isset($_GET['id'])) {
  $result = FetchLocation($_GET['id']);

  $location_id            = $result['location_id'];
  $location_hood          = $result['location_hood'];
  $location_field         = $result['location_field'];
  $location_description   = $result['location_description'];
  $location_map_link      = html_entity_decode($result['location_map_link']);
  $location_map_embed     = html_entity_decode($result['location_map_embed']);
}

include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

if (isset($success) && $success == 1) {
  echo '<div class="alert alert-success alert-dismissible"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> 
        Success! Location updated.
        </div>';
}

echo '

<div class="container container-main">

<a href="admin/locations.php"><i class="fa fa-arrow-left"></i> Back to all locations</a>

<h1>Editing '.$location_field.'</h1>

<!-- FORM START-->
<form method="post" class="col-md-6">

<input type="hidden" name="location-id" value="'.$location_id.'">

<!-- HOOD START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Hood</label>
       <select class="form-control medium-input" name="location-hood">
        <option value="Chelsea" ';
        if ($location_hood == 'Chelsea') {
          echo 'selected';
        }
        echo '>Chelsea</option>
        <option value="Dumbo" ';
        if ($location_hood == 'Dumbo') {
          echo 'selected';
        }
        echo '>Dumbo</option>
        <option value="East Village" ';
        if ($location_hood == 'East Village') {
          echo 'selected';
        }
        echo '>East Village</option>
        <option value="Long Island City" ';
        if ($location_hood == 'Long Island City') {
          echo 'selected';
        }
        echo '>Long Island City</option>
        <option value="West Village" ';
        if ($location_hood == 'West Village') {
          echo 'selected';
        }
        echo '>West Village</option>
        <option value="Williamsburg" ';
        if ($location_hood == 'Williamsburg') {
          echo 'selected';
        }
        echo '>Williamsburg</option>
      </select>
  </div>
<!-- HOOD  END -->

<!-- FIELD NAME START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Field Name</label>
       <input type="text" class="form-control" name="location-field" value="'.$location_field.'">
  </div>
<!-- FIELD NAME    END -->


<!-- FIELD DESCRIPTION START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Field Description</label>
       <input type="text" class="form-control" name="location-description" value="'.$location_description.'">
  </div>
<!-- FIELD DESCRIPTION    END -->


<!-- MAP LINK START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Map Link</label>
       <input type="text" class="form-control" name="location-map-link" value="'.$location_map_link.'">
  </div>
<!-- MAP LINK   END -->

<!-- MAP EMBED START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Map Embed</label>
       <textarea class="form-control" name="location-map-embed" rows="10">'.$location_map_embed.'</textarea>
  </div>
<!-- MAP EMBED    END -->

 
<button type="submit" name="update-location" class="btn btn-success btn-block">Update Location</button>
  </form>
	<!-- FORM END-->
</div>';

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
