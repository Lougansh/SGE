<?php
include './conexao.php';
//=====================================================================================
$sql = "select aluno.*, turma.Turno from tb_aluno aluno, tb_turma turma where aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and turma.Turno = 'Tarde' and dificuldade = 'S' order by turno, Ano desc, Turma, Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) { $lista = '<font size="3" color="#0000FF">'.$linha['Nome'].'</font> - '.$linha['ObsReforco'].' '.$lista ;}
mysql_free_result($query);
//=====================================================================================
echo '<p align="justify">'.$lista.'</p>';
?>