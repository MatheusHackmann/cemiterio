<?php

require_once('Sql.class.php');

class Obitos {

	public function cadastrarObito($nome, $nomePai, $nomeMae, $dataObito, $histJazigo, $nmrLote, $nmrQuadra, $dataSepultamento){

		$sql = new Sql();

		$sql->query('INSERT INTO obitos (nome_falecido, nome_pai, nome_mae, data_obito, historico_jazigo, numero_lote, numero_quadra, data_sepultamento)
			VALUES (:NOME, :NOMEPAI, :NOMEMAE, :DTOBITO, :HISTJAZIGO, :NMRLOTE, :NMRQUADRA, :DTSEPULT);', array(
				':NOME' => utf8_decode($nome),
				':NOMEPAI' => utf8_decode($nomePai),
				':NOMEMAE' => utf8_decode($nomeMae),
				':DTOBITO' => $dataObito,
				':HISTJAZIGO' => utf8_decode($histJazigo),
				':NMRLOTE' => $nmrLote,
				':NMRQUADRA' => $nmrQuadra,
				':DTSEPULT' => $dataSepultamento
			));
	}

	public function alterarInformacoes($id, $nome, $nomePai, $nomeMae, $histJazigo, $nmrLote, $nmrQuadra){

		$sql = new Sql();

		$sql->query('UPDATE obitos SET nome_falecido = :NOME, nome_pai = :NOMEPAI, nome_mae = :NOMEMAE, historico_jazigo = :HISTJAZIGO, numero_lote = :NMRLOTE, numero_quadra = :NMRQUADRA WHERE id = :ID;', array(
			':ID' => $id,
			':NOME' => utf8_decode($nome),
			':NOMEPAI' => utf8_decode($nomePai),
			':NOMEMAE' => utf8_decode($nomeMae),
			':HISTJAZIGO' => utf8_decode($histJazigo),
			':NMRLOTE' => $nmrLote,
			':NMRQUADRA' => $nmrQuadra
		));
	}

	public function trazerObitos(){
		$sql = new Sql();

		$results = $sql->select('SELECT * FROM obitos ORDER BY nome_falecido ASC;');

		return $results;
	}

	public function trazerInfoObito($id){
		$sql = new Sql();

		$results = $sql->select('SELECT * FROM obitos WHERE id = :ID;', array(
			':ID' => $id
		));

		return $results;
	}	

	public function pesquisarObito ($pesquisa) {
		$sql = new Sql();

		$pesquisa = $pesquisa.'%';

		$results = $sql->select("SELECT * FROM obitos WHERE nome_falecido LIKE :PESQUISA OR (numero_lote LIKE :PESQUISA) ORDER BY nome_falecido ASC;", array(
			':PESQUISA' => utf8_decode($pesquisa)
		));

		return($results);
	}

	public function deletarObito($id){
		$sql = new Sql();

		$sql->query('DELETE FROM obitos WHERE id = :ID;', array(
			':ID' => $id
		));
	}

}