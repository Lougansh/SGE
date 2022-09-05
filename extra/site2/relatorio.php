<?php
include 'conexao.php';
include 'conf.php';
menuA();
//=====================================================================================
$sql = "SELECT * FROM tb_aluno aluno, tb_turma turma WHERE Situacao = 'A' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma and aluno.Ano < 6 order by aluno.ano desc, aluno.Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$meninasManha = 0;
$meninasTarde = 0;
$meninosManha = 0;
$meninosTarde = 0;
while ($linha = mysql_fetch_array($query)) {
if ($linha['Sexo'] == 'F' && $linha['Turno'] == 'MANHA'){$meninasManha++;}
if ($linha['Sexo'] == 'F' && $linha['Turno'] == 'TARDE'){$meninasTarde++;}
if ($linha['Sexo'] == 'M' && $linha['Turno'] == 'MANHA'){$meninosManha++;}
if ($linha['Sexo'] == 'M' && $linha['Turno'] == 'TARDE'){$meninosTarde++;}
if ($linha['Dificuldade'] == 'S' && $linha['Turno'] == 'MANHA'){$iM++;	$alunoReforcoManha = '<font size="2">'.$linha['Ano'].$linha['Turma'].'-'.$linha['Nome'].'</font><br>'.$alunoReforcoManha;}
if ($linha['Dificuldade'] == 'S' && $linha['Turno'] == 'TARDE'){$iT++;	$alunoReforcoTarde = '<font size="2">'.$linha['Ano'].$linha['Turma'].'-'.$linha['Nome'].'</font><br>'.$alunoReforcoTarde;}
}
$meninasTotal = $meninasManha+$meninasTarde;
$meninosTotal = $meninosManha+$meninosTarde;
$totalGeral   = $meninasTotal+$meninosTotal;
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT aluno.Ano, aluno.Turma, COUNT( aluno.ID ) Total, COUNT( aluno.Dificuldade ) Reforco, turma.Matricula, turma.Professor FROM tb_aluno aluno, tb_turma turma WHERE aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and Situacao = 'A'  and aluno.Ano < 6 group by aluno.Ano, aluno.Turma, turma.Professor order by aluno.Ano desc, aluno.Turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaSelectTurma  = 0;
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano'] == 0 && $linha['Turma'] == 'A'){
	$decodAno = 'PII';
	$decodTurma = 'A';
}
elseif ($linha['Ano'] == 0 && $linha['Turma'] == 'B'){
	$decodAno = 'PII';
	$decodTurma = 'B';
}
elseif ($linha['Ano'] == 0 && $linha['Turma'] == 'C'){
	$decodAno = 'PII';
	$decodTurma = 'C';
}
elseif ($linha['Ano'] == 0 && $linha['Turma'] == 'D'){
	$decodAno = 'PI';
	$decodTurma = 'A';
}
else{
	$decodAno = $linha['Ano'];
	$decodTurma = $linha['Turma'];
	}
$contaSelectTurma ++;
$selectTurma = '<font size="2"><input DISABLED style="text-align:center" type="text" size="2" value="'.$decodAno.''. $decodTurma.'"> <input DISABLED type="text" size="15" value=" '.$linha['Professor'].'"> '.$linha['Total'].' Alunos</font> </br>'.$selectTurma;
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT aluno.Ano, aluno.Turma, COUNT( aluno.Dificuldade ) Reforco, turma.Matricula, turma.Professor FROM tb_aluno aluno, tb_turma turma WHERE aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and Situacao = 'A'  and aluno.Ano < 6 and Dificuldade = 'S' group by aluno.Ano, aluno.Turma, turma.Professor order by aluno.Ano desc, aluno.Turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaSelectReforco  = 0;
while ($linha = mysql_fetch_array($query) or $linha = mysql_fetch_array($query)) {
if ($linha['Ano'] == 0){$decodAno = 'P';}else{$decodAno = $linha['Ano'];}
$contaSelectReforco ++;
//$selectReforco = '<font size="2">'.$linha['Reforco'].' '.$decodAno.''. $linha['Turma'].' - '.$linha['Professor'].'</font> <br>'.$selectReforco;
$selectReforco = '<font size="2">'.$decodAno. $linha['Turma'].' = '.$linha['Reforco'].'</font> | '.$selectReforco;
}
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT( aluno.Dificuldade ) Reforco, turma.Matricula, turma.Professor FROM tb_aluno aluno, tb_turma turma WHERE aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and Situacao = 'A'  and aluno.Ano < 6 and Dificuldade = 'S'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query) or $linha = mysql_fetch_array($query)) {
$selectTotalReforco = $linha['Reforco'];
}
mysql_free_result($query);
//=====================================================================================
echo'
<font size="2"><div align="center">
<table border="0" width="90%"><tr><td>
<fieldset style="padding: 2"><legend>SISTEMA DE RELATÓRIOS</legend><div align="center">
<table border="0" width="100%"><tr><td width="50%">
<fieldset style="padding: 2"><legend>Geral: '.$meninosTotal.' meninos e '.$meninasTotal.' meninas, totalizando '.$totalGeral.' alunos.</legend>
<table border="0" width="100%"><tr><td>
<fieldset style="padding: 2"><legend>Período / Manhã '.($meninosManha+$meninasManha).' Alunos</legend>
<table border="0"><tr><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninos</legend>
'.$meninosManha.'</fieldset></td><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninas</legend>
'.$meninasManha.'</fieldset></td></tr></table></fieldset></b></td><td>
<fieldset style="padding: 2"><legend>Período / Tarde '.($meninosTarde+$meninasTarde).' Alunos</legend>
<table border="0"><tr><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninos</legend>
'.$meninosTarde.'</fieldset></td><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninas</legend>
'.$meninasTarde.'</fieldset></td></tr></table></fieldset></b></td><td>
</tr></table></fieldset>
</td><td width="50%">

<fieldset style="padding: 2">
<legend>Distribuição do reforço: '.$selectTotalReforco.' alunos em '.$contaSelectReforco.' Salas</legend> <div align="center">| '.$selectReforco.'</div></fieldset>

</td></tr></table>
<table border="0" width="100%"><tr><td align="center"><fieldset style="padding: 2"><legend>
<b>Informações e distribuições</b></legend>
<table border="0" width="100%"><tr><td width="33%" valign="top"><fieldset style="padding: 2">
<legend>Distribuição de '.$totalGeral.' alunos em '.$contaSelectTurma.' Salas</legend>
'.$selectTurma.'</fieldset>
</td>
<td width="33%" valign="top"><fieldset style="padding: 2"><legend>
Reforço / Tarde '.$iM.' alunos</legend>
'.$alunoReforcoManha.'</fieldset></td>
<td width="33%" valign="top"><fieldset style="padding: 2"><legend>
Reforço / Manhã '.$iT.' alunos</legend>
'.$alunoReforcoTarde.'</fieldset></td></tr></table></fieldset></td></tr></table></div></fieldset></td></tr></table></div><p align="center"><a href="faixaEtaria.php">Relatório de faixa etária</a> | <a href="mar31.php">Lista de aniversariantes</a></p>
';
?>