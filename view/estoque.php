
<?php 
/*$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        session_destroy();
        ### or alternatively, you can use this for specific variables:
        ### unset($_SESSION['varname']);
   }
} */
$title = "Ordem de Serviço";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../model/Estoque.class.php';

$manager = new Estoque();

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'dependencias.php'; ?>
</head>
<body>
<?php require_once 'navbar.php';?>
<div class="container">
	
	<h2 class="text-center"> Estoque  <i class="glyphicon glyphicon-file"></i></h2>

	<h5 class="text-right">
		<a href="cad_est" class="btn btn-primary btn-xs">
			<i class="fa fa-user-plus"></i>
		</a>
	</h5>

	<!-- Iniciando a tabela -->

	<div class="table-responsive">
		
		<table class="table table-hover">
			<thead class="thead">
				<tr>
					<th>Ferramenta</th>
					<th>Material</th>
					<th>Cliente</th>
					<th>Codigo da peca</th>
					<th>mm</th>
					<th>DATA</th>
					<th>QTD</th>
					<th>Gaveta</th>
					
					<th colspan="3">AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($manager->listEstoque() as $est): ?>


				<tr>
					<td><?php echo $est['ferramenta'] ?> </td>
					<td><?php echo $est['material']?> </td>
					<td><?php echo $est['nome']?></td>
					<td><?php echo $est['cod_pc']?></td>
					<td><?php echo $est['mm']?></td>
					<td><?php echo date('d/m/Y', strtotime($est['data']))?></td>	
					<td><?php echo $est['qt']?></td>
					<td><?php echo $est['gaveta']?></td>
					
					<td>
						<form method="POST" action="alt_est">

							<input type="hidden" name="ID" value="<?=$est['ID']?>">

							<button class="btn btn-warning btn-xs">
								<i class="fa fa-user-edit"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="../controller/delete_est" onclick="return confirm('Tem certeza que deseja excluir ?');">
                            <input type="hidden" name="id_est" value="<?=$est['ID']?>">

							<button class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="../controller/retirada">
                            <input type="hidden" name="id_est" value="<?=$est['ID']?>">

							<button class="btn btn-default btn-xs" alt='imprimir'>
								 <i class="fa fa-file"></i>
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