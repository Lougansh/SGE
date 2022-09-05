<?php
include './conf.php';
alunosProjeto();
if (isset($_POST['chamar'])){
	$ddd = 	$_POST['DDD'];
	$telefone = $_POST['telefone'];
	$texto = $_POST['texto'];
	echo '
	<script language= "JavaScript">window.open("https://wa.me/55'.$ddd.$telefone.'/?text='.$texto.'")</script>
	';
}
?>
<form method="POST" action="zapzap.php">
	<p align="center">
	<select size="1" name="DDD"><option>45</option></select> 
	<input autofocus type="text" name="telefone" size="10"> 
	<input type="text" name="texto" size="80">
	<input type="submit" value="Chamar" name="chamar"></p>
</form>