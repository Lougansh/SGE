<?php
include './conexao.php'; 
include './conf.php';
menuA();
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_aluno where Situacao = 'A' and Ano <= 5 Order By Ano desc, Turma desc, Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="2" value="'. $linha['Ano'] .$linha['Turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><input disabled type="text" size="2" value="'. $linha['Sexo'] .'" style="text-align:center" name="retSexo"><br>'.$montaLista;
}
echo $montaLista.'<p>Mudar para o sexo:<input type="text" name="sexo" size="1" " style="text-align:center"> <input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
if (isset($_POST['Submeter']) && isset($_POST['ID'])) {
$sexo = $_POST['sexo'];

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno set Sexo = '$sexo' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Mudança de sexo realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaSexo.php'\",1)</script>";
}
?>