<?php 

require_once("config.php");

public abstract class Dao{
	$conexao;
	function conectar(){
		return $this->conexao = abrirConexao();
	}

	function __construct()
	{
		$this.conectar();
	}

	abstract function criar();
	abstract function selecionar();
	abstract function alterar();
	abstract function deletar();
	
}