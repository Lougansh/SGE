<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
	$sql = 'select distinct(equipe) from tb_aluno_projeto order by equipe asc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$menu = $menu.'<option value="'.$linha['equipe'].'">'.strtoupper($linha['equipe']).'</option>';
	}
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Atualização de Alunos CFH</title>
		</head>
		<meta charset="utf-8">
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<div align="right">
						<select size="1" name="menu" onchange="form.submit()"><option value=""></option>'.$menu.'</select>
					</div>
				</div>
';
if (isset($_POST['menu'])) {
	$equipe = $_POST['menu'] ;
	$equipeAtual = $_POST['menu'] ;
	$sql = "SELECT * FROM tb_aluno_projeto WHERE equipe = '$equipe' and situacao = 'A' order by equipe desc, nomeAluno desc";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	$meninas = 0;
	$meninos = 0;
	while ($linha = mysql_fetch_array($query)) {
	if ($linha['sexo'] == 'F' ){$F++; $alunaRobotica = '<font size="2">'.$linha['nomeAluno'].'</font><br>'.$alunaRobotica;}
	if ($linha['sexo'] == 'M' ){$M++; $alunoRobotica = '<font size="2">'.$linha['nomeAluno'].'</font><br>'.$alunoRobotica;}
	}
	$total   = $F+$M;
	mysql_free_result($query);
	//=====================================================================================
	$sql = "SELECT anoProjeto, equipe, COUNT( ID ) Total FROM tb_aluno_projeto group by equipe order by equipe desc";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	$contaSelectTurma  = 0;
	while ($linha = mysql_fetch_array($query)) {
		$equipe = $linha['equipe'];
		$contaSelectTurma ++;
		$selectTurma = '<font size="2">Equipe: '.$equipe.' - '.$linha['Total'].' Alunos</font> </br>'.$selectTurma;
	}
	mysql_free_result($query);
//=====================================================================================
echo'
<font size="2"><div align="center">
<table border="0" width="90%"><tr><td>
<fieldset style="padding: 2"><legend>SISTEMA DE RELATÓRIOS</legend><div align="center">
<table border="0" width="100%"><tr><td width="50%">
<fieldset style="padding: 2"><legend>Equipe '.$equipeAtual.': '.$M.' meninos e '.$F.' meninas, totalizando '.$total.' alunos.</legend>
<table border="0" width="100%"><tr><td>
</tr></table></fieldset>
</td><td width="50%">
&nbsp;</td></tr></table>
<table border="0" width="100%"><tr><td align="center"><fieldset style="padding: 2"><legend>
<b>Informações e distribuições</b></legend>
<table border="0" width="100%"><tr><td width="33%" valign="top"><fieldset style="padding: 2">
<legend>Distribuição de '.$contaSelectTurma.' equipes</legend>
'.$selectTurma.'</fieldset>
</td>
<td width="33%" valign="top"><fieldset style="padding: 2"><legend>
Meninos: '.$M.' alunos</legend>
'.$alunoRobotica.'</fieldset></td>
<td width="33%" valign="top"><fieldset style="padding: 2"><legend>
Meninas: '.$F.' alunas</legend>
'.$alunaRobotica.'</fieldset></td></tr></table></fieldset></td></tr></table></div></fieldset></td></tr></table></div>
';
}
?>