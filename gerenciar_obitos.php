<?php
$obitos = new Obitos();

//Busca todos os registros
if (empty($_POST['pesquisa'])) {
	$obito = $obitos->trazerObitos();
}

//Cadastra um novo registro
if (!empty($_POST['nomeFalecido'])) {
	$obitos->cadastrarObito($_POST['nomeFalecido'], $_POST['nomePai'], $_POST['nomeMae'], $_POST['dataObito'], $_POST['historicoJazigo'], $_POST['nmrLote'], $_POST['nmrQuadra'], $_POST['dataSepultamento']);

	$_SESSION['mensagem'] = 'Registro cadastrado com sucesso.';
	$_SESSION['tipoAlert'] = 'alert-success';
	header("Location: ?p=gerenciar_obitos");
	exit();
}

//Busca um registro específico
if (!empty($_POST['pesquisa'])) {
	$obito = $obitos->pesquisarObito($_POST['pesquisa']);
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="offset-md-1 col-12 col-md-10 col-lg-10 form-cad-obito">

			<div class="row">
				<!-- DIV DE ALERT SUCCESS DE CADASTRO -->
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
				<!-- CAMPO DE PESQUISA DE ÓBITOS -->
				<div class="col-12 col-md-9">
					<form action="" method="POST">
						<div class="row">
							<div class="col-12 col-md-6">
								<input class="form-control" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquise por nome ou Nº de lote" autocomplete="off">
							</div>
							<div class="col-12 col-md-6">
								<button class="btn btn-b">Pesquisar</button>
							</div>						
						</div>
					</form>					
				</div>

				<div class="col-12 col-md-3 text-right">
					<button type="button" class="btn btn-b" data-toggle="modal" data-target="#modalNovoOvito">+ ÓBITO</button>
				</div>

				<!-- DIV DO MODAL -->
				<div class="col-12">
					<!-- The Modal -->
					<div class="modal fade" id="modalNovoOvito">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal body -->
								<div class="modal-body">
									<form action="" method="post">
										<div class="row">
											<div class="form-group col-12">
												<label for="">Nome do falecido: </label>
												<input class="form-control"  type="text" name="nomeFalecido" id="" autocomplete="off" required>
											</div>
										</div>

										<div class="row">
											<div class="form-group col-12">
												<label for="">Nome do pai: </label>
												<input class="form-control"  type="text" name="nomePai" id="" autocomplete="off" required>
											</div>
										</div>

										<div class="row">
											<div class="form-group col-12">
												<label for="">Nome da mãe: </label>
												<input class="form-control"  type="text" name="nomeMae" id="" autocomplete="off" required>
											</div>
										</div>

										<div class="row">
											<div class="form-group col-12 col-md-6">
												<label for="">Data do óbito: </label>
												<input class="form-control"  type="date" name="dataObito" id="" required>
											</div>

											<div class="form-group col-12 col-md-6">
												<label for="">Data do sepultamento: </label>
												<input class="form-control"  type="date" name="dataSepultamento" id="" required>
											</div>					
										</div>

										<div class="row">
											<div class="form-group col-12">
												<label for="">Histórico de jazigo: </label>
												<input class="form-control"  type="text" name="historicoJazigo" id="" autocomplete="off">
											</div>
										</div>

										<div class="row">
											<div class="form-group col-12 col-md-6">
												<label for="">Número do lote: </label>
												<input class="form-control"  type="number" name="nmrLote" id="" autocomplete="off" required>
											</div>

											<div class="form-group col-12 col-md-6">
												<label for="">Número da quadra: </label>
												<input class="form-control"  type="number" name="nmrQuadra" id="" autocomplete="off" required>
											</div>				
										</div>				
										
										<div class="row">
											<div class="col-12 col-md-6 form-group">
												<button class="btn btn-b">Cadastrar</button>
											</div>
											<div class="col-12 col-md-6 form-group text-right">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
											</div>											
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>					
				</div>
				<!-- FIM DA DIV DO MODAL -->
			</div>

			<!-- CAMPO DE PESQUISA DE ÓBITOS -->

			<div class="row" style="margin-top: 2%;">
				<div class="col-12" style="height: 400px; overflow: auto;">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Data de sepultamento</th>
								<th>Nº da quadra</th>
								<th>Nº do lote</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($obito as $ob)
							{
								$nome = utf8_encode($ob['nome_falecido']);
								$dataSepult = date('d/m/Y', strtotime($ob['data_sepultamento']));
								$numQuadra = $ob['numero_quadra'];
								$numLote = $ob['numero_lote'];
								$id = $ob['id'];

								echo "
								<tr>
								<td style=\"width: 40%;\">".$nome."</td>
								<td>".$dataSepult."</td>
								<td>".$numQuadra."</td>
								<td>".$numLote."</td>
								<td><a href=\"?p=gerenciar_obito&id=$id\" class='btn btn-b' style=\"width: 100%;\"><span class='fas fa-edit'></span> Editar</a></td>
								";
								
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>