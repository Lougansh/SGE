<?php 
session_start("agenda");
date_default_timezone_set('America/Sao_Paulo');
include './conexao.php';
include './conf.php';
nexus();
$sql = 'select * from tb_agendaNF Order By dataTrabalho desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	
	while ($linha = mysql_fetch_array($query)) {
		$date = new DateTime( $linha['dataNascimento'] );
		$interval = $date->diff( new DateTime( date() ) );
		$historico = $historico.'
		<tr>
			<td colspan="2" align="center">
			<hr><h3>'.ucwords(strtolower($linha['modelo'])).'</h3></td>
		</tr>
		<tr>
			<td align="right">Nascimento:</td>
			<td align="left">'.date('d/m/Y', strtotime($linha[dataNascimento])).' Hoje: '.$interval->format( '%Y Anos, %m Meses e %d Dias' ).' </td>
		</tr>
		<tr>
			<td align="right">Signo:</td>
			<td align="left">'.$linha[signo].'</td>
		</tr>
		<tr>
			<td align="right">Responsavel:</td>
			<td align="left">'.$linha[responsavel].'</td>
		</tr>
		<tr>
			<td align="right">RG:</td>
			<td align="left"> '.$linha[rg].'</td>
		</tr>
		<tr>
			<td align="right">CPF:</td>
			<td align="left"> '.$linha[cpf].'</td>
		</tr>
		<tr>
			<td align="right">E-Mail:</td>
			<td align="left"> '.$linha[email].'</td>
		</tr>
		<tr>
			<td align="right">Telefone:</td>
			<td align="left"> '.$linha[telefone].'</td>
		</tr>
		<tr>
			<td align="right">Local:</td>
			<td align="left"> '.$linha[local].' Data:'.date('d/m/Y', strtotime($linha[dataTrabalho])).' / '.$linha[horario].':00 horas.</td>
		</tr>';
	}
echo'
<html>
<head>
	<title>Agenda Nexus Fotografia</title>
</head>
	<body>
		<h1 style: align="center">Histórico NF</h1>
		<div align="center">
	<table border="0">
		<tr>
			<td>'.$historico.'</td>
		</tr>
	</table>
</div>
		
	</body>
</html>
';
?>