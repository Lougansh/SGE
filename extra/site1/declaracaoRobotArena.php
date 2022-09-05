<?php 
date_default_timezone_set('America/Sao_Paulo');
echo '
<style type="text/css">
.footer {
    position:absolute;
    bottom:0;
    width:90%;
}
.content {
	overflow:hidden;
	}
.aside {
	width:200px;
	}
.fleft {
	float:left;
	}
.fright {
	float:right;
	}
.corpo{
	width:80%;
	height:200px;
	margin:10px;
	padding:80px 0;
}
<!---------------------------------
}
</style>
<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
	$sql = "select * from tb_aluno_projeto where equipe = 'CFH' order by nomeAluno desc ";
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
	$rg = $linha['rgAluno'];
	$cpf = $linha['cpfAluno'];
	if ($rg == ''){
		$rg = '184562867';
	}
	if ($cpf == ''){
		$cpf = '13209780021';
	}
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
<div class="botao"><form method="POST" action="?id=2020">
	<p align="right"><select size="1" name="dropAluno">
	'.$dropMenu.'
	</select><input type="submit" value="Criar" name="btnSelect"> <a href="menu.php">Voltar</a></p>
</form></div>
<table border="1" width="100%" style="border-width: 0">
	<tr>
		<td align="center" width="20%" style="border-style: none; border-width: medium">
		<p align="right">
		<img border="0" src="../upload/RoboCFH3.png" height="150"></td>
		<td width="60%" style="border-style: none; border-width: medium">
		<p align="center"><font size="6">PROJETO DE ROBÓTICA</font></p>
		<p align="center"><font size="6">CONSTRUINDO O FUTURO HOJE</font></td>
	</tr>
</table>
<div align="center">
<div class="corpo">
<H1 align="center">DECLARAÇÃO</H1>
<p align="justify">Informo para os devidos fins que <b>'.$aluno.'</b>, RG:'.$rg.', CPF:'.$cpf.', participou da ROBOT ARENA 2020.1. Sediado e organizado pela Universidade Tecnológica Federal do Paraná - Campus Toledo. Dia 14 de março de 2020, das 08:00 as 18:00. Como competidora na modalidade (ARENA CONTROLADA).</div></div>
<br>
<div align="right">Cascavel '.date('d/m/Y').'.</div>

<div class="footer">
<table border="1" width="100%" style="border-width: 0px">
	<tr>
		<td style="border-style: none; border-width: medium" align="center" width="33%" valign="baseline">&nbsp;</td>
		<td style="border-style: none; border-width: medium" align="center" width="33%" valign="baseline">&nbsp;</td>
		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium" align="center" width="33%" valign="baseline">
		<p align="center">
		<img border="0" src="../images/Assinatura.png" height="150"></td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">
		<p align="center">EVERALDO JOSÉ DE SOUZA<br>
		<font size="1">INSTRUTOR DE INFORMÁTICA<br>
		MATRICULA 27072-5</font></td>
	</tr>
</table>
</div>
';
?>