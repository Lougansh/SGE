<?php
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<input type="radio" value="0G" name="Lista" onchange="form.submit()">PIA
<input type="radio" value="0H" name="Lista" onchange="form.submit()">PIB
<input type="radio" value="0A" name="Lista" onchange="form.submit()">PIIA
<input type="radio" value="0B" name="Lista" onchange="form.submit()">PIIB
<input type="radio" value="0C" name="Lista" onchange="form.submit()">PIIC
<input type="radio" value="0D" name="Lista" onchange="form.submit()">PIID
<input type="radio" value="0E" name="Lista" onchange="form.submit()">PIIE
<input type="radio" value="0F" name="Lista" onchange="form.submit()">PIIF<br>
<input type="radio" value="1A" name="Lista" onchange="form.submit()">1A
<input type="radio" value="1B" name="Lista" onchange="form.submit()">1B
<input type="radio" value="1C" name="Lista" onchange="form.submit()">1C
<input type="radio" value="1D" name="Lista" onchange="form.submit()">1D
<input type="radio" value="1E" name="Lista" onchange="form.submit()">1E
<input type="radio" value="1F" name="Lista" onchange="form.submit()">1F
<input type="radio" value="1G" name="Lista" onchange="form.submit()">1G
<input type="radio" value="2A" name="Lista" onchange="form.submit()">2A
<input type="radio" value="2B" name="Lista" onchange="form.submit()">2B
<input type="radio" value="2C" name="Lista" onchange="form.submit()">2C
<input type="radio" value="2D" name="Lista" onchange="form.submit()">2D
<input type="radio" value="3A" name="Lista" onchange="form.submit()">3A
<input type="radio" value="3B" name="Lista" onchange="form.submit()">3B
<input type="radio" value="3C" name="Lista" onchange="form.submit()">3C
<input type="radio" value="3D" name="Lista" onchange="form.submit()">3D
<input type="radio" value="3E" name="Lista" onchange="form.submit()">3E
<input type="radio" value="3F" name="Lista" onchange="form.submit()">3F
<input type="radio" value="4A" name="Lista" onchange="form.submit()">4A
<input type="radio" value="4B" name="Lista" onchange="form.submit()">4B
<input type="radio" value="4C" name="Lista" onchange="form.submit()">4C
<input type="radio" value="4D" name="Lista" onchange="form.submit()">4D
<input type="radio" value="5A" name="Lista" onchange="form.submit()">5A
<input type="radio" value="5B" name="Lista" onchange="form.submit()">5B
<input type="radio" value="5C" name="Lista" onchange="form.submit()">5C
<input type="radio" value="5D" name="Lista" onchange="form.submit()">5D
<p>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
//----------------------------------------------->
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_alunoMFT where situacao = 'A' and turma = '$turma' and ano = '$ano' Order By ano desc, turma desc, nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
	if ($linha['ano']== 0 && $linha['turma']== 'G'){
		$turma = 'P1A';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'H'){
		$turma = 'P1B';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'A'){
		$turma = 'P2A';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'B'){
		$turma = 'P2B';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'C'){
		$turma = 'P2C';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'D'){
		$turma = 'P2D';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'E'){
		$turma = 'P2E';
	}
	if ($linha['ano']== 0 && $linha['turma']== 'F'){
		$turma = 'P2F';
	}
	if ($linha['ano']>= 1){
		$turma = $linha['ano'].'º'.$linha['turma'];
	}
$montaLista  = '<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="2" value="'. $turma .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['nomeAluno'] .'" style="text-align:left" name="Nome"><input disabled type="text" size="2" value="'. $linha['sexo'] .'" style="text-align:center" name="retSexo"><br>'.$montaLista;
}
echo $montaLista.'<p>Mudar para o sexo:<input type="text" name="sexo" size="1" " style="text-align:center"> <input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID'])) {
$sexo = $_POST['sexo'];

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_alunoMFT set sexo = '$sexo' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Mudança de sexo realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaSexo.php'\",1)</script>";
}
?>