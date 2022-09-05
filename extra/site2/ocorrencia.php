<?php
session_start("historico");
include './conexao.php';
include './conf.php';
menuA();
//------------>
$retTurma = '
<select size="1" name="turmaSelect" onchange="form.submit()">
<option selected value="">Selecione a turma</option>
<option value="0D">PRÉ I A</option>
<option value="0E">PRÉ I B</option>
<option value="0F">PRÉ I C</option>
<option value="0A">PRÉ II A</option>
<option value="0B">PRÉ II B</option>
<option value="0C">PRÉ II C</option>
<option value="1A">1º ANO A</option>
<option value="1B">1º ANO B</option>
<option value="1C">1º ANO C</option>
<option value="2A">2º ANO A</option>
<option value="2B">2º ANO B</option>
<option value="2C">2º ANO C</option>
<option value="3A">3º ANO A</option>
<option value="3B">3º ANO B</option>
<option value="3C">3º ANO C</option>
<option value="4A">4º ANO A</option>
<option value="4B">4º ANO B</option>
<option value="4C">4º ANO C</option>
<option value="5A">5º ANO A</option>
<option value="5B">5º ANO B</option>
<option value="5C">5º ANO C</option>
</select>
';
//------------>
if (isset($_POST['turmaSelect']) && $_POST['turmaSelect'] != ''){
$_SESSION["ano"] = substr($_POST['turmaSelect'],0,1);
$_SESSION["turma"] = substr($_POST['turmaSelect'],1,1);
$sql = 'select * from tb_aluno where situacao <> "T" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By ano desc,nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$alunoSelect = '<option selected value="">Selecione o aluno</option>';
while ($linha = mysql_fetch_array($query)) {	
$alunoSelect = '<option value="'.$linha['ID'].'">'.$linha['Nome'].'</option>'.$alunoSelect;
}
$_SESSION["alunoSelect"] = $alunoSelect;
mysql_free_result($query);
}
//------------>
echo '<form method="POST" action="?id=18" onchange="form.submit()"><div align="right"><font color="gray">ATIVO</font>:<b><font size="5" color="red">'.$_SESSION["ano"].$_SESSION["turma"].'</font></b> | '.$retTurma.'<select size="1" name="dropSelecionar" onchange="form.submit()">'.$_SESSION["alunoSelect"].'</select></div>';
if (isset($_POST['dropSelecionar'])&& $_POST['dropSelecionar'] != '') { 
$codigo = $_POST['dropSelecionar'];
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$obs = $linha['ocorrencia'];
$_SESSION["nome"] = $linha['Nome'];
echo'
<div align="center"><table border="0" width="90%"><tr>
<td rowspan="6" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%"><img src="../images/alunos/'.$linha['ID'].'.JPG" height="340"><hr width="50%"><hr width="30%"><hr width="10%"><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button><br></td></tr><tr>	
<td  align="right" width="116" >Matricula:	</td><td colspan="2"  ><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select></td></tr><tr>
<td  align="right" width="116" >Nome:	    </td><td colspan="2"  ><font color="blue">'.ucwords(strtolower($_SESSION["nome"])).' 
- </font><font color="gray">'.$_SESSION["ano"].'º'.$_SESSION["turma"].'</font></td></tr><tr>
<td  align="right" colspan="3" >&nbsp;</td></tr><tr>
<td  align="center" colspan="2" valign="top" >
<textarea rows="30" name="tedHistorico" cols="70">' . $obs .'</textarea></td>
<td valign="top" >
<input type="radio" value="Chegou Atrasado"  name="ocorrencias" onchange="form.submit()">Chegou Atrasado(a)<br>
<input type="radio" value="Demonstrou agressividade"  name="ocorrencias" onchange="form.submit()">Demonstrou agressividade<br>
<input type="radio" value="Apresentou habitos improprios de higiene"  name="ocorrencias" onchange="form.submit()">Apresentou habitos improprios de higiene<br>
<input type="radio" value="Pareceu ser desassistido da familia"  name="ocorrencias" onchange="form.submit()">Pareceu ser desassistido da familia<br>
<input type="radio" value="Agrediu um colega"  name="ocorrencias" onchange="form.submit()">Agrediu um colega<br>
<input type="radio" value="Não realizou as atividades"  name="ocorrencias" onchange="form.submit()">Não realizou as atividades<br>
<input type="radio" value="Causou discordia entre os colegas"  name="ocorrencias" onchange="form.submit()">Causou discordia entre os colegas<br>
<input type="radio" value="Aparentou ser anti-social"  name="ocorrencias" onchange="form.submit()">Aparentou ser anti-social<br>
<input type="radio" value="Demonstrou ser egoista"  name="ocorrencias" onchange="form.submit()">Demonstrou ser egoista<br>
<input type="radio" value="Usou palavras pouco cordiais para com seus colegas"  name="ocorrencias" onchange="form.submit()">Usou palavras pouco cordiais para com seus colegas<br>
<input type="radio" value="Usou palavras pouco cordiais para com o professor"  name="ocorrencias" onchange="form.submit()">Usou palavras pouco cordiais para com o professor<br>
<input type="radio" value="Chorou o tempo todo pedindo a mãe"  name="ocorrencias" onchange="form.submit()">Chorou o tempo todo pedindo a mãe<br>
<input type="radio" value="Conversando quando solicitado silencio"  name="ocorrencias" onchange="form.submit()">Conversando quando solicitado silencio<br>
<input type="radio" value="Faltando o respeito para com o professor"  name="ocorrencias" onchange="form.submit()">Faltando o respeito para com o professor<br>
<input type="radio" value="Faltando o respeito para com o colega"  name="ocorrencias" onchange="form.submit()">Faltando o respeito para com o colega<br>
</td></tr><tr>
<td  align="right" colspan="3" >&nbsp;</td></tr></table><hr width="50%">
</div></form>
';
}
if (isset($_POST['ocorrencias']) ){
	$date = date('d/m/Y H:i');
	$novaOcorrencia = $date.' | '.$_POST['ocorrencias'];
	$ID = $_POST['dropCodigo'];
	$obsOcorrencia = $_POST['tedHistorico'];
	$date = date('d/m/Y H:i');
	$ocorrencias = $obsOcorrencia.$novaOcorrencia;
	$obs = $ocorrencias;
	echo'
		<div align="center"><table border="0" width="90%"><tr>
		<td rowspan="6" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%"><img src="../images/alunos/'.$ID.'.JPG" height="340"><hr width="50%"><hr width="30%"><hr width="10%"><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button><br></td></tr><tr>	
		<td  align="right" width="116" >Matricula:	</td><td colspan="2"  ><select size="1" name="dropCodigo"><option selected value="'.$ID.'">'.$ID.'</option></select></td></tr><tr>
		<td  align="right" width="116" >Nome:	    </td><td colspan="2"  ><font color="blue">'.ucwords(strtolower($_SESSION["nome"])).' 
		- </font><font color="gray">'.$_SESSION["ano"].'º'.$_SESSION["turma"].'</font></td></tr><tr>
		<td  align="right" colspan="3" >&nbsp;</td></tr><tr>
		<td  align="center" colspan="2" valign="top" >
		<textarea rows="30" name="tedHistorico" cols="70">' . $obs .'</textarea></td>
		<td valign="top" >
		<input type="radio" value="Chegou Atrazado"  name="ocorrencias" onchange="form.submit()">Chegou Atrazado(a)<br>
		<input type="radio" value="Demonstrou agressividade"  name="ocorrencias" onchange="form.submit()">Demonstrou agressividade<br>
		<input type="radio" value="Apresentou habitos improprios de higiene"  name="ocorrencias" onchange="form.submit()">Apresentou habitos improprios de higiene<br>
		<input type="radio" value="Pareceu ser desassistido da familia"  name="ocorrencias" onchange="form.submit()">Pareceu ser desassistido da familia<br>
		<input type="radio" value="Agrediu um colega"  name="ocorrencias" onchange="form.submit()">Agrediu um colega<br>
		<input type="radio" value="Não realizou as atividades"  name="ocorrencias" onchange="form.submit()">Não realizou as atividades<br>
		<input type="radio" value="Causou discordia entre os colegas"  name="ocorrencias" onchange="form.submit()">Causou discordia entre os colegas<br>
		<input type="radio" value="Aparentou ser anti-social"  name="ocorrencias" onchange="form.submit()">Aparentou ser anti-social<br>
		<input type="radio" value="Demonstrou ser egoista"  name="ocorrencias" onchange="form.submit()">Demonstrou ser egoista<br>
		<input type="radio" value="Usou palavras pouco cordiais para com seus colegas"  name="ocorrencias" onchange="form.submit()">Usou palavras pouco cordiais para com seus colegas<br>
		<input type="radio" value="Usou palavras pouco cordiais para com o professor"  name="ocorrencias" onchange="form.submit()">Usou palavras pouco cordiais para com o professor<br>
		<input type="radio" value="Chorou o tempo todo pedindo a mãe"  name="ocorrencias" onchange="form.submit()">Chorou o tempo todo pedindo a mãe<br>
		</td></tr><tr>
		<td  align="right" colspan="3" >&nbsp;</td></tr></table><hr width="50%">
		</div></form>
';
}
if (isset($_POST['btnSalvar']) ){
	$ID = $_POST['dropCodigo'];
	$obsOcorrencia = $_POST['tedHistorico'];
	$sql = "update tb_aluno set ocorrencia = '$obsOcorrencia' where ID = $ID";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error()); 
}
?>