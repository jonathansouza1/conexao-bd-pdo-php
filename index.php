<?php

include_once('Pessoa.php');

$pessoa = new Pessoa();

/*

//Exemplo salvar

$pessoa->nome = 'Jonathan';
$pessoa->idade = 23;
$pessoa->email = 'jonathan.souza@jltecnologia.com.br';

$pessoa->salvar();

echo $pessoa->id;

//Exemplo retornar

$pessoa->retornar(1);

echo $pessoa->id.'<br>';
echo $pessoa->nome.'<br>';
echo $pessoa->idade.'<br>';
echo $pessoa->email.'<br>';


//Exemplo listar todos

$pessoas = $pessoa->listarTodos();

foreach ($pessoas as $p) {
	
	echo 'Nome: '.$p->nome.'<br>';
	echo 'E-mail: '.$p->email.'<br>';
	echo '------------------------<br>';

}

//Exemplo atualizar

$pessoa->retornar(1);
$pessoa->nome = 'Jonathan Antonio';
var_dump($pessoa->atualizar());


//Exemplo deletar

$pessoa->id = 2;
var_dump($pessoa->deletar());


*/