<?php


function redirect_to($location) {
    return header("Location: {$location}");
}

function generate_token() {
    $token = md5(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
    return $token;
}

function is_post() {
   if($_SERVER['REQUEST_METHOD'] == "POST") {
       return true;
   } else {
       return false;
   }
}

// function set_message($message) {
//    if(!empty($message)) {
//        $_SESSION['message'] = $message;
//    } else {
//        $message = "";
//    }
//}
//
//function display_message() {
//    if(isset($_SESSION['message'])) {
//        echo $_SESSION['message'];
//        unset($_SESSION['message']);
//    }
//}

//function clean($string) {
//    return htmlentities($string);
//}


//
//

//
//function validate_registration() {
//    if($_SERVER['REQUEST_METHOD'] == "POST") {
//        $fname      = $_POST['fname'];
//        $email      = $_POST['email'];
//        $password   = $_POST['password'];
//    }
//    
//    //check str_len() for length
//    //create error / validation messaging 
//    
//}

?>