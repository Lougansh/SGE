<?php
include './conexao.php';
	$sql = 'SELECT * from tb_planejamento order by ID asc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	echo $linha['Conteudo'].'<br>';		
	}

?>

