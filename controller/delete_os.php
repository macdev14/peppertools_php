<?php

require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$manager = new Os();

$id = $_POST['id_os'];

if(isset($id) && !empty($id)){

		$manager->deleteOS('Cadastro_OS',$id);
		header('Location: ../view/os?os_deleted');
}  

?>