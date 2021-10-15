
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
require_once '../model/Conexao.class.php';
require_once '../model/Os.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Os();

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'dependencias.php'; ?>
</head>
<body>
<?php require_once 'navbar.php';unset($_SESSION['Id']);?>
<div class="container">
	
	<h2 class="text-center"> Cadastro de O.S  <i class="glyphicon glyphicon-file"></i></h2>

	<h5 class="text-right">
		<a href="page_inserir_os" class="btn btn-primary btn-xs">
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
				<?php foreach($manager->listOs() as $os): ?>


				<tr>
					<td><?php echo $os['Numero_Os'] ?> </td>
					<td><?php echo $os['Tipo']?> </td>
					<td><?php echo $os['nome']?></td>
					<td><?php echo $os['Ferramenta']?></td>
					<td><?php echo date('d/m/Y', strtotime($os['Data']))?></td>
					<td><?php echo date('d/m/Y', strtotime($os['Prazo']))?></td>
					<td><?php echo $os['Quantidade']?></td>
					
					<td>
						<form method="POST" action="alt_os">

							<input type="hidden" name="Id" value="<?=$os['Id']?>">

							<button class="btn btn-warning btn-xs">
								<i class="fa fa-user-edit"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="../controller/delete_os" onclick="return confirm('Tem certeza que deseja excluir ?');">
                            <input type="hidden" name="id_os" value="<?=$os['Id']?>">

							<button class="btn btn-danger btn-xs">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</td>
					<td>
						<form method="POST" action="../controller/os" formtarget="_blank" target="_blank" rel="noopener noreferrer">
                            <input type="hidden" name="id_os" value="<?=$os['Id']?>">

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