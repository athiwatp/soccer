<?php
include "functions/init.php";

$result = fetchLeague($league_id);

include "functions/league_data.php";

//////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// HTML START /////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

include "includes/head.php";
include "includes/main-nav.php";

echo '
<div class="jumbotron">
<div class="container">
  <h1>'.$league_headline.'</h1>
  <p class="lead">'.$league_subhead.'</p>
  <div class="hidden-xs">
    <p>';

if ($league_status == 'Open') {
  
  if ($league_captains == 1) {
    echo '<a href="http://register.nycsoccer.com/registration?bid='.$league_laid.'&amp;type=Captain" 
          class="btn btn-success" data-toggle="tooltip" data-placement="bottom" 
          title="You\'ll sign up then be able to invite all your teammates to join.">
          Create a Team</a>';
  }
  if ($league_teamplayers == 1) {
    echo '<a href="http://register.nycsoccer.com/registration?bid='.$league_laid.'&amp;type=Team" 
          class="btn btn-default" data-toggle="tooltip" data-placement="bottom" 
          title="You\'ll sign up then join a team you\'ve been invited to.">
          Join Your Team</a>';
  }
  if ($league_freeagents == 1) {
    echo '<a href="http://register.nycsoccer.com/registration?bid='.$league_laid.'&amp;type=FA" 
          class="btn btn-default" data-toggle="tooltip" data-placement="bottom" 
          title="You\'ll sign up then we\'ll place you on an awesome team in need of a player like you.">
          Join as Free Agent</a>';
  }
}
else {
  echo 'Sorry, this league is sold out!';
}
echo '
</p>
</div>
</div>
</div>

<div class="season-status">'.$season_name.' Registration Deadline: '.$league_deadline.'
</div>

<div class="container container-main">
  <div class="col-md-8 league-info">
    <h3><i class="fa fa-calendar"></i> '.$league_start.' - '.$league_end.' <br><small>10 regular season games + top 4 teams make playoffs. No bye week.</small></h3>

    <h3><i class="fa fa-clock-o"></i> '.$league_day.'s '.$league_start_time.'-'.$league_end_time.' <br><small> '.$league_minpergame.'min per game.</small></h3>

    <h3><i class="fa fa-users"></i> '. $league_onfield . 'v' . $league_onfield . ' ' . $league_format . ' <br><small>At least ' . $league_roster . ' players on roster, ' . $league_onfield . ' on field. '; 

     if ($league_femsonfield > 0) {
      echo 'At least ' . $league_femsonfield . ' females per team must be in the outfield at all times.';
     }

     echo '</small></h3>

    <h3><i class="fa fa-map-marker"></i> ' . $location_field . ' <br><small> <a href="'.$location_map_link.'">Open Map </a></small></h3>

    <h3><i class="fa fa-usd"></i> ' . $league_price . '/player <br><small>Fees cover the NYC Parks permit for the field, the best referees, high-quality balls &amp; large-size goals.</small></h3>
   </div>
   <div class="col-md-4 league-info hidden-sm hidden-xs">'.$location_map_embed.'</div>

<div class="visible-xs">
  <p>
<a class="btn btn-default btn-block">Create a Team</a>
<a class="btn btn-default btn-block">Join Your Team</a>
<a class="btn btn-success btn-block">Join as Free Agent</a>
</p>
</div>

</div>';

include "includes/main-footer.php";
include "includes/footer.php";
include "functions/close.php";
?>
