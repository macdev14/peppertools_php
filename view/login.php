<?php

//setup php for working with Unicode data
/*mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');
ob_start('mb_output_handler');
*/
if(isset($_SESSION['errors'])){$errors = $_SESSION['errors'];}
else{$errors=array();}

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

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">


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
                        <h5 class="panel-title"><?php foreach ($errors as $error): ?>
                             <p><?php echo $error; ?></p>
  
                        <?php endforeach ?>

                    </h5>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../controller/user" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" placeholder="Usu&aacute;rio" autofocus autocomplete required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Senha" autocomplete required>
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






