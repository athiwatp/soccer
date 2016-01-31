<?php
include "../functions/init.php";
include $path . "functions/session_check.php";

//Need some authentication around this? 
if (isset($_POST['create-league'])) {
  $insert_id = dbCreateLeague($_POST);
}

$locations = fetchLocations();

include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

if (isset($insert_id)) {
  echo '<div class="alert alert-success alert-dismissible"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> 
        Success! <a href="../preview/'.$insert_id.'">Preview the league</a>, or create another below.
        </div>';
}

?>


<div class="container container-main">

<a href="admin/"><i class="fa fa-arrow-left"></i> Back to all leagues</a>

<h1>Create a League</h1>

<!-- FORM START-->
<form method="post" class="col-md-6">
  
  <!-- SEASON START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Season</label>
      <select class="form-control medium-input" name="season-id">
        <option value="1" selected>Spring</option>
        <option value="2">Summer</option>
        <option value="3">Fall</option>
        <option value="4">Winter</option>
      </select>
  </div>
<!-- SEASON END -->

<!-- LOCATION START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Field</label>
      <select class="form-control medium-input" name="location-id">
       <?php 
       for ($i = 0 ; $i < count($locations) ; $i++) {
          echo '<option value="'.$locations[$i]['location_id'].'">'.$locations[$i]['location_field'].'</option>';
       }
        
       ?> 
      </select>
  </div>
<!-- LOCATION END -->

<!-- REG DEADLINE START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Registration Deadline</label>
      <input type="date" class="form-control medium-input" name="league-deadline" placeholder="">
  </div>
<!-- REG DEADLINE END -->

<!--  DATES START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Dates</label>
      <input type="date" class="form-control medium-input" name="league-start" placeholder="Start">
      <input type="date" class="form-control medium-input" name="league-end" placeholder="End">
  </div>
<!--  DATES END -->


<!-- DAY START -->
  <!-- <div class="form-group form-group-lg">
    <label class="control-label">Day</label>
      <select class="form-control medium-input" name="league-day">
        <option selected="1">Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option>Saturday</option>
        <option>Sunday</option>
      </select>
  </div> -->
<!-- DAY END -->

<!--  TIME  START -->
  
    <label class="control-label">Start Time</label>
    <div class="form-group form-group-lg form-inline">
      <input type="time" class="form-control small-input" name="league-start-time" placeholder="">
      <select class="form-control xsmall-input" name="league-start-ampm">
        <option value="am">AM</option>
        <option value="pm" selected="1">PM</option>
      </select>
     </div>
     
    <label class="control-label">End Time</label>
    <div class="form-group form-group-lg form-inline">
      <input type="time" class="form-control small-input" name="league-end-time" placeholder="">
      <select class="form-control xsmall-input" name="league-end-ampm">
        <option value="am">AM</option>
        <option value="pm" selected="1">PM</option>
      </select>
  </div>
<!-- GAMES END -->

<!-- MINUTES  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Minutes per Game</label>
      <input type="number" class="form-control xsmall-input" name="league-minpergame" placeholder="">
  </div>
<!-- MINUTES END -->

<!-- GAMES  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Number of Games</label>
      <input type="number" class="form-control xsmall-input" name="league-games" placeholder="">
  </div>
<!-- GAMES END -->

<!-- PLAYOFF TEAMS  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Playoff Teams</label>
      <input type="number" class="form-control xsmall-input" name="league-playoff-teams" placeholder="">
  </div>
<!-- PLAYOFF TEAMS  END -->

<!-- ROSTER SIZE   START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Roster Size</label>
      <input type="number" class="form-control xsmall-input" name="league-roster" placeholder="">
  </div>
<!-- ROSTER SIZE  END -->


<!-- PLAYERS ON FIELD    START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Players on Field</label>
      <input type="number" class="form-control xsmall-input" name="league-onfield" placeholder="">
  </div>
<!-- PLAYERS ON FIELD   END -->


<!-- FEMALES ON FIELD    START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Females on Field</label>
      <input type="number" class="form-control xsmall-input" name="league-femsonfield" placeholder="">
  </div>
<!-- FEMALES ON FIELD   END -->

<!-- PRICE PER PLAYER  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Price Per Player</label>
      <div class="input-group medium-input">
		  <span class="input-group-addon">$</span>
		  <input type="text" class="form-control" name="league-price">
		  <span class="input-group-addon">.00</span>
    </div> 
  </div>
<!-- PRICE PER PLAYER  END -->

<!-- ACCEPTING FREE AGENTS   START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Accepting Free Agents</label><br>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-freeagents" value="1" checked>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-freeagents" value="0" >
    		No
  		</label>
	</div>
  </div>
<!-- ACCEPTING FREE AGENTS   END -->


<!-- ACCEPTING CAPTAINS  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Accepting Captains</label>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-captains" value="1" checked>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-captains" value="0" >
    		No
  		</label>
	</div>
  </div>
<!-- ACCEPTING CAPTAINS   END -->


<!-- ACCEPTING TEAM PLAYERS  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Accepting Team Players</label><br>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-teamplayers" value="1" checked>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-teamplayers" value="0" >
    		No
  		</label>
	</div>
  </div>
<!-- ACCEPTING TEAM PLAYERS    END -->

<!-- NOTES START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Special Note</label>
       <input type="text" class="form-control" name="league-note">
  </div>
<!-- NOTES    END -->

<!-- LAPPS START -->
  <div class="form-group form-group-lg">
    <label class="control-label">League Apps ID</label>
       <input type="text" class="form-control medium-input" name="league-laid">
  </div>
<!-- LAPPS    END -->

<!-- STATUS START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Status</label>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-status" value="1" checked>
    		Open for Registration
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-status" value="0" >
    		Sold Out
  		</label>
	</div>
  </div>
<!-- STATUS    END -->
 
<button type="submit" name="create-league" class="btn btn-success btn-block">Create League</button>
  </form>
	<!-- FORM END-->
</div>



<?php 

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
