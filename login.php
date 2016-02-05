<?php
include "functions/init.php";
include "functions/authenticate.php";

if (isset($_POST['login-submit'])) {
	$token = generateToken();
	$result = userAuthenticate($_POST, $token);
}


include "includes/head.php";
include "includes/main-nav.php";
?>

<div class="container login-form col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<h1>Login</h1>

<form method="post" class="login-form">
	<div class="form-group form-group-log">
		<label class="control-label">Email</label>
		<input type="email" name="user-email" class="form-control">
	</div>
	<div class="form-group form-group-log">
		<label class="control-label">Password</label>
		<input type="password" name="user-pw" class="form-control">
	</div>
	<button class="btn btn-success btn-block" type="submit" name="login-submit">Login</button>
</form>

</div>

<?php
include "includes/footer.php";
include "functions/close.php";
?>