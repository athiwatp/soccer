<?php
include "../functions/init.php";
include $path . "functions/session_check.php";

//Need some authentication around this? 
if (isset($_POST['update-league'])) {
  $update_id = dbUpdateLeague($_POST);
}

$locations = fetchLocations();

$result = fetchLeague($_GET['id']);

include $path . "functions/league_data.php";

$league_start_time  = onlyTime($result['league_start_time']);
$league_start_ampm  = onlyAmPm($result['league_start_time']);

$league_end_time  = onlyTime($result['league_end_time']);
$league_end_ampm  = onlyAmPm($result['league_end_time']);


include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

if (isset($update_id)) {
  echo '<div class="alert alert-success alert-dismissible"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> 
	       Success! <a href="preview/'.$update_id.'">Preview the league</a>, or keep editing.
        </div>';
}

echo '<div class="container container-main">

<a href="admin/"><i class="fa fa-arrow-left"></i> Back to all leagues</a>

<h1>Editing '.$league_headline.'</h1>
<p>'.$league_subhead.'</p>

<!-- FORM START-->
<form method="post" class="col-md-6">

<input type="hidden" name="league-id" value="'.$league_id.'">

  <!-- SEASON START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Season</label>
      <select class="form-control medium-input" name="season-id">
        <option value="1" ';
        if ($season_id == 1) {
          echo 'selected';
        }
        echo '>Spring</option>
        <option value="2" ';
        if ($season_id == 2) {
          echo 'selected';
        }
        echo '>Summer</option>
        <option value="3" ';
        if ($season_id == 3) {
          echo 'selected';
        }
        echo '>Fall</option>
        <option value="4" ';
        if ($season_id == 4) {
          echo 'selected';
        }
        echo '>Winter</option>
      </select>
  </div>
<!-- SEASON END -->

<!-- LOCATION START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Field</label>
      <select class="form-control medium-input" name="location-id">';
       
       for ($i = 0 ; $i < count($locations) ; $i++) {
          echo '<option value="'.$locations[$i]['location_id'].'">'.$locations[$i]['location_field'].'</option>';
       }

  echo '</select>
  </div>
<!-- LOCATION END -->

<!-- REG DEADLINE START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Registration Deadline</label>
      <input type="date" class="form-control medium-input" name="league-deadline" value="'.$result['league_deadline'].'">
  </div>
<!-- REG DEADLINE END -->

<!--  DATES START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Dates</label>
      <input type="date" class="form-control medium-input" name="league-start" placeholder="Start" value="'.$result['league_start'].'">
      <input type="date" class="form-control medium-input" name="league-end" placeholder="End" value="'.$result['league_end'].'">
  </div>
<!--  DATES END -->

<!--  TIME  START -->
  
    <label class="control-label">Start Time</label>
    <div class="form-group form-group-lg form-inline">
      <input type="time" class="form-control small-input" name="league-start-time" placeholder="" value="'.$league_start_time.'">
      <select class="form-control xsmall-input" name="league-start-ampm">
        <option value="am"';
        if ($league_start_ampm == 'am') {
          echo 'selected';
        }
        echo '>AM</option>
        <option value="pm" ';
        if ($league_start_ampm == 'pm') {
          echo 'selected';
        }
        echo '>PM</option>
      </select>
     </div>
     
    <label class="control-label">End Time</label>
    <div class="form-group form-group-lg form-inline">
      <input type="time" class="form-control small-input" name="league-end-time" placeholder="" value="'.$league_end_time.'">
      <select class="form-control xsmall-input" name="league-end-ampm">
        <option value="am"';
        if ($league_end_ampm == 'am') {
          echo 'selected';
        }
        echo '>AM</option>
        <option value="pm" ';
        if ($league_end_ampm == 'pm') {
          echo 'selected';
        }
        echo '>PM</option>
      </select>
  </div>
<!-- GAMES END -->

<!-- MINUTES  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Minutes per Game</label>
      <input type="number" class="form-control xsmall-input" name="league-minpergame" placeholder="" value="'.$league_minpergame.'">
  </div>
<!-- MINUTES END -->

<!-- GAMES  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Number of Games</label>
      <input type="number" class="form-control xsmall-input" name="league-games" placeholder="" value="'.$league_games.'">
  </div>
<!-- GAMES END -->

<!-- PLAYOFF TEAMS  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Playoff Teams</label>
      <input type="number" class="form-control xsmall-input" name="league-playoff-teams" placeholder="" value="'.$league_playoff_teams.'">
  </div>
<!-- PLAYOFF TEAMS  END -->

<!-- ROSTER SIZE   START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Roster Size</label>
      <input type="number" class="form-control xsmall-input" name="league-roster" placeholder="" value="'.$league_roster.'">
  </div>
<!-- ROSTER SIZE  END -->


<!-- PLAYERS ON FIELD    START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Players on Field</label>
      <input type="number" class="form-control xsmall-input" name="league-onfield" placeholder="" value="'.$league_onfield.'">
  </div>
<!-- PLAYERS ON FIELD   END -->


<!-- FEMALES ON FIELD    START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Females on Field</label>
      <input type="number" class="form-control xsmall-input" name="league-femsonfield" placeholder="" value="'.$league_femsonfield.'">
  </div>
<!-- FEMALES ON FIELD   END -->

<!-- PRICE PER PLAYER  START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Price Per Player</label>
      <div class="input-group medium-input">
		  <span class="input-group-addon">$</span>
		  <input type="text" class="form-control" name="league-price" value="'.$league_price.'">
		  <span class="input-group-addon">.00</span>
    </div> 
  </div>
<!-- PRICE PER PLAYER  END -->

<!-- ACCEPTING FREE AGENTS   START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Accepting Free Agents</label><br>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-freeagents" value="1"';
        if ($league_freeagents == 1) {
          echo 'checked';
        }
        echo '>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-freeagents" value="0" ';
        if ($league_freeagents == 0) {
          echo 'checked';
        }
        echo '>
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
    		<input type="radio" name="league-captains" value="1" ';
        if ($league_captains == 1) {
          echo 'checked';
        }
        echo '>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-captains" value="0" ';
        if ($league_captains == 0) {
          echo 'checked';
        }
        echo '>
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
    		<input type="radio" name="league-teamplayers" value="1" ';
        if ($league_teamplayers == 1) {
          echo 'checked';
        }
        echo '>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-teamplayers" value="0" ';
        if ($league_teamplayers == 0) {
          echo 'checked';
        }
        echo '>
    		No
  		</label>
	</div>
  </div>
<!-- ACCEPTING TEAM PLAYERS    END -->

<!-- NOTES START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Special Note</label>
       <input type="text" class="form-control" name="league-note" value="'.$league_note.'">
  </div>
<!-- NOTES    END -->

<!-- LAPPS START -->
  <div class="form-group form-group-lg">
    <label class="control-label">League Apps ID</label>
       <input type="text" class="form-control medium-input" name="league-laid" value="'.$league_laid.'">
  </div>
<!-- LAPPS    END -->

<!-- STATUS START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Status</label>
      <div class="radio">

  		<label>
    		<input type="radio" name="league-status" value="1" ';
        if ($result['league_status'] == 1) {
          echo 'checked';
        }
        echo '>
    		Open for Registration
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-status" value="0"' ;
        if ($result['league_status'] == 0) {
          echo 'checked';
        }
        echo '>
    		Sold Out
  		</label>
	</div>
  </div>
<!-- STATUS END -->
 
<button type="submit" name="update-league" class="btn btn-success btn-block">Update League</button>
  </form>
	<!-- FORM END-->
</div>';


include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
