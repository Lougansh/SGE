<?php
include './conexao.php'; 
include './conf.php';
menuA();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<input type="radio" value="3A" name="Lista" onchange="form.submit()">3ºA
<input type="radio" value="3B" name="Lista" onchange="form.submit()">3ºB
<input type="radio" value="3C" name="Lista" onchange="form.submit()">3ºC
<input type="radio" value="4A" name="Lista" onchange="form.submit()">4ºA
<input type="radio" value="4B" name="Lista" onchange="form.submit()">4ºB
<input type="radio" value="4C" name="Lista" onchange="form.submit()">4ºC
<input type="radio" value="5A" name="Lista" onchange="form.submit()">5ºA
<input type="radio" value="5B" name="Lista" onchange="form.submit()">5ºB
<input type="radio" value="5C" name="Lista" onchange="form.submit()">5ºC
<input type="radio" value="6P" name="Lista" onchange="form.submit()">Programação <hr>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
//----------------------------------------------->
if ($ano == '6' && $turma == 'P'){
$sql = "select * from tb_aluno where programacao = 'S' and Situacao='A' Order By nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
}else{
$sql = "select * from tb_aluno where Turma = '$turma' and Ano = '$ano' and Situacao = 'A'Order By nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="T1"><input disabled type="text" size="2" value="'. $linha['Ponto'] .'" style="text-align:center" name="T1"><br>'.$montaLista;
}
echo $montaLista.'Pontos <input type="text" name="pontos" size="1"><input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
}else{
$sql = "select * from tb_aluno where programacao = 'S' order by ponto desc, nome limit 0,21;";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
echo '<div align="left"><input disabled type="text" size="2" value="'. $linha['Ponto'] .'" style="text-align:center" name="T1">'. $linha['Nome'];
}
}
if (isset($_POST['Submeter']) && isset($_POST['ID']) && $_POST['pontos'] >=1 ) {
$pontos = $_POST['pontos'];
$sinal = $_POST['sinal'];
foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno set Ponto = Ponto + ($pontos) where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Pontos calculados com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href='pontos.php'\",1)</script>";
}
?>