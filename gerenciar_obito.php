<?php
$obitos = new Obitos();
$infosObito = $obitos->trazerInfoObito($_GET['id']);

if (isset($_GET['del_obito'])) {
	$obitos->deletarObito($_GET['del_obito']);

	$_SESSION['mensagem'] = 'Registro deletado.';
	$_SESSION['tipoAlert'] = 'alert-danger';	
	header("Location: ?p=gerenciar_obitos");
	exit();
}

foreach ($infosObito as $obito) {
	$id = $obito['id'];
	$nome = utf8_encode($obito['nome_falecido']);
	$nomePai = utf8_encode($obito['nome_pai']);
	$nomeMae = utf8_encode($obito['nome_mae']);
	$dataObito = date('d/m/Y', strtotime($obito['data_obito']));
	$historicoJazigo = utf8_encode($obito['historico_jazigo']);
	$nmrLote = $obito['numero_lote'];
	$nmrQuadra = $obito['numero_quadra'];
	$datasepultamento = date('d/m/Y', strtotime($obito['data_sepultamento']));
}

if ($_POST) {
	$obitos->alterarInformacoes($_POST['id'], $_POST['nomeFalecido'], $_POST['nomePai'], $_POST['nomeMae'], $_POST['historicoJazigo'], $_POST['nmrLote'], $_POST['nmrQuadra']);

	$_SESSION['mensagem'] = 'Registro alterado com sucesso.';
	$_SESSION['tipoAlert'] = 'alert-success';	
	header("Location: ?p=gerenciar_obito&id=".$_POST['id']);
	exit();
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="offset-md-3 col-12 col-md-6 form-cad-obito">
			<!-- DIV DE ALERT SUCCESS DE ALTERAÇÃO -->
			<div class="col-12">
				<?php
				if (isset($_SESSION['mensagem'])) {
					echo "
					<div class=\"alert ".$_SESSION['tipoAlert']." alert-dismissible\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					".$_SESSION['mensagem']."
					</div>
					";

				}
				unset($_SESSION['mensagem']);
				unset($_SESSION['tipoAlert']);
				?>
			</div>			
			<form action="" method="post">
				<div class="form-group row">
					<div class="col-12">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<label for="">Nome: </label>
						<input type="text" class="form-control" name="nomeFalecido" id="" value="<?php echo $nome; ?>">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12">
						<label for="">Nome do pai: </label>
						<input type="text" class="form-control" name="nomePai" id="" value="<?php echo $nomePai; ?>">
					</div>	
				</div>

				<div class="form-group row">								
					<div class="col-12">
						<label for="">Nome da mãe: </label>
						<input type="text" class="form-control" name="nomeMae" id="" value="<?php echo $nomeMae; ?>">
					</div>	
				</div>				

				<div class="form-group row">
					<div class="col-6">
						<label for="">Data do óbito: </label>
						<input type="text" class="form-control" name="dataObito" id="" value="<?php echo $dataObito; ?>" disabled>
					</div>
					<div class="col-6">
						<label for="">Data do sepultamento: </label>
						<input type="text" class="form-control" name="dataSepultamento" id="" value="<?php echo $datasepultamento; ?>" disabled>
					</div>						
				</div>

				<div class="form-group row">
					<div class="col-12">
						<label for="">Histórico de jazigo: </label>
						<input type="text" class="form-control" name="historicoJazigo" id="" value="<?php echo $historicoJazigo; ?>">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-6">
						<label for="">Número do lote: </label>
						<input type="number" class="form-control" name="nmrLote" id="" value="<?php echo $nmrLote; ?>">
					</div>							
					<div class="col-6">
						<label for="">Número da quadra: </label>
						<input type="number" class="form-control" name="nmrQuadra" id="" value="<?php echo $nmrQuadra; ?>">
					</div>
				</div>


				<div class="form-group row">
					<div class="col-6">
						<a href="?p=gerenciar_obitos" class="btn btn-b"><span class="fas fa-arrow-left"></span> Voltar</a>
					</div>
					<div class="col-6 text-right">
						<button class="btn btn-b">Salvar</button>
						<button class="btn btn-danger" type="button" onclick="deletarObito('<?php echo $id; ?>')"><span class="fas fa-trash-alt"></span> Deletar Óbito</button>
					</div>
				</form>						
			</div>
		</div>			
	</div>
</div>

<script>	
	function deletarObito(id)
	{

		var confirmar = confirm("Deletar óbito ?");

		if (confirmar) {
			location.href = '?p=gerenciar_obito&del_obito='+id;
		}
	}	
</script>