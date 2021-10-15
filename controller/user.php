<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../model/Conexao.class.php';
$errors = array();
$db = Conexao::get_instance();
if (isset($_POST['login'])) {

	
	# code...

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	
	$password_1 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	

	// ensure that form fields are filled properly; 

	if (empty($username)) {
		# code...
		array_push($errors, "Username is required"); //add errors to error's array;
	}
	
	if (empty($password_1)) {
		# code...
		array_push($errors, "Password is required"); //add errors to error's array;
	}
	
	
		// if there are no errors save user to database


	if(count($errors) == 0){
		


		$stmt = "SELECT * FROM usuarios WHERE ds_login = :username";
		$bind = array(':username' => $username);
        
         
  
		$ready = $db->prepare($stmt);
		$ready->execute($bind);

		$result = $ready->fetch(PDO::FETCH_ASSOC);

		if (password_verify($password_1, $result['ds_senha']))
		{


		$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (60 * 30);
        $_SESSION['state'] = bin2hex(random_bytes(5));
		$_SESSION['username'] = $username;
		//$_SESSION['success'] = 'You are now logged in!';
		header('location: ../index'); // redirect to home page

		}else{
			array_push($errors, "Username or Password invalid");
			echo $username.'<br>';
			echo $result['ds_senha'].'<br>';
			
			//echo var_dump($result);
			//echo var_dump($errors);
		  header("location:../view/login");
		}

	}else{

		$_SESSION['errors'] = $errors;
		header("location:../view/login");

	}
	
}







?>
