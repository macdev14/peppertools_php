<?php
session_start();
$title = "Alterar";
require_once 'dependencias.php';
require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
require_once '../model/Estoque.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$OS = new Estoque();


$id = $_POST['ID'];
require_once 'navbar.php';

?>


<h2 class="text-center"> 
Alterar Estoque <i class="fa fa-user-edit"></i>

</h2>
<h5 class="text-center"> 
Datas serao alteradas para 'dd/mm/ano' <i class="fa fa-user-edit"></i>

</h5>

 <hr>

<form method="post" action="../controller/update_est">

<div class="container">
	<div class="form-row">

    <?php foreach($OS->getInfo("Estoque", $id) as $est ): ?>

		<div class="col-md-6">
			Cliente: <i class="fa fa-user"></i>
				

			<select name="id_cliente" class="id_cliente"> 
			<?php foreach($OS->listClientes() as $cliente){	

            if ($cliente['Id'] == $est['id_cliente']) {
            	echo "<option value=".$cliente['Id']." selected>".$cliente['nome']."</option>";
            	
            } echo "<option value=".$cliente['Id'].">".$cliente['nome']."</option>";
			} ?>
			</select> <br>



		</div>

<div class="col-md-12">
			

		</div>


		<div class="col-md-12">
			

		</div>

		<div class="col-md-6">
			Ferramenta <i class="fa fa-envelope"></i>
			<input class="form-control" type="text" name="ferramenta" value="<?= $est['ferramenta']?>">	<br>

		</div>

		<div class="col-md-6">
			Material: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="material" value="<?=$est['material']?>">	<br>

		</div>

		<div class="col-md-2">
			Data (ordem incorreta(americana)): <i class="fa fa-calender"></i>
			<input class="form-control" type="date" name="data" value="<?= date("Y-m-d", strtotime($est['data'])) ?>">	<br>

		</div>

	

		<div class="col-md-2">
			Medida: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="mm" value="<?=$est['mm']?>">	<br>

		</div>

		<div class="col-md-2">
			Quantidade: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="qt" value="<?=$est['qt']?>">	<br>

		</div>

		<div class="col-md-4">
			Gaveta: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="gaveta" value="<?=$est['gaveta']?>">	<br>

		</div>


       <div class="col-md-4">
	
       <input type="hidden" name="ID" value="<?= $est['ID']?>">

<?php endforeach; ?>

    <button class="btn btn-warning btn-lg">
        Alterar Estoque <i class=".glyphicon-glyphicon-pencil"></i>

    </button><br><br>





    <a href="estoque">
        Voltar
    </a>


	</div>


</div>


 </form>

 <div class="text-center">
 <form method="POST" action="../controller/delete_est" onclick="return confirm('Tem certeza que deseja excluir ?');">
                            <input type="hidden" name="ID" value="<?=$est['ID']?>">

							<button class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>
							</button>
						</form>

                        <form method="POST" action="../controller/retirada">
                            <input type="hidden" name="ID" value="<?=$est['ID']?>">

							<button class="btn btn-default btn-xs" alt='imprimir'>
								 <i class="fa fa-file"></i>
							</button>
						</form>								


</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 


<script type="text/javascript">
	$(document).ready(function() {
	    $("#cpf").mask('000.000.000-00');
	    $("#phone").mask('(00)0000-0000');
	})

</script>

