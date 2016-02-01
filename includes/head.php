<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 

    if (isset($borough) && $borough == 'home') {
      $title_tag = 'NYC Soccer League | Fun Co-Ed Soccer in New York';
      $show_img     = 1;
    }
    $borough_array = ['Brooklyn', 'Manhattan', 'Queens'];
    if (isset($location_borough) && in_array($location_borough, $borough_array)) {
      $title_tag = $location_borough.' Soccer League | Co-Ed &amp; Men\'s';
      $show_img     = 1;
    }
    if (isset($league_id) && $league_id > 0) {
      $title_tag    = $league_name;
      $show_img     = 1;
    }

    if (isset($title_tag)) {} 
      else {
        $title_tag = 'NYCSoccer.com';
        $show_img     = 0;
      }

    echo '<title>'.$title_tag.'</title>';

    ?>

    <base href="http://nycsoccer.com/">
    <!-- Bootstrap -->
    <?php 
    echo '<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href="css/custom.css" rel="stylesheet" type="text/css">';
    ?>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300|Montserrat:700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php 

  if (isset($preview) && $preview == 1) {
  echo '<div class="alert alert-danger">THIS IS A PREVIEW. The league will be available publicly here: http://'.$league_url.' </div>';
}


if (isset($show_img) && $show_img == 1 && $auth != 1) {
  
  echo '<div class="overlay" style="background: 
      url(\'http://nycsoccer.com/imgs/bg1.jpg\') 
      50% 50% / cover no-repeat;">';
}



?>
<div class="bg-image" style="
      background-color: rgba(111,182,238,0.9);
      ">
        <nav class="navbar navbar-blue navbar-static-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="">
            <?php 
              echo '<img alt="NYCSoccer.com" src="imgs/nycsoccer-white-logo.png">';
            ?>
              </a>
            </div>