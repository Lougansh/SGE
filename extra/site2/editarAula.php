<?php
include './conexao.php';
include './conf.php';
menuA();
$sql = 'select * from tb_aula order by ID desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['ID'] <= 9){
$montaMenu = '<button value="' . $linha['ID'] . '" name="dropAula" >0'.$linha['ID'].'</button>'.$montaMenu;
}else{
$montaMenu = '<button value="' . $linha['ID'] . '" name="dropAula" >'.$linha['ID'].'</button>'.$montaMenu;
}
}
mysql_free_result($query);
//-----------------------------------------
echo '<div align="center"><form method="POST" action="?id=18">'.$montaMenu.'</form></div>'; 
if (isset($_POST['dropAula']) ) {
$aula = $_POST['dropAula'];
$sql = 'select * from tb_aula where id="'.$aula.'"';
}else{
$sql = 'select * from tb_aula where dataInicio < CURDATE() order by dataInicio desc limit 1 ';
}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$aula = $linha['ID'];
$data = $linha['dataInicio'];
$dataDia = date('d', strtotime("+0 days",strtotime($data)));
$dataMes = date('m', strtotime("+0 days",strtotime($data)));
$dataAno = date('Y', strtotime("+0 days",strtotime($data)));
$conteudo0 = $linha['conteudoPre'];
$conteudo1 = $linha['conteudo1'];
$conteudo2 = $linha['conteudo2'];
$conteudo3 = $linha['conteudo3'];
$conteudo4 = $linha['conteudo4'];
$conteudo5 = $linha['conteudo5'];
$encaminhamento0 = $linha['encaminhamentoPre'];
$encaminhamento1 = $linha['encaminhamento1'];
$encaminhamento2 = $linha['encaminhamento2'];
$encaminhamento3 = $linha['encaminhamento3'];
$encaminhamento4 = $linha['encaminhamento4'];
$encaminhamento5 = $linha['encaminhamento5'];
$recurso0 = $linha['recursoPre'];
$recurso1 = $linha['recurso1'];
$recurso2 = $linha['recurso2'];
$recurso3 = $linha['recurso3'];
$recurso4 = $linha['recurso4'];
$recurso5 = $linha['recurso5'];
}
if (isset($_POST['atualizar'])){
$idAula = $_POST['numeroAula'];
$dataAula = $_POST['dataAno'].'-'.$_POST['dataMes'].'-'.$_POST['dataDia'];
$conteudo0 = $_POST["conteudo0"];
$conteudo1 = $_POST["conteudo1"];
$conteudo2 = $_POST["conteudo2"];
$conteudo3 = $_POST["conteudo3"];
$conteudo4 = $_POST["conteudo4"];
$conteudo5 = $_POST["conteudo5"];
$encaminhamento0 = $_POST["encaminhamento0"];
$encaminhamento1 = $_POST["encaminhamento1"];
$encaminhamento2 = $_POST["encaminhamento2"];
$encaminhamento3 = $_POST["encaminhamento3"];
$encaminhamento4 = $_POST["encaminhamento4"];
$encaminhamento5 = $_POST["encaminhamento5"];
$recurso0 = $_POST["recurso0"];
$recurso1 = $_POST["recurso1"];
$recurso2 = $_POST["recurso2"];
$recurso3 = $_POST["recurso3"];
$recurso4 = $_POST["recurso4"];
$recurso5 = $_POST["recurso5"];
$sql = "update tb_aula set ID = $idAula, dataInicio = '$dataAula', conteudoPre = '$conteudo0', conteudo1 = '$conteudo1', conteudo2 = '$conteudo2', conteudo3 = '$conteudo3', conteudo4 = '$conteudo4', conteudo5 = '$conteudo5', encaminhamentoPre = '$encaminhamento0', encaminhamento1 = '$encaminhamento1', encaminhamento2 = '$encaminhamento2', encaminhamento3 = '$encaminhamento3', encaminhamento4 = '$encaminhamento4', encaminhamento5 = '$encaminhamento5', recursoPre = '$recurso0', recurso1 = '$recurso1', recurso2 = '$recurso2', recurso3 = '$recurso3', recurso4 = '$recurso4', recurso5 = '$recurso5' where ID = $idAula";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=editarAula.php'>";
}
echo'
<div align="center"></div>
<form method="POST" action="?aula"><div align="center"><table border="0" style="border-width:0px; "><tr><td>
Aula: <input type="text" style="text-align:center" value="'.($aula).'" name="numeroAula" size="5"></td>
<td>Data: <input type="text" name="dataDia" size="2" style="text-align:center" value="'.$dataDia.'">/<input type="text" name="dataMes" size="2" style="text-align:center" value="'.$dataMes.'">/<input type="text" name="dataAno" size="4" style="text-align:center" value="'.$dataAno.'"></td>
<td>&nbsp;</td><td>&nbsp;</td></tr><tr>
<td>TURMA</td><td>CONTEÚDO</td><td>OBJETIVO</td><td>RECURSO</td></tr><tr>
<td><img border="0" src="../images/Turmas/pre.gif" width="140" height="50"></td><td><textarea rows="4" name="conteudo0" cols="50">'.$conteudo0.'</textarea></td><td><textarea rows="4" name="encaminhamento0" cols="70">'.$encaminhamento0.'</textarea></td><td><textarea rows="4" name="recurso0" cols="20">'.$recurso0.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/1.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo1" cols="50">'.$conteudo1.'</textarea></td><td><textarea rows="4" name="encaminhamento1" cols="70">'.$encaminhamento1.'</textarea></td><td><textarea rows="4" name="recurso1" cols="20">'.$recurso1.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/2.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo2" cols="50">'.$conteudo2.'</textarea></td><td><textarea rows="4" name="encaminhamento2" cols="70">'.$encaminhamento2.'</textarea></td><td><textarea rows="4" name="recurso2" cols="20">'.$recurso2.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/3.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo3" cols="50">'.$conteudo3.'</textarea></td><td><textarea rows="4" name="encaminhamento3" cols="70">'.$encaminhamento3.'</textarea></td><td><textarea rows="4" name="recurso3" cols="20">'.$recurso3.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/4.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo4" cols="50">'.$conteudo4.'</textarea></td><td><textarea rows="4" name="encaminhamento4" cols="70">'.$encaminhamento4.'</textarea></td><td><textarea rows="4" name="recurso4" cols="20">'.$recurso4.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/5.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo5" cols="50">'.$conteudo5.'</textarea></td><td><textarea rows="4" name="encaminhamento5" cols="70">'.$encaminhamento5.'</textarea></td><td><textarea rows="4" name="recurso5" cols="20">'.$recurso5.'</textarea></td></tr><tr>
<td>&nbsp;</td><td><p align="center"><a title="Click aqui para criar suas aulas" href="prepararAula.php">Criar</a> <a title="Click aqui para ver plano de aulas" href="planoAula.php">Aulas</a></p></td><td>Copyright © 2015 Everaldo José de Souza. Todos os direitos reservados.</td><td><input type="submit" value="Atualizar Aula" name="atualizar"></td></tr></table></div></form>
';
?>
