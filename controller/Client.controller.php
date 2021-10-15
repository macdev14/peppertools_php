<?php

$client = new Client();
$client->id = $_POST['id'];
$client->cod_cli = $_POST['cod_cli']; 
$client->nome = $_POST['nome']; 
$client->email = $_POST['email']; 
$client->cnpj = $_POST['cnpj']; 
$client->cep = $_POST['cep']; 
$client->endereco = $_POST['endereco']; 
$client->telefone = $_POST['telefone']; 


?>