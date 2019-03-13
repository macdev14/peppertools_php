<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$username = '';
$email = '';
$password_1 = '';
$password_2 = '';
$errors = array();

// DATABASE CONNECTION //

require_once "../model/Conexao.class.php";
require_once 'user_exists.php';

$db = Conexao::get_instance();


// if the register button is clicked
echo $_POST['username'].'<br>';
echo password_hash(filter_var($_POST['password_2'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT).'<br>';
echo $_POST['password_2'].'<br>';

if (isset($_POST['register'])) {



if(user_exists($_POST['username'], $_POST['password_1'])){
  $_SESSION['errors'] = 'Usuario existe';
  header("location:javascript://history.go(-1)");
 
}
//echo var_dump($db);

if(!empty($_POST['username']) && !empty($_POST['password_1']) && !empty($_POST['password_2']) )
{
  

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	
	$password_1 = filter_var($_POST['password_1'], FILTER_SANITIZE_STRING);
	$password_2 = filter_var($_POST['password_2'], FILTER_SANITIZE_STRING);

	// ensure that form fields are filled properly; 

	if (empty($username)) {
		# code...
		array_push($errors, "Username is required"); //add errors to error's array;
	}
	
	if (empty($password_1)) {
		# code...
		array_push($errors, "Password is required"); //add errors to error's array;
	}
	if ($password_1 != $password_2) {
		# code...
		array_push($errors, "The two passwords do not match"); //add errors to error's array;
	}

	if(user_exists($username, $password_1) == true){
		array_push($errors, "User Exists"); //add errors to error's array;
		$_SESSION['errors'] = "Usu&aacute;rio j&aacute; existente";
		header("location:javascript://history.go(-1)");
	}
	
		// if there are no errors save user to database


	if(count($errors) == 0){
		$stmt = "INSERT INTO usuarios (ds_login, ds_senha) VALUES (:username, :password)";
		$bind = array(':username' => $username, 
			          ':password' => password_hash($password_1, PASSWORD_DEFAULT));
		$ready = $db->prepare($stmt);
		$ready->execute($bind);

		$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 30);

		$_SESSION['username'] = $username;
		$_SESSION['state'] = bin2hex(random_bytes(5));
		//$_SESSION['success'] = 'You are now logged in!';
		echo user_exists($username, $password_1);
		//header('location: ../index'); // redirect to home page
	}

}
}


?>