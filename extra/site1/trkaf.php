<?php 
session_start("TRKAF");
echo '<style media="print">.botao {display: none;}</style>';
//date_default_timezone_set('America/Sao_Paulo');
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['selectTurma'])){
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
	while ($linha = mysql_fetch_array($query)) {
	$tabela = $tabela.'
	<tr>
		<td width="25%" align="left" style="border-style: solid; border-width: 1px">
		'.ucwords(strtolower(utf8_decode($linha['nomeAluno']))).'</td>
		<td width="25%" colspan="2" align="left" style="border-style: solid; border-width: 1px">
		'.ucwords(strtolower(utf8_decode($linha['nomeResponsavel']))).'</td>
		<td width="25%" colspan="2" align="center" style="border-style: solid; border-width: 1px"></td>
		<td width="25%" align="center" style="border-style: solid; border-width: 1px">&nbsp;</td>
	</tr>
	';
	}
}
	echo'
<html>
<head>
<title>Termo Rec Kit Agr Fam</title>
</head>
<body>
<table border="0" width="100%">
	<tr>
		<td width="30%" colspan="2"><p align="right">
		<img border="0" src="../upload/logoMFT.jpg" width="87" height="103"></td>
		<td width="40%" colspan="2"><p align="center">ESCOLA MUNICIPAL PROFESSORA MARIA FUMIKO TOMINAGA <br>EDUCAÇÃO INFANTIL E ENSINO FUNDAMENTA<br>Rua Leonardo da Vinci, 858 – Vila Tarumã – Fone (045) 39021647<br>		CEP 85 809-500 – Cascavel-PR</td>
		<td width="30%" colspan="2" align="center"><p align="center">
		<form method="POST" action="?id=18" onchange="form.submit()"><p align="center"><select size="1" name="selectTurma" onchange="form.submit()">
			
			<option value=" ">'.$titulo.'</option>
			'.$mostraOpcao.'
			</select> 
		</form>
		<p align="center">&nbsp;</td>
	</tr>
	<tr>
		<td width="100%" colspan="6">
		<p align="center"><b>TERMO DE RECEBIMENTO DE KITS DE ALIMENTAÇÃO</b></p>
		<p align="center">Entrega 19 de abril a  23 de abril de 2021.</p>
		<p>Declaro que estou recebendo o kit de alimentação, contendo os seguintes itens: arroz, feijão, açucar, fuba, oleo de soja, macarrão, biscoito doce, leite em pó.
</td>
	</tr>
	<tr>
		<td width="25%" align="center" style="border-style: solid; border-width: 1px">NOME ALUNO</td>
		<td width="25%" colspan="2" align="center" style="border-style: solid; border-width: 1px">RESP. RETIRADA</td>
		<td width="25%" colspan="2" align="center" style="border-style: solid; border-width: 1px">RG/CPF</td>
		<td width="25%" align="center" style="border-style: solid; border-width: 1px">ASSINATURA</td>
	</tr>
	'.utf8_encode($tabela).'
</table>
</body>
</html>
';
?>