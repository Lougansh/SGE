<?php 
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['turno'])){
$sql ="UPDATE tb_alunoMFT SET turno = 'I' where ano = 0 and turma = 'G'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 0 and turma = 'H'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'I' where ano = 0 and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'I' where ano = 0 and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'I' where ano = 0 and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'I' where ano = 0 and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 0 and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 0 and turma = 'F'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 0 and turma = 'G'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 1 and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 1 and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 1 and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 1 and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 1 and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'I' where ano = 1 and turma = 'F'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 1 and turma = 'G'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 2 and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 2 and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 2 and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 2 and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 2 and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 3 and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 3 and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 3 and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 3 and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 3 and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 4 and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 4 and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 4 and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 4 and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 4 and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 5 and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'M' where ano = 5 and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 5 and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 5 and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET turno = 'T' where ano = 5 and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
if (isset($_POST['professor'])){
	$p1a = 'Nadir da Silva Oliveira';
	$p1b = 'Paulo Cesar Farias Benvindo';
	$p2a = 'Gislaine Cristina Itelvani';
	$p2b = 'Giliarde Alexandre Kelm';
	$p2c = 'Angela Maria Citton';
	$p2d = 'Adriana Godoi de Souza Ortega';
	$p2e = 'Olga Krefta';
	$p2f = 'Adriana Mara Lepri';
	$p2g = 'André Lucas Patene da Costa';
	$t1a = 'Solange do Rocio Dias de Almeida';
	$t1b = 'Monica Schupel S. Bartoski';
	$t1c = 'Criscielli Letícia Kuhn Bersch';
	$t1d = 'Rosenilda Cordeiro Souza';
	$t1e = 'Clarice Zanata Pires';
	$t2a = 'Ana Carolina Barata de Oliveira Rethor';
	$t2b = 'Moacir Pietroski';
	$t2c = 'Maria de Lourdes Pereira da Silva';
	$t2d = 'Jeniffer Lazaroto';
	$t2e = 'Agahilda Moura Ferreira da Silva';
	$t3a = 'Lívia Marla Alves Durães Santos';
	$t3b = 'Cristiane Beraldo';
	$t3c = 'Josiane Berges da Rosa';
	$t3d = 'Franciele Cristiane de Oliveira Costa Alves da Luz';
	$t3e = 'Francielle Boeno Rodrigues Mudri';
	$t4a = 'Sirlei Faust';
	$t4b = 'Kelly Regina da Silva Nogueira';
	$t4c = 'Mayelle Verediane Wisniewski';
	$t4d = 'Sirlei Faust';
	$t4e = 'Angelica da Silva Celestino';
	$t5a = 'Mara Angela Cabrino de Queiroz';
	$t5b = 'Claudineia Maia Daniel Pimentel';
	$t5c = 'Mara Angela Cabrino de Queiroz';
	$t5d = 'Claudineia Maia Daniel Pimentel';
	$t5e = 'Janete Pipino Akkoç';

$sql ="UPDATE tb_alunoMFT SET prof = '$p2a' where ano = '0' and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p2b' where ano = '0' and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p2c' where ano = '0' and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p2d' where ano = '0' and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p2e' where ano = '0' and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p2f' where ano = '0' and turma = 'F'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p2g' where ano = '0' and turma = 'G'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET prof = '$p1a' where ano = '0' and turma = 'X'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$p1b' where ano = '0' and turma = 'Y'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET prof = '$t1a' where ano = '1' and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t1b' where ano = '1' and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t1c' where ano = '1' and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t1d' where ano = '1' and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t1e' where ano = '1' and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t1f' where ano = '1' and turma = 'F'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t1g' where ano = '1' and turma = 'G'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET prof = '$t2a' where ano = '2' and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t2b' where ano = '2' and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t2c' where ano = '2' and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t2d' where ano = '2' and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t2e' where ano = '2' and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET prof = '$t3a' where ano = '3' and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t3b' where ano = '3' and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t3c' where ano = '3' and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t3d' where ano = '3' and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t3e' where ano = '3' and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t3f' where ano = '3' and turma = 'F'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET prof = '$t4a' where ano = '4' and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t4b' where ano = '4' and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t4c' where ano = '4' and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t4d' where ano = '4' and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t4e' where ano = '4' and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$sql ="UPDATE tb_alunoMFT SET prof = '$t5a' where ano = '5' and turma = 'A'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t5b' where ano = '5' and turma = 'B'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t5c' where ano = '5' and turma = 'C'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t5d' where ano = '5' and turma = 'D'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$sql ="UPDATE tb_alunoMFT SET prof = '$t5e' where ano = '5' and turma = 'E'";$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>
<form method="POST" action="mnt.php">
	<p align="center"><input type="submit" value="Turno" name="turno"></p>
	<p align="center"><input type="submit" value="Professor" name="professor"></p>
</form>