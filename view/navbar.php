<?php require_once '../controller/activebar.php'; 
ini_set ('default_charset', 'UTF8');

?>

<!---
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index">Pimentel Ferramentas</a>
    </div>
    <ul class="nav navbar-nav">
      <li   <?=echoActiveClassIfRequestMatches("index")?>> 
        <a href="../index">Home</a>
      </li>
       <li  <?=echoActiveClassIfRequestMatches("clientes")?>> 
        <a href="clientes">Clientes</a>
      </li>
      <li   <?=echoActiveClassIfRequestMatches("page_os")?> > <a href="os">Ordem de Servi&ccedil;o</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['username']?> </a></li>
      <li><a href="../controller/logout" onclick="return confirm('Deseja realizar log out?');" ><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>

-->
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />

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
        <a href="../index">Home</a>
      </li>
    

        <li class="dropdown  <?=echoActiveClassIfRequestMatches("clientes")?> ">
            <a href="clientes">Clientes</a>
            <ul class="dropdown-menu">
                <li><a href="cad_cli">Adicionar</a></li>
                <li><a href="buscar_cli">Buscar</a></li>
            </ul>
        </li>
    

     <li class="dropdown <?=echoActiveClassIfRequestMatches("os")?> ">  
            <a href="os">Ordem de Servi&ccedil;o</a>
            <ul class="dropdown-menu"> 
                <li><a href="cad_os">Adicionar</a></li>
                <li><a href="buscar_os">Buscar</a></li>
            </ul>
        </li>
    


     <li class="dropdown <?=echoActiveClassIfRequestMatches("produtos")?> ">  
            <a href="produtos">Produtos</a>
            <ul class="dropdown-menu"> 
                <li><a href="cad_est">Adicionar</a></li>
                <li><a href="buscar_est">Buscar</a></li>
                <li><a href="estoque">Estoque</a></li>
            </ul>
        </li>
    
 <li class="dropdown <?=echoActiveClassIfRequestMatches("vendas")?> ">  
            <a href="vendas">Vendas</a>
            <ul class="dropdown-menu"> 
                <li><a href="orcamentos">Orçamentos</a></li>
                <li><a href="pedidos">Pedidos</a></li>
            </ul>
        </li>
    
    



       
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['username']?> </a></li>
      <li><a href="../controller/logout" onclick="return confirm('Deseja realizar log out?');" ><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>


