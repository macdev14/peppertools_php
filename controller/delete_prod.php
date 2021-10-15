<?php

require_once '../model/Conexao.class.php';
require_once '../model/Produto.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Produto();

$id = $_POST['id'];

if(isset($id) && !empty($id)){

		$manager->deleteProduto('Cadastro_OS',$id);
		header('Location: ../index?prod_concl');
}  
