<?php
require_once "Conexao.class.php";

class User extends Conexao{


public $username = '';
public $email = '';
public $password_1 = '';
public $password_2 = '';
public $errors = array();

// DATABASE CONNECTION //

//$db = new PDO("mysql:host=localhost;dbname=registration", "root", "root"); 

// if the register button is clicked



// log user in from login page
public function checkUser(){


		$db = parent::get_instance();
		


		$stmt = "SELECT * FROM usuarios WHERE ds_login = :username";
		$bind = array(':username' => $this->username);
        
         
  
		$ready = $db->prepare($stmt);
		$ready->execute($bind);

		$result = $ready->fetch(PDO::FETCH_ASSOC);

		if (password_verify($this->password_1, $result['ds_senha']))
		{


		$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 30);
        $_SESSION['state'] = bin2hex(random_bytes(5));
		$_SESSION['username'] = $username;
		//$_SESSION['success'] = 'You are now logged in!';
		header('location: ../index'); // redirect to home page

		}else{
			array_push($errors, "Username or Password invalid");
			echo $username.'<br>';
			echo $result['ds_senha'].'<br>';
			echo var_dump($result);
			echo var_dump($errors);
		//	header("location:login.php");
		}

	}



	}
}




//logout



?>
