<?php
include './conexao.php';
include './conf.php';
echo '<form method="POST" action="fotoByTurma.php" id="15"><div align="center"><table border="1" width="100%"><tr>';
$sql = "select * from tb_aluno where situacao = 'A' and Ano = 0 and Turma='A' Order By ano desc, turma desc, nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$col=0;
while ($linha = mysql_fetch_array($query)) {
$col++;
if ($col >=5)
{
$col=1;
$menuFotos = '</tr><tr><td><center><img src="../images/alunos/'.$linha['ID'].'.JPG" height="150"></td>'.$menuFotos;

}
$menuFotos = '<td><center><img src="../images/alunos/'.$linha['ID'].'.JPG" height="150"></td>'.$menuFotos;
}
echo '<div align="Center">'.$menuFotos.'</div></form>';
?>
