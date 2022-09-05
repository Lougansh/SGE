<?php
include 'conexao.php';
include 'conf.php';
menuA();
$sql = 'select max(ID) ID from tb_aula';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$ultimaAula = $linha['ID'];
}
mysql_free_result($query);
if (isset($_POST['salvar'])){
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
$sql = 'INSERT INTO  tb_aula ( ID, dataInicio, conteudoPre, conteudo1, conteudo2, conteudo3, conteudo4, conteudo5, encaminhamentoPre, encaminhamento1, encaminhamento2, encaminhamento3, encaminhamento4, encaminhamento5, recursoPre, recurso1, recurso2, recurso3, recurso4, recurso5 ) VALUES ( '.$idAula.', "'.$dataAula.'", "'.$conteudo0.'", "'.$conteudo1.'", "'.$conteudo2.'", "'.$conteudo3.'", "'.$conteudo4.'", "'.$conteudo5.'", "'.$encaminhamento0.'", "'.$encaminhamento1.'", "'.$encaminhamento2.'", "'.$encaminhamento3.'", "'.$encaminhamento4.'", "'.$encaminhamento5.'", "'.$recurso0.'", "'.$recurso1.'", "'.$recurso2.'", "'.$recurso3.'", "'.$recurso4.'", "'.$recurso5.'" )';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=prepararAula.php'>";
}
echo'
<form method="POST" action="?aula"><div align="center"><table border="0" style="border-width:0px; "><tr><td>
Aula: <input type="text" style="text-align:center" value="'.($ultimaAula + 1).'" name="numeroAula" size="5"></td>
<td>Data: <input type="text" name="dataDia" size="1" style="text-align:center" value="'.date(d).'">/<input type="text" name="dataMes" size="1" style="text-align:center" value="'.date(m).'">/<input type="text" name="dataAno" size="2" style="text-align:center" value="'.date(Y).'"></td>
<td>&nbsp;</td><td>&nbsp;</td></tr><tr>
<td>TURMA</td><td>CONTEÚDO</td><td>OBJETIVO</td><td>RECURSO</td></tr><tr>
<td><img border="0" src="../images/Turmas/pre.gif" width="140" height="50"></td><td><textarea rows="4" name="conteudo0" cols="50">Jogos educacionais.</textarea></td><td><textarea rows="4" name="encaminhamento0" cols="70">Trabalhar jogos educacionais.</textarea></td><td><textarea rows="4" name="recurso0" cols="20">Projetor
Computador</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/1.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo1" cols="50">Jogos educacionais.</textarea></td><td><textarea rows="4" name="encaminhamento1" cols="70">Trabalhar jogos educacionais.</textarea></td><td><textarea rows="4" name="recurso1" cols="20">Projetor
Computador</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/2.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo2" cols="50">Jogos educacionais.</textarea></td><td><textarea rows="4" name="encaminhamento2" cols="70">Trabalhar jogos educacionais.</textarea></td><td><textarea rows="4" name="recurso2" cols="20">Projetor
Computador</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/3.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo3" cols="50">Jogos educacionais.</textarea></td><td><textarea rows="4" name="encaminhamento3" cols="70">Trabalhar jogos educacionais.</textarea></td><td><textarea rows="4" name="recurso3" cols="20">Projetor
Computador</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/4.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo4" cols="50">Jogos educacionais.</textarea></td><td><textarea rows="4" name="encaminhamento4" cols="70">Trabalhar jogos educacionais.</textarea></td><td><textarea rows="4" name="recurso4" cols="20">Projetor
Computador</textarea></td></tr><tr>
<td><img border="0" src="../images/Turmas/5.gif"   width="140" height="50"></td><td><textarea rows="4" name="conteudo5" cols="50">Jogos educacionais.</textarea></td><td><textarea rows="4" name="encaminhamento5" cols="70">Trabalhar jogos educacionais.</textarea></td><td><textarea rows="4" name="recurso5" cols="20">Projetor
Computador</textarea></td></tr><tr>
<td>&nbsp;</td><td><p align="center"><a title="Click aqui para corrigir suas aulas" href="editarAula.php">Editar</a><a title="Click aqui para ver plano de aula" href="planoAula.php">Aulas</a></p></td><td>Copyright © 2015 Everaldo José de Souza. Todos os direitos reservados.</td><td><input type="submit" value="Criar Aula" name="salvar"></td></tr></table></div></form>
';
?>