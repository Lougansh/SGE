<?php
include 'conexao.php';
//include 'conf.php';

#new barCodeGenrator($code_number,0,'hello.gif'); 

//-----------Monta dropSelect da lista dos alunos
$sql = "select a.*, t.Professor  from tb_aluno a, tb_turma t where a.ano = t.ano and a.turma = t.turma and a.programacao = 'S' Order By nome asc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
while ($linha = mysql_fetch_array($query)) {
echo'
<p align="center"><font size="3">'.$linha['Nome'].'<br><img border="0" src="../images/codBar/'.$linha['ID'].'.gif"></font>
';
}
?>