

<!DOCTYPE html>
<html>
<head>
  <title>Pimentel Ferramentas</title>
 <style type="text/css">
      #chart-container {
        width: 640px;
        height: auto;
      }

    </style>

<link rel="shortcut icon" href="favicon.png">
</head>
<body>

<?php 
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);
require_once 'controller/activebar.php';

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}


if (!isset($_SESSION['state']) && empty($_SESSION['state'])) {
  # code...
  header('location: view/login');
}else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            header('location: view/login');
        }
       }


 ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- -->
<style type="text/css">
  .dropdown:hover > .dropdown-menu {
    display: block;
}
.dropdown > .dropdown-toggle:active {
    /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>

<nav class="navbar navbar-inverse navbar-expand-lg">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index">Pimentel Ferramentas</a>
    </div>
    <ul class="nav navbar-nav">
       <li <?=echoActiveClassIfRequestMatches("index")?>> 
        <a href="index">Home</a>
      </li>
    

        <li class="dropdown  <?=echoActiveClassIfRequestMatches("view/clientes")?> ">
            <a href="view/clientes">Clientes</a>
            <ul class="dropdown-menu">
                <li><a href="view/cad_cli">Adicionar</a></li>
                <li><a href="view/buscar_cli">Buscar</a></li>
            </ul>
        </li>
    

     <li class="dropdown <?=echoActiveClassIfRequestMatches("view/os")?> ">  
            <a href="view/os">Ordem de Servi&ccedil;o</a>
            <ul class="dropdown-menu"> 
                <li><a href="view/cad_os">Adicionar</a></li>
                <li><a href="view/buscar_os">Buscar</a></li>
            </ul>
        </li>
    


     <li class="dropdown <?=echoActiveClassIfRequestMatches("view/produtos")?> ">  
            <a href="view/produtos">Produtos</a>
            <ul class="dropdown-menu"> 
                <li><a href="cad_prod">Adicionar</a></li>
                <li><a href="buscar_prod">Buscar</a></li>
            </ul>
        </li>
    
 <li class="dropdown <?=echoActiveClassIfRequestMatches("view/pedidos")?> ">  
            <a href="view/pedidos">Pedidos</a>
            <ul class="dropdown-menu"> 
                <li><a href="view/cad_ped">Adicionar</a></li>
                <li><a href="view/buscar_ped">Buscar</a></li>
            </ul>
        </li>
    
    



       
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['username']?> </a></li>
      <li><a href="controller/logout" onclick="return confirm('Deseja realizar log out?');" ><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>




<!-- -->











<div id="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>

    <!-- javascript -->
    <script type="text/javascript" src="view/js/Chart.min.js"></script>
    <script type="text/javascript" src="view/js/app.js"></script>


</body>
</html>