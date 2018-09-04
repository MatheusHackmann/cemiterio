<?php
session_start();

require_once('classes/Sql.class.php');

if ($_POST) {

	$sql = new Sql();
	$results = $sql->select("SELECT * FROM usuarios WHERE usuario = :USUARIO;", array(
		':USUARIO' => utf8_decode($_POST['usuario'])
	));

	if (count($results) == 0) {
		$_SESSION['mensagem'] = 'Usuário inexistente.';
		$_SESSION['tipoAlert'] = 'alert-danger';

		header('Location: login.php');
		exit();
	}
	else if($results[0]['senha'] != password_verify($_POST['senha'], $results[0]['senha'])) {
		$_SESSION['mensagem'] = 'Senha incorreta.';
		$_SESSION['tipoAlert'] = 'alert-danger';

		header('Location: login.php');
		exit();
	}
	else {
		$_SESSION['usuario'] = $results[0]['usuario'];

		header('Location: index.php');
	}

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.css">

	<link rel="shortcut icon" href="arquivos/favicon.ico"/>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="offset-md-3 col-12 col-md-6 form-login">
				<form action="" method="post">
					<div class="row">
						<div class="col-12">
							<img src="arquivos/Logo-Sumare.png" class="img-fluid" alt="">
						</div>
					</div>

					<div class="row">
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
					</div>

					<div class="row form-group">
						<div class="col-12">
							<label for="usuario">Usuário:</label>
							<input class="form-control" type="text" name="usuario" id="usuario" onchange="exibirDesenvolvimento();" required autocomplete="off">
							<label for="senha">Senha:</label>
							<input class="form-control" type="password" name="senha" id="senha" required>							
						</div>
					</div>

					<div class="row form-group">
						<div class="col-12">
							<button class="btn btn-success">Entrar</button>
						</div>
					</div>	

					<div class="row">
						<div class="col-12 text-center">
							<p><i style="color: #999999;">Sistema Cemitério - Prefeitura Municipal de Sumaré</i></p>
						</div>
					</div>									
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/jscredit.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
</body>
</html>
