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
		<td width="5%" align="center" style="border-style: solid; border-width: 1px">
		'.$n++.'</td>
		<td width="25%" align="left" style="border-style: solid; border-width: 1px">
		'.((($linha['nomeAluno']))).'</td>
		<td width="25%" align="left" style="border-style: solid; border-width: 1px">
		'.((($linha['nomeResponsavel']))).'</td>
		<td width="45%" align="center" style="border-style: solid; border-width: 1px">
		</td>
	</tr>
	';
	}
}
	echo'
<html>
<head>
<title>Form Ctrl Ent Rec Atv</title>
</head>
<body>
<div class="cantoDireito">'.$print.'</div></div>
<table border="0" width="100%" >
	<tr>
		<td width="30%"><p align="right">
		<img border="0" src="../upload/logoMFT.jpg" width="87" height="103"></td>
		<td width="40%"><p align="center">ESCOLA MUNICIPAL PROFESSORA MARIA FUMIKO TOMINAGA <br>EDUCAÇÃO INFANTIL E ENSINO FUNDAMENTAL<br>Rua Leonardo da Vinci, 858 – Vila Tarumã – Fone (045) 39021647<br>		CEP 85 809-500 – Cascavel-PR</td>
		<td width="30%" align="center"><p align="center"><form method="POST" action="?id=18" onchange="form.submit()">
			<p align="right"><select size="1" name="selectTurma" onchange="form.submit()">
			
			<option value=" ">'.$titulo.'</option>
			'.$mostraOpcao.'
			</select> 
		</form>
		<p align="right">Prof.:'.$prof.'</td>
	</tr>
	
	</table>
<table border="0" width="100%">
	<tr>
		<td width="100%" colspan="4">
		<p align="center">
		Lista de presença referente a reunião com pais/responsáveis do ____º 
		Trimestre. Pauta: Desenvolvimento escolar dos alunos.<br><br>
		<input type="text" size="1" style="text-align:center"> / <input type="text" size="1" style="text-align:center"> / <input type="text" size="1"  style="text-align:center"> 
		</p>
		
</td>
	</tr>

	<tr>
		<td width="1%" align="center" >
		Nº</td>
		<td width="18%" align="center" >
		ALUNO (A)</td>
		<td width="18%" align="center">
		RESPONSÁVEL</td>
		<td width="63%" align="center">
		ASSINATURA</td>
	</tr>
	'.($tabela).'
	</table>
</body>
</html>
';
?>