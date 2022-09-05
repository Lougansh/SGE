<?php
include './conexao.php';

//$sql = 'select * from tb_aluno'
$sql = 'select * from tb_aluno';

$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$arquivo_antigo = '../images/alunos/'.$linha['ID'].'.JPG';
	$arquivo_novo = '../images/alunos/'.$linha['Nome'].'.JPG';
	echo rename($arquivo_antigo, $arquivo_novo);
}
mysql_free_result($query);
?>