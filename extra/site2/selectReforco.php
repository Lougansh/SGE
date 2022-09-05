<?php
include './conexao.php'; 
include './conf.php';
menuA();
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_aluno where Situacao = 'A' and Ano <= 5 and Ano >= 1 and Dificuldade = 'N' Order By Nome desc, Turma desc, Ano desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="2" value="'. $linha['Ano'] .$linha['Turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><br>'.$montaLista;
}
echo $montaLista.'<p>Selecionar para o Reforço Escolar? <input type="submit" value="SIM" name="btnSim" onchange="form.submit()"></div></form>';
if (isset($_POST['btnSim']) && isset($_POST['ID'])) {

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno set Dificuldade = 'S' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Dados atualizados com sucesso")</SCRIPT>';
echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="selectProjeto.php">';
}
?>