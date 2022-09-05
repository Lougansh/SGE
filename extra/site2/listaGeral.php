<?php
include './conexao.php';
include './conf.php';
menuA();
echo '
<center>
<form method="POST" action="?id=19" onchange="form.submit()">
<input type="radio" value="A" name="situacao" onchange="form.submit()">Ativos
<input type="radio" value="T" name="situacao" onchange="form.submit()">Transferidos
<input type="radio" value="R" name="situacao" onchange="form.submit()">Reforço
<input type="radio" value="P" name="situacao" onchange="form.submit()">Programação
<input type="radio" value="G" name="situacao" onchange="form.submit()">Geral
</form>';

if (isset($_POST['situacao'])) {
$situacao = $_POST['situacao'];
//---------------------------------------------------------------------------------------
if ($situacao == 'A'){
$titulo =  'Relatorio de matriculados';
$sql = "select * from tb_aluno where situacao = 'A' and Ano <= 5 order by Ano desc, Turma desc, Nome desc";
$sqlCount = "select count(ID) from tb_aluno where situacao = 'A'";
}
if ($situacao == 'T'){
$titulo =  'Relatorio de transferidos';
$sql = "select * from tb_aluno where tipo = 'T' and movimentacao > '2015-12-31' and ano <= 5 order by movimentacao asc, Ano desc, Turma desc, Nome desc";
//select * from tb_aluno where movimentacao > '2015-12-31' and tipo = 'T'
}
if ($situacao == 'R'){
$titulo =  'Relatorio de reforço';
$sql = "select * from tb_aluno where Dificuldade = 'S' order by Ano desc, Turma desc, Nome desc";
}
if ($situacao == 'P'){
$titulo =  'Relatorio de Curso de Programação';
$sql = "select * from tb_aluno where Programacao = 'S' order by Ano desc, Turma desc, Nome desc";
}
if ($situacao == 'G'){
$titulo =  'Relatorio geral';
$sql = "select * from tb_aluno where ano <= 5 and situacao = 'A' order by Ano desc, Turma desc, Nome desc";
}
//---------------------------------------------------------------------------------------
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
$date = new DateTime( $linha['Nascimento'] );
$tabela = '
	<tr>
		<td width="15%" bgcolor="red" align="center">Matricula</td>
		<td width="50%" bgcolor="red" align="center">Nome</td>
		<td width="10%" bgcolor="red" align="center">Nascimento</td>
		<td width="10%" bgcolor="red" align="center">Sexo</td>
		<td width="10%" bgcolor="red" align="center">Contato</td>
		<td width="5%"  bgcolor="red" align="center">Turma</td>
	</tr>
';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = PRE;} else {$ano = $linha['Ano'];}
if ($linha['Sexo']=='M'){$sexo = Maculino;}else{$sexo = Feminino;}
$i++;
$lista = '
	<tr>
		<td width="15%" bgcolor="#C0C0C0"><p align="center">'.$linha['ID'].'</td>
		<td width="50%" bgcolor="#C0C0C0">'.$linha['Nome'].'</td>
		<td width="10%" bgcolor="#C0C0C0" align="center">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td>
		<td width="10%" bgcolor="#C0C0C0" align="center">'.$sexo.'</td>
		<td width="10%" bgcolor="#C0C0C0" align="right">'.$linha['Telefone'].'</td>
		<td width="5%"  bgcolor="#C0C0C0" align="center">'.$ano.$linha['Turma'].'</td>
	</tr>
	'.$lista;
}
echo $titulo.': '.$i.' alunos encontrados com essa pesquisa.<table border="1" width="100%">'.$tabela.'<hr>'.$lista.'</table>';
}
?>
