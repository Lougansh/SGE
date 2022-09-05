<?php 
include './conexao.php';
$sql = "select * from tb_alunoMFT where MONTH(dataNascimento) = MOD(MONTH(CURDATE()), 12) and situacao = 'A' order by day(dataNascimento)";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
if (mysql_num_rows($query) != 0) {
while ($linha = mysql_fetch_array($query)) {
	$date = new DateTime( $linha['dataNascimento'] );
	$aluno = $aluno.'
	<tr>
			<td align="center"><font color="#000080"> 	'.$linha['ano'].$linha['turma'].'</font></td>
			<td align="left"><font color="#000080"> 	'.$linha['nomeAluno'].'</font></td>
			<td align="center"><font color="#000080"> 	'.date('d', strtotime($linha['dataNascimento'])).'</font></td>
			<td align="left"><font color="#000080"> 	'.$linha['prof'].'</font></td>
	</tr>
	';
}
}
echo '
<div align="center">
	<table border="1" cellspacing="0" cellpadding="0" bordercolorlight="#000000" bordercolordark="#000000" width="50%">
		<tr>
			<td align="center">Turma</td>
			<td align="center">Aluno</td>
			<td align="center">Dia</td>
			<td align="center">Prof</td>
		</tr>
		'.$aluno.'
	</table>
</div>
';
?>