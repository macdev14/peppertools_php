<?php

class Client extends conexao{
	
public $id, $cod_cli, $nome, $email, $cnpj, $cep, $endereco, $telefone;



	public function save(){
		$pdo = parent::get_instance();
		$sql = "INSERT INTO Clientes (cod_cli, nome, email, cnpj, cep, endereco, telefone) VALUES (:cod_cli, :nome, :email, :cnpj, :cep, :endereco, :telefone)";
		$statement = $pdo->prepare($sql);
			# code...
			$bind = array(':cod_cli' => $this->cod_cli, ':nome' => $this->nome, ':email' => $this->email, ':cnpj' => $this->cnpj, ':cep' =>  $this->cep, 
						':endereco' => $this->endereco , ':telefone' => $this->telefone);
		$statement->execute($bind);
	}


 public function delete()
    {
       $pdo = parent::get_instance();
       $sql = "DELETE * FROM Clientes WHERE id = :id";
       $statement = $pdo->prepare($sql);
       $statement->bindValue(':id',$this->id);
       $statement->execute();
    }



 public function show()
    {
    	$pdo = parent::get_instance();
    	$sql = "SELECT * FROM Clientes ORDER BY nome ASC";
    	$statement = $pdo->query($sql);
    	$statement->execute();

    	return $statement->fetchAll();
    }		

 public function update()
    {
     $pdo = parent::get_instance();
     
     $bind = array(':cod_cli' => $this->cod_cli, ':nome' => $this->nome, ':email' => $this->email, ':cnpj' => $this->cnpj, ':cep' =>  $this->cep, 
						':endereco' => $this->endereco , ':telefone' => $this->telefone);

      $sql = "UPDATE Clientes SET :cod_cli, :nome, :email, :cnpj, :cep, :endereco, :telefone WHERE id = :id";
      $statement = $pdo->prepare($sql);
      $statement->execute($bind);
    }



}

?>