<?php

require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';

$manager = new Manager();

$data = $_POST;


if (isset($data) && !empty($data)) {
	$manager->insertClient('Clientes', $data);
	header('Location: ../index?client_add_success');
}

?>