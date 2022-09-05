<?php
include './conexao.php';
include './conf.php';
head();
menuVertical();
montaMenuPlanoAula();
if (isset($_POST['dropAula']) ) {
$aula = $_POST['dropAula'];
$sql = 'select * from tb_aula where id="'.$aula.'"';
}else{
$sql = 'select * from tb_aula where dataInicio <= CURDATE() order by dataInicio desc limit 1 ';
}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$aula = $linha['ID'];
$data = $linha['dataInicio'];
$dataInicio = date('d/M', strtotime("+0 days",strtotime($data)));
$dataFim = date('d/M', strtotime("+3 days",strtotime($data)));
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
echo'
<div align="center"><table border="0" width="1117"><tr>
<td align="center" width="219"><i><b><font color="#0000FF" size="5">Aula '.$aula.'</font></b></i></td><td width="43"><strong><blink><font size="4" color="#800000">Data:</font></blink></strong></td>
<td width="39">'.$dataInicio.'</td><td width="7"><p align="center"><font size="4">a</font></td>
<td width="36"><font size="4">'.$dataFim.'</font></td><td width="739">&nbsp;</td></tr></table></div>
<div align="center"><table border="0"  style="border-collapse: collapse; border-left-width: 0px; border-right-width: 0px; border-top-width: 0px" bordercolorlight="#0000FF" bordercolordark="#FF0000"><tr>
<td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">TURMA</td>
<td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">CONTEÚDO</td>
<td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">OBJETIVO</td>
<td align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">RECURSO</td></tr><tr>
<td><img border="0" src="../images/Turmas/pre.gif" width="140" height="50"></td><td><textarea rows="4" name="recurso0" cols="40">'.$conteudo0.'</textarea></td><td><textarea rows="4" name="recurso0" cols="60">'.$encaminhamento0.'</textarea></td><td><textarea rows="4" name="recurso0" cols="20">'.$recurso0.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/1.gif"   width="140" height="50"></td><td><textarea rows="4" name="recurso1" cols="40">'.$conteudo1.'</textarea></td><td><textarea rows="4" name="recurso1" cols="60">'.$encaminhamento1.'</textarea></td><td><textarea rows="4" name="recurso1" cols="20">'.$recurso1.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/2.gif"   width="140" height="50"></td><td><textarea rows="4" name="recurso2" cols="40">'.$conteudo2.'</textarea></td><td><textarea rows="4" name="recurso2" cols="60">'.$encaminhamento2.'</textarea></td><td><textarea rows="4" name="recurso2" cols="20">'.$recurso2.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/3.gif"   width="140" height="50"></td><td><textarea rows="4" name="recurso3" cols="40">'.$conteudo3.'</textarea></td><td><textarea rows="4" name="recurso3" cols="60">'.$encaminhamento3.'</textarea></td><td><textarea rows="4" name="recurso3" cols="20">'.$recurso3.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/4.gif"   width="140" height="50"></td><td><textarea rows="4" name="recurso4" cols="40">'.$conteudo4.'</textarea></td><td><textarea rows="4" name="recurso4" cols="60">'.$encaminhamento4.'</textarea></td><td><textarea rows="4" name="recurso4" cols="20">'.$recurso4.'</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/5.gif"   width="140" height="50"></td><td><textarea rows="4" name="recurso5" cols="40">'.$conteudo5.'</textarea></td><td><textarea rows="4" name="recurso5" cols="60">'.$encaminhamento5.'</textarea></td><td><textarea rows="4" name="recurso5" cols="20">'.$recurso5.'</textarea></td></tr></table></div>
<p align="center"><a title="Click aqui para corrigir suas aulas" href="editarAula.php">Editar</a> <a title="Click aqui para preparar uma nova aula" href="prepararAula.php">Criar</a><br>Copyright © 2015 Everaldo José de Souza. Todos os direitos reservados.</p>
';
?>
