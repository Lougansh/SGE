<?php
session_start("historico");
include './conexao.php';
include './conf.php';
menuA();
//------------>
$retTurma = '
<input type="radio" value="RM"  name="R1" onchange="form.submit()">Reforço (Manhã)
<input type="radio" value="RT"  name="R1" onchange="form.submit()">Reforço (Tarde)
<input type="radio" value="CM"  name="R1" onchange="form.submit()">Contra Turno (M)
<input type="radio" value="CT"  name="R1" onchange="form.submit()">Contra Turno (T)
';
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$_SESSION["select"] = $_POST['R1'];
    if ($_SESSION["select"] == 'RM') {
$sql = "select aluno.*, turma.Turno FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.Situacao = 'A' and aluno.dificuldade = 'S' and turma.turno = 'Manha'";	
$_SESSION['pagina'] = 'relReforcoM';}

elseif ($_SESSION["select"] == 'RT') {
$sql = "select aluno.*, turma.Turno FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.Situacao = 'A' and aluno.dificuldade = 'S' and turma.turno = 'Tarde'";		
$_SESSION['pagina'] = 'relReforcoT';}

elseif ($_SESSION["select"] == 'CM') {
$sql = "select aluno.*, turma.Turno FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.Situacao = 'A' and aluno.programacao = 'S' and turma.turno = 'Tarde' order by Nome desc";		
$_SESSION['pagina'] = 'relCM';}

elseif ($_SESSION["select"] == 'CT') {
$sql = "select aluno.*, turma.Turno FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.Situacao = 'A' and aluno.programacao = 'S' and turma.turno = 'Manha' order by Nome desc";		
$_SESSION['pagina'] = 'relCT';}

