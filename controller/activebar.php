<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

if($_SERVER['REQUEST_URI'] == '/view/' || $_SERVER['REQUEST_URI'] == '/controller/' || $_SERVER['REQUEST_URI'] == '/model/'){
	header('location: ../index');
}


if (!isset($_SESSION['username'], $_SESSION['loggedin'], $_SESSION['expire']) && empty($_SESSION['username']) && empty($_SESSION['loggedin'] )  ) {
	# code...
	header('location: ../view/login');
}else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            header("location: ../view/login");
        }else { //Starting this else one [else1]}
    
    }
}


function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri){
        echo 'active';
    }
}




?>