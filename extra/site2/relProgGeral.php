<?php
session_start(atividade);
include 'conexao.php';
//include 'conf.php';
//menuA();
$sql = "SELECT * from tb_aluno where programacao = 'S' order by Nome";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<div align="justify">';
while ($linha = mysql_fetch_array($query)) {
echo '<font color="blue"><b>'.$linha['Nome'].'</b></font><br>';
$IDAtividades = $linha['ID'];
$sqlAtividades = "SELECT * from tb_atividade where ID = $IDAtividades order by Atividade desc";
$queryAtividades = mysql_query($sqlAtividades)or die("SQL:" . $sqlAtividades . " - ERRO:" . mysql_error());;
while ($linhaAtividades = mysql_fetch_array($queryAtividades)) {
echo $linhaAtividades['IP'].' | '.$linhaAtividades['Atividade'].'.<br> ';
}
}
mysql_free_result($query);
?>