<?php
require_once '../model/Os.class.php';
require_once '../model/Estoque.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Estoque();

$id = $_POST['id_est'];

if(isset($id) && !empty($id)){

		$manager->deleteEstoque('Estoque',$id);
		header('Location: ../view/estoque?est_concl');
}  
