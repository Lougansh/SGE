<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
echo'
<form method="POST" action="sql.php">
	<p align="right">set <input type="text" name="coluna" size="20"> where <input type="text" name="condicao" size="20"><input type="submit" value="Enviar" name="enviar"></p>
</form>
';
if (isset($_POST['enviar']) && $_POST['coluna'] != '' && $_POST['condicao'] != ''){
	$coluna = $_POST['coluna'];
	$condicao = $_POST['condicao'];
$sql = 'update tb_aluno_projeto set '.$coluna.' where '.$condicao;
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>