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

    echo '
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="'.$title_tag.'" />
    <meta property="og:description"        content="A well-organized - and most importantly, fun - Co-Ed soccer league for intermediate-level players." />
    <meta property="og:image"              content="http://nycsoccer.com/imgs/bg1.jpg" />
    <meta property="og:site_name"          content="NYCSoccer.com">
    <meta property="fb:app_id"             content="1536019556695858">
    ';

    echo '<base href="'.$base_ref.'">'; 

    ?>

    
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


    <link rel="apple-touch-icon" sizes="57x57" href="imgs/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="imgs/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="imgs/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="imgs/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="imgs/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="imgs/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="imgs/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="imgs/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="imgs/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="imgs/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imgs/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="imgs/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imgs/favicons/favicon-16x16.png">
    <link rel="manifest" href="imgs/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="imgs/favicons/ms-icon-144x144.png">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28912613-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
  var $mcGoal = {'settings':{'uuid':'adc957b39402680867fa5d713','dc':'us8'}};
  (function() {
     var sp = document.createElement('script'); sp.type = 'text/javascript'; sp.async = true; sp.defer = true;
    sp.src = ('https:' == document.location.protocol ? 'https://s3.amazonaws.com/downloads.mailchimp.com' : 'http://downloads.mailchimp.com') + '/js/goal.min.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sp, s);
  })(); 
</script>

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
            <li class="fb-btn hidden-xs"><div class="fb-like" data-href="https://facebook.com/NYCSoccer" data-width="300" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></li>

            </div>