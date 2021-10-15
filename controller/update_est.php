<?php


require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
require_once '../model/Estoque.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$manager = new Estoque();

$data = $_POST;
$id = $_POST['ID'];

if (isset($data) && !empty($data)) {
	$manager->updateEstoque('Estoque', $data, $id);
	header('Location: ../view/estoque');
}

?>

?>