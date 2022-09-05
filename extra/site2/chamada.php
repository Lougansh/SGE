<?php
session_start(chamada);
include './conexao.php';
include './conf.php';
Head();
menuVertical();
$_SESSION['DATA'] = date('Y-m-d');
$sql = "select a.*, c.Data from tb_aluno a, tb_chamada c where a.programacao = 'S' and c.Data = curdate() and a.ID = c.ID order by Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$listaPresentes = '<li><font size="2">'.$linha['Nome'].'</font></li>'.$listaPresentes;
}
if (isset($_POST['ID']) && $_POST['ID'] >1000 ){
$_SESSION['ID'] = $_POST['ID'];
$ID = $_SESSION['ID'];
$data = date('Y/m/d');
$sql = "select * from tb_aluno where ID = $ID";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$nome = $linha['Nome'];
}
mysql_free_result($query);
$sqlChamada = "insert into tb_chamada (ID, Data) values ($ID, '$data')";
$query = mysql_query($sqlChamada);
$_SESSION['Foto'] = '<hr color="#0000FF" width="33%"><hr color="#FFFF00" width="66%"><hr color="#00FF00" width="99%"><img src="../images/alunos/'.$_SESSION['ID'].'.JPG" width="300" height="450" style="border-radius: 15px;"><hr color="#00FF00" width="99%"><select size="0" name="dropAluno"><option value="'.$ID.'">'.$nome.'</option></select><hr color="#0000FF" width="33%">';
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=chamada.php'>";
}
echo'
<div class="Body"><form method="POST" action="?id=chamada"><div align="center"><table border="0" width="100%"><tr>
<td width="33%" valign="bottom"><fieldset align="left"><legend>Lista de presença</legend>'.$listaPresentes.'</fieldset></td>
<td width="33%" valign="top"><div align="center">'.$_SESSION['Foto'].'</div></td>
<td width="33%" valign="top"><p align="center"><input autofocus type="text" name="ID" size="20" style="text-align: center"><br><br><br><fieldset align="left"><legend>
Lista de faltas</legend>'.$listaFaltas.'</fieldset></td></tr></table></div></form></div>
';
?>