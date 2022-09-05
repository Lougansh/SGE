<?php 
date_default_timezone_set('America/Sao_Paulo');
echo '
<style type="text/css">
.footer {
    position:absolute;
    bottom:0;
    width:90%;
}
.content {overflow:hidden;}
.aside {width:200px;}
.fleft {float:left;}
.fright {float:right;}
}
</style>
<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
alunosProjeto();
	$sql = "select * from tb_aluno_projeto where equipe = 'CFH'order by nomeAluno desc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$dropMenu = '<option value="'.$linha['cgm'].'">'.$linha['nomeAluno'].'</option>'.$dropMenu;
	}

if (isset($_POST['btnSelect'])){
	$ID = $_POST['dropAluno'];
	$sql = "select * from tb_aluno_projeto where cgm = $ID order by nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$aluno = ucwords(strtolower($linha['nomeAluno']));
	$rgAluno = $linha['rgAluno'];
	$responsavel = ucwords(strtolower($linha['nomeResponsavel']));
	$rgResponsavel = $linha['rgResponsavel'];
	$sexo  = $linha['Sexo'];
	if ($sexo == 'F'){
		$pronome = 'ela';
	}
	if ($sexo == 'M'){
		$pronome = 'ele';
	}
}
}
echo '
<div class="botao"><form method="POST" action="bilheteRobotArena.php">
	<p align="right"><select size="1" name="dropAluno">
	'.$dropMenu.'
	</select><input type="submit" value="Criar" name="btnSelect"> <a href="menu.php">Voltar</a></p>
</form></div>
<table border="0" width="100%">
	<tr>
		<td width="15%">
		<p align="center">
		<img border="0" src="../upload/RoboCFH3.png" height="100"></td>
		<td>
		<p align="center"><b><font size="6">PROJETO DE ROBÓTICA
</font></b><br>
		<font size="4">CONSTRUINDO O FUTURO HOJE</font></td>
		<td width="15%">
		</td>
	</tr>
	</table>
<div align="center">
';
//------------------------------------------------------
echo'
<table border="0" width="80%" style="border-width: 0px">
	<tr>
		<td style="border-style: none; border-width: medium">
<p align="center"><BR><BR><BR><BR><b><font size="4">AUTORIZAÇÃO PARA PARTICIPAÇÃO DO EVENTO ROBOT ARENA 2020.1</font></b></td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium">
<p align="justify">&nbsp;</p>
<p align="justify"><font size="4">Eu '.$responsavel.' 
brasileiro(a), portador(a) do RG nº '.$rgResponsavel.' natural da cidade de Cascavel, 
PR. </font></p>
<p align="justify"><font size="4">Responsável legal de '.$aluno.' 
brasileiro(a), portador do RG nº '.$rgAluno.' natural da cidade de Cascavel PR. </font></p>
<p align="justify"><font size="4">Por meio desta autorizo a participação no evento Robot Arena 2020.1 sediado nas 
dependências da Universidade Tecnológica Federal do Paraná campus Toledo, na 
cidade de Toledo PR, no dia 14/03/2020. </font></p>
<p align="justify"><font size="4">Também declaro estar ciente de que a 
comissão organizadora do evento é isenta de responsabilidade pelos menores e que 
o acompanhamento desses participantes no evento é recomendado.</font><br>
&nbsp;</p></td>
	</tr>
	</table>
';
//------------------------------------------------------
echo'
</div>
<div class="footer"><table border="0" width="100%" style="border-width: 0px">
	<tr>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">
		<p align="right">Cascavel '.date('d/m/Y').'.</td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; " width="40%">
		&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-top-style: solid; border-top-width: 1px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" width="40%">
		<p align="center"><font size="4">
		'.$responsavel.' </font></td>
	</tr>
</table>
';
?>