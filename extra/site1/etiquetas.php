<?php 
session_start("etiquetas");
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
	<div align="center">
	<table border="0" bordercolor="#000000" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<img border="0" src="../upload/logoMFT.jpg" width="87" height="103"></td>
		<td align="center">ESCOLA MUNICIPAL PROFESSORA MARIA FUMIKO TOMINAGA <br>EDUCAÇÃO INFANTIL E ENSINO FUNDAMENTA<br>Rua Leonardo da Vinci, 858 – Vila Tarumã – Fone (045) 39021647<br>		CEP 85 809-500 – Cascavel-PR</td>
	</tr>
	<tr>
		<td>Aluno:</td>
		<td align="left">'.ucwords(strtolower(utf8_decode($linha['nomeAluno']))).'</td>
	</tr>
	<tr>
		<td>Ano/Turma:</td>
		<td align="left">'.$linha['ano'].$linha['turma'].'</td>
	</tr>
	<tr>
		<td>CGM:</td>
		<td align="left">'.$linha['cgm'].'</td>
	</tr>
	<tr>
		<td>Professora:</td>
		<td align="left">'.ucwords(strtolower(utf8_decode($linha['prof']))).'</td>
	</tr>
</table>
</div>
	';
	}
}
	echo'
<html>
<head>
<title>Declaração de Recebimento de Kit Escolar</title>
</head>
<body>
		<form method="POST" action="?id=18" onchange="form.submit()"><p align="rigth"><select size="1" name="selectTurma" onchange="form.submit()">
			
			<option value=" ">'.$titulo.'</option>
			<option value="0G">Pré I  - A</option>
			<option value="0H">Pré I  - B</option>
			
			<option value="0A">Pré II - A</option>
			<option value="0B">Pré II - B</option>
			<option value="0C">Pré II - C</option>
			<option value="0D">Pré II - D</option>
			<option value="0E">Pré II - E</option>
			<option value="0F">Pré II - F</option>
			
			<option value="1A">1º Ano - A</option>
			<option value="1B">1º Ano - B</option>
			<option value="1C">1º Ano - C</option>
			<option value="1D">1º Ano - D</option>
			<option value="1E">1º Ano - E</option>
			<option value="1F">1º Ano - F</option>
			<option value="1G">1º Ano - G</option>
			
			<option value="2A">2º Ano - A</option>
			<option value="2B">2º Ano - B</option>
			<option value="2C">2º Ano - C</option>
			<option value="2D">2º Ano - D</option>
			
			<option value="3A">3º Ano - A</option>
			<option value="3B">3º Ano - B</option>
			<option value="3C">3º Ano - C</option>
			<option value="3D">3º Ano - D</option>
			<option value="3E">3º Ano - E</option>
			<option value="3F">3º Ano - F</option>
			
			<option value="4A">4º Ano - A</option>
			<option value="4B">4º Ano - B</option>
			<option value="4C">4º Ano - C</option>
			<option value="4D">4º Ano - D</option>
			
			<option value="5A">5º Ano - A</option>
			<option value="5B">5º Ano - B</option>
			<option value="5C">5º Ano - C</option>
			<option value="5D">5º Ano - D</option>
			</select> 
		</form>
		'.utf8_encode($tabela).'
</body>
</html>
';
?>