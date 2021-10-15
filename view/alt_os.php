<?php
session_start();
/*$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        session_destroy();
        ### or alternatively, you can use this for specific variables:
        ### unset($_SESSION['varname']);
   }
} */
$title = "Alterar";
require_once 'dependencias.php';
require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$OS = new Os();
 if(empty($_SESSION['Id'])){
$_SESSION['Id'] = $_POST['Id'];
}
$id = $_SESSION['Id'];
require_once 'navbar.php';

?>


<h2 class="text-center"> 
Alterar O.S <i class="fa fa-user-edit"></i>

</h2> <hr>
<h4 class="text-center"> 
Datas est&atilde;o em mm/dd/ano, ser&atilde;o alteradas para 'dd/mm/ano' <i class="fa fa-user-edit"></i>

</h4>

<form method="post" action="../controller/update_os.php">

<div class="container">
	<div class="form-row">

		<?php foreach($OS->getInfo("Cadastro_OS", $id) as $os_info ): ?>
			<?php echo  $os_info['Id_Cliente'];?>
		<div class="col-md-4">
			Numero OS: <i class="fa fa-user"></i>
			<input class="form-control" type="text" name="Numero_Os" readonly required autofocus value="<?= $os_info['Numero_Os']?>">	<br>

		</div>

		
         	


		<div class="col-md-6">
			Cliente: <i class="fa fa-user"></i>
				

			<select name="Id_Cliente" class="Id_Cliente"> 
			<?php foreach($OS->listClientes() as $cliente){	

            if ($cliente['Id'] == $os_info['Id_Cliente']) {
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
			<input class="form-control" type="text" name="Ferramenta" value="<?= $os_info['Ferramenta']?>">	<br>

		</div>

		<div class="col-md-4">
			Desenho Cliente <i class="fa fa-address-card"></i>
			<input class="form-control" type="text" name="Desenho_Cliente"  id="Desenho_Cliente" value="<?= $os_info['Desenho_Cliente']?>">	<br>

		</div>

		<div class="col-md-4">
			Desenho Pimentel <i class="fa fa-address-card"></i>
			<input class="form-control" type="text" name="Desenho_Pimentel" id="Desenho_Pimentel" value="<?= $os_info['Desenho_Pimentel']?>">	<br>

		</div>

		<div class="col-md-2">
			Data: <i class="fa fa-calender"></i>
			<input class="form-control" type="date" name="Data" value="<?= date("Y-m-d", strtotime($os_info['Data'])) ?>">	<br>

		</div>

		<div class="col-md-2">
			Prazo: <i class="fa fa-calender"></i>
			<input class="form-control" type="date" name="Prazo" value="<?= date("Y-m-d", strtotime($os_info['Prazo'])) ?>">	<br>

		</div>

		<div class="col-md-6">
			Especificacao: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Especificacao" value="<?= $os_info['Especificacao']?>">	<br>

		</div>

		<div class="col-md-6">
			Grava&ccedil;&atilde;o: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="gravacao" value="<?= $os_info['gravacao']?>">	<br>

		</div>

		<div class="col-md-6">
			Grava&ccedil;&atilde;o 2: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="gravacao2" value="<?= $os_info['gravacao2']?>">	<br>

		</div>


		<div class="col-md-6">
			Material: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Material" value="<?= $os_info['Material']?>">	<br>

		</div>

		<div class="col-md-2">
			Unidade: <i class="fa fa-user"></i>
				

			<select name="unidade" class=""> 
			<?php 

            if ($os_info['unidade'] == 'peca') {
            	echo "<option value='peca' selected>pe&ccedil;a</option>";
            	echo "<option value='jogo'>jogo</option>";
            }else {echo "<option value='peca'>pe&ccedil;a</option>";
            	   echo "<option value='jogo' selected>jogo</option>";}
			?>
			</select> <br>



		</div>


		<div class="col-md-2">
			Tipo: <i class="fa fa-user"></i>
				

			<select name="Tipo"> 
			<?php 

            if ($os_info['Tipo'] == 'fabricacao') {
            	echo "<option value='fabricacao' selected>Fabrica&ccedil;&atilde;o</option>";
            	echo "<option value='modificacao'>Modifica&ccedil;&atilde;o</option>";
            	echo "<option value='afiacao'>Afiacao&ccedil;&atilde;o</option>";
            }
              if ($os_info['Tipo'] == 'modificacao') {
            	echo "<option value='fabricacao'>Fabrica&ccedil;&atilde;o</option>";
            	echo "<option value='modificacao' selected>Modifica&ccedil;&atilde;o</option>";
            	echo "<option value='afiacao'>Afia&ccedil;&atilde;o</option>";
            }
                if ($os_info['Tipo'] == 'afiacao') {
            	echo "<option value='fabricacao'>Fabrica&ccedil;&atilde;o</option>";
            	echo "<option value='modificacao'>Modifica&ccedil;&atilde;o</option>";
            	echo "<option value='afiacao' selected>Afia&ccedil;&atilde;o</option>";
            }

			?>
			</select> <br>



		</div>


		<div class="col-md-2">
			Quantidade: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Quantidade" value="<?= $os_info['Quantidade']?>">	<br>

		</div>

		<div class="col-md-4">
			Nota Fiscal: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Numero_Nf" value="<?= $os_info['Numero_Nf']?>">	<br>

		</div>

		<div class="col-md-4">
		Numero do Pedido: <i class="fa fa-map"></i>
			<input class="form-control" type="text" name="Numero_Pedido" value="<?= $os_info['Numero_Pedido']?>">	<br>

		</div>

		<div class="col-md-2">
		Data da Nota Fiscal: <i class="fa fa-map"></i>
			<input class="form-control" type="date" name="Data_Nf" value="<?= date("Y-m-d", strtotime($os_info['Data_Nf'])) ?>">	<br>

		</div>

		<div class="col-md-2">
		Data do Pedido: <i class="fa fa-map"></i>
			<input class="form-control" type="date" name="Data_Pedido" value="<?= date("Y-m-d", strtotime($os_info['Data_Pedido'])) ?>">	<br>

		</div>		
		
		<div class="col-md-4">
		STATUS: <i class="fa fa-map"></i>
			

		<select name="STATUS"> 
			<?php 

            if ($os_info['STATUS'] == 'Em Andamento') {
            	echo "<option value='Em Andamento' selected>Em Andamento</option>";
            	echo "<option value='Concluido'>Concluido</option>";
            }
              if ($os_info['STATUS'] == 'Concluido') {
            	echo "<option value='Em Andamento'>Em Andamento</option>";
            	echo "<option value='Concluido' selected>Concluido</option>";
            	
            }

			?>
			</select> <br>
				
		</div>



		</div>

			

       <div class="col-md-4">

       	<input type="hidden" name="id" value="<?= $os_info['Id']?>">

       <?php endforeach; ?>

       	<button class="btn btn-warning btn-lg">
       		Alterar O.S <i class=".glyphicon-glyphicon-pencil"></i>

       	</button><br><br>






       	<a href="os">
       		Voltar Pag.OS
       	</a>
		   <br> 

		   <a href="produtos">
       		Voltar Produtos
       	</a>
       </div>



	</div>


</div>



 </form>
<div class="text-center">
<form method="POST" action="../controller/delete_os" onclick="return confirm('Tem certeza que deseja excluir ?');">
                            <input type="hidden" name="id_os" value="<?=$os_info['Id']?>">

							<button class="btn btn-danger btn-xs">
								Deletar O.S <i class="fa fa-trash"></i>
							</button>
						</form>

<form method="POST" action="imp_os">
                            <input type="hidden" name="id_os" value="<?=$os_info['Id']?>">

							<button class="btn btn-default btn-xs">
								Imprimir O.S <i class="fa fa-file"></i>
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

