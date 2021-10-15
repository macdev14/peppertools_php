<?php
session_start();
$title = "Alterar";
require_once 'dependencias.php';
require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$OS = new Os();
//$dateTime = new DateTime();
//$date = $dateTime->format('d/m/Y');
 /* if(empty($_SESSION['Id'])){
$_SESSION['Id'] = $_POST['Id'];
} */
//$id = $_POST['Id'];
require_once 'navbar.php';

?>


<h2 class="text-center"> 
Cadastro O.S <i class="fa fa-user-edit"></i>

</h2>
<h5 class="text-center"> 
Datas serao alteradas para 'dd/mm/ano' <i class="fa fa-user-edit"></i>

</h5>

 <hr>

<form method="post" action="../controller/insert_os">

<div class="container">
	<div class="form-row">

		
		<div class="col-md-4">
			Numero OS: <i class="fa fa-user"></i>
			<input class="form-control" type="text" name="Numero_Os" readonly required autofocus value="<?=$OS->getNumero_OS()?>">	<br>

		</div>

		
         	


		<div class="col-md-6">
			Cliente: <i class="fa fa-user"></i>
				

			<select name="Id_Cliente" class="Id_Cliente"> 
			<?php foreach($OS->listClientes() as $cliente){	

            if ($cliente['Id'] == $os_info['Id_Cliente']) {
            	echo utf8_encode("<option value=".$cliente['Id']." selected>".$cliente['nome']."</option>");
            	
            } echo utf8_encode("<option value=".$cliente['Id'].">".$cliente['nome']."</option>");
			} ?>
			</select> <br>



		</div>

<div class="col-md-12">
			

		</div>


		<div class="col-md-12">
			

		</div>

		<div class="col-md-6">
			Ferramenta <i class="fa fa-envelope"></i>
			<input class="form-control" type="text" name="Ferramenta" value="">	<br>

		</div>

		<div class="col-md-4">
			Desenho Cliente <i class="fa fa-address-card"></i>
			<input class="form-control" type="text" name="Desenho_Cliente"  id="Desenho_Cliente" value="">	<br>

		</div>

		<div class="col-md-4">
			Desenho Pimentel <i class="fa fa-address-card"></i>
			<input class="form-control" type="text" name="Desenho_Pimentel" id="Desenho_Pimentel" value="">	<br>

		</div>

		<div class="col-md-2">
			Data (ordem correta): <i class="fa fa-calender"></i>
			<input class="form-control" type="date" name="Data" readonly value="<?=date('Y-m-d',strtotime('01-01-0001'))?>">	<br>

		</div>

		<div class="col-md-2">
			Prazo: <i class="fa fa-calender"></i>
			<input class="form-control" type="date" name="Prazo" value="<?=date('Y-m-d',strtotime('01-01-0001'))?>" >	<br>

		</div>

		<div class="col-md-6">
			Especificacao: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Especificacao" value="">	<br>

		</div>

		<div class="col-md-6">
			Grava&ccedil;&atilde;o: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="gravacao" value="">	<br>

		</div>

		<div class="col-md-6">
			Grava&ccedil;&atilde;o 2: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="gravacao2" value="">	<br>

		</div>


		<div class="col-md-6">
			Material: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Material" value="">	<br>

		</div>

		<div class="col-md-2">
			Unidade: <i class="fa fa-user"></i>
				

			<select name="unidade" class=""> 
			

            
            <option value='peca'>Pe&ccedil;a</option>
            <option value='jogo'>Jogo</option>
           
			</select> <br>



		</div>


		<div class="col-md-2">
			Tipo: <i class="fa fa-user"></i>
				

			<select name="Tipo"> 
			    <option value='fabricacao'>Fabrica&ccedil;&atilde;o</option>
            	<option value='modificacao'>Modifica&ccedil;&atilde;o</option>
            	<option value='afiacao' selected>Afia&ccedil;&atilde;o</option>
           
           
			</select> <br>



		</div>


		<div class="col-md-2">
			Quantidade: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Quantidade" value="1">	<br>

		</div>

		<div class="col-md-4">
			Nota Fiscal: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Numero_Nf" value="0">	<br>

		</div>

		<div class="col-md-4">
		Numero do Pedido: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Numero_Pedido" value="0">	<br>

		</div>

		<div class="col-md-2">
		Data da Nota Fiscal: <i class="fa fa-map"></i>
			<input class="form-control" type="date" name="Data_Nf" value="<?=date('Y-m-d',strtotime('01-01-0001'))?>">	<br>

		</div>

		<div class="col-md-2">
		Data do Pedido: <i class="fa fa-map"></i>
			<input class="form-control" type="date" name="Data_Pedido" value="<?=date('Y-m-d',strtotime('01-01-0001'))?>">	<br>

		</div>		
		
		<div class="col-md-4">
		STATUS: <i class="fa fa-map"></i>
			
		<select name="STATUS"> 
			    <option value='Em Andamento'>Em Andamento</option>
            	<option value='Concluido'>Concluido</option>
            
           
           
			</select> <br>

          </div>
		</div>



       <div class="col-md-4">
	<input type="hidden" name="id" value="<?= $OS->getNewId()?>">

       	<button class="btn btn-warning btn-lg">
       		Cadastrar O.S <i class=".glyphicon-glyphicon-pencil"></i>

       	</button><br><br>

       	<a href="page_os">
       		Voltar
       	</a>

       </div>



	</div>


</div>


 </form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 


<script type="text/javascript">
	$(document).ready(function() {
	    $("#cpf").mask('000.000.000-00');
	    $("#phone").mask('(00)0000-0000');
	})

</script>

