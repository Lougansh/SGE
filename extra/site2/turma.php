<?php
include './conexao.php';
include './conf.php';
menuA();

$sql = "select * from tb_turma where ano < 6 order By Ano, turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['Professor'] != ''){
$montaMenu = '<option value="' .$linha['ID'].'">'.$linha['Ano'].$linha['Turma'].'</option>'.$montaMenu;
$pegaTurma = '<li><font color="blue">( '.$linha['Ano'].' '.$linha['Turma'].' )</font><font color="red">'.$linha['Professor'].'</font> - <font color="gray">'.$linha['Obs'].'</font></li>'.$pegaTurma;
}
}
mysql_free_result($query);
if ($_POST['turmaOK']) {
$id = $_POST['turmaOK'];

$sql = "select * from tb_turma where ID = $id";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
if (mysql_num_rows($query) != 0) {
$linha = mysql_fetch_array($query);
$titulo = 'Turma: '.$linha['Ano'];
}
}
if (isset($_POST['turmaAtualizar']) && $_POST['turmaID'] != '') {
$upID = $_POST['turmaID'];
$upAno = $_POST['turmaAno'];
$upTurma = $_POST['turmaTurma'];
$upObs = $_POST['turmaObs'];
$sql = "update tb_turma set Ano = '$upAno', Turma = '$upTurma', Obs = '$upObs' where ID = $upID";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
mysql_free_result($query);
echo '<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="gerenciaLogin.php">';
}
echo'
<p align="center"><font size="5">'.$titulo.' '.$linha['Turma'].'</font></p><p align="center"><font size="4">'.$linha['Professor'].'</font></p><form method="POST" action="?id=18" onchange="form.submit()"><div align="center"><table border="0"><tr><td align="right">&nbsp;</td><td><p align="center">
<select size="1" name="turmaOK" onchange="form.submit()"><option value="0">...</option>'.$montaMenu.'</select></td></tr><tr>
<td align="right">ID: 		</td><td><input type="text" 	name="turmaID" 		size="1"  value="'.$linha['ID'].'"></td><td>&nbsp;</td></tr><tr>
<td align="right">Ano:		</td><td><input type="text" 	name="turmaAno" 	size="10" value="'.$linha['Ano'].'"></td><td>&nbsp;</td></tr><tr>
<td align="right">Turma:	</td><td><input type="text" 	name="turmaTurma" 	size="10" value="'.$linha['Turma'].'"></td><td>&nbsp;</td></tr><tr>
<td align="right">Observações:	</td><td><textarea rows="10" 	name="turmaObs" cols="30">'.$linha['Obs'].'</textarea></td><td><input type="submit" value="Atualizar" name="turmaAtualizar"></td></tr></table>
';
if ($_POST['turmaOK']) {
echo '<div align="left"><ul>'.$pegaTurma.'</ul></div></div></form><hr width="50%"></body>';
}else{
echo '<div align="left"><ul>'.$pegaTurma.'</ul></div></div></form><hr width="50%"></body>';
}
?>
