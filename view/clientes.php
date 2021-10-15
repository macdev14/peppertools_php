
<?php 
$title = "Clientes";
require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Manager();

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'dependencias.php'; ?>
</head>
<body>
<?php require_once 'navbar.php';?>
<div class="container">
	
	<h2 class="text-center"> Cadastro de Clientes <i class="fa fa-users"></i></h2>

	<h5 class="text-right">
		<a href="cad_cli.php" class="btn btn-primary btn-xs">
			<i class="fa fa-user-plus"></i>
		</a>
	</h5>

	<!-- Iniciando a tabela -->

	<div class="table-responsive">
		
		<table class="table table-hover">
			<thead class="thead">
				<tr>
					<th>COD</th>
					<th>NOME</th>
					<th>E-MAIL</th>
					<th>CNPJ</th>
					<th>CEP</th>
					<th>ENDEREÇO</th>
					<th>TELEFONE</th>
					<th colspan="3">AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($manager->listClient("Clientes") as $client): ?>


				<tr>
					<td><?php if(!empty($client['cod_cli'])){echo $client['cod_cli'];}else {echo 'Vazio';} ?> </td>
					<td><?php if(!empty($client['nome'])){echo $client['nome'];}else {echo 'Vazio';} ?> </td>
					<td><?php if(!empty($client['email'])){echo $client['email'];}else {echo 'Vazio';}?></td>
					<td><?php if(!empty($client['cnpj'])){echo $client['cnpj'];}else {echo 'Vazio';}?></td>
					<td><?php if(!empty($client['cep'])){echo $client['cep'];}else {echo 'Vazio';}?></td>
					<td><?php if(!empty($client['endereco'])){echo $client['endereco'];}else {echo 'Vazio';}?></td>
					<td><?php if(!empty($client['telefone'])){echo $client['telefone'];}else {echo 'Vazio';}?></td>
					<td>
						<form method="POST" action="alt_cli">

							<input type="hidden" name="id" value="<?=$client['ID']?>">

							<button class="btn btn-warning btn-xs">
								<i class="fa fa-user-edit"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="../controller/delete_client.php" onclick="return confirm('Tem certeza que deseja excluir ?');">
                            <input type="hidden" name="id" value="<?=$client['id']?>">

							<button class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>		

			</tbody>
		</table>

	</div>

	<!-- Fim da Tabela -->

</div>
<script type="text/javascript">
	$(document).ready(function(){
    $('.home').removeClass('active');
    $('.client').addClass('active');
});

</script>

</body>
</html>