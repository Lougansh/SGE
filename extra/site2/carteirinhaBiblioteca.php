<?php
include './conexao.php';
$hxx = 1;
$sql = "select * from tb_aluno where situacao = 'A'  and ano > 0 and ano <= 5 Order By Ano desc, Turma desc, Nome desc";
//$sql = "select aluno.ID, aluno.Nome, aluno.Ano, aluno.Turma, turma.Professor from tb_aluno aluno, tb_turma turma where aluno.situacao = 'A' and aluno.Ano = turma.Ano and turma.Turma = aluno.Turma Order By aluno.Ano desc, aluno.Turma desc, Nome desc";

$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<table border="1" width="33%">';
while ($linha = mysql_fetch_array($query)) {
	$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 
	echo'
	<tr>
		<td>
		<p align="center">ESCOLA TEREZINHA PICOLI CEZAROTTO<br>
		<b><font size="2">BIBLIOTECA &quot;O PEQUENO POLEGAR&quot;</font></b></p>
		<p align="left"><b>  <font size="2">
		            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		            Nome:  '.$linha['Nome'].'<br>
		            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		            Ano/Turma: '.$linha['Ano'].'º'.$linha['Turma'].'</font></b></p>
		<table border="1" width="100%" style="border-width: 0px">
			<tr>
				<td width="108" style="border-style: none; border-width: medium">
				<p align="center">
				<img src="../images/alunos/'.$linha['ID'].'.JPG" height="100">
				</td>
				<td style="border-style: none; border-width: medium">
				<p class="MsoNormal" style="text-align: center">
				<span style="font-family: Arial,sans-serif"><font size="2">Responsabilizo-me 
				pelas obras emprestadas e a devolvê-las no prazo marcado. Se 
				ocorrer a perda de algum volume o substituirei ou pagarei o 
				valor atual.</font></span></p>
				<p align="center">__________________________<br>
				<font size="2">Ass. do aluno</font></td>
			</tr>
		</table>
		</td>
	</tr>
';
}
echo'</table>';
?>
