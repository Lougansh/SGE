<?php
session_start("historico");
include './conexao.php';
include './conf.php';
menuA();
//------------>
$sql = "SELECT * from tb_turma turma order by ano desc, turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano'] == 0){$decodAno = 'Pre';}else{$decodAno = $linha['Ano'];}
$retTurma = '<input type="radio" value="'.$linha['Ano'].$linha['Turma'].'"  name="R1" onchange="form.submit()">'.$decodAno.$linha['Turma'].$retTurma;
}
mysql_free_result($query);
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$_SESSION["ano"] = substr($_POST['R1'],0,1);
$_SESSION["turma"] = substr($_POST['R1'],1,1);
$sql = 'select * from tb_aluno where situacao = "A" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By ano desc,nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {

if($linha['Dificuldade'] == 'S'){
$menuFotos = '<button style="color:  red; border: 2px inset  red" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="35" height="50"></button>'.$menuFotos;
}elseif($linha['Programacao'] == 'S'){
$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="35" height="50"></button>'.$menuFotos;
}else{
$menuFotos = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="35" height="50"></button>'.$menuFotos;
}
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
if ($linha['Sexo'] 		== 'M') {$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
if ($linha['Dificuldade']	== 'S') {$reforco='<input type="checkbox" name="chkReforco" checked>';} else {$reforco='<input type="checkbox" name="chkReforco">';}
if ($linha['Fotografia']	== 'S') {$fotografia='<input type="checkbox" name="chkFotografia" checked>';} else {$fotografia='<input type="checkbox" name="chkFotografia">';}
if ($linha['Programacao']	== 'S') {$programacao='<input type="checkbox" name="chkProgramacao" checked>';} else {$programacao='<input type="checkbox" name="chkProgramacao">';}
if ($linha['Leitura']		== 'S') {$leitura='<input type="checkbox" name="chkLeitura" checked>';} else {$leitura='<input type="checkbox" name="chkLeitura">';}
if ($linha['Escrita']		== 'S') {$escrita='<input type="checkbox" name="chkEscrita" checked>';} else {$escrita='<input type="checkbox" name="chkEscrita">';}
if ($linha['Numerais']		== 'S') {$numerais='<input type="checkbox" name="chkNumerais" checked>';} else {$numerais='<input type="checkbox" name="chkNumerais">';}
if ($linha['Operacoes']		== 'S') {$operacoes='<input type="checkbox" name="chkOperacoes" checked>';} else {$operacoes='<input type="checkbox" name="chkOperacoes">';}
if ($linha['Relacionamento']	== 'B') {$relacionamento=  '<input type="radio" value="B" checked name="chkRelacionamento">Bom<input type="radio" value="R" name="chkRelacionamento">Ruim';} else {$relacionamento='<input type="radio" value="B" name="chkRelacionamento">Bom<input type="radio" value="R" checked name="chkRelacionamento">Ruim';}
if ($linha['preConselho']		== 'S') {$preConselhoAluno='<input type="radio" value="S" checked name="chkPreConselho">SIM   <input type="radio" value="N" name="chkPreConselho">NAO';} else {$preConselhoAluno=  '<input type="radio" value="S" name="chkPreConselho">SIM<input type="radio" value="N" checked name="chkPreConselho">NAO';}
if ($linha['Turma']			== 'A') {$mTurma = '<select size="1" name="dropTurma"><option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="B">B</option><option value="C">C</option></select>';}else if ($linha['Turma']== 'B') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="C">C</option></select>';}else if ($linha['Turma']== 'C') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option></select>';}
if ($linha['Avaliacao']		== 'Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Nao Apropriou">Nao Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else if ($linha['Avaliacao']== 'Nao Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option><option value="Nao Apropriou">Nao Apropriou</option></select>';}
if ($linha['Situacao']		== 'A') {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="A">Matriculado</option><option value="T">Transferido</option></select>';}else {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="T">Transferido</option><option value="A">Matriculado</option></select>';}
$obs = $linha['Obs'];
echo'
<div align="center"><table border="0" width="730"><tr>
<td rowspan="19" align="center" valign="top"><p><font size="6"><b>'.$_SESSION["ano"].'º'.$_SESSION["turma"].'</b></font><hr width="10%"><hr width="30%"><hr width="50%"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="220" height="340"><hr width="50%"><hr width="30%"><hr width="10%"><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select><br><hr width="10%"><hr width="30%"><hr width="50%">Pré Conselho:'.$preConselhoAluno.'</td></tr><tr>	
<td  align="right" >Matricula:	</td><td  ><font color="gray">'.$linha['ID'].'</td></tr><tr>
<td  align="right" >Nome:	</td><td  ><font color="blue">'.$linha['Nome'].'</font></td></tr><tr>
<td  align="right" >Nascimento:	</td><td  ><font color="gray">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td></tr><tr>
<td  align="right" >Idade:	</td><td  ><font color="gray">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'</td></tr><tr>
<td  align="right" >Sexo:	</td><td  ><font color="gray">'.$sexo.'</td></tr><tr>
<td  align="right" >Pai:	</td><td  ><font color="gray"><input type="text" value="'.$linha['Pai'].'" size="40" name="dropPai"></td></tr><tr>
<td  align="right" >Mãe:	</td><td  ><font color="gray"><input type="text" value="'.$linha['Mae'].'" size="40" name="dropMae"></td></tr><tr>
<td  align="right" >Responsável:</td><td  ><font color="gray"><input type="text" value="'.$linha['Responsavel'].'" size="40" name="dropResponsavel"></td></tr><tr>
<td  align="right" >Contato:	</td><td  ><font color="gray"><input type="text" value="'.$linha['Telefone'].'" size="10" name="dropContato"></td></tr><tr>
<td  align="right" >&nbsp;	</td><td  ><fieldset align="middle" style="padding: 0"><legend align="center">Cursos		</legend>'.$reforco.'Reforço'.$fotografia.'Fotografia'.$programacao.'Programação</fieldset></td></tr><tr>
<td  align="right" >&nbsp;	</td><td  ><fieldset align="middle" style="padding: 0"><legend align="center">Dificuldades	</legend>'.$escrita.'Escrita'.$leitura.'Leitura'.$numerais.'Numerais'.$operacoes.'Operações</fieldset></td></tr><tr>
<td  align="right" >&nbsp;	</td><td  ><fieldset align="middle" style="padding: 0"><legend align="center">Relacionamento	</legend>'.$relacionamento.'</fieldset></td></tr><tr>
<td  align="right" >Avaliação:	</td><td  ><font color="gray">'.$avaliacaoUP.'</td></tr><tr>
<td  align="right" >Sala:	</td><td  ><font color="gray">'.$linha['Sala'].'</font> Turno:<font color="gray"> '.$linha['Turno'].'</td></tr><tr>
<td  align="right" >Ano/Turma:	</td><td  ><font color="gray"><input type="text" value="'.$linha['Ano'].'" size="1" name="dropAno">'.$mTurma.'</td></tr><tr>
<td  align="right" >Professora:	</td><td  ><font color="gray">'.$linha['Matr'].' <font color="red">'.$linha['Professor'].'</td></tr><tr>
<td  align="right" >Situação:	</td><td  ><font color="gray">'.$situacaoUP.'</td></tr><tr>
<td  align="right" ><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button></td><td  >
<textarea rows="7" name="tedHistorico" cols="70">' . $obs .'</textarea></td></tr></table><hr width="50%"></div></form></body>
';
}
if (isset($_POST['btnSalvar']) ){
$codigo 	= $_POST['dropCodigo'];
$obs 		= $_POST['tedHistorico'];
$avaliacao 	= $_POST['dropAvaliacao'];
$telefone 	= $_POST['dropContato'];
$anoAluno 		= $_POST['dropAno'];
$turma 		= $_POST['dropTurma'];
$dificuldade 	= $_POST['chkReforco'];
$fotogenico 	= $_POST['chkFotografia'];
$programador 	= $_POST['chkProgramacao'];
$leituraUP 	= $_POST['chkLeitura'];
$escritaUP 	= $_POST['chkEscrita'];
$numeraisUP 	= $_POST['chkNumerais'];
$operacoesUP 	= $_POST['chkOperacoes'];
$relacionametoUP = $_POST['chkRelacionamento'];
$preConselhoUP = $_POST['chkPreConselho'];
$situacao 	= $_POST['dropSituacao'];
$sexoUP 	= $_POST['dropSexo'];
$paiUP 		= strtoupper($_POST['dropPai']);
$maeUP 		= strtoupper($_POST['dropMae']);
$dataHoje = date('Y-m-d');
$responsavelUP 		= strtoupper($_POST['dropResponsavel']);
if ($fotogenico =='on') {$fotogenico ='S';} else {$fotogenico ='N';}
if ($programador =='on') {$programador ='S';} else {$programador ='N';}
if ($escritaUP =='on') {$escritaUP ='S';} else {$escritaUP ='N';}
if ($leituraUP =='on') {$leituraUP ='S';} else {$leituraUP ='N';}
if ($numeraisUP =='on') {$numeraisUP ='S';} else {$numeraisUP ='N';}
if ($operacoesUP =='on') {$operacoesUP ='S';} else {$operacoesUP ='N';}
if ($dificuldade =='on') {$dificuldade ='S';} else {$dificuldade ='N';}
if ($situacao=='A'){
$sql = "update tb_aluno set obs = '$obs', Avaliacao = '$avaliacao', Dificuldade = '$dificuldade', Turma = '$turma', Ano = '$anoAluno', Fotografia = '$fotogenico', Programacao = '$programador', Leitura = '$leituraUP', Escrita = '$escritaUP', Numerais = '$numeraisUP', Operacoes = '$operacoesUP', Relacionamento = '$responsavelUP', Telefone = '$telefone', Situacao = '$situacao', Sexo = '$sexoUP', Pai = '$paiUP', Mae = '$maeUP', Relacionamento = '$relacionametoUP', preConselho = '$preConselhoUP',Responsavel = '$responsavelUP' where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}else{
$sql = "update tb_aluno set obs = '$obs', Avaliacao = '$avaliacao', Dificuldade = '$dificuldade', Turma = '$turma', Fotografia = '$fotogenico', Programacao = '$programador', Leitura = '$leituraUP', Escrita = '$escritaUP', Numerais = '$numeraisUP', Operacoes = '$operacoesUP', Relacionamento = '$responsavelUP', Telefone = '$telefone', Situacao = '$situacao', Sexo = '$sexoUP', Pai = '$paiUP', Mae = '$maeUP', Relacionamento = '$relacionametoUP', Responsavel = '$responsavelUP', Movimentacao = '$dataHoje', Tipo = 'T' where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
}
?>