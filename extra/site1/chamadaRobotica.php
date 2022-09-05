<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php'; 
include './conf.php';
alunosProjeto();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<div align="center" class="botao">
<input type="radio" value="M" name="Lista" onchange="form.submit()">Manha
<input type="radio" value="T" name="Lista" onchange="form.submit()">Tarde
<input type="radio" value="G" name="Lista" onchange="form.submit()">Geral
<p>
</div>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	$turma = $_POST['Lista'];
	if($turma == 'M'){
		$sql = "select * from tb_aluno_projeto where turno = 'M' and turma <> '' and situacao = 'A' and equipe = 'presencial' Order By turma, hora, nomeAluno asc";
	}
	if($turma == 'T'){
		$sql = "select * from tb_aluno_projeto where turno = 'T' and turma <> '' and situacao = 'A' and equipe = 'presencial' Order By turma, hora, nomeAluno asc";
	}
	if($turma == 'G'){
		$sql = "select * from tb_aluno_projeto where turma <> '' and situacao = 'A' and equipe = 'presencial' Order By turma, hora, nomeAluno asc";
	}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$n = 0;
$i=1;
while ($linha = mysql_fetch_array($query)) {

$montaLista  = $montaLista.'
	<tr>
		
		<td>'. $i++ .'</td>
		<td>'. $linha['nomeAluno'] .'</td>
		<td><center>'. $linha['turma'] .'</center></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
';
$turma = 'ROBÓTICA 2022';
}
$professor = ' - Prof.: <b>Everaldo Jose de Souza</b>';
$hoje = $data;

echo '

<div align="center"><hr color="#FF0000" width="50%" size="1"><h1> '.$turma.'</h2><hr color="#FF0000" width="70%" size="1"></div>

<table border="1" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">

	<tr>
		<td width="1%"><center>ID</center></td>
		<td width="25%"><center>Nome</center></td>
		<td width="1%"><center>Turma</center></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>

'.$montaLista.'<p></table>';
}
?>