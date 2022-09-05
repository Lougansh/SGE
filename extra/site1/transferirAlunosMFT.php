<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<div align="center" class="botao">'
.$mostraMenu.'
<p>
</div>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	$ano = substr($_POST['Lista'],0,1);
	$turma = substr($_POST['Lista'],1,1);
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_alunoMFT where ano = '$ano' and turma = '$turma' Order By situacao desc, ano desc, turma desc, nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '
<input type="checkbox" name= "ID[]" 	value="'.$linha['ID'].'">
<input disabled type="text" size="2" 	value="'.$linha['ano'].$linha['turma'] .'" style="text-align:center" 	name="anoTurma">
<input disabled type="text" size="50" 	value="'.$linha['nomeAluno'] .'" style="text-align:left" 				name="Nome">
<input disabled type="text" size="2" 	value="'.$linha['situacao'] .'"  style="text-align:center" 		  		name="Situacao"><br>'.$montaLista;
}
$montaLista = $montaLista. '<p><input type="submit" value="Transferir Alunos" name="btnAtualizar" onchange="form.submit()"></div></form>';
}
echo $montaLista;
if (isset($_POST['btnAtualizar']) && isset($_POST['ID'])) {
$situacao = $_POST['status'];

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_alunoMFT set situacao = 'T' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Alunos transferidos com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=transferirAlunosMFT.php'\",1)</script>";
}
?>
