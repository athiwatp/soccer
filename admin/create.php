<?php
include "../functions/init.php";
include $path . "functions/session_check.php";
include $path . "includes/head.php";
include $path . "includes/admin-nav.php";

?>

<!-- <div class="admin-message-success">
	<a href="#">League created</a>! Create another or return to <a href="#">all leagues</a>.
</div> -->


<div class="container container-main">

<h1>Create a League</h1>

<!-- FORM START-->
<form method="post" action="league-view.php" class="col-md-6">
  
  <!-- SEASON START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Season</label>
      <select class="form-control medium-input" name="league-season">
        <option value="1" selected="1">Spring</option>
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
       <option value="1">Bushwick Inlet Park</option>
       <option value="2">James J Walker Park</option>  
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
      <input type="time" class="form-control small-input" name="league-starttime" placeholder="">
      <select class="form-control xsmall-input" name="league-start-ampm">
        <option value="am">AM</option>
        <option value="pm" selected="1">PM</option>
      </select>
     </div>
     
    <label class="control-label">End Time</label>
    <div class="form-group form-group-lg form-inline">
      <input type="time" class="form-control small-input" name="league-endtime" placeholder="">
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

<!-- ENABLED START -->
  <div class="form-group form-group-lg">
    <label class="control-label">Enabled</label>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-enabled" value="1" checked>
    		Yes
  		</label>
		</div>
      <div class="radio">
  		<label>
    		<input type="radio" name="league-enabled" value="0" >
    		No
  		</label>
	</div>
  </div>
<!-- ENABLED    END -->
 
<button type="submit" class="btn btn-success btn-block">Create League</button>
  </form>
	<!-- FORM END-->
</div>



<?php 

include $path . "includes/footer.php";
include $path . "functions/close.php";
?>
