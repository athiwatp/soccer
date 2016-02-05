<?php
include "functions/init.php";

$boroughs = fetchLocationBoroughs();

include "includes/head.php";
include "includes/main-nav.php";
?>

<div class="jumbotron">
<div class="container">
<h1>NYC's Fun Soccer League</h1>
<p class="lead">Join 8,202 NYC Soccer League members as we head into our 8th year. We pride ourselves on running a well-organized &mdash; and most importantly, fun &mdash; Co-Ed soccer league for intermediate-level players.</p>
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



<div class="page-header">
        <h2>Why do 93% of our members play two or more years?</h2>
      </div>
      <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8">
        <p class="lead">We've learned a lot about what makes a long-lasting community in our years organizing soccer games. We've narrowed the list down to a few essential elements that make us successful:</p>
        <dl class="dl-horizontal">
              <dt><h4>Good refs</h4></dt>
          <dd>There's nothing like a terrible referee to make a miserable game. We look for the best referees we can find and pay them top Dollar.</dd>
                <br>
                <dt><h4>Great fields</h4></dt>
          <dd>We scour New York for the best pitches to play on and obtain the hardest-to-get permits at the best time slots available.</dd>
          <br>
          <dt><h4>More game time</h4></dt>
          <dd>Our games are, on average, 20% longer than other well-organized soccer leagues in New York City.</dd>
                <br>
                <dt><h4>No asshole policy</h4></dt>
          <dd>Anyone undermining the enjoyment of a soccer game will be refunded and removed from the league.</dd>
                <br>
                <dt><h4>Balanced teams</h4></dt>
                <dd>We get to know players so that any Free Agents are placed on the right teams so that there is a healthy level of competition among teams.</dd>
      </dl> 
  </div>  

<div class="col-md-4">
<h2>As seen in...</h2>
<div class="press-logo col-md-12 col-sm-6"><img src="imgs/cnn-logo.png"></div>
<div class="press-logo col-md-12 col-sm-6"><img src="imgs/bbc-logo.png"></div>
  </div>

  </div>




</div> <!-- main container -->


<?php
include "includes/main-footer.php";
include "includes/footer.php";
include "functions/close.php";
?>
