<?php 

public class ClientesDao extends Dao{
	public function criar($nome, $idRegraCumprir, $idRegraLimite, $idRegraPremio){
		mysql_query("insert into clientes (nome, idRegraParaCumprir, idRegraParaLimitar, idRegraParaRecompensar) values ('$nome','$idRegraCumprir','$idRegraLimite','$idRegraPremio')");
	}
	public function selecionarTodos(){
		mysql_query("Select * from clientes");
	}
	public function alterar($id, $nome, $idRegraCumprir, $idRegraLimite, $idRegraPremio){
		mysql_query("insert into clientes (nome, idRegraParaCumprir, idRegraParaLimitar, idRegraParaRecompensar) values ('$nome','$idRegraCumprir','$idRegraLimite','$idRegraPremio')");
	}

	public function deletar($id){
		mysql_query("Delete from clientes where id = '$id'");
	}

	public function selecionar($id){
		mysql_query("Select * from clientes where id = '$id'");
	}
}
 ?>