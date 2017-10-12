<?php 
public class TipoLimite{
	private $id;
	private $nome;

	function __construct($id, $nome)
	{
		$this->id = $id;
		$this->nome = $nome;
	}

	function getNome(){
		return $this->nome;
	}

	function getId(){
		return $this->id;
	}
}
 ?>	
