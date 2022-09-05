<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
head();
menuVertical();
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.Situacao = 'A' and aluno.Ano <= 5 and aluno.Ano >= 3 and aluno.Programacao = 'S' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma Order By aluno.Ano desc, aluno.Turma desc, aluno.Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

while ($linha = mysql_fetch_array($query)) {
	if ($linha['Turno'] == TARDE){
		$turnoManha = $linha['Ano'].$linha['Turma'].' '.$linha['Nome'].'<br>'.$turnoManha;
		}
//---------------------------------------------------------------------------------

	if ($linha['Turno'] == MANHA){
		$turnoTarde= $linha['Ano'].$linha['Turma'].' '.$linha['Nome'].'<br>'.$turnoTarde;
		}
//---------------------------------------------------------------------------------
}
echo '
<div class="Body">
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>

<div align="center">
	<table border="1" width="90%">
		<tr>
			<td align="center" width="50%"><b>MANHÃ - </b><font color="#008000">
			09h00min / 11h00min</font></td>
			<td align="center"><b>TARDE - </b><font color="#008000">15h00min / 
			17h00min</font></td>
		</tr>
		<tr>
			<td>'.$turnoManha.'</td>
			<td>'.$turnoTarde.'</td>
		</tr>
		</table>
</div>
</div>
';
?>

