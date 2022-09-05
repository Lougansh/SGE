<?php
session_start("historico");
include './conexao.php';
include './conf.php';
menuA();
//------------>
$sql = "SELECT * from tb_turma turma where Ano <> 'P1' order by ano desc, turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano'] == 0){$decodAno = 'Pre';}else{$decodAno = $linha['Ano'];}
$retTurma = '<input type="radio" value="'.$linha['Ano'].$linha['Turma'].'"  name="R1" onchange="form.submit()">'.$decodAno.$linha['Turma'].$retTurma;
}
mysql_free_result($query);
$retTurma = '
<input type="radio" value="1A"  name="R1" onchange="form.submit()" >1º A 
<input type="radio" value="1B"  name="R1" onchange="form.submit()" >1º B 
<input type="radio" value="1C"  name="R1" onchange="form.submit()" >1º C

<input type="radio" value="2A"  name="R1" onchange="form.submit()" >2º A 
<input type="radio" value="2B"  name="R1" onchange="form.submit()" >2º B 

<input type="radio" value="3A"  name="R1" onchange="form.submit()" >3º A 
<input type="radio" value="3B"  name="R1" onchange="form.submit()" >3º B 
<input type="radio" value="3C"  name="R1" onchange="form.submit()" >3º C

<input type="radio" value="4A"  name="R1" onchange="form.submit()" >4º A 
<input type="radio" value="4B"  name="R1" onchange="form.submit()" >4º B 
<input type="radio" value="4C"  name="R1" onchange="form.submit()" >4º C

<input type="radio" value="5A"  name="R1" onchange="form.submit()" >5º A 
<input type="radio" value="5B"  name="R1" onchange="form.submit()" >5º B 
';
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$_SESSION["ano"] = substr($_POST['R1'],0,1);
if ($_SESSION["ano"]=='A') {
	$_SESSION["ano"] = 10;
}
ELSE if ($_SESSION["ano"]=='B') {
	$_SESSION["ano"] = 11;
}
ELSE if ($_SESSION["ano"]=='C') {
	$_SESSION["ano"] = 12;
}
ELSE if ($_SESSION["ano"]=='D') {
	$_SESSION["ano"] = 13;
}
ELSE if ($_SESSION["ano"]=='E') {
	$_SESSION["ano"] = 14;
}
ELSE if ($_SESSION["ano"]=='F') {
	$_SESSION["ano"] = 15;
}
$_SESSION["turma"] = substr($_POST['R1'],1,1);
$sql = 'select * from tb_aluno where situacao <> "T" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By PC desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$explodeNome = explode(" ",$linha['Nome']);
$primeiroNome = current($explodeNome);
$xPC = $linha['PC'];
$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 	
if (file_exists($foto_aluno)) {
	$caminho = 'alunos/'.$linha["ID"].'.JPG';
}else{
	$caminho = 'semfoto.JPG';	
	}
$menuFotos = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/'.$caminho.'" height="200"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font><br><font size="7">'.$xPC.'</font></td></tr></table>'.$menuFotos;
}
$_SESSION["menuFotos"] = $menuFotos;
mysql_free_result($query);
}
//------------>
echo '<body><form method="POST" action="?id=18" onchange="form.submit()"><div align="Center"><font color="gray">ATIVO</font>:<b><font size="5" color="red">'.$_SESSION["ano"].$_SESSION["turma"].'</font></b> | '.$retTurma.'<br>'.$_SESSION["menuFotos"].'</div>';
//echo 'aqui:'.$_SESSION["ano"].$_SESSION["turma"];
if (isset($_POST['dropSelecionar'])) { 
$codigo = $_POST['dropSelecionar'];
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['Nascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$$_SESSION["movimentacao"] = $linha['Situacao'];
if ($linha['avaliacaoContexto']		== 'S') {$avaliacaoContexto='<input type="radio" value="S" checked name="chkAvaliacaoContexto">SIM   <input type="radio" value="N" name="chkPreConselho">NAO';} else {$avaliacaoContexto=  '<input type="radio" value="S" name="chkAvaliacaoContexto">SIM<input type="radio" value="N" checked name="chkAvaliacaoContexto">NAO';}
if ($linha['Situacao']		== 'A') {$situacaoUP='Matriculado>';}else {$situacaoUP='Transferido';}
echo'
<div align="center"><table border="0" width="1026"><tr>
<td rowspan="7" align="center" valign="top" width="315"><img src="../images/alunos/'.$linha['ID'].'.JPG" height="340"><hr width="10%"><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select><br><hr width="10%"></td></tr><tr>	
<td  align="right" width="116" >Matricula:	</td><td colspan="3"  ><font color="gray">'.$linha['ID'].'</td></tr><tr>
<td  align="right" width="116" >Nome:	    </td><td colspan="3"  ><font color="blue">'.ucwords(strtolower($linha['Nome'])).'</font></td></tr><tr>
<td  align="right" width="116" >Ano/Turma:	</td><td width="134"  ><font color="gray">'.$linha['Ano'].'º '.$linha['Turma'].'</td>
<td width="50"  ><p align="right">PC:</td><td width="389"  ><font color="gray"><input type="text" value="'.$linha['PC'].'" size="1" name="dropPC" style="text-align:center"></td></tr><tr>
<td  align="right" width="116" >Professora:	</td><td colspan="3"  ><font color="gray">'.$linha['Matr'].' <font color="red">'.$linha['Professor'].'</td></tr><tr>
<td  align="right" width="116" >Situação:	</td><td colspan="3"  ><font color="gray">'.$situacaoUP.'</td></tr><tr>
<td  align="right" width="116" ><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button></td>
<td colspan="3">&nbsp;</td></tr></table><hr width="50%">
</div></form></body>
';
}
if (isset($_POST['btnSalvar']) ){
$codigo 				= $_POST['dropCodigo'];
$PC						= $_POST['dropPC'];
$sql = "update tb_aluno set PC = $PC where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>