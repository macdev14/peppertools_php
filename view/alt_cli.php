<?php
$title = "Alterar";
require_once 'dependencias.php';
require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Manager();
$id = $_POST['id'];
 require_once 'navbar.php';

?>


<h2 class="text-center"> 
Página de Cadastro <i class="fa fa-user-edit"></i>

</h2> <hr>

<form method="post" action="../controller/update_client">

<div class="container">
	<div class="form-row">

		<?php foreach($manager->getInfo("Clientes", $id) as $client_info ): ?>

		<div class="col-md-6">
			Nome: <i class="fa fa-user"></i>
			<input class="form-control" type="text" name="name" required autofocus value="<?= $client_info['nome']?>">	<br>

		</div>

		<div class="col-md-6">
			E-mail: <i class="fa fa-envelope"></i>
			<input class="form-control" type="email" name="email" required value="<?= $client_info['email']?>">	<br>

		</div>

		<div class="col-md-4">
			CNPJ: <i class="fa fa-address-card"></i>
			<input class="form-control" type="text" name="cpf" required id="cpf" value="<?= $client_info['cnpj']?>">	<br>

		</div>

		<div class="col-md-4">
			Estado: <i class="fa fa-calender"></i>
			<input class="form-control" type="text" name="estado" required value="<?= $client_info['estado']?>">	<br>

		</div>

		<div class="col-md-4">
			Telefone: <i class="fab fa-whatsapp"></i>
			<input class="form-control" type="text" name="phone" required id="phone" value="<?= $client_info['telefone']?>">	<br>

		</div>

		<div class="col-md-12">
			Endereço: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="address" required value="<?= $client_info['endereco']?>">	<br>

		</div>


       <div class="col-md-4">

       	<input type="hidden" name="id" value="<?= $client_info['id']?>">

       <?php endforeach; ?>

       	<button class="btn btn-warning btn-lg">
       		Alterar Cliente <i class="fa fa-user-edit"></i>

       	</button><br><br>

       	<a href="clientes">
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

