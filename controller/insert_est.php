<?php


require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$manager = new Os();

$data = $_POST;


if (isset($data) && !empty($data)) {
	$manager->insertOS('Estoque', $data);
	header('Location: ../view/estoque?est_add_success');
}

?>
