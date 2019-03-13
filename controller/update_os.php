<?php
require_once '../model/Conexao.class.php';
require_once '../model/Manager.class.php';
require_once '../model/Os.class.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$os = new Os();


$update_os = $_POST;
$id = $_POST['id'];

if (isset($id) && !empty($id) ) {
	# code...
$os->updateOS('Cadastro_OS', $update_os, $id);
header('Location: ../view/page_os.php?client_update');

}


