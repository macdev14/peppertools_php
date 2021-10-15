<?php

require_once '../model/Os.model.php';





$os = new Os();
$os->Id = $_POST['Id'];
$os->Tipo = $_POST['Tipo'];
$os->Numero_Os = $_POST['Numero_Os'];;
$os->Id_Cliente = $_POST['Id_Cliente'];
$os->Data = $_POST['Data'];
$os->Prazo = $_POST['Prazo'];
$os->gravacao = $_POST['gravacao'];
$os->Ferramenta = $_POST['Ferramenta'];
$os->Material = $_POST['Material'];
$os->Especificacao = $_POST['Especificacao'];
$os->Quantidade = $_POST['Quantidade'];
$os->unidade = $_POST['unidade'];
$os->Desenho_Cliente = $_POST['Desenho_Cliente'];
$os->Desenho_Pimentel = $_POST['Desenho_Pimentel'];
$os->Numero_Nf = $_POST['Numero_Nf'];
$os->Numero_Pedido = $_POST['Numero_Pedido'];
$os->Data_Nf = $_POST['Data_Nf'];
$os->Data_Pedido = $_POST['Data_Pedido'];
$os->STATUS = $_POST['STATUS'];
$os->gravacao2 = $_POST['gravacao2'];