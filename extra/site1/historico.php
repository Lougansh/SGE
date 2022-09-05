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
//$retTurma = '<input type="radio" value="'.$linha['Ano'].$linha['Turma'].'"  name="R1" onchange="form.submit()">'.$decodAno.$linha['Turma'].$retTurma;
}
mysql_free_result($query);
$retTurma = '
<input type="radio" value="0D"  name="R1" onchange="form.submit()" >PI A 
<input type="radio" value="0A"  name="R1" onchange="form.submit()" >PII A 
<input type="radio" value="0B"  name="R1" onchange="form.submit()" >PII B
<input type="radio" value="0C"  name="R1" onchange="form.submit()" >PII C
<input type="radio" value="1A"  name="R1" onchange="form.submit()" >1º
<input type="radio" value="2A"  name="R1" onchange="form.submit()" >2º
<input type="radio" value="3A"  name="R1" onchange="form.submit()" >3º
<input type="radio" value="4A"  name="R1" onchange="form.submit()" >4º
<input type="radio" value="5A"  name="R1" onchange="form.submit()" >5º
<input type="radio" value="6A"  name="R1" onchange="form.submit()" >6º
<input type="radio" value="7A"  name="R1" onchange="form.submit()" >7º
<input type="radio" value="8A"  name="R1" onchange="form.submit()" >8º
<input type="radio" value="9A"  name="R1" onchange="form.submit()" >9º
<input type="radio" value="AA"  name="R1" onchange="form.submit()" >1º
<input type="radio" value="BA"  name="R1" onchange="form.submit()" >2º
<input type="radio" value="CA"  name="R1" onchange="form.submit()" >3º
<input type="radio" value="DA"  name="R1" onchange="form.submit()" >4º
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
$sql = 'select * from tb_aluno where Ano = '.$_SESSION["ano"].' Order By ano desc,nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$explodeNome = explode(" ",$linha['Nome']);
$primeiroNome = current($explodeNome);
$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 	
if (file_exists($foto_aluno)) {
	$caminho = 'alunos/'.$linha["ID"].'.JPG';
}else{
	$caminho = 'semfoto.JPG';	
	}
