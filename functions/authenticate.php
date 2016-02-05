<?php

function userAuthenticate($formdata, $token) {
	if (isset($formdata['user-email']) && isset($formdata['user-pw']) && $_SESSION['token'] == $token) {
		
		$user_email 	= htmlentities($formdata['user-email']);
		$user_pw		= htmlentities($formdata['user-pw']);

		global $con;

		$fetch_user = $con->prepare("
			SELECT * FROM users 
			WHERE user_email = :user_email
			");

		$fetch_user->execute([
			':user_email'	=> $user_email
			]);

		$count = $fetch_user->rowCount();

		if ($count == 1) {

			$result = $fetch_user->fetch(PDO::FETCH_ASSOC);

			if (password_verify($user_pw, $result['user_pw']) && $result['user_role'] == 'admin') {
				//CORRECT PW + ROLE

				$update_session = $con->prepare("
					UPDATE users SET
					user_sess_id = :user_sess_id
				");

				$update_session->execute([
					':user_sess_id'	=> $token
				]);

				$_SESSION['user_email'] 	= $user_email;
				$_SESSION['user_sess_id']	= $token;

				redirect('admin/');
				exit();

			} else { 
				//INCORRECT PW
			    return 0;
			}
		} else { 
			//NO SUCH USER
			return 0;
		}
	}
}


?>