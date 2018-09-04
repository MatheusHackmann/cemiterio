<?php
session_start();

$conc = new Concessionario();
$concessionarios = $conc->trazerConcessionarios();

if (isset($_POST['novo_concessionario'])) {
	$cadastro = $conc->cadastrarConcessionario($_POST['nome_concessionario'], $_POST['cpf'], $_POST['rg'], $_POST['celular'], $_POST['fixo'], $_POST['cep'], $_POST['endereco'], $_POST['nmr_casa'], $_POST['email'], $_FILES['foto']);

	if ($cadastro) {
		$_SESSION['mensagem'] = 'Concessionário cadastrado com sucesso.';
		$_SESSION['tipoAlert'] = 'alert-success';
		header('Location: ?p=concessionarios');
	}
	elseif ($cadastrado == false){
		$_SESSION['mensagem'] = 'Já existe esse número de CPF cadastrado!';
		$_SESSION['tipoAlert'] = 'alert-danger';
		header('Location: ?p=concessionarios');
	}
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

						// unset($_SESSION['mensagem']);
						// unset($_SESSION['tipoAlert']);						
					}
					?>
				</div>	
						
				<!-- CAMPO DE PESQUISA -->
				<div class="col-12 col-md-9">
					<form action="" method="POST">
						<div class="row">
							<div class="col-12 col-md-6">
								<input class="form-control" type="text" name="pesquisa" id="pesquisa" placeholder="Pesquise por nome ou Nº do CPF" autocomplete="off">
							</div>
							<div class="col-12 col-md-6">
								<button class="btn btn-b">Pesquisar</button>
							</div>						
						</div>
					</form>					
				</div>

				<div class="col-12 col-md-3 text-right">
					<button type="button" class="btn btn-b" data-toggle="modal" data-target="#modalNovoConcessionario">+ CONCESSIONÁRIO</button>
				</div>

				<!-- DIV DO MODAL -->
				<div class="col-12">
					<!-- The Modal -->
					<div class="modal fade" id="modalNovoConcessionario">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">

								<!-- Modal body -->
								<div class="modal-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="row">
											<div class="form-group col-6">
												<label for="nomeConcessionario">Nome Completo: </label>
												<input class="form-control"  type="text" name="nome_concessionario" id="nomeConcessionario" autocomplete="off" placeholder="NOME" style="text-transform: uppercase;" required>
												<input type="hidden" name="novo_concessionario" value="">
											</div>
											<div class="form-group col-3">
												<label for="cpf">CPF: </label>
												<input class="form-control"  type="text" name="cpf" id="cpf" autocomplete="off" placeholder="CPF" maxlength="14" required>
											</div>		
											<div class="form-group col-3">
												<label for="rg">RG: </label>
												<input class="form-control"  type="text" name="rg" id="rg" autocomplete="off" placeholder="RG" maxlength="15" required>
											</div>		
										</div>

										<div class="row">
											<div class="form-group col-6">
												<label for="email">Email: </label>
												<input class="form-control"  type="email" name="email" id="email" autocomplete="off" placeholder="exemplo@exemplo.com" style="text-transform: uppercase;">
											</div>
											<div class="form-group col-3">
												<label for="celular">Celular: </label>
												<input class="form-control"  type="text" name="celular" id="celular" autocomplete="off" placeholder="CELULAR" maxlength="15">
											</div>	
											<div class="form-group col-3">
												<label for="fixo">Telefone fixo: </label>
												<input class="form-control"  type="text" name="fixo" id="fixo" autocomplete="off" placeholder="TELEFONE FIXO" maxlength="14">
											</div>				
										</div>

										<div class="row">
											<div class="form-group col-3">
												<label for="cep">CEP: </label>
												<input class="form-control"  type="text" name="cep" id="cep" autocomplete="off" placeholder="CEP" maxlength="9">
											</div>	
											<div class="form-group col-7">
												<label for="endereco">Endereço: </label>
												<input class="form-control"  type="text" name="endereco" id="endereco" autocomplete="off" placeholder="ENDEREÇO" style="text-transform: uppercase;" required>
											</div>	
											<div class="form-group col-2">
												<label for="nmr">Nº: </label>
												<input class="form-control"  type="text" name="nmr_casa" id="nmr_casa" autocomplete="off" placeholder="Nº CASA" required>
											</div>																					
										</div>

										<div class="row">
											<div class="form-group col-4">
												<label for="bairro">Bairro: </label>
												<input class="form-control"  type="text" name="bairro" id="bairro" autocomplete="off" placeholder="BAIRRO" style="text-transform: uppercase;" required>
											</div>	
											<div class="form-group col-8">
												<label for="foto">Foto: </label>
												<input class="form-control"  type="file" accept="image/*" name="foto" id="foto">
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

			<div class="row" style="margin-top: 2%;">
				<div class="col-12" style="height: 400px; overflow: auto;">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Cpf</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($concessionarios as $concessionario)
							{
								$nome = utf8_decode($concessionario['nome']);
								$cpf = $concessionario['cpf'];
								$idConcessionario = $concessionario['id'];

								echo "
								<tr>
								<a href='#'><td style=\"width: 80%;\">".$nome."</td></a>
								<td>".$cpf."</td>
								</tr>
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