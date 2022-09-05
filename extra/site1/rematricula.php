<?php
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">'
.$mostraMenu.'
<p>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
//----------------------------------------------->
$sql = "select * from tb_aluno_temp where turma = '$turma' and ano = '$ano' and situacao = 'A' Order By situacao asc, nomeAluno asc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$n = 0;
while ($linha = mysql_fetch_array($query)) {
$n++;

if($linha['situacao']=='A'){
/*$montaLista  = $montaLista.$linha['ID'].' - '.$linha['nomeAluno'].'<br>';*/
$montaLista  = $montaLista.'<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="1" value="'. $linha['ano'] .$linha['turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="1" value="'.$n.'" style="text-align:center" name="nun"><input disabled type="text" size="9" value="'. $linha['ID'] .'" style="text-align:left" name="ID"><input disabled type="text" size="50" value="'. $linha['nomeAluno'] .'" style="text-align:left" name="T1"><input type="text" size="2" value="'. $linha['situacao'] .'" style="text-align:center" name="T1"><br>';
}
}
echo $montaLista.'<p>Ano:<input type="text" name="ano" size="1" " style="text-align:center"> Turma:<input type="text" name="turma" size="2" " style="text-align:center"> 
<input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"> 
<input type="submit" value="Transferir" name="Transferir" onchange="form.submit()">
</div></form>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID']) && $_POST['ano'] >=0) {
$turma = strtoupper($_POST['turma']);
$ano = $_POST['ano'];
$situacao = 'A';

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno_temp set turma = '$turma', ano = $ano, Situacao = '$situacao' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Movimentação realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaTurma.php'\",1)</script>";
}
if (isset($_POST['Transferir']) && isset($_POST['ID']) && $_POST['ano'] >=0) {
$turma = strtoupper($_POST['turma']);
$ano = $_POST['ano'];
$situacao = 'T';

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno_temp set Situacao = '$situacao' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Transferido com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaTurma.php'\",1)</script>";
}
?>