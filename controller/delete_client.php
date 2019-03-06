<?php

require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Manager();

$id = $_POST['id'];

if(isset($id) && !empty($id)){

		$manager->deleteClient('registros',$id);
		header('Location: ../index.php?client_deleted');
}  