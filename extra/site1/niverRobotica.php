<?php 
include './conexao.php';
$mes = date('M');
$mes_extenso = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Marco',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Nov' => 'Novembro',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Dec' => 'Dezembro'
);
$sql = "select * from tb_aluno_projeto where MONTH(dataNascimento) = MOD(MONTH(CURDATE()), 12) order by day(dataNascimento)";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
if (mysql_num_rows($query) != 0) {
while ($linha = mysql_fetch_array($query)) {
	$date = new DateTime( $linha['dataNascimento'] );
	$aluno = $aluno.'
	<tr>
			<td align="center"><font color="#000080"> 	'.date('d', strtotime($linha['dataNascimento'])).'</font></td>
			<td align="left"><font color="#000080"> 	'.$linha['nomeAluno'].'</font></td>
	</tr>
	';
}
}
echo '
<div align="center">
<h3>Lista de Aniversariantes do mês de '.$mes_extenso["$mes"].'</h3>
	<table border="1" cellspacing="0" cellpadding="0" bordercolorlight="#000000" bordercolordark="#000000" width="50%">
		<tr>
			<td align="center">Dia</td>
			<td align="center">Aluno</td>
		</tr>
		'.$aluno.'
	</table>
</div>
';
?>