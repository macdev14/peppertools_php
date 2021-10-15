<?php 
session_start();
require_once 'Manager.class.php';
class Produto extends Manager{


/*	 public function listProduto($table)
    {
    	$pdo = parent::get_instance();
    	$sql = "SELECT * FROM $table WHERE Prazo > SYSDATE() ORDER BY Numero_Os DESC";
    	$statement = $pdo->query($sql);
    	$statement->execute();

    	return $statement->fetchAll();
    }		
*/


       public function listProduto($valor = null)
    {
    	if (isset($valor) && !empty($valor)) {
    		$sql = "SELECT Cadastro_OS.*, Clientes.nome FROM Cadastro_OS, Clientes WHERE Clientes.ID = Cadastro_OS.Id_Cliente AND Cadastro_OS.Id = :value AND Prazo > SYSDATE() AND STATUS = 'Em Andamento' ORDER BY Numero_OS DESC";
    		$pdo = parent::get_instance();
    		$statement = $pdo->prepare($sql);
    	//	$statement->bindValue(':column',$coluna);
    		$statement->bindValue(':value',$valor);
    	
    	$statement->execute();
      return $statement->fetchAll();

    	}else{
    	$pdo = parent::get_instance();
    	$sql = "SELECT Cadastro_OS.*, Clientes.nome FROM Cadastro_OS, Clientes WHERE Clientes.ID = Cadastro_OS.Id_Cliente AND Prazo > SYSDATE() AND STATUS = 'Em Andamento' ORDER BY Numero_OS DESC";
    	$statement = $pdo->query($sql);
    	$statement->execute();

    	
    }

      return $statement->fetchAll();
    }	



    public function insertProduto($table, $data){
		$pdo = parent::get_instance();
		$fields = implode(", ", array_keys($data));
		$values = ":" . implode(", :", array_keys($data));
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		$statement = $pdo->prepare($sql);
		foreach ($data as $key => $value) {
			# code...
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
	}


	public function deleteProduto($table,$id)
    {
       $pdo = parent::get_instance();
       $sql = "UPDATE $table SET STATUS = 'Concluido' WHERE Id = :id";
       $statement = $pdo->prepare($sql);
       $statement->bindValue(':id',$id);
       $statement->execute();
    }


    public function updateProduto($table, $data, $id)
    {
     $pdo = parent::get_instance();
     $new_values = "";

     foreach ($data as $key => $value) {
       # code...\
        $new_values .= "$key=:$key, "; 
     }
      $new_values = substr($new_values, 0, -2);
      $sql = "UPDATE $table SET $new_values WHERE id = :id";
      $statement = $pdo->prepare($sql);

      foreach ($data as $key => $value) {
        # code...
        $statement->bindValue(":$key", $value, PDO::PARAM_STR);
      }
      $statement->execute();
    }



	
}

?>