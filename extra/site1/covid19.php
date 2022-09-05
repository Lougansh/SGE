<?php
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
'.$mostraMenu.'
<p>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
//----------------------------------------------->
$sql = "select * from tb_alunoMFT where covid19 <> 'S' and situacao = 'A' and turma = '$turma' and ano = '$ano' Order By ano desc, turma desc, nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
$contador=0;
while ($linha = mysql_fetch_array($query)) {
	$contador++;
	if ($linha['ano'] == 0 && $linha['turma'] == 'G'){
		$turma = 'PI-A';
	}
	else if($linha['ano'] == 0 && $linha['turma'] == 'H'){
		$turma = 'PI-B';
	}
	else if($linha['ano'] == 0){
		$turma = 'PII-'.$linha['turma'];
	}else{
		$turma = $linha['ano'].'º'.$linha['turma'];
	}
	$montaLista  = '
	<input type="checkbox" name= "ID[]" 	value="'.$linha['ID'].'">
	<input disabled type="text" size="2" 	value="'.$turma .'" style="text-align:center" 	name="anoTurma">
	<input disabled type="text" size="50" 	value="'.$linha['nomeAluno'] .'" style="text-align:left" 				name="Nome">
	<input disabled type="text" size="2" 	value="'.$linha['situacao'] .'"  style="text-align:center" 		  		name="Situacao"><br>'.$montaLista;
}
$montaLista = $montaLista. '<p><input type="submit" value="Entregou o Formulário" name="btnAtualizar" onchange="form.submit()"></div></form>';
echo '<h3>Faltam '.$contador.' entregar o formulário COVID19</h3>'.$montaLista;
}
if (isset($_POST['btnAtualizar']) && isset($_POST['ID'])) {
	$situacao = $_POST['status'];
	foreach($_POST['ID'] AS $key => $value){
		$sql = mysql_query("update tb_alunoMFT set covid19 = 'S' where ID = $value");
	}
	echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Dados atualizados com sucesso")</SCRIPT>';
	echo "<script>window.setTimeout(\"location.href=transferirAlunosMFT.php'\",1)</script>";
}
?>
