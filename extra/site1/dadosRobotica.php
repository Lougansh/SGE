<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<input type="radio" value="Unopar" 		name="Lista" onchange="form.submit()">Unopar
<input type="radio" value="Remota" 		name="Lista" onchange="form.submit()">Remota
<input type="radio" value="Presencial" 	name="Lista" onchange="form.submit()">Presencial
<input type="radio" value="CFH" 		name="Lista" onchange="form.submit()">CFH
<input type="radio" value="Ceavel" 		name="Lista" onchange="form.submit()">Ceavel
<input type="radio" value="2020" 		name="Lista" onchange="form.submit()">2020
<input type="radio" value="2019" 		name="Lista" onchange="form.submit()">2019
<input type="radio" value="2018" 		name="Lista" onchange="form.submit()">2018
<input type="radio" value="2017" 		name="Lista" onchange="form.submit()">2017
<input type="radio" value="2016" 		name="Lista" onchange="form.submit()">2016
<input type="radio" value="2015" 		name="Lista" onchange="form.submit()">2015
<input type="radio" value="2014" 		name="Lista" onchange="form.submit()">2014
<p>
';
if (isset($_POST['Lista'])){
	$equipe = $_POST['Lista'];
	$sql = "select * from tb_aluno_projeto where equipe = '$equipe' and situacao = 'A' and obs like '%senha%' order by nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());	
	while ($linha = mysql_fetch_array($query)) {
		$tabela = $tabela.'
		<tr>
		<td align="center">'.$linha['cgm'].'</td>
		<td align="left  ">'.$linha['nomeAluno'].'</td>
		<td align="center">'.$linha['obs'].'</td>
		<td align="center">'.$linha['dataNascimento'].'</td>
		<td align="left  ">'.$linha['nomePai'].'</td>
		<td align="left  ">'.$linha['profissaoPai'].'</td>
		<td align="left  ">'.$linha['nomeMae'].'</td>
		<td align="left  ">'.$linha['profissaoMae'].'</td>
		<td align="left  ">'.$linha['nomeResponsavel'].'</td>
		<td align="left  ">'.$linha['rg'].'</td>
		<td align="left  ">'.$linha['cpf'].'</td>
		<td align="center">'.$linha['tel1'].'</td>
		<td align="center">'.$linha['turno'].'</td>
		</tr>
		';
	}
}
echo'
<h2 align="center">'.$titulo.'</h2>
<table border="1" width="95%" cellspacing="0">
	<tr>
		<td align="center">ID</td>
		<td align="center">Aluno</td>
		<td align="center">Sexo</td>
		<td align="center">Nascimento</td>
		<td align="center">Pai</td>
		<td align="center">Profissao</td>
		<td align="center">Mãe</td>
		<td align="center">Profissao</td>
		<td align="center">Responsavel</td>
		<td align="center">RG</td>
		<td align="center">CPF</td>
		<td align="center">Telefone</td>
		<td align="center">Turno</td>
	</tr>
	'.($tabela).'
</table>
';
?>