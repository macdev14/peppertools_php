<?php
session_start();
require_once 'Manager.class.php';
class Os extends Manager

{


public function insertOS($table, $data){
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

    public function listOS($valor = null)
    {
    	if (isset($valor) && !empty($valor)) {
    		$sql = "SELECT Cadastro_OS.*, Clientes.nome FROM Cadastro_OS, Clientes WHERE Clientes.ID = Cadastro_OS.Id_Cliente AND Cadastro_OS.Id = :value";
    		$pdo = parent::get_instance();
    		$statement = $pdo->prepare($sql);
    	//	$statement->bindValue(':column',$coluna);
    		$statement->bindValue(':value',$valor);
    	
    	$statement->execute();
      return $statement->fetchAll();

    	}else{
    	$pdo = parent::get_instance();
    	$sql = "SELECT Cadastro_OS.*, Clientes.nome FROM Cadastro_OS, Clientes WHERE Clientes.ID = Cadastro_OS.Id_Cliente ORDER BY Numero_OS DESC";
    	$statement = $pdo->query($sql);
    	$statement->execute();

    	
    }

      return $statement->fetchAll();
    }		

    public function listClientes($id = null)
    {
      $pdo = parent::get_instance();

     if(isset($id) && !empty($id)){

      $sql = "SELECT Cadastro_OS.*, Clientes.nome FROM Cadastro_OS, Clientes WHERE Clientes.ID = Cadastro_OS.Id_Cliente AND Cadastro_OS.Id = :value";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':value',$id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['nome'];

     }else{


    	
    	$sql = "SELECT  nome, Id FROM Clientes ORDER BY nome ASC";
    	$statement = $pdo->query($sql);
    	$statement->execute();

    	return $statement->fetchAll();

      }

    }		
    

   		


    public function deleteOS($table,$id)
    {
       $pdo = parent::get_instance();
       $sql = "DELETE FROM $table WHERE Id = :id";
       $statement = $pdo->prepare($sql);
       $statement->bindValue(":id",$id);
       $statement->execute();
    }

    public function getInfo($table, $id)
    {
      $pdo = parent::get_instance();
      $sql = "SELECT * FROM $table WHERE Id = :id";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":id", $id);
      $statement->execute();
      # code...
      return $statement->fetchAll();
    }


    public function updateOS($table, $data, $id)
    {
     $pdo = parent::get_instance();
     $new_values = "";

     foreach ($data as $key => $value) {
       # code...\
        $new_values .= "$key=:$key, "; 
     }
      $new_values = substr($new_values, 0, -2);
      $sql = "UPDATE $table SET $new_values WHERE Id = :id";
      $statement = $pdo->prepare($sql);

      foreach ($data as $key => $value) {
        # code...
        $statement->bindValue(":$key", $value, PDO::PARAM_STR);
      }
      $statement->execute();
    }


 public function getNumero_OS()
    {
      $pdo = parent::get_instance();
      $sql = "SELECT Numero_Os FROM Cadastro_OS ORDER BY Numero_Os ASC";
      $statement = $pdo->prepare($sql);
      
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $numero_os = $row["Numero_Os"];
    }
    	$numero_new = $numero_os + 1;
      return $numero_new;

    }


public function getNewId()
    {
      $pdo = parent::get_instance();
      $sql = "SELECT MAX(id) AS OS_id FROM Cadastro_OS";
      $statement = $pdo->prepare($sql);
      
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $numero_id = $row["OS_id"];
    }
    	$numero_new = $numero_id + 1;
      return $numero_new;

    }




}