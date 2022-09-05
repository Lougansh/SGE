<?php 
session_start("TRKAF");
echo '<style media="print">.botao {display: none;}</style>';
date_default_timezone_set('America/Sao_Paulo');
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['selectTurma'])){
	$print = '<input type=image src="../images/print.png" width="20" height="20" value="Imprimir" onClick="self.print();" /> ';
	$anoTurma = substr($_POST['selectTurma'],0,1);
	$turmaAno = substr($_POST['selectTurma'],1,1);
	
	$sql = "select * from tb_alunoMFT where ano = '$anoTurma' and turma = '$turmaAno' and situacao = 'A' order by nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	if ($anoTurma == 0 && $turmaAno == 'G'){$titulo = 'Turma: Pré - Escola I A ';}
	if ($anoTurma == 0 && $turmaAno == 'H'){$titulo = 'Turma: Pré - Escola I B ';}
	if ($anoTurma == 0 && $turmaAno == 'A'){$titulo = 'Turma: Pré - Escola II A ';}
	if ($anoTurma == 0 && $turmaAno == 'B'){$titulo = 'Turma: Pré - Escola II B ';}
	if ($anoTurma == 0 && $turmaAno == 'C'){$titulo = 'Turma: Pré - Escola II C ';}
	if ($anoTurma == 0 && $turmaAno == 'D'){$titulo = 'Turma: Pré - Escola II D ';}
	if ($anoTurma == 0 && $turmaAno == 'E'){$titulo = 'Turma: Pré - Escola II E ';}
	if ($anoTurma == 0 && $turmaAno == 'F'){$titulo = 'Turma: Pré - Escola II F ';}
	if ($anoTurma >= 1){$titulo = 'Turma: '.$anoTurma.'º Ano '.$turmaAno;}
	$n=1;
	while ($linha = mysql_fetch_array($query)) {
	$prof = $linha['prof'];
	$date = new DateTime( $linha['dataNascimento'] );
	$interval = $date->diff( new DateTime( date() ) );
	$tabela = $tabela.'
	<tr>
		<td align="left">'.ucwords(strtolower(utf8_decode($linha['nomeAluno']))).'</td>
		<td align="center">'.$interval->format( '%Y' ).'</td>
		<td align="center">		&nbsp;</td>
		<td align="right" colspan="2">'.$linha['tel1'].'</td>
		<td align="center">		&nbsp;</td>
		<td align="center">		&nbsp;</td>
		<td align="center">		&nbsp;</td>
	</tr>
	';
	}
}
	echo'
<html>
<head>
<title>Relatório de Acompanhamento das Atividades Remotas</title>
</head>
<body>
<div class="cantoDireito">'.$print.'</div></div>
<table border="0" width="100%">
		
	<tr>
		<td width="30%"><p align="right">
		<img border="0" src="../upload/logoMFT.jpg" width="87" height="103"></td>
		<td width="40%"><p align="center">ESCOLA MUNICIPAL PROFESSORA MARIA FUMIKO TOMINAGA <br>EDUCAÇÃO INFANTIL E ENSINO FUNDAMENTA<br>Rua Leonardo da Vinci, 858 – Vila Tarumã – Fone (045) 39021647<br>		CEP 85 809-500 – Cascavel-PR<br>
		</td>
		<td width="30%" align="center"><p align="center"><form method="POST" action="?id=18" onchange="form.submit()">
			<p align="right"><select size="1" name="selectTurma" onchange="form.submit()">
			
			<option value=" ">'.$titulo.'</option>
			'.$mostraOpcao.'
			</select> 
		</form>
		<p align="right">Prof.:'.$prof.'</td>
	</tr>
	
	</table>
<table border="1" width="100%">
	
	<tr>
		<td width="25%" align="center" rowspan="3">ALUNO</td>
		<td width="5%" align="center" rowspan="3">IDADE</td>
		<td width="20%" align="center" rowspan="3">CONDIÇÃO CLINICA<br>DE RISCO</td>		
		<td width="8%" align="center" rowspan="3" colspan="2">CONTATO<br>FAMÍLIA</td>
		<td width="42%" align="center" colspan="3">OFERTA DO&nbsp; ENSINO</td>
	</tr>
	<tr>
		<td width="14%" align="center" rowspan="2">
		REMOTO<br>
		(SOMENTE EM CASA)</td>
		<td width="28%" align="center" colspan="2">
		HIBRIDO<br>
		(UMA SEMANA EM CASA E OUTRA NA ESCOLA)</td>
	</tr>
	<tr>
		<td width="14%" align="center">
		SEMANA I</td>
		<td width="14%" align="center">
		SEMANA II</td>
	</tr>
	'.utf8_encode($tabela).'
	</table>
</body>
</html>
';
?>