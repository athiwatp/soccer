<?php

function checkToken($current_token) {

	global $con;

	$user_email = $_SESSION['user_email'];

	$check_token = $con->prepare("
		SELECT user_sess_id FROM users 
		WHERE user_email = :user_email
		");

	$check_token->execute([
		':user_email'	=> $user_email
		]);

	$count = $check_token->rowCount();

	if ($count == 1) {
		$result = $check_token->fetch(PDO::FETCH_ASSOC);

		if ($result['user_sess_id'] == $current_token) {
			return 1;
		}
		else {
			return 0;
		}

	} else {
		return 0;
	}
}


function updateSession($new_token) {
	
	global $con;

	$update_session = $con->prepare("
		UPDATE users SET
		user_sess_id = :user_sess_id
	");

	$update_session->execute([
		':user_sess_id'	=> $new_token
	]);

	$_SESSION['user_sess_id'] = $new_token;
}



function sessionValidate() {

	if (isset($_SESSION["user_sess_id"]) && isset($_SESSION['user_email'])) {

		  if (checkToken($_SESSION["user_sess_id"]) == 1) {
		  	$new_token = generateToken();
		  	updateSession($new_token);
		  	return 1;
		  }
		  else {
		    session_unset();
		    redirect('../login.php');
		    exit;
		}
	} else {
	    session_unset();
	    redirect('../login.php');
	    exit;
	}
}



?>
