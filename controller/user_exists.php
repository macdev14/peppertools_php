<?php 

// Verificar existencia de usuario
// Verificar existencia de senha

require_once '../model/Conexao.class.php';

$db = '';
//$db = Conexao::get_instance();

 function user_exists($user, $pass)
{
	$db = Conexao::get_instance();
	# code...
		
	       $stmt = 'SELECT * FROM usuarios WHERE ds_login = :user';
	       $bind = array(':user' => $user);
	
		
$result = $db->prepare($stmt);
$result->execute($bind);
$done = $result->fetch(PDO::FETCH_ASSOC);

	if(password_verify($pass, $done['ds_senha']) ){

return true;
	
}

if(!empty($done['ds_login'])){
	return true;
}else{
	return false;
}




}

?>