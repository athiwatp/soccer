<?php
http_response_code(404);
include "functions/init.php";
include "includes/head.php";
include "includes/main-nav.php";
?>

<div class="container">
<h1>DOH! This page doesn't exist.</h1>
<p>Please contact us if you believe this is an error.</p>
<img src="imgs/404.jpg">
</div>



<?php
include "includes/main-footer.php";
include "includes/footer.php";
include "functions/close.php";
?>