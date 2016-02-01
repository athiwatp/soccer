<?php
include "functions/init.php";

session_unset();
redirect('login.php');
exit;

include "functions/close.php";
?>