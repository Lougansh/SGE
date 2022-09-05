<?php
include 'conexao.php';
include 'conf.php';
menuA();
//=====================================================================================
$sql = "SELECT * FROM tb_aluno aluno, tb_turma turma WHERE Situacao = 'A' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$meninasManha = 0;
$meninasTarde = 0;
$meninosManha = 0;
$meninosTarde = 0;
while ($linha = mysql_fetch_array($query)) {
	$teste = $linha['Sexo'].$linha['Turno'].$teste;
if ($linha['Sexo'] == 'F' && $linha['Turno'] == 'MANHÃ'){$meninasManha++;}
if ($linha['Sexo'] == 'F' && $linha['Turno'] == 'TARDE'){$meninasTarde++;}
if ($linha['Sexo'] == 'M' && $linha['Turno'] == 'MANHÃ'){$meninosManha++;}
if ($linha['Sexo'] == 'M' && $linha['Turno'] == 'TARDE'){$meninosTarde++;}
}
$meninasTotal = $meninasManha+$meninasTarde;
$meninosTotal = $meninosManha+$meninosTarde;
$totalGeral = $meninasTotal+$meninosTotal;
mysql_free_result($query);

//=====================================================================================
$sql = "SELECT COUNT( sexo ) Total FROM tb_aluno WHERE Situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$qdte = mysql_fetch_assoc($query);
$alunos = $qdte['Total'];
mysql_free_result($query);

//=====================================================================================
$sql = "SELECT COUNT( sexo ) Total FROM tb_aluno WHERE sexo = 'F' and Situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$qdte = mysql_fetch_assoc($query);
$meninas = $qdte['Total'];
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT COUNT( sexo ) Total FROM tb_aluno WHERE sexo = 'M' and Situacao = 'A'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$qdte = mysql_fetch_assoc($query);
$meninos = $qdte['Total'];
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT aluno.Ano, aluno.Turma, COUNT( aluno.ID ) Total, turma.Matricula, turma.Professor FROM tb_aluno aluno, tb_turma turma WHERE aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and Situacao = 'A' group by aluno.Ano, aluno.Turma, turma.Professor order by Total asc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaSelectTurma  = 0;
while ($linha = mysql_fetch_array($query)) {
$contaSelectTurma ++;
$selectTurma = '<tr><td align="right" >' . $linha['Ano'] . '' . $linha['Turma'] . '</td><td > - '. $linha['Professor'] . '</td><td align="center" >'.$linha['Total'].'</td></tr>'.$selectTurma;
}
mysql_free_result($query);
//=====================================================================================
$sql = 'select aluno.*, turma.Turno from tb_aluno aluno, tb_turma turma where aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and aluno.Situacao = "A" order by turno, Ano, Turma';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$qtdeFaltaFotos = 0;
while ($linha = mysql_fetch_array($query)) {
//echo ' <option value="' . $linha['ID'] . '">' . $linha['Ano'] . '' . $linha['Turma'] . ' - ' . $linha['Nome'] . '</option>';
$filename = '../images/alunos/'.$linha['ID'].'.JPG';
if (file_exists($filename)) {

//echo "O arquivo $filename existe";
} else {
//echo "N?o encontrado: $filename";
$qtdeFaltaFotos ++;
$retFaltaFotos = $linha['Ano'] . '' . $linha['Turma'] . ' - ' . $linha['Nome'] . '<br>'.$retFaltaFotos;
}
}
mysql_free_result($query);
//=====================================================================================
$sql = "select aluno.*, turma.Turno from tb_aluno aluno, tb_turma turma where aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and turma.Turno = 'Manha' and dificuldade = 'S' order by turno, Ano, Turma";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaReforcoManha = 0;
while ($linha = mysql_fetch_array($query)) {
$reforcoManha = $linha['Ano'] . '' . $linha['Turma'] . ' - ' . $linha['Nome'] . '<br>'.$reforcoManha;
$contaReforcoManha ++; 
}
mysql_free_result($query);
//=====================================================================================
$sql = "select aluno.*, turma.Turno from tb_aluno aluno, tb_turma turma where aluno.Turma = turma.Turma and aluno.Ano = turma.Ano and turma.Turno = 'Tarde' and dificuldade = 'S' order by turno, Ano, Turma";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaReforcoTarde = 0;
while ($linha = mysql_fetch_array($query)) {
$reforcoTarde = $linha['Ano'] . '' . $linha['Turma'] . ' - ' . $linha['Nome'] . '<br>'.$reforcoTarde;
$contaReforcoTarde ++;
}
mysql_free_result($query);
//=====================================================================================
$sql = "select * from tb_aluno where programacao = 'S' order by Ano, Turma";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaProg = 0;
while ($linha = mysql_fetch_array($query)) {
$prog = $linha['Ano'] . '' . $linha['Turma'] . ' - ' . $linha['Nome'] . '<br>'.$prog ;
$contaProg ++;
}
mysql_free_result($query);
//=====================================================================================
echo '
<div align="center"><hr width="50%">SISTEMA DE RELATÓRIOS<hr width="50%">
<table border="0" style="border-left-width: 0px; border-right-width: 0px"><tr>
<td align="center" colspan="3"><b><font color="#0000FF" size="4">ALUNOS DA ESCOLA</font></b></td></tr><tr>
<td align="center" width="120">MENINOS</td>
<td align="center" width="120">MENINAS</td>
<td align="center" width="120">TOTAL</td></tr><tr>
<td align="center" width="120" style="border-style: solid; border-width: 1px">'.$meninos.'</td>
<td align="center" width="120" style="border-style: solid; border-width: 1px">'.$meninas.'</td>
<td align="center" width="120" style="border-style: solid; border-width: 1px">'.$alunos.'</td></tr></table>
<table border="0" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px"><tr>
<td align="center" width="33%"><b><font size="4">DISTRIBUIÇÃO DE ALUNOS</font></b></td>
<td align="center" width="33%"><b><font size="4">REFORÇO</font></b></td>
<td align="center" width="33%"><b><font size="4">REFORÇO</font></b></td></tr><tr>
<td align="left" style="border-style: solid; border-width: 1px"><b><font size="3">Total de: '.$contaSelectTurma.' salas</font></td>
<td align="left" style="border-style: solid; border-width: 1px"><b><font size="3">Manhã: '.$contaReforcoManha.' alunos</font></td>
<td align="left" style="border-style: solid; border-width: 1px"><b><font size="3">Tarde: '.$contaReforcoTarde.' alunos</font></td></tr><tr>
<td align="left" style="border-style: solid; border-width: 1px"><table border="0">'.$selectTurma.'</table></td>
<td align="left" style="border-style: solid; border-width: 1px">'.$reforcoManha.'</td>
<td align="left" style="border-style: solid; border-width: 1px">'.$reforcoTarde.'</td></tr></table>

';
echo 'A escola divide os alunos em dois turnos, no primeiro turno temos: '.($meninasManha+$meninosManha).' alunos'.
'Meninas Manha'.$meninasManha.'<BR>'.
'Meninas Tarde'.$meninasTarde.'<BR>'.
'Meninos Manha'.$meninosManha.'<BR>'.
'Meninos Tarde'.$meninosTarde.'<BR>'.
'Meninas'.$meninasTotal.'<BR>'.
'Meninos'.$meninosTotal.'<BR>'.
'Total'.$totalGeral.'<br>'.
$teste
;

?>