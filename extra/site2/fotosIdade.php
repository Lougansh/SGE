<?php
include './conexao.php';
$sql = "select * from tb_aluno where situacao = 'A'  Order By Nascimento desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	echo '<img style="margin: 5px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../images/alunos/'.$linha['ID'].'.JPG" height="150">';
}
?>