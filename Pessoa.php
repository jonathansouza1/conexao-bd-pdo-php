<?php
include_once('ConectaBanco.php');

class Pessoa{

	private $id;
	private $nome;
	private $idade;
	private $email;

	private $conexao;
	
	function __construct(){
		$this->conexao = ConectaBanco::conexao();
	}

	function __get($propriedade) {
		return $this->$propriedade;
	}

	function __set($propriedade, $valor) {
		$this->$propriedade = $valor;
	}

	public function salvar(){

		$stmt = $this->conexao->prepare("INSERT INTO pessoa(nome, idade, email) VALUES(?, ?, ?)");

		$stmt->bindParam(1, $this->nome);
		$stmt->bindParam(2, $this->idade);
		$stmt->bindParam(3, $this->email);

		$stmt->execute();
		$this->id = $this->conexao->lastInsertId();

	}

	public function retornar($id){

		$rs = $this->conexao->query("SELECT * FROM pessoa WHERE id = '$id'");
		$row = $rs->fetch(PDO::FETCH_OBJ);

		if(empty($row)){
			return null;
		}

		$this->id = $row->id;
		$this->nome = $row->nome;
		$this->idade = $row->idade;
		$this->email = $row->email;

	}


	public function listarTodos(){


		$rs = $this->conexao->query("SELECT * FROM pessoa");

		$pessoas = null;
		$i = 0;

		while($row = $rs->fetch(PDO::FETCH_OBJ)){

			$pessoa = new Pessoa();

			$pessoa->id = $row->id;
			$pessoa->nome = $row->nome;
			$pessoa->idade = $row->idade;
			$pessoa->email = $row->email;

			$pessoa->conexao = null;

			$pessoas[$i] = $pessoa;
			$i++;
		}

		return $pessoas;

	}

	public function atualizar(){

		$stmt = $this->conexao->prepare("UPDATE pessoa SET nome = ?, idade = ?, email = ? WHERE id = ?");

		$stmt->bindParam(1, $this->nome);
		$stmt->bindParam(2, $this->idade);
		$stmt->bindParam(3, $this->email);
		$stmt->bindParam(4, $this->id);

		return $stmt->execute();

	}

	public function deletar(){

		$stmt = $this->conexao->prepare("DELETE FROM pessoa WHERE id = ?");
		$stmt->bindParam(1, $this->id);

		return $stmt->execute();

	}



}
