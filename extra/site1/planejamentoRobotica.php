<?php
include './conexao.php';
include './conf.php';
alunosProjeto();


if (isset($_POST['btnPesquisar'])){
$coluna = $_POST['pesquisa'];
$assunto = $_POST['textPesquisar'];
$sql = 'SELECT * from tb_planejamento where turma = "R" and '.$coluna.' like "%'.$assunto.'%" order by ID desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$objetivo =       str_replace( "\n",'</li><li>',$linha['Objetivo']);
	$encaminhamento = str_replace( "\n",'</li><li>',$linha['Encaminhamento']);
	$recurso =        str_replace( "\n",'</li><li>',$linha['Recurso']);
	$conteudo = '<p><b><font color="blue">CONTEÚDO</font>: <font color="gray">'.$linha['Conteudo'].'</font></b></p><p><b>          
	<font color="green">OBJETIVOS:</font></b></p><ul><li>'.$objetivo.'</ul><p><b>  
	<font color="brown">ENCAMINHAMENTOS METODOLÓGICOS:</font></b></p><ul><li>'.$encaminhamento.'</ul><b>
	<font color="red">RECURSOS AUXILIARES EXTERNOS:</font></b><ul>
	<li>'.$recurso.'</ul><hr>'.$conteudo;
}
mysql_free_result($query);
}
else {
	$sql = 'SELECT * from tb_planejamento where turma = "R" order by ID asc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$conteudoID ++;
		$objetivo =       str_replace( "\n",'</li><li>',$linha['Objetivo']);
		$encaminhamento = str_replace( "\n",'</li><li>',$linha['Encaminhamento']);
		$recurso =        str_replace( "\n",'</li><li>',$linha['Recurso']);
		$conteudo = $conteudo.'<p><b><font color="blue">CONTEÚDO '.$conteudoID.'</font>: <font color="gray">'.$linha['Conteudo'].'</font></b></p><p><b>          
		<font color="green">OBJETIVOS:</font></b></p><ul><li>'.$objetivo.'</ul><p><b>  
		<font color="brown">ENCAMINHAMENTOS METODOLÓGICOS:</font></b></p><ul><li>'.$encaminhamento.'</ul><b>
		<font color="red">RECURSOS AUXILIARES EXTERNOS:</font></b><ul>
		<li>'.$recurso.'</ul><hr>';
	}
	mysql_free_result($query);
}
echo '
<h2 align="center">PLANEJAMENTO ROBÓTICA 2021</h2>
<table border="0" width="90%">
	<tr>
		<td>
			<form method="POST" action="?id=10" onchange="form.submit()">
				<p align="center">
				<input type="text" name="textPesquisar" size="30">
				<input type="radio" value="Objetivo" name="pesquisa" checked>Objetivo
				<input type="radio" value="Encaminhamento" name="pesquisa">Encaminhamento
				<input type="radio" value="Recurso" name="pesquisa">Recurso
				<input type="submit" value="Pesquisar" name="btnPesquisar">
				</p>
			<form">
			'.$conteudo.'
		</td>
	</tr>
</table>
';
?>

