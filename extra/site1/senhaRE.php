<?php 
include 'conexao.php';
	$sql = "select * from tb_aluno_projeto where equipe = 'presencial' and situacao = 'A' order by pc, nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());	
	while ($linha = mysql_fetch_array($query)) {
		$tabela = $tabela.'
		<tr>
		<td align="left  ">'.$linha['nomeAluno'].'</td>
		<td align="center">'.$linha['login'].'@roboticaespacial.com.br</td>
		<td align="center">'.$linha['senha'].'</td>
		<td align="left  ">'.$linha['chave'].'</td>
		<td align="left  ">'.$linha['pc'].'</td>
		</tr>
		';
	}
echo '
<H1 align="center">LOGIN E SENHAS</H1>
<H2 align="center">ROBÓTICA ESPACIAL</H2>
<div align="center">

<table border="1" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
	<tr>
		<td align="center">
		<p align="center">Nome</td>
		<td align="center">Login</td>
		<td align="center">Senha</td>
		<td align="center">Chave</td>
		<td align="center">PC</td>
	</tr>
	'.$tabela.'
</table>

';
?>