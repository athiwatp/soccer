<?php
include "functions/init.php";

$boroughs = fetchLocationBoroughs();

include "includes/head.php";
include "includes/main-nav.php";
?>

<div class="jumbotron">
<div class="container">
<h1>NYC's Fun Soccer League</h1>
<p class="lead">Join 8,188 NYC Soccer League members as we head into our 8th year. We pride ourselves on running a well-organized &mdash; and most importantly, fun &mdash; Co-Ed soccer league for intermediate-level players.</p>
<!--<a class="btn btn-success">Browse Leagues</a>
<a class="link">Sign up for Updates</a>-->
</div>
</div>
</div>

<?php 
if (isset($show_img) && $show_img == 1) {
  echo '</div>';
}
?>


<div class="container container-main">

  <div class="page-header">
    <h2>Where would you like to play?</h2>
  </div>


<?php 

  for ($i = 0 ; $i < count($boroughs) ; $i++) {
    $location_borough = $boroughs[$i]['location_borough'];
    $leagues          = fetchActiveLeaguesByBorough($location_borough);
    
    if ($leagues == 0) {
      echo '<p>No leagues currently available in '.$location_borough.'</p>';
    }
    else {

      echo '<!-- BOROUGH LEAGUES START -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>'.$location_borough.'</h4>
          </div>
          <div class="panel-body">
            <ul class="leagues-list">';

          for ($ii = 0 ; $ii < count($leagues) ; $ii++) {
            $result           = $leagues[$ii];

            include "functions/league_data.php";

            echo '<li><a href="'.strtolower($location_borough).'/'.$league_id.'">'.$league_name_long.'</a></li>';

          }
              
          
          echo '</ul>
          </div>
        </div>
        <!-- BOROUGH LEAGUES END -->';

    }    

  }

?>


</div> <!-- main container -->


<?php
include "includes/main-footer.php";
include "includes/footer.php";
include "functions/close.php";
?>
