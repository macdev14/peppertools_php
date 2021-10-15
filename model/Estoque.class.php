<?php
require_once 'Manager.class.php';
require_once 'Os.class.php';
class Estoque extends Os{

	
    public function listEstoque($valor = null)
    {
    	if (isset($valor) && !empty($valor)) {
    		$sql = "SELECT Estoque.*, Clientes.nome FROM Estoque, Clientes WHERE Clientes.ID = Estoque.id_cliente AND Estoque.ID = :value";
    		$pdo = parent::get_instance();
    		$statement = $pdo->prepare($sql);
    	//	$statement->bindValue(':column',$coluna);
    		$statement->bindValue(':value',$valor);
    	
    	$statement->execute();
    	return $statement->fetchAll();
      
    	}else{
    	$pdo = parent::get_instance();
    	$sql = "SELECT Estoque.*, Clientes.nome FROM Estoque, Clientes WHERE Clientes.ID = Estoque.id_cliente ORDER BY data DESC";
    	$statement = $pdo->query($sql);
    	$statement->execute();
    	return $statement->fetchAll();
    	
    }

}


public function updateEstoque($table, $data, $id)
    {
     $pdo = parent::get_instance();
     $new_values = "";

     foreach ($data as $key => $value) {
       # code...\
        $new_values .= "$key=:$key, "; 
     }
      $new_values = substr($new_values, 0, -2);
      $sql = "UPDATE $table SET $new_values WHERE ID = :ID";
      $statement = $pdo->prepare($sql);

      foreach ($data as $key => $value) {
        # code...
        $statement->bindValue(":$key", $value, PDO::PARAM_STR);
      }
      $statement->execute();
    }


public function getNewId_Est()
    {
      $pdo = parent::get_instance();
      $sql = "SELECT MAX(ID) AS OS_id FROM Estoque";
      $statement = $pdo->prepare($sql);
      
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $numero_id = $row["OS_id"];
    }
    	$numero_new = $numero_id + 1;
      return $numero_new;

    }


 
    public function deleteEstoque($table,$id)
    {
      $pdo = parent::get_instance();
      $sql = "DELETE FROM $table WHERE ID = :id";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":id",$id);
      $statement->execute();
    }   


}