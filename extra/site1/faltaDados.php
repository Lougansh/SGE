<?php 
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['parametro'])){
	$parametro = $_POST['parametro'];
	$bdParametro = '$linha["'.$parametro.'"]';
	$sql = "select * from tb_aluno_projeto where $parametro = '' and situacao = 'A' order by nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
		while ($linha = mysql_fetch_array($query)) {
			$conta++;
		$tabela = $tabela.'
		
	<tr>
		<td align="center">'.$linha['ID'].'</td>
		<td align="center">'.$linha['ano'].'</td>
		<td align="center">'.$linha['turma'].'</td>
		<td align="left  ">'.$linha['nomeAluno'].'</td>
		<td align="center">'.$linha['sexo'].'</td>
		<td align="center">'.$linha['dataNascimento'].'</td>
		<td align="left  ">'.$linha['cidade'].'</td>
		<td align="center">'.$linha['UF'].'</td>
		<td align="left  ">'.$linha['rua'].'</td>
		<td align="left  ">'.$linha['bairro'].'</td>
		<td align="left  ">'.$linha['nomePai'].'</td>
		<td align="left  ">'.$linha['nomeMae'].'</td>
		<td align="center">'.$linha[$parametro].'</td>
	</tr>
	';
	}
	$titulo = '<h2 align="center">Falta '.$conta.': '.$parametro.'</h2>';
}
echo'

<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
	<p align="right"><input style="text-align:left" type="text" size="30" name="parametro" onchange="form.submit()">
	</p>
</form>
'.$titulo.'
<table border="1" width="100%" cellspacing="0">
	<tr>
		<td align="center">CGM</td>
		<td align="center">Ano</td>
		<td align="center">Turma</td>
		<td align="center">Aluno</td>
		<td align="center">Sexo</td>
		<td align="center">Nascimento</td>
		<td align="center">Naturalidade</td>
		<td align="center">UF</td>
		<td align="center">Rua</td>
		<td align="center">Bairro</td>
		<td align="center">Pai</td>
		<td align="center">Mae</td>
		<td align="center">'.$parametro.'</td>
	</tr>
	'.($tabela).'
</table>
';
?>