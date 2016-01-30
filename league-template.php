<?php
include "functions/init.php";
include "includes/head.php";
include "includes/main-nav.php";

$result = fetchLeague(11);

//LOCATION INFO
$location_hood      = $result['location_hood'];
$location_field     = $result['location_field'];
// $location_map_link   = $result['location_map_link'];
// $location_map_embed    = $result['location_map_embed'];

//LEAGUE DETAILS
$league_season    = $result['league_season']; 
$league_season    = $result['league_season']; 
$league_deadline  = $result['league_deadline']; 
$league_start     = $result['league_start']; 
$league_end       = $result['league_end']; 
$league_start_time  = $result['league_start_time']; 
$league_end_time  = $result['league_end_time'];
$league_day       = $result['league_day']; 
$league_minpergame  = $result['league_minpergame']; 
$league_games     = $result['league_games']; 
$league_playoff_teams = $result['league_playoff_teams']; 
$league_roster    = $result['league_roster']; 
$league_onfield   = $result['league_onfield']; 
$league_femsonfield = $result['league_femsonfield']; 
$league_price     = $result['league_price']; 
$league_freeagents  = $result['league_freeagents']; 
$league_captains  = $result['league_captains']; 
$league_teamplayers = $result['league_teamplayers']; 
$league_note    = $result['league_note']; 
$league_laid    = $result['league_laid']; 
$league_enabled   = $result['league_enabled'];


  //COMPILED INFO

  if ($league_femsonfield > 0) {
    $league_format = 'Co-Ed';
  }
  else {
    $league_format = 'Men\'s';
  }

  $league_headline  = $league_onfield . 'v' . $league_onfield . ' ' . $league_format . ' Soccer';
  $league_subhead   = $league_day . 's @ ' . $location_field . ', ' . $location_hood; 

?>

<div class="jumbotron">
<div class="container">
  <h1>7v7 Co-Ed Soccer</h1>
  <p class="lead">Wednesdays @ Bushwick Inlet Park, Williamsburg</p>
  <div class="hidden-xs">
    <p>
  <a class="btn btn-default">Create a Team</a>
  <a class="btn btn-default">Join Your Team</a>
  <a class="btn btn-success">Join as Free Agent</a>
</p>
</div>
</div>
</div>

<div class="container container-main">
  <div class="col-md-8 league-info">
    <h3><i class="fa fa-calendar"></i> Dec 9 – Mar 2 <br><small>10 regular season games + top 4 teams make playoffs. No bye week.</small></h3>

    <h3><i class="fa fa-clock-o"></i> Wednesdays 6pm-10pm <br><small> 54min per game.</small></h3>

     <h3><i class="fa fa-users"></i> 7v7 Co-Ed <br><small>At least 10 players on roster, 7 on field. At least two females per team must be in the outfield at all times.</small></h3>

     <h3><i class="fa fa-map-marker"></i> Bushwick Inlet Park <br><small> <a href="#">Open Map </a></small></h3>

     <h3><i class="fa fa-usd"></i> 160/player <br><small>Fees cover the NYC Parks permit for the field, the best referees, high-quality balls &amp; large-size goals.</small></h3>
   </div>
   <div class="col-md-4 league-info hidden-sm hidden-xs">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48383.29169292403!2d-73.98983852834188!3d40.718991026953645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x84dd509062cc29d!2sBushwick+Inlet+Park!5e0!3m2!1sen!2sus!4v1453697984306" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
   </div>

<div class="visible-xs">
  <p>
<a class="btn btn-default btn-block">Create a Team</a>
<a class="btn btn-default btn-block">Join Your Team</a>
<a class="btn btn-success btn-block">Join as Free Agent</a>
</p>
</div>

</div>


<?php
include "includes/main-footer.php";
include "includes/footer.php";
include "functions/close.php";
?>
