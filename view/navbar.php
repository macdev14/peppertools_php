<?php require_once '../controller/activebar.php'; ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pimentel Ferramentas</a>
    </div>
    <ul class="nav navbar-nav">
      <li   <?=echoActiveClassIfRequestMatches("index")?>> 
        <a href="../index.php">Home</a>
      </li>
       <li  <?=echoActiveClassIfRequestMatches("page_clients")?>> 
        <a href="page_clients.php">Clientes</a>
      </li>
      <li   <?=echoActiveClassIfRequestMatches("page_os")?> > <a href="page_os.php">Ordem de Servi&ccedil;o</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>