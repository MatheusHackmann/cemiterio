<?php

require_once('Sql.class.php');

class Concessionario
{
	
	public function cadastrarConcessionario($nome, $cpf, $rg, $cel, $tel, $cep, $endereco, $nmrCasa, $email, $foto)
	{
		$sql = new Sql();

		$concessionarioExiste = $this->verificaConcessionarioExiste($cpf);

		if ($concessionarioExiste) {
			return false;
		}
		else {
			$nomeFoto = $this->cadastrarFoto($foto);
			
			$sql->query("INSERT INTO concessionario (nome, cpf, rg, cel, tel_fixo, cep, endereco, num_casa, email, foto, data_cadastro)
				VALUES (:NOME, :CPF, :RG, :CEL, :TEL, :CEP, :ENDERECO, :NUMCASA, :EMAIL, :FOTO, :DATACAD);", 
				array(
					':NOME' =>  utf8_encode($nome),
					':CPF' => $cpf,
					':RG' => $rg,
					':CEL' => $cel,
					':TEL' => $tel,
					':CEP' => $cep,
					':ENDERECO' => utf8_encode($endereco),
			    	':NUMCASA' => $nmrCasa,
					':EMAIL' => utf8_encode($email),
					':FOTO' => $nomeFoto,
					':DATACAD' => date('Y-m-d')
				));

			return true;
		}

	}

	private function verificaConcessionarioExiste($cpf)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM concessionario WHERE cpf = :CPF;",
			array(
				':CPF' => $cpf
			));

		if (count($results) > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	private function cadastrarFoto($foto)
	{
		
		preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"], $ext);

		$nome_foto = md5(uniqid(time())).".".$ext[1];

		$caminho_foto = "arquivos/foto_concessionario/".$nome_foto;

		move_uploaded_file($foto["tmp_name"], $caminho_foto);

		return $nome_foto;

	}

	public function trazerConcessionarios()
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM concessionario;");
		return $results;
	}
}

?>