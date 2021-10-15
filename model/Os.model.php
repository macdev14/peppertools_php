<?php

class Os extends conexao{
	
public $Id,
$Tipo,
$Numero_Os,
$Id_Cliente,
$Data,
$Prazo,
$gravacao,
$Ferramenta,
$Material,
$Especificacao,
$Quantidade,
$unidade,
$Desenho_Cliente,
$Desenho_Pimentel,
$Numero_Nf,
$Numero_Pedido,
$Data_Nf,
$Data_Pedido,
$STATUS,
$gravacao2;



   public function save()
   {
		$pdo = parent::get_instance();
		$sql = "INSERT INTO Cadastro_OS (Id, Tipo,Numero_Os, Id_Cliente, Data, Prazo, gravacao, Ferramenta, Material, Especificacao, Quantidade, unidade, Desenho_Cliente, Desenho_Pimentel, Numero_Nf, Numero_Pedido, Data_Nf, Data_Pedido, STATUS, gravacao2) VALUES (:Id, :Tipo, :Numero_Os, :Id_Cliente, :Data, :Prazo, :gravacao, :Ferramenta, :Material, :Especificacao, :Quantidade, :unidade, :Desenho_Cliente, :Desenho_Pimentel, :Numero_Nf, :Numero_Pedido, :Data_Nf, :Data_Pedido, :STATUS, :gravacao2)";
		$statement = $pdo->prepare($sql);
			# code...
			$bind = array(':Id' => $this->Id, ':Tipo' => $this->Tipo, ':Numero_Os' => $this->Numero_Os, ':Id_Cliente' => $this->Id_Cliente, ':Data' => $this->Data, ':Prazo' => $this->Prazo, ':gravacao' => $this->gravacao, ':Ferramenta' => $this->Ferramenta, ':Material' => $this->Material, ':Especificacao' => $this->Especificacao, ':Quantidade' => $this->Quantidade, ':unidade' => $this->unidade, ':Desenho_Cliente' => $this->Desenho_Cliente, ':Desenho_Pimentel' => $this->Desenho_Pimentel, ':Numero_Nf' => $this->Numero_Nf, ':Numero_Pedido' => $this->Numero_Pedido, ':Data_Nf' => $this->Data_Nf, ':Data_Pedido' => $this->Data_Pedido, ':STATUS' => $this->STATUS, ':gravacao2' => $this->gravacao2);
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
     
    $bind = array(':Id' => $this->Id, ':Tipo' => $this->Tipo, ':Numero_Os' => $this->Numero_Os, ':Id_Cliente' => $this->Id_Cliente, ':Data' => $this->Data, ':Prazo' => $this->Prazo, ':gravacao' => $this->gravacao, ':Ferramenta' => $this->Ferramenta, ':Material' => $this->Material, ':Especificacao' => $this->Especificacao, ':Quantidade' => $this->Quantidade, ':unidade' => $this->unidade, ':Desenho_Cliente' => $this->Desenho_Cliente, ':Desenho_Pimentel' => $this->Desenho_Pimentel, ':Numero_Nf' => $this->Numero_Nf, ':Numero_Pedido' => $this->Numero_Pedido, ':Data_Nf' => $this->Data_Nf, ':Data_Pedido' => $this->Data_Pedido, ':STATUS' => $this->STATUS, ':gravacao2' => $this->gravacao2);

      $sql = "UPDATE Cadastro_OS SET :Tipo, :Numero_Os, :Id_Cliente, :Data, :Prazo, :gravacao, :Ferramenta, :Material, :Especificacao, :Quantidade, :unidade, :Desenho_Cliente, :Desenho_Pimentel, :Numero_Nf, :Numero_Pedido, :Data_Nf, :Data_Pedido, :STATUS, :gravacao2 WHERE Id = :id";
      $statement = $pdo->prepare($sql);
      $statement->execute($bind);
    }



}

?>