$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {

     if($linha['Dificuldade'] == 'S'){
$menuCurso = '<button style="color:  red; border: 2px inset  red" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="35" height="50"></button>'.$menuCurso;
}elseif($linha['Programacao'] == 'S'){
$menuCurso = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="35" height="50"></button>'.$menuCurso;
}else{
$menuCurso = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="35" height="50"></button>'.$menuCurso;
//<input type="button" style="background-image:url("caminho-da-imagem")">
}
}
$_SESSION["menuCurso"] = $menuCurso;
mysql_free_result($query);
}
//------------>
echo '<body><form method="POST" action="?id=18" onchange="form.submit()"><div align="Center">'.$retTurma.'<br>'.$_SESSION["menuCurso"].'</div>';
if (isset($_POST['dropSelecionar'])) { 
$codigo = $_POST['dropSelecionar'];
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['Nascimento'] );
$interval = $date->diff( new DateTime( date() ) );
if ($linha['Sexo'] 		== 'M') {$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
if ($linha['Dificuldade']	== 'S') {$reforco='<input type="checkbox" name="chkReforco" checked>';} else {$reforco='<input type="checkbox" name="chkReforco">';}
if ($linha['Fotografia']	== 'S') {$fotografia='<input type="checkbox" name="chkFotografia" checked>';} else {$fotografia='<input type="checkbox" name="chkFotografia">';}
if ($linha['Programacao']	== 'S') {$programacao='<input type="checkbox" name="chkProgramacao" checked>';} else {$programacao='<input type="checkbox" name="chkProgramacao">';}
if ($linha['Leitura']		== 'S') {$leitura='<input type="checkbox" name="chkLeitura" checked>';} else {$leitura='<input type="checkbox" name="chkLeitura">';}
if ($linha['Escrita']		== 'S') {$escrita='<input type="checkbox" name="chkEscrita" checked>';} else {$escrita='<input type="checkbox" name="chkEscrita">';}
if ($linha['Numerais']		== 'S') {$numerais='<input type="checkbox" name="chkNumerais" checked>';} else {$numerais='<input type="checkbox" name="chkNumerais">';}
if ($linha['Operacoes']		== 'S') {$operacoes='<input type="checkbox" name="chkOperacoes" checked>';} else {$operacoes='<input type="checkbox" name="chkOperacoes">';}
if ($linha['Relacionamento']		== 'B') {$relacionamento='<input type="radio" value="B" checked name="chkRelacionamento">Bom<input type="radio" value="R" name="chkRelacionamento">Ruim';} else {$relacionamento='<input type="radio" value="B" name="chkRelacionamento">Bom<input type="radio" value="R" checked name="chkRelacionamento">Ruim';}
if ($linha['Turma']			== 'A') {$mTurma = '<select size="1" name="dropTurma"><option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="B">B</option><option value="C">C</option></select>';}else if ($linha['Turma']== 'B') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="C">C</option></select>';}else if ($linha['Turma']== 'C') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option></select>';}
if ($linha['Avaliacao']		== 'Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Nao Apropriou">Nao Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else if ($linha['Avaliacao']== 'Nao Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option><option value="Nao Apropriou">Nao Apropriou</option></select>';}
if ($linha['Situacao']		== 'A') {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="A">Matriculado</option><option value="T">Transferido</option></select>';}else {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="T">Transferido</option><option value="A">Matriculado</option></select>';}
$obs = $linha['Obs'];
echo'
<div align="center"><table border="0" width="730"><tr>
<td rowspan="9" align="center"><p><hr width="10%"><hr width="30%"><hr width="50%"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="231" height="328"><hr width="50%"><hr width="30%"><hr width="10%"><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select></td></tr><tr>
<td  align="right" >&nbsp;</td><td colspan="3"  ><fieldset align="middle" style="padding: 0"><legend align="center">Cursos		</legend>'.$reforco.'Reforço'.$fotografia.'Fotografia'.$programacao.'Programação</fieldset></td></tr><tr>
<td  align="right" >&nbsp;<p>Nome:	</td><td colspan="3" valign="bottom"  ><font color="blue">'.$linha['Nome'].'</font></td></tr><tr>
<td  align="right" >Idade:	</td><td colspan="3"  ><font color="gray">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'</td></tr><tr>
<td  align="right" >		</td><td colspan="3"  ><fieldset align="middle" style="padding: 0"><legend align="center">Dificuldades	</legend>'.$escrita.'Escrita'.$leitura.'Leitura'.$numerais.'Numerais'.$operacoes.'Operações</fieldset></td></tr><tr>
<td  align="right" width="116" >&nbsp;<p>Ano/Turma:	</td>
<td width="118" valign="bottom"  ><font color="gray"><input type="text" value="'.$linha['Ano'].'" size="1" name="dropAno" style="text-align:center">'.$mTurma.'</td>
<td width="38" valign="bottom"  ><p align="right">PC:</td>
<td width="417" valign="bottom"  ><font color="gray"><input type="text" value="'.$linha['PC'].'" size="1" name="dropPC" style="text-align:center"></td></tr><tr>
<td  align="right" >Professora:	</td><td colspan="3"  ><font color="red">'.$linha['Professor'].'</td></tr><tr>
<td  align="right" ><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button></td>
<td colspan="3">
<textarea rows="15" name="tedHistorico" cols="70">' . $obs .'</textarea></td></tr></table><hr width="50%"></div></form>
';
}
if (isset($_POST['btnSalvar']) ){
$codigo 	= $_POST['dropCodigo'];
$obs 		= $_POST['tedHistorico'];
$avaliacao 	= $_POST['dropAvaliacao'];
$telefone 	= $_POST['dropContato'];
$turma 		= $_POST['dropTurma'];
$dificuldade 	= $_POST['chkReforco'];
$fotogenico 	= $_POST['chkFotografia'];
$programador 	= $_POST['chkProgramacao'];
$leituraUP 	= $_POST['chkLeitura'];
$escritaUP 	= $_POST['chkEscrita'];
$numeraisUP 	= $_POST['chkNumerais'];
$operacoesUP 	= $_POST['chkOperacoes'];
$realacionametoUP = $_POST['chkRealacionameto'];
$situacao 	= $_POST['dropSituacao'];
$sexoUP 	= $_POST['dropSexo'];
$paiUP 		= $_POST['dropPai'];
$maeUP 		= $_POST['dropMae'];
$PC 		= $_POST['dropPC'];
$responsavelUP 		= $_POST['dropResponsavel'];
if ($fotogenico =='on') {$fotogenico ='S';} else {$fotogenico ='N';}
if ($programador =='on') {$programador ='S';} else {$programador ='N';}
if ($escritaUP =='on') {$escritaUP ='S';} else {$escritaUP ='N';}
if ($leituraUP =='on') {$leituraUP ='S';} else {$leituraUP ='N';}
if ($numeraisUP =='on') {$numeraisUP ='S';} else {$numeraisUP ='N';}
if ($operacoesUP =='on') {$operacoesUP ='S';} else {$operacoesUP ='N';}
if ($dificuldade =='on') {$dificuldade ='S';} else {$dificuldade ='N';}
$sql = "
update tb_aluno set 
Obs = '$obs', 
Dificuldade = '$dificuldade', 
Fotografia = '$fotogenico', 
Programacao = '$programador', 
Leitura = '$leituraUP', 
Escrita = '$escritaUP', 
Numerais = '$numeraisUP', 
Operacoes = '$operacoesUP',
PC = '$PC'
where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}

?>
<p align="center"><a href="#" onclick="window.open('./<?php echo $_SESSION['pagina'] ?>.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">Gerar Relatório</a> | <a href="#" onclick="window.open('./carteirinha.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">Gerar Carteirinhas</a></p>
