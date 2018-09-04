<div class="container">
	<div class="row">
		<div class="col-4" style="height: 100%; box-shadow: 0px 0px 10px #000;margin-top: 5px; margin-bottom: 5px;">
			<!-- FOTO DE PERFIL -->
			<div class="row">
				<div class="col-12" style="padding: 0px !important; max-height: 400px;">
					<img src="arquivos/perfil.png" alt="" class="img-fluid" style="height: 100%;width: 100%">
				</div>
			</div>

			<!-- INFORMAÇÕES BÁSICAS -->
			<div class="row" style="margin-top: 2%; margin-bottom: 2%;">
				<div class="col-12">
					<div class="text-center">CONCESSIONÁRIO</div>
					<p><span class="fas fa-user"></span> Jubileu Cardoso</p>
					<p><span class="fas fa-mobile-alt"></span> (19) 99999-9999</p>
					<p><span class="fas fa-home"></span> Rua 1, 111 - Sumaré</p>
					<p><span class="fas fa-envelope"></span> email@gmail.com</p>
					<button class="btn btn-b" type="button" style="width: 100%;" data-toggle="modal" data-target="#ModalLotesConcessionario">Lotes</button>

					<!-- MODAL LOTES QUE CONCESSIONARIO POSSUI -->
					<div class="modal fade" id="ModalLotesConcessionario">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal body -->
								<div class="modal-body">
									<div class="row">
										<div class="col-6">
											Quadra: 1
										</div>
										<div class="col-6 text-right">
											Status: <i style="color: green;">Disponível</i>
										</div>	
										<div class="col-6">
											Lote: 1
										</div>													
										<div class="col-6 text-right">
											Tipo: Pago
										</div>				
									</div>	

									<hr>

									<div class="row">
										<div class="col-6">
											Quadra: 2
										</div>
										<div class="col-6  text-right">
											Status: <i style="color: red;">Ocupado</i>
										</div>
										<div class="col-6">
											Lote: 4
										</div>														
										<div class="col-6 text-right">
											Tipo: Prefeitura
										</div>
										<hr>				
									</div>																						
								</div>

								<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

							</div>
						</div>
					</div>												
				</div>
			</div>
		</div>


		<div class="offset-1 col-7" style="height: 100%; box-shadow: 0px 0px 10px #000;margin-top: 5px; margin-bottom: 5px;">
			<h5 class="text-center">SEPULTADOS</h5>
			<hr>

			<div class="row">
				<div class="col-6"><h6>NOME DO SEPULTADO</h6></div>
				<div class="col-6 text-right"><span class="fas fa-calendar-alt"></span> 27/08/2018</div>
				<div class="col-12"><span class="fas fa-church"></span> Quadra 23</div>
				<div class="col-12"><span class="fas fa-chess-king"></span> Lote 1</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-6"><h6>NOME DO SEPULTADO</h6></div>
				<div class="col-6 text-right"><span class="fas fa-calendar-alt"></span> 30/08/2018</div>
				<div class="col-12"><span class="fas fa-church"></span> Quadra 2</div>
				<div class="col-12"><span class="fas fa-chess-king"></span> Lote 5</div>
			</div>
			<hr>									

		</div>
	</div>
</div>