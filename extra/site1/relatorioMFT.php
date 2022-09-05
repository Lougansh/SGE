<?php
include 'conexao.php';
include 'conf.php';
alunosMFT();
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT where situacao = 'A' and oferta = 'R'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$remotos = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT where situacao = 'A' and oferta = 'H1'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$H1 = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT where situacao = 'A' and oferta = ''";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$faltas = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT where situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$alunos = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE turno = 'I' and situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$integral = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE turno = 'M' and situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$manha = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE turno = 'T' and situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$tarde = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'M' and situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninos = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'F' and situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninas = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'M' and situacao = 'A' and turno = 'M'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninosManha = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'F' and situacao = 'A' and turno = 'M'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninasManha = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'M' and situacao = 'A' and turno = 'I'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninosIntegral = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'F' and situacao = 'A' and turno = 'I'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninasIntegral = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'M' and situacao = 'A' and turno = 'T'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninosTarde = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT(ID) total FROM tb_alunoMFT WHERE sexo = 'F' and situacao = 'A' and turno = 'T'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$meninasTarde = $linha['total'];
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT * FROM tb_alunoMFT WHERE situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if($linha['ano']==0 && $linha['turma']==A){$pre2A++;}
if($linha['ano']==0 && $linha['turma']==B){$pre2B++;}
if($linha['ano']==0 && $linha['turma']==C){$pre2C++;}
if($linha['ano']==0 && $linha['turma']==D){$pre2D++;}
if($linha['ano']==0 && $linha['turma']==E){$pre2E++;}
if($linha['ano']==0 && $linha['turma']==F){$pre2F++;}
if($linha['ano']==0 && $linha['turma']==G){$pre1A++;}
if($linha['ano']==0 && $linha['turma']==H){$pre1B++;}
if($linha['ano']==1 && $linha['turma']==A){$t1A++;}
if($linha['ano']==1 && $linha['turma']==B){$t1B++;}
if($linha['ano']==1 && $linha['turma']==C){$t1C++;}
if($linha['ano']==1 && $linha['turma']==D){$t1D++;}
if($linha['ano']==1 && $linha['turma']==E){$t1E++;}
if($linha['ano']==1 && $linha['turma']==F){$t1F++;}
if($linha['ano']==2 && $linha['turma']==A){$t2A++;}
if($linha['ano']==2 && $linha['turma']==B){$t2B++;}
if($linha['ano']==2 && $linha['turma']==C){$t2C++;}
if($linha['ano']==2 && $linha['turma']==D){$t2D++;}
if($linha['ano']==2 && $linha['turma']==E){$t2E++;}
if($linha['ano']==3 && $linha['turma']==A){$t3A++;}
if($linha['ano']==3 && $linha['turma']==B){$t3B++;}
if($linha['ano']==3 && $linha['turma']==C){$t3C++;}
if($linha['ano']==3 && $linha['turma']==D){$t3D++;}
if($linha['ano']==4 && $linha['turma']==A){$t4A++;}
if($linha['ano']==4 && $linha['turma']==B){$t4B++;}
if($linha['ano']==4 && $linha['turma']==C){$t4C++;}
if($linha['ano']==4 && $linha['turma']==D){$t4D++;}
if($linha['ano']==4 && $linha['turma']==E){$t4E++;}
if($linha['ano']==5 && $linha['turma']==A){$t5A++;}
if($linha['ano']==5 && $linha['turma']==B){$t5B++;}
if($linha['ano']==5 && $linha['turma']==C){$t5C++;}
if($linha['ano']==5 && $linha['turma']==D){$t5D++;}
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT * FROM tb_alunoMFT WHERE situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if($linha['ano']==0 && $linha['turma']==A && $linha['sexo']==F){$pre2AF++;}
if($linha['ano']==0 && $linha['turma']==A && $linha['sexo']==M){$pre2AM++;}
if($linha['ano']==0 && $linha['turma']==B && $linha['sexo']==F){$pre2BF++;}
if($linha['ano']==0 && $linha['turma']==B && $linha['sexo']==M){$pre2BM++;}
if($linha['ano']==0 && $linha['turma']==C && $linha['sexo']==F){$pre2CF++;}
if($linha['ano']==0 && $linha['turma']==C && $linha['sexo']==M){$pre2CM++;}
if($linha['ano']==0 && $linha['turma']==D && $linha['sexo']==F){$pre2DF++;}
if($linha['ano']==0 && $linha['turma']==D && $linha['sexo']==M){$pre2DM++;}
if($linha['ano']==0 && $linha['turma']==E && $linha['sexo']==F){$pre2EF++;}
if($linha['ano']==0 && $linha['turma']==E && $linha['sexo']==M){$pre2EM++;}
if($linha['ano']==0 && $linha['turma']==F && $linha['sexo']==F){$pre2FF++;}
if($linha['ano']==0 && $linha['turma']==F && $linha['sexo']==M){$pre2FM++;}
if($linha['ano']==0 && $linha['turma']==G && $linha['sexo']==F){$pre1AF++;}
if($linha['ano']==0 && $linha['turma']==G && $linha['sexo']==M){$pre1AM++;}
if($linha['ano']==0 && $linha['turma']==H && $linha['sexo']==F){$pre1BF++;}
if($linha['ano']==0 && $linha['turma']==H && $linha['sexo']==M){$pre1BM++;}
if($linha['ano']==1 && $linha['turma']==A && $linha['sexo']==F){$t1AF++;}
if($linha['ano']==1 && $linha['turma']==A && $linha['sexo']==M){$t1AM++;}
if($linha['ano']==1 && $linha['turma']==B && $linha['sexo']==F){$t1BF++;}
if($linha['ano']==1 && $linha['turma']==B && $linha['sexo']==M){$t1BM++;}
if($linha['ano']==1 && $linha['turma']==C && $linha['sexo']==F){$t1CF++;}
if($linha['ano']==1 && $linha['turma']==C && $linha['sexo']==M){$t1CM++;}
if($linha['ano']==1 && $linha['turma']==D && $linha['sexo']==F){$t1DF++;}
if($linha['ano']==1 && $linha['turma']==D && $linha['sexo']==M){$t1DM++;}
if($linha['ano']==1 && $linha['turma']==E && $linha['sexo']==F){$t1EF++;}
if($linha['ano']==1 && $linha['turma']==E && $linha['sexo']==M){$t1EM++;}
if($linha['ano']==1 && $linha['turma']==F && $linha['sexo']==F){$t1FF++;}
if($linha['ano']==1 && $linha['turma']==F && $linha['sexo']==M){$t1FM++;}
if($linha['ano']==2 && $linha['turma']==A && $linha['sexo']==F){$t2AF++;}
if($linha['ano']==2 && $linha['turma']==A && $linha['sexo']==M){$t2AM++;}
if($linha['ano']==2 && $linha['turma']==B && $linha['sexo']==F){$t2BF++;}
if($linha['ano']==2 && $linha['turma']==B && $linha['sexo']==M){$t2BM++;}
if($linha['ano']==2 && $linha['turma']==C && $linha['sexo']==F){$t2CF++;}
if($linha['ano']==2 && $linha['turma']==C && $linha['sexo']==M){$t2CM++;}
if($linha['ano']==2 && $linha['turma']==D && $linha['sexo']==F){$t2DF++;}
if($linha['ano']==2 && $linha['turma']==D && $linha['sexo']==M){$t2DM++;}
if($linha['ano']==2 && $linha['turma']==E && $linha['sexo']==F){$t2EF++;}
if($linha['ano']==2 && $linha['turma']==E && $linha['sexo']==M){$t2EM++;}
if($linha['ano']==3 && $linha['turma']==A && $linha['sexo']==F){$t3AF++;}
if($linha['ano']==3 && $linha['turma']==A && $linha['sexo']==M){$t3AM++;}
if($linha['ano']==3 && $linha['turma']==B && $linha['sexo']==F){$t3BF++;}
if($linha['ano']==3 && $linha['turma']==B && $linha['sexo']==M){$t3BM++;}
if($linha['ano']==3 && $linha['turma']==C && $linha['sexo']==F){$t3CF++;}
if($linha['ano']==3 && $linha['turma']==C && $linha['sexo']==M){$t3CM++;}
if($linha['ano']==3 && $linha['turma']==D && $linha['sexo']==F){$t3DF++;}
if($linha['ano']==3 && $linha['turma']==D && $linha['sexo']==M){$t3DM++;}
if($linha['ano']==4 && $linha['turma']==A && $linha['sexo']==F){$t4AF++;}
if($linha['ano']==4 && $linha['turma']==A && $linha['sexo']==M){$t4AM++;}
if($linha['ano']==4 && $linha['turma']==B && $linha['sexo']==F){$t4BF++;}
if($linha['ano']==4 && $linha['turma']==B && $linha['sexo']==M){$t4BM++;}
if($linha['ano']==4 && $linha['turma']==C && $linha['sexo']==F){$t4CF++;}
if($linha['ano']==4 && $linha['turma']==C && $linha['sexo']==M){$t4CM++;}
if($linha['ano']==4 && $linha['turma']==D && $linha['sexo']==F){$t4DF++;}
if($linha['ano']==4 && $linha['turma']==D && $linha['sexo']==M){$t4DM++;}
if($linha['ano']==4 && $linha['turma']==E && $linha['sexo']==F){$t4EF++;}
if($linha['ano']==4 && $linha['turma']==E && $linha['sexo']==M){$t4EM++;}
if($linha['ano']==5 && $linha['turma']==A && $linha['sexo']==F){$t5AF++;}
if($linha['ano']==5 && $linha['turma']==A && $linha['sexo']==M){$t5AM++;}
if($linha['ano']==5 && $linha['turma']==B && $linha['sexo']==F){$t5BF++;}
if($linha['ano']==5 && $linha['turma']==B && $linha['sexo']==M){$t5BM++;}
if($linha['ano']==5 && $linha['turma']==C && $linha['sexo']==F){$t5CF++;}
if($linha['ano']==5 && $linha['turma']==C && $linha['sexo']==M){$t5CM++;}
if($linha['ano']==5 && $linha['turma']==D && $linha['sexo']==F){$t5DF++;}
if($linha['ano']==5 && $linha['turma']==D && $linha['sexo']==M){$t5DM++;}
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT * FROM tb_alunoMFT WHERE situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if($linha['ano']==0 && $linha['turma']=='A' && $linha['oferta']=='R'){$opre2AR++;}
if($linha['ano']==0 && $linha['turma']=='A' && $linha['oferta']=='H1'){$opre2AH1++;}
if($linha['ano']==0 && $linha['turma']=='B' && $linha['oferta']=='R'){$opre2BR++;}
if($linha['ano']==0 && $linha['turma']=='B' && $linha['oferta']=='H1'){$opre2BH1++;}
if($linha['ano']==0 && $linha['turma']=='C' && $linha['oferta']=='R'){$opre2CR++;}
if($linha['ano']==0 && $linha['turma']=='C' && $linha['oferta']=='H1'){$opre2CH1++;}
if($linha['ano']==0 && $linha['turma']=='D' && $linha['oferta']=='R'){$opre2DR++;}
if($linha['ano']==0 && $linha['turma']=='D' && $linha['oferta']=='H1'){$opre2DH1++;}
if($linha['ano']==0 && $linha['turma']=='E' && $linha['oferta']=='R'){$opre2ER++;}
if($linha['ano']==0 && $linha['turma']=='E' && $linha['oferta']=='H1'){$opre2EH1++;}
if($linha['ano']==0 && $linha['turma']=='F' && $linha['oferta']=='R'){$opre2FR++;}
if($linha['ano']==0 && $linha['turma']=='F' && $linha['oferta']=='H1'){$opre2FH1++;}
if($linha['ano']==0 && $linha['turma']=='G' && $linha['oferta']=='R'){$opre1AR++;}
if($linha['ano']==0 && $linha['turma']=='G' && $linha['oferta']=='H1'){$opre1AH1++;}
if($linha['ano']==0 && $linha['turma']=='H' && $linha['oferta']=='R'){$opre1BR++;}
if($linha['ano']==0 && $linha['turma']=='H' && $linha['oferta']=='H1'){$opre1BH1++;}
if($linha['ano']==1 && $linha['turma']=='A' && $linha['oferta']=='R'){$ot1AR++;}
if($linha['ano']==1 && $linha['turma']=='A' && $linha['oferta']=='H1'){$ot1AH1++;}
if($linha['ano']==1 && $linha['turma']=='B' && $linha['oferta']=='R'){$ot1BR++;}
if($linha['ano']==1 && $linha['turma']=='B' && $linha['oferta']=='H1'){$ot1BH1++;}
if($linha['ano']==1 && $linha['turma']=='C' && $linha['oferta']=='R'){$ot1CR++;}
if($linha['ano']==1 && $linha['turma']=='C' && $linha['oferta']=='H1'){$ot1CH1++;}
if($linha['ano']==1 && $linha['turma']=='D' && $linha['oferta']=='R'){$ot1DR++;}
if($linha['ano']==1 && $linha['turma']=='D' && $linha['oferta']=='H1'){$ot1DH1++;}
if($linha['ano']==1 && $linha['turma']=='E' && $linha['oferta']=='R'){$ot1ER++;}
if($linha['ano']==1 && $linha['turma']=='E' && $linha['oferta']=='H1'){$ot1EH1++;}
if($linha['ano']==1 && $linha['turma']=='F' && $linha['oferta']=='R'){$ot1FR++;}
if($linha['ano']==1 && $linha['turma']=='F' && $linha['oferta']=='H1'){$ot1FH1++;}
if($linha['ano']==2 && $linha['turma']=='A' && $linha['oferta']=='R'){$ot2AR++;}
if($linha['ano']==2 && $linha['turma']=='A' && $linha['oferta']=='H1'){$ot2AH1++;}
if($linha['ano']==2 && $linha['turma']=='B' && $linha['oferta']=='R'){$ot2BR++;}
if($linha['ano']==2 && $linha['turma']=='B' && $linha['oferta']=='H1'){$ot2BH1++;}
if($linha['ano']==2 && $linha['turma']=='C' && $linha['oferta']=='R'){$ot2CR++;}
if($linha['ano']==2 && $linha['turma']=='C' && $linha['oferta']=='H1'){$ot2CH1++;}
if($linha['ano']==2 && $linha['turma']=='D' && $linha['oferta']=='R'){$ot2DR++;}
if($linha['ano']==2 && $linha['turma']=='D' && $linha['oferta']=='H1'){$ot2DH1++;}
if($linha['ano']==2 && $linha['turma']=='E' && $linha['oferta']=='R'){$ot2ER++;}
if($linha['ano']==2 && $linha['turma']=='E' && $linha['oferta']=='H1'){$ot2EH1++;}
if($linha['ano']==3 && $linha['turma']=='A' && $linha['oferta']=='R'){$ot3AR++;}
if($linha['ano']==3 && $linha['turma']=='A' && $linha['oferta']=='H1'){$ot3AH1++;}
if($linha['ano']==3 && $linha['turma']=='B' && $linha['oferta']=='R'){$ot3BR++;}
if($linha['ano']==3 && $linha['turma']=='B' && $linha['oferta']=='H1'){$ot3BH1++;}
if($linha['ano']==3 && $linha['turma']=='C' && $linha['oferta']=='R'){$ot3CR++;}
if($linha['ano']==3 && $linha['turma']=='C' && $linha['oferta']=='H1'){$ot3CH1++;}
if($linha['ano']==3 && $linha['turma']=='D' && $linha['oferta']=='R'){$ot3DR++;}
if($linha['ano']==3 && $linha['turma']=='D' && $linha['oferta']=='H1'){$ot3DH1++;}
if($linha['ano']==4 && $linha['turma']=='A' && $linha['oferta']=='R'){$ot4AR++;}
if($linha['ano']==4 && $linha['turma']=='A' && $linha['oferta']=='H1'){$ot4AH1++;}
if($linha['ano']==4 && $linha['turma']=='B' && $linha['oferta']=='R'){$ot4BR++;}
if($linha['ano']==4 && $linha['turma']=='B' && $linha['oferta']=='H1'){$ot4BH1++;}
if($linha['ano']==4 && $linha['turma']=='C' && $linha['oferta']=='R'){$ot4CR++;}
if($linha['ano']==4 && $linha['turma']=='C' && $linha['oferta']=='H1'){$ot4CH1++;}
if($linha['ano']==4 && $linha['turma']=='D' && $linha['oferta']=='R'){$ot4DR++;}
if($linha['ano']==4 && $linha['turma']=='D' && $linha['oferta']=='H1'){$ot4DH1++;}
if($linha['ano']==4 && $linha['turma']=='E' && $linha['oferta']=='R'){$ot4ER++;}
if($linha['ano']==4 && $linha['turma']=='E' && $linha['oferta']=='H1'){$ot4EH1++;}
if($linha['ano']==5 && $linha['turma']=='A' && $linha['oferta']=='R'){$ot5AR++;}
if($linha['ano']==5 && $linha['turma']=='A' && $linha['oferta']=='H1'){$ot5AH1++;}
if($linha['ano']==5 && $linha['turma']=='B' && $linha['oferta']=='R'){$ot5BR++;}
if($linha['ano']==5 && $linha['turma']=='B' && $linha['oferta']=='H1'){$ot5BH1++;}
if($linha['ano']==5 && $linha['turma']=='C' && $linha['oferta']=='R'){$ot5CR++;}
if($linha['ano']==5 && $linha['turma']=='C' && $linha['oferta']=='H1'){$ot5CH1++;}
if($linha['ano']==5 && $linha['turma']=='D' && $linha['oferta']=='R'){$ot5DR++;}
if($linha['ano']==5 && $linha['turma']=='D' && $linha['oferta']=='H1'){$ot5DH1++;}
}
mysql_free_result($query);
echo'
<html>
	<head>
		<title>Relatorio do Banco de Dados</title>
	</head>
	<body>
		<table border="0" width="100%">
			<tr>
				<td width="30%"><p align="right"><img border="0" src="../upload/logoMFT.jpg" width="87" height="103"></td>
				<td width="40%"><p align="center">ESCOLA MUNICIPAL PROFESSORA MARIA FUMIKO TOMINAGA <br>EDUCAÇÃO INFANTIL E ENSINO FUNDAMENTA<br>Rua Leonardo da Vinci, 858 – Vila Tarumã – Fone (045) 39021647<br>		CEP 85 809-500 – Cascavel-PR</td>
				<td width="30%"><p align="left"><img border="0" src="../upload/logoMFT.jpg" width="87" height="103"><tr>
				<td width="30%" valign="top">
					<fieldset style="padding: 2">
						<legend>Distribuição de Matriculas</legend>
						<table border="0" width="100%">
							<tr>
								<td align="right">
									Ativos:
								</td>
								<td align="right" width="8%">
									'.$alunos.'</td>
							</tr>
							<tr>
								<td align="right">
									Período Integral:</td>
								<td align="right" width="8%">
									'.$integral.'</td>
							</tr>
							<tr>
								<td align="right">
									Turno da Manhã:</td>
								<td align="right" width="8%">
									'.$manha.'</td>
							</tr>
							<tr>
								<td align="right">
									Turno da Tarde:</td>
								<td align="right" width="8%">
									'.$tarde.'</td>
							</tr>
							<tr>
								<td align="right">
									Alunos Remotos:</td>
								<td align="right" width="8%">
									'.$remotos.'</td>
							</tr>
							<tr>
								<td align="right">
									Alunos Híbridos:</td>
								<td align="right" width="8%">
									'.($H1).'</td>
							</tr>
							<tr>
								<td align="right">
									Alunos Faltantes:</td>
								<td align="right" width="8%">
									'.($faltas).'</td>
							</tr>
						</table>
					</fieldset>
					<fieldset style="padding: 2">
						<legend>Distribuição por Série</legend>
						<table border="0" width="100%" style="border-width: 0px">
							<tr>
							<td width="88%" align="right">
								<p align="right">Pré Escola I -
							</td>
							<td width="8%" align="right">
								'.($pre1A+$pre1B).'</td>
							<tr>
							<td width="88%" align="right">
								Pré Escola II -
							</td>
							<td width="8%" align="right">
								'.($pre2A+$pre2B+$pre2C+$pre2D+$pre2E+$pre2F).'</td>
							<tr>
							<td width="88%" align="right">
								1º Ano -
							</td>
							<td width="8%" align="right">
								'.($t1A+$t1B+$t1C+$t1D+$t1E+$t1F).'</td>
							<tr>
							<td width="88%" align="right">
								2º Ano -
							</td>
							<td width="8%" align="right">
								'.($t2A+$t2B+$t2C+$t2D+$t2E).'</td>
							<tr>
							<td width="88%" align="right">
								3º Ano -
							</td>
							<td width="8%" align="right">
								'.($t3A+$t3B+$t3C+$t3D).'</td>
							<tr>
							<td width="88%" align="right">
								4º Ano -
							</td>
							<td width="8%" align="right">
								'.($t4A+$t4B+$t4C+$t4D+$t4E).'</td>
							<tr>
							<td width="88%" align="right">
								5º Ano -
							</td>
							<td width="8%" align="right">
								'.($t5A+$t5B+$t5C+$t5D).'</td>
							</table>
					</fieldset></td>
				<td width="40%" valign="top">
					<fieldset style="padding: 2">
						<legend>Distribuição por Sexo</legend>
						<div align="center">
							<table border="0" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
								<tr>
									<td style="border-left-style: none; border-left-width: medium; border-top-style: none; border-top-width: medium">&nbsp;</td>
									<td align="center" style="border-style: solid; border-width: 1px">MANHÃ</td>
									<td align="center" style="border-style: solid; border-width: 1px">INTEGRAL</td>
									<td align="center" style="border-style: solid; border-width: 1px">TARDE</td>
								</tr>
								<tr>
									<td align="right" style="border-style: solid; border-width: 1px">
									MASCULINO</td>
									<td align="center" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
									'.$meninosManha.'</td>
									<td align="center" style="border-style: solid; border-width: 1px">
									'.$meninosIntegral.'</td>
									<td align="center" style="border-style: solid; border-width: 1px">
									'.$meninosTarde.'</td>
								</tr>
								<tr>
									<td align="right" style="border-style: solid; border-width: 1px">
									FEMININO</td>
									<td align="center" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
									'.$meninasManha.' </td>
									<td align="center" style="border-style: solid; border-width: 1px">
									'.$meninasIntegral.'</td>
									<td align="center" style="border-style: solid; border-width: 1px">
									'.$meninasTarde.'</td>
								</tr>
							</table>
						</div>
					</fieldset>
					<fieldset style="padding: 2">
						<legend>Distribuição de Sexo por Turma</legend>
						<div align="center">
						<table border="0" width="90%" style="border-top-width:0px; border-bottom-width:0px">
							<tr><td width="40%" align="center" style="border-style: solid; border-width: 1px">TURMA</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								M</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								F</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="center" style="border-style: solid; border-width: 1px">TURMA</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								M</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								F</td></tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola I - A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre1AF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre1AM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano A</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2AF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2AM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola I - B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre1BF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre1BM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano B</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2BF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2BM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2AF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2AM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano C</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2CF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2CM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2BF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2BM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano D</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2DF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2DM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2CF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2CM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano D</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2EF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t2EM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2DF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2DM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano A</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" width="5%" align="center">
								'.$t3AF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3AM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - E</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2EF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2EM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano B</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3BF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3BM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - F</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2FF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$pre2FM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano C</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3CF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3CM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1AF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1AM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano D</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3DF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t3DM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1BF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1BM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano A</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4AF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4AM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1CF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1CM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano B</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4BF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4BM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1DF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1DM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano C</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4CF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4CM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano E</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1EF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1EM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano D</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4DF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4DM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano F</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1FF.'</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								'.$t1FM.'</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano E</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4EF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t4EM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano A</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5AF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5AM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">		 
								M = Masculino</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">				   &nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">				   &nbsp;</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano B</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5BF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5BM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">		 
								F = Feminino</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">  	 			   
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">  	 			   
								&nbsp;</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano C</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5CF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5CM.'</td>
							</tr>
							<tr><td width="40%" align="right" style="border-style: solid; border-width: 1px">		 &nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">		           
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">		           
								&nbsp;</td>
								<td align="center" width="0%" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
								<td width="40%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano D</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5DF.'</td>
								<td style="color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border: 1px solid; padding-left: 1px; padding-right: 1px; padding-top: 1px" align="center" width="5%">
								'.$t5DM.'</td>
							</tr>
						</table>
					</fieldset></td>
				<td width="30%" valign="top">
					<fieldset style="padding: 2">
						<legend>Distribuição por Turma</legend>
						<div align="center">
						<table border="0" width="90%" style="border-top-width:0px; border-bottom-width:0px">
							<tr><td width="35%" align="center" style="border-style: solid; border-width: 1px">
								<p align="right">TURMA</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								R</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								H</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								T</td>
								<td align="center" style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%">&nbsp;</td>
								<td width="35%" align="center" style="border-style: solid; border-width: 1px">
								<p align="right">TURMA</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								R</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								H</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								T</td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola I - A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre1AR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre1AH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre1A.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2AR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2AH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t2A.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola I - B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre1BR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre1BH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre1B.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2BR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2BH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t2B.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2AR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2AH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre2A.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2CR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2CH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t2C.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2BR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2BH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre2B.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2DR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2DH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t2D.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2CR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2CH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre2C.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								2º Ano E</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2ER.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot2EH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t2E.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2DR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2DH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre2D.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot3AR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot3AH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t3A.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - E</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2ER.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2EH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre2E.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px"> 
								<font color="#0000FF">'.$ot3BR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px"> 
								<font color="#0000FF">'.$ot3BH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px"> 
								<font color="#0000FF">'.$t3B.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								Pré Escola II - F</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2FR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$opre2FH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$pre2F.'</font></td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot3CR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot3CH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t3C.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1AR.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1AH1.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t1A.'		   </font>		   </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot3DR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot3DH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t3D.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1BR.'           </font>           </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1BH1.'           </font>           </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t1B.'           </font>           </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4AR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4AH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t4A.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1CR.'           </font>           </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1CH1.'           </font>           </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t1C.'           </font>           </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								3º Ano B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4BR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4BH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t4B.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1DR.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1DH1.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t1D.'		   </font>		   </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4CR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4CH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t4C.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano E</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1ER.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1EH1.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t1E.'		   </font>		   </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4DR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4DH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t4D.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								1º Ano F</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1FR.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot1FH1.'		   </font>		   </td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t1F.' 	   </font>		   </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								4º Ano E</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4ER.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot4EH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t4E.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano A</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5AR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5AH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t5A.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">
								R = Remoto</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								&nbsp;</td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano B</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5BR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5BH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t5B.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">		 
								H = Hibrido</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">				   &nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">				   &nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">				   </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano C</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5CR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5CH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t5C.'</font></td></tr>
							<tr><td width="35%" align="right" style="border-style: solid; border-width: 1px">		 
								T = Total</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">  	 			   &nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">  	 			   &nbsp;</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">  	 			   </td>
								<td style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium" width="0%" align="center">&nbsp;</td>
								<td width="35%" align="right" style="border-style: solid; border-width: 1px">
								5º Ano D</td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5DR.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$ot5DH1.'</font></td>
								<td align="center" width="5%" style="border-style: solid; border-width: 1px">
								<font color="#0000FF">'.$t5D.'</font></td>
								</tr>
							</table>
					</fieldset>
						<br>
					</table>
	</body>
</html>
';
?>