<?php
include './conexao.php';
include './conf.php';
menuA();

echo '<form method="POST" action="?id=Pesquisa" onsearch="form.submit()"><div align="Center"><br><fieldset style="width: 50%; height: 7% padding: 0"><legend>Sistema de pesquisa</legend>
	<p align="center">Nome: <input autofocus type="text" name="dropPesquisar" size="20" onsearch="form.submit()"></fieldset>';
if (isset($_POST['dropPesquisar'])&& $_POST['dropPesquisar'] != ''){
$nome = $_POST['dropPesquisar'];
$sql = 'select * from tb_aluno where nome like "%'.$nome.'%" Order By ano desc, turma desc, nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {

     if($linha['Dificuldade'] == 'S'){
$menuFotos = '<button style="color:  red; border: 2px inset  red" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../../images/alunos/'.$linha['ID'].'.JPG" width="50" height="80"></button>'.$menuFotos;
}elseif($linha['Programacao'] == 'S'){
$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../../images/alunos/'.$linha['ID'].'.JPG" width="50" height="80"></button>'.$menuFotos;
}else{
$menuFotos = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../../images/alunos/'.$linha['ID'].'.JPG" width="50" height="80"></button>'.$menuFotos;
//<input type="button" style="background-image:url("caminho-da-imagem")">
}
}
echo '<hr width="50%">'.$menuFotos;
}
if (isset($_POST['dropSelecionar']) && $_POST['dropSelecionar'] >=1) { 
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
<div align="center"><table border="0" width="730"><tr>
<td rowspan="21" align="center" valign="top"><hr width="10%"><hr width="30%"><hr width="50%"><img src="../../images/alunos/'.$linha['ID'].'.JPG" height="340"><hr width="50%"><hr width="30%"><hr width="10%"><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select><br><hr width="10%"><hr width="30%"><hr width="50%"><p>Pré Conselho:'.$preConselhoAluno.'</td></tr><tr>	
<td  align="right" >Matricula:	</td><td  ><font color="gray">'.$linha['ID'].'</td></tr><tr>
<td  align="right" >Nome:	    </td><td  ><font color="blue">'.ucwords(strtolower($linha['Nome'])).'</font></td></tr><tr>
<td  align="right" >Nascimento:	</td><td  ><font color="gray">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td></tr><tr>
<td  align="right" >Idade:	    </td><td  ><font color="gray">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'</td></tr><tr>
<td  align="right" >Sexo:	    </td><td  ><font color="gray">'.$sexo.' RG: <input type="text" value="'.$linha['RG'].'" size="18" name="dropRG" maxlength="9"> CPF: <input type="text" value="'.$linha['CPF'].'" size="19" name="dropCPF" maxlength="11"></td></tr><tr>
<td  align="right" >Pai:	    </td><td  ><font color="gray"><input type="text" value="'.$linha['Pai'].'" size="40" name="dropPai">&nbsp;<input type="text" value="'.$linha['profissaoPai'].'" size="20" name="dropProfissaoPai"></td></tr><tr>
<td  align="right" >Mãe:	    </td><td  ><font color="gray"><input type="text" value="'.$linha['Mae'].'" size="40" name="dropMae"> <input type="text" value="'.$linha['profissaoMae'].'" size="20" name="dropProfissaoMae"></td></tr><tr>
<td  align="right" >Responsável:</td><td  ><font color="gray"><input type="text" value="'.$linha['Responsavel'].'" 	size="40" name="dropResponsavel"> <input type="text" value="'.$linha['profissaoResponsavel'].'" size="20" name="dropProfissaoResponsavel"></td></tr><tr>
<td  align="right" >Contato:	</td><td  ><font color="gray"><input style="text-align:center" type="text" value="'.$linha['Telefone'].'" 	size="10" name="dropContato"> <input style="text-align:center" type="text" value="'.$linha['Telefone2'].'" 	size="10" name="dropContato2"> <input style="text-align:center" type="text" value="'.$linha['Telefone3'].'" 	size="10" name="dropContato3"> <input style="text-align:center" type="text" value="'.$linha['Telefone4'].'" 	size="10" name="dropContato4"></td></tr><tr>
<td  align="right" >Bairro:     </td><td  ><font color="gray"><input type="text" value="'.$linha['bairro'].'" 	size="15" name="dropBairro"> Rua: <input type="text" value="'.$linha['rua'].'" 	size="28" name="dropRua"> Nº: <input type="text" value="'.$linha['Nr'].'" 	size="4" name="dropNr" style="text-align:center"></td></tr><tr>
<td  align="right" >&nbsp;	    </td><td  ><fieldset align="middle" style="padding: 0"><legend align="center">Cursos		</legend>'.$reforco.'RE'.$programacao.'CT</fieldset></td></tr><tr>
<td  align="right" >&nbsp;	    </td><td  ><fieldset align="middle" style="padding: 0"><legend align="center">Dificuldades	</legend>'.$escrita.'Escrita'.$leitura.'Leitura'.$numerais.'Numerais'.$operacoes.'Operações</fieldset></td></tr><tr>
<td  align="right" >&nbsp;	    </td><td  ><fieldset align="middle" style="padding: 0"><legend align="center">Relacionamento	</legend>'.$relacionamento.'</fieldset></td></tr><tr>
<td  align="right" >Avaliação:	</td><td  ><font color="gray">'.$avaliacaoUP.'</td></tr><tr>
<td  align="right" >Sala:	    </td><td  ><font color="gray">'.$linha['Sala'].'</font> Turno:<font color="gray"> '.$linha['Turno'].'</td></tr><tr>
<td  align="right" >Ano/Turma:	</td><td  ><font color="gray"><input type="text" value="'.$linha['Ano'].'" size="1" name="dropAno" style="text-align:center">'.$mTurma.'</td></tr><tr>
<td  align="right" >Professora:	</td><td  ><font color="gray">'.$linha['Matr'].' <font color="red">'.$linha['Professor'].'</td></tr><tr>
<td  align="right" >            </td><td>Avaliação em Contexto:'.$avaliacaoContexto.'</td></tr><tr>
<td  align="right" >Situação:	</td><td  ><font color="gray">'.$situacaoUP.'</td></tr><tr>
<td  align="right" ><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../../images/btnSalvar.jpg" width="80" height="80"></button></td><td><textarea rows="7" name="tedHistorico" cols="70">' . $obs .'</textarea></td></tr></table><hr width="50%">
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
if ($fotogenico =='on') {$fotogenico ='S';} else {$fotogenico ='N';}
if ($programador =='on') {$programador ='S';} else {$programador ='N';}
if ($escritaUP =='on') {$escritaUP ='S';} else {$escritaUP ='N';}
if ($leituraUP =='on') {$leituraUP ='S';} else {$leituraUP ='N';}
if ($numeraisUP =='on') {$numeraisUP ='S';} else {$numeraisUP ='N';}
if ($operacoesUP =='on') {$operacoesUP ='S';} else {$operacoesUP ='N';}
if ($dificuldade =='on') {$dificuldade ='S';} else {$dificuldade ='N';}
if ($situacao=='A'){
$sql = "update tb_aluno set obs = '$obs', Avaliacao = '$avaliacao', Dificuldade = '$dificuldade', Turma = '$turma', Ano = '$anoAluno', Fotografia = '$fotogenico', Programacao = '$programador', Leitura = '$leituraUP', Escrita = '$escritaUP', Numerais = '$numeraisUP', Operacoes = '$operacoesUP', Telefone = '$telefone', Telefone2 = '$telefone2', Telefone3 = '$telefone3', Telefone4 = '$telefone4', Situacao = '$situacao', Sexo = '$sexoUP', Pai = '$paiUP', Mae = '$maeUP', Relacionamento = '$relacionametoUP', preConselho = '$preConselhoUP', avaliacaoContexto = '$avaliacaoContextoUP', Responsavel = '$responsavelUP', CPF = '$CPF', RG = '$RG', bairro = '$bairro', rua = '$rua', Nr = $Nr,  profissaoPai = '$profissaoPai', profissaoMae = '$profissaoMae', profissaoResponsavel = '$profissaoResp' where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}else{
$sql = "update tb_aluno set obs = '$obs', Avaliacao = '$avaliacao', Dificuldade = '$dificuldade', Turma = '$turma', Ano = '$anoAluno', Fotografia = '$fotogenico', Programacao = '$programador', Leitura = '$leituraUP', Escrita = '$escritaUP', Numerais = '$numeraisUP', Operacoes = '$operacoesUP', Telefone = '$telefone', Telefone2 = '$telefone2', Telefone3 = '$telefone3', Telefone4 = '$telefone4', Situacao = '$situacao', Sexo = '$sexoUP', Pai = '$paiUP', Mae = '$maeUP', Relacionamento = '$relacionametoUP', preConselho = '$preConselhoUP', avaliacaoContexto = '$avaliacaoContextoUP', Responsavel = '$responsavelUP', CPF = '$CPF', RG = '$RG', bairro = '$bairro', rua = '$rua', Nr = $Nr,  profissaoPai = '$profissaoPai', profissaoMae = '$profissaoMae', profissaoResponsavel = '$profissaoResp', Movimentacao = '$dataHoje', Tipo = 'T' where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
}
?>