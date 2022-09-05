<?php
include './conexao.php'; 
include './conf.php';
menuA();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<input type="radio" value="0A" name="Lista" onchange="form.submit()">PA
<input type="radio" value="0B" name="Lista" onchange="form.submit()">PB
<input type="radio" value="0C" name="Lista" onchange="form.submit()">PC
<input type="radio" value="0D" name="Lista" onchange="form.submit()">PD
<input type="radio" value="1A" name="Lista" onchange="form.submit()">1ºA
<input type="radio" value="1B" name="Lista" onchange="form.submit()">1ºB
<input type="radio" value="1C" name="Lista" onchange="form.submit()">1ºC
<input type="radio" value="2A" name="Lista" onchange="form.submit()">2ºA
<input type="radio" value="2B" name="Lista" onchange="form.submit()">2ºB
<input type="radio" value="2C" name="Lista" onchange="form.submit()">2ºC
<input type="radio" value="3A" name="Lista" onchange="form.submit()">3ºA
<input type="radio" value="3B" name="Lista" onchange="form.submit()">3ºB
<input type="radio" value="3C" name="Lista" onchange="form.submit()">3ºC
<input type="radio" value="4A" name="Lista" onchange="form.submit()">4ºA
<input type="radio" value="4B" name="Lista" onchange="form.submit()">4ºB
<input type="radio" value="4C" name="Lista" onchange="form.submit()">4ºC
<input type="radio" value="5A" name="Lista" onchange="form.submit()">5ºA
<input type="radio" value="5B" name="Lista" onchange="form.submit()">5ºB
<input type="radio" value="5C" name="Lista" onchange="form.submit()">5ºC
<input type="radio" value="6A" name="Lista" onchange="form.submit()">6ºA
<input type="radio" value="7A" name="Lista" onchange="form.submit()">7ºA
<input type="radio" value="8A" name="Lista" onchange="form.submit()">8ºA
<input type="radio" value="9A" name="Lista" onchange="form.submit()">9ºA
<p>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
//----------------------------------------------->
$sql = "select * from tb_aluno where Turma = '$turma' and Ano = '$ano' Order By nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="T1"><input type="text" size="2" value="'. $linha['Situacao'] .'" style="text-align:center" name="T1"><br>'.$montaLista;
}
echo $montaLista.'<p>Ano:<input type="text" name="ano" size="1" " style="text-align:center"> Turma:<input type="text" name="turma" size="2" " style="text-align:center"> Situação:<input type="text" name="situacao" size="2" " style="text-align:center" value="A"> <input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID']) && $_POST['ano'] >=0) {
$turma = $_POST['turma'];
$ano = $_POST['ano'];
$situacao = $_POST['situacao'];

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno set Turma = '$turma', Ano = $ano, Situacao = '$situacao' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Movimentação realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaTurma.php'\",1)</script>";
}
?>