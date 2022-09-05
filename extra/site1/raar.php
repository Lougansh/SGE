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
	$tabela = $tabela.'
	<tr>
		<td align="center">'.$n++.'</td>
		<td align="left">'.ucwords(strtolower(utf8_decode($linha['nomeAluno']))).'</td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
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
	<hr> 
<table border="0" width="100%">
	<tr>
		<td width="100%">
		<p align="center">
		RELATÓRIO DE ACOMPANHAMENTO DAS ATIVIDADES REMOTAS<br>
		De _____/_____/_____ a _____/_____/_____</p>
</td>
	</tr>
	</table>
<table border="1" width="100%">
	<tr>
		<td align="center">Nº</td>
		<td align="center">Aluno (a)</td>
		<td align="center">Realizou a Atividade</td>
		<td align="center">Atingiu os Objetivos Propostos</td>
		<td align="center">Conteúdos a Retomar</td>
		<td align="center">Outras Observações</td>
	</tr>
	'.utf8_encode($tabela).'</table>
<p align="center">(Para os professores que ministram os componentes curriculares 
na hora atividade, poderão realizar um relatório geral por turma)</p>
<table border="0" width="100%">
	<tr>
		<td align="center">&nbsp;</td>
		<td align="center">_________________________________<br>
		Professor (a) Regente</td>
		<td align="center">_________________________________<br>
		Coordenador (a) Pedagógico (a)</td>
		<td align="center">&nbsp;</td>
	</tr>
</table>
</body>
</html>
';
?>