if($linha['Programacao'] == 'S'){
$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/alunos/'.$linha['ID'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
}else{
$menuFotos = '<button value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/alunos/'.$linha['ID'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
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
if ($linha['avaliacaoContexto']		== 'S') {$avaliacaoContexto='<input type="radio" value="S" checked name="chkAvaliacaoContexto">SIM   <input type="radio" value="N" name="chkPreConselho">NAO';} else {$avaliacaoContexto=  '<input type="radio" value="S" name="chkAvaliacaoContexto">SIM<input type="radio" value="N" checked name="chkAvaliacaoContexto">NAO';}
if ($linha['Turma']== 'A') {$mTurma = '<select size="1" name="dropTurma">  <option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="B">B</option><option value="C">C</option><option value="D">D</option></select>';}
else if ($linha['Turma']== 'B') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="C">C</option><option value="D">D</option></select>';}
else if ($linha['Turma']== 'C') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option><option value="D">D</option></select>';}
else if ($linha['Turma']== 'D') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option><option value="C">C</option></select>';}if ($linha['Avaliacao']		== 'Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Nao Apropriou">Nao Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else if ($linha['Avaliacao']== 'Nao Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option><option value="Nao Apropriou">Nao Apropriou</option></select>';}
if ($linha['Situacao']		== 'A') {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="A">Matriculado</option><option value="T">Transferido</option></select>';}else {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="T">Transferido</option><option value="A">Matriculado</option></select>';}
$obs = $linha['Obs'];
echo'
<div align="center"><table border="0" width="1026"><tr>
<td rowspan="21" align="center" valign="top" width="315"><p><font size="6"><b>'.$_SESSION["ano"].'º'.$_SESSION["turma"].'</b></font><hr width="10%"><hr width="30%"><hr width="50%"><img src="../images/alunos/'.$linha['ID'].'.JPG" height="340"><hr width="50%"><hr width="30%"><hr width="10%"><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select><br><hr width="10%"><hr width="30%"><hr width="50%"><p>Pré Conselho:'.$preConselhoAluno.'</td></tr><tr>	
<td  align="right" width="116" >Matricula:	</td><td colspan="3"  ><font color="gray">'.$linha['ID'].'</td></tr><tr>
<td  align="right" width="116" >Nome:	    </td><td colspan="3"  ><font color="blue">'.ucwords(strtolower($linha['Nome'])).'</font></td></tr><tr>
<td  align="right" width="116" >Nascimento:	</td><td colspan="3"  ><font color="gray">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td></tr><tr>
<td  align="right" width="116" >Idade:	    </td><td colspan="3"  ><font color="gray">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'</td></tr><tr>
<td  align="right" width="116" >Sexo:	    </td><td colspan="3"  ><font color="gray">'.$sexo.' RG: <input type="text" value="'.$linha['RG'].'" size="18" name="dropRG" maxlength="9"> CPF: <input type="text" value="'.$linha['CPF'].'" size="19" name="dropCPF" maxlength="11"></td></tr><tr>
<td  align="right" width="116" >Pai:	    </td><td colspan="3"  ><font color="gray"><input type="text" value="'.$linha['Pai'].'" size="40" name="dropPai">&nbsp;<input type="text" value="'.$linha['profissaoPai'].'" size="20" name="dropProfissaoPai"></td></tr><tr>
<td  align="right" width="116" >Mãe:	    </td><td colspan="3"  ><font color="gray"><input type="text" value="'.$linha['Mae'].'" size="40" name="dropMae"> <input type="text" value="'.$linha['profissaoMae'].'" size="20" name="dropProfissaoMae"></td></tr><tr>
<td  align="right" width="116" >Responsável:</td><td colspan="3"  ><font color="gray"><input type="text" value="'.$linha['Responsavel'].'" 	size="40" name="dropResponsavel"> <input type="text" value="'.$linha['profissaoResponsavel'].'" size="20" name="dropProfissaoResponsavel"></td></tr><tr>
<td  align="right" width="116" >Contato:	</td><td colspan="3"  ><font color="gray"><input style="text-align:center" type="text" value="'.$linha['Telefone'].'" 	size="10" name="dropContato"> <input style="text-align:center" type="text" value="'.$linha['Telefone2'].'" 	size="10" name="dropContato2"> <input style="text-align:center" type="text" value="'.$linha['Telefone3'].'" 	size="10" name="dropContato3"> <input style="text-align:center" type="text" value="'.$linha['Telefone4'].'" 	size="10" name="dropContato4"></td></tr><tr>
<td  align="right" width="116" >Bairro:     </td><td colspan="3"  ><font color="gray"><input type="text" value="'.$linha['bairro'].'" 	size="15" name="dropBairro"> Rua: <input type="text" value="'.$linha['rua'].'" 	size="28" name="dropRua"> Nº: <input type="text" value="'.$linha['Nr'].'" 	size="4" name="dropNr" style="text-align:center"></td></tr><tr>
<td  align="right" width="116" >&nbsp;	    </td><td colspan="3"  ><fieldset align="middle" style="padding: 0"><legend align="center">Cursos		</legend>'.$reforco.'RE'.$programacao.'CT</fieldset></td></tr><tr>
<td  align="right" width="116" >&nbsp;	    </td><td colspan="3"  ><fieldset align="middle" style="padding: 0"><legend align="center">Dificuldades	</legend>'.$escrita.'Escrita'.$leitura.'Leitura'.$numerais.'Numerais'.$operacoes.'Operações</fieldset></td></tr><tr>
<td  align="right" width="116" >&nbsp;	    </td><td colspan="3"  ><fieldset align="middle" style="padding: 0"><legend align="center">Relacionamento	</legend>'.$relacionamento.'</fieldset></td></tr><tr>
<td  align="right" width="116" >Avaliação:	</td><td colspan="3"  ><font color="gray">'.$avaliacaoUP.'</td></tr><tr>
<td  align="right" width="116" >Sala:	    </td><td colspan="3"  ><font color="gray">'.$linha['Sala'].'</font> Turno:<font color="gray"> '.$linha['Turno'].'</td></tr><tr>
<td  align="right" width="116" >Ano/Turma:	</td><td width="134"  ><font color="gray"><input type="text" value="'.$linha['Ano'].'" size="1" name="dropAno" style="text-align:center">'.$mTurma.'</td>
<td width="50"  ><p align="right">PC:</td><td width="389"  ><font color="gray"><input type="text" value="'.$linha['PC'].'" size="1" name="dropPC" style="text-align:center"></td></tr><tr>
<td  align="right" width="116" >Professora:	</td><td colspan="3"  ><font color="gray">'.$linha['Matr'].' <font color="red">'.$linha['Professor'].'</td></tr><tr>
<td  align="right" width="116" >            </td><td colspan="3">Avaliação em Contexto:'.$avaliacaoContexto.'</td></tr><tr>
<td  align="right" width="116" >Situação:	</td><td colspan="3"  ><font color="gray">'.$situacaoUP.'</td></tr><tr>
<td  align="right" width="116" ><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button></td>
<td colspan="3"><textarea rows="7" name="tedHistorico" cols="70">' . $obs .'</textarea></td></tr></table><hr width="50%">
</div></form></body>
';
}
if (isset($_POST['btnSalvar']) ){
$codigo 				= $_POST['dropCodigo'];
$CPF 					= $_POST['dropCPF'];
$RG 					= $_POST['dropRG'];
$obs 					= $_POST['tedHistorico'];
$avaliacao 				= $_POST['dropAvaliacao'];
$telefone 				= $_POST['dropContato'];
$telefone2 				= $_POST['dropContato2'];
$telefone3				= $_POST['dropContato3'];
$telefone4 				= $_POST['dropContato4'];
$anoAluno 				= $_POST['dropAno'];
$turma 					= $_POST['dropTurma'];
$dificuldade 			= $_POST['chkReforco'];
$fotogenico 			= $_POST['chkFotografia'];
$programador 			= $_POST['chkProgramacao'];
$leituraUP 				= $_POST['chkLeitura'];
$escritaUP 				= $_POST['chkEscrita'];
$numeraisUP 			= $_POST['chkNumerais'];
$operacoesUP 	     	= $_POST['chkOperacoes'];
$relacionametoUP     	= $_POST['chkRelacionamento'];
$preConselhoUP       	= $_POST['chkPreConselho'];
$avaliacaoContextoUP 	= $_POST['chkAvaliacaoContexto'];
$situacao 				= $_POST['dropSituacao'];
$sexoUP 				= $_POST['dropSexo'];
$paiUP 					= strtoupper($_POST['dropPai']);
$maeUP 					= strtoupper($_POST['dropMae']);
$profissaoPai 			= $_POST['dropProfissaoPai'];
$profissaoMae 			= $_POST['dropProfissaoMae'];
$profissaoResp 			= $_POST['dropProfissaoResponsavel'];
$dataHoje 				= date('Y-m-d');
$responsavelUP 			= strtoupper($_POST['dropResponsavel']);
$bairro 				= $_POST['dropBairro'];
$rua 					= $_POST['dropRua'];
$Nr 					= $_POST['dropNr'];
$PC						= $_POST['dropPC'];
if ($fotogenico =='on') {$fotogenico ='S';} else {$fotogenico ='N';}
if ($programador =='on') {$programador ='S';} else {$programador ='N';}
if ($escritaUP =='on') {$escritaUP ='S';} else {$escritaUP ='N';}
if ($leituraUP =='on') {$leituraUP ='S';} else {$leituraUP ='N';}
if ($numeraisUP =='on') {$numeraisUP ='S';} else {$numeraisUP ='N';}
if ($operacoesUP =='on') {$operacoesUP ='S';} else {$operacoesUP ='N';}
if ($dificuldade =='on') {$dificuldade ='S';} else {$dificuldade ='N';}
if ($situacao=='A'){
$sql = "update tb_aluno set obs = '$obs', Avaliacao = '$avaliacao', Dificuldade = '$dificuldade', Turma = '$turma', Ano = '$anoAluno', Fotografia = '$fotogenico', Programacao = '$programador', Leitura = '$leituraUP', Escrita = '$escritaUP', Numerais = '$numeraisUP', Operacoes = '$operacoesUP', Telefone = '$telefone', Telefone2 = '$telefone2', Telefone3 = '$telefone3', Telefone4 = '$telefone4', Situacao = '$situacao', Sexo = '$sexoUP', Pai = '$paiUP', Mae = '$maeUP', Relacionamento = '$relacionametoUP', preConselho = '$preConselhoUP', avaliacaoContexto = '$avaliacaoContextoUP', Responsavel = '$responsavelUP', CPF = '$CPF', RG = '$RG', bairro = '$bairro', rua = '$rua', Nr = $Nr,  profissaoPai = '$profissaoPai', profissaoMae = '$profissaoMae', profissaoResponsavel = '$profissaoResp', PC = $PC where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}else{
$sql = "update tb_aluno set obs = '$obs', Avaliacao = '$avaliacao', Dificuldade = '$dificuldade', Turma = '$turma', Ano = '$anoAluno', Fotografia = '$fotogenico', Programacao = '$programador', Leitura = '$leituraUP', Escrita = '$escritaUP', Numerais = '$numeraisUP', Operacoes = '$operacoesUP', Telefone = '$telefone', Telefone2 = '$telefone2', Telefone3 = '$telefone3', Telefone4 = '$telefone4', Situacao = '$situacao', Sexo = '$sexoUP', Pai = '$paiUP', Mae = '$maeUP', Relacionamento = '$relacionametoUP', preConselho = '$preConselhoUP', avaliacaoContexto = '$avaliacaoContextoUP', Responsavel = '$responsavelUP', CPF = '$CPF', RG = '$RG', bairro = '$bairro', rua = '$rua', Nr = $Nr,  profissaoPai = '$profissaoPai', profissaoMae = '$profissaoMae', profissaoResponsavel = '$profissaoResp', Movimentacao = '$dataHoje', Tipo = 'T', PC = $PC where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
}
?>