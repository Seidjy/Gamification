<?php 

public class MetasDao extends Dao{
	public function criar($nome, $idRegraCumprir, $idRegraLimite, $idRegraPremio){
		mysql_query("insert into meta (nome, idRegraParaCumprir, idRegraParaLimitar, idRegraParaRecompensar) values ('$nome','$idRegraCumprir','$idRegraLimite','$idRegraPremio')");
	}
	public function selecionarTodos(){
		mysql_query("Select * from meta");
	}
	public function alterar($id, $nome, $idRegraCumprir, $idRegraLimite, $idRegraPremio){
		mysql_query("insert into meta (nome, idRegraParaCumprir, idRegraParaLimitar, idRegraParaRecompensar) values ('$nome','$idRegraCumprir','$idRegraLimite','$idRegraPremio')");
	}

	public function deletar($id){
		mysql_query("Delete from meta where id = '$id'");
	}

	public function selecionar($id){
		mysql_query("Select * from meta where id = '$id'");
	}
}
 ?>