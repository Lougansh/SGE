<?php
include './conexao.php';
include './conf.php';
if (isset($_POST['btnLimparRefoco'])){
$sql = 'update tb_aluno set Dificuldade = "N" where Dificuldade = ""';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>
<form method="POST" action="limparDados.php">
	<p>Limpar dados de reforço escolar...<input type="submit" value="SIM" name="btnLimparRefoco"></p>
</form>