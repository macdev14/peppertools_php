<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);
//ini_set('session.gc_maxlifetime', 1800) ;
 session_start(); 
if (isset($_SESSION['state'], $_SESSION['loggedin']) && !empty($_SESSION['username']) && !empty($_SESSION['state'] )  ) {
	# code...
	header('location: ../index');
}

?>
<!---
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form Tutorial</title>
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

		.errors{
			color: red;
		}


		</style>
	</head>
	<body>
		<div class="login-form">
			<h1>Login Form</h1>
			<div class="errors">
				<?php if(isset($_SESSION['errors'])){echo $_SESSION['errors'];}?>
			</div>
			<form action="../controller/user" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="login" value="Login" onclick="<?php unset($_SESSION['errors']);?>">
			</form>
			<label> <a href= "register"> Register </a></label>
		</div>
	</body>
</html>



-->


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="logo_2.png">


    <title>Peppertools - Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div align="center">
            <div align="center" style = "height:100px"> </div>
  <p><a href="http://www.peppertools.com.br"><img src="logo.gif" width="361" height="46" border="0" class="img-rounded"	></a>
</p>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Acesso Restrito</h3>
                        <h4 class="panel-title"><?=date("d/m/Y")?></h4>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../controller/user" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" placeholder="Usu&aacute;rio" autofocus autocomplete>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Senha" autocomplete>
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <input name="login" class="btn btn-lg btn-default btn-block" type="submit" id="login-button" value="Login" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>






