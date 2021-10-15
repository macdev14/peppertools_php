<?php 
$title = "Em Andamento";
require_once '../model/Conexao.class.php';
require_once '../model/Produto.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
$manager = new Produto();

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'dependencias.php'; ?>
</head>
<body>
<?php require_once 'navbar.php';?>
<div class="container">
	
	<h2 class="text-center"> Em Andamento <i class="fa fa-users"></i></h2>

	<h5 class="text-right">
		<a href="cad_prod.php" class="btn btn-primary btn-xs">
			<i class="fa fa-user-plus"></i>
		</a>
	</h5>

	<!-- Iniciando a tabela -->

	<div class="table-responsive">
		
		<table class="table table-hover">
			<thead class="thead">
				<tr>
					<th>NUMERO OS</th>
					<th>TIPO</th>
					<th>CLIENTE</th>
					<th>FERRAMENTA</th>
					<th>DATA</th>
					<th>PRAZO</th>
					<th>QTD</th>
					<th colspan="3">AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($manager->listProduto() as $produto): ?>


				<tr>
					
					<td><?php echo $produto['Numero_Os'] ?> </td>
					<td><?php echo $produto['Tipo']?> </td>
					<td><?php echo $produto['nome']?></td>
					<td><?php echo $produto['Ferramenta']?></td>
					<td><?php echo date('d/m/Y', strtotime($produto['Data']))?></td>
					<td><?php echo date('d/m/Y', strtotime($produto['Prazo']))?></td>
					<td><?php echo $produto['Quantidade']?></td>

					<td>
						<form method="POST" action="alt_os.php">

							<input type="hidden" name="Id" value="<?=$produto['Id']?>">

							<button class="btn btn-warning btn-xs">
								<i class="fa fa-user-edit"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="../controller/delete_prod.php" onclick="return confirm('Tem certeza que deseja excluir ?');">
                            <input type="hidden" name="id" value="<?=$produto['Id']?>">

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