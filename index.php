<?php
require_once('header.php');
?>

<?php
if (!isset($_GET['p'])) {
	echo "
	<div class=\"container-fluid\">
	<div class=\"row\" style=\"height: 575px;\">
	<div class=\"col-12\">

	<h3 class=\"text-center\" style=\"color: #000; margin-top: 15%; font-size: 100px;\"><i>Olá!</i></h3>
	<p class=\"text-center\">Para visualizar e gerenciar registros de óbitos, use o menu de navegação acima.</p>

	</div>
	</div>
	</div>  
	";  
}
elseif (file_exists($_GET['p'] . ".php")) {
	require_once($_GET['p'] . ".php");
}
else {
	echo "
	<div class=\"container-fluid\">
	<div class=\"row\">
	<div class=\"col-12\">

	<h3 class=\"text-center\"><i>PÁGINA INEXISTENTE</i></h3>

	</div>
	</div>
	</div>  
	";
}
require_once('footer.php');
?>