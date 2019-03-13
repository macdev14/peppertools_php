<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Form</title>
		<style>
		.login-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.login-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.login-form input[type="password"],
		.login-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.login-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
		</style>
	</head>
	<body>
		<div class="login-form">
			<h1>Registration Form</h1>
			<div class="errors">
				<?php if(isset($_SESSION['errors'])){echo $_SESSION['errors'];}?>
			</div>
			<form action="../controller/register" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password_1" placeholder="Password">
				<input type="password" name="password_2" placeholder="Confirm Password">
				<select>
					<option value="1">
					Usu&aacute;rio
				</option><
					<option value="3">
					Administrador
				</option></select>
				
				<input type="submit" name="register">

			</form>
			<label> <a href= "login"> Login </a></label>
		</div>
	</body>
</html>
