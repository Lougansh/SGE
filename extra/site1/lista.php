<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
alunosProjeto();
$sql = "select distinct(equipe) from tb_aluno_projeto order by equipe asc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$listaEquipe = '<input type="radio" value="'.$linha['equipe'].'" name="Lista" onchange="form.submit()">'.strtoupper($linha['equipe']).$listaEquipe;
}

if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	$print = '<input type=image src="../images/print.png" width="20" height="20" value="Imprimir" onClick="self.print();" /> ';
$equipe = $_POST['Lista'];
if ($equipe == 'todos'){
	$sql = "select * from tb_aluno_projeto where local = 'MFT' order by nomeAluno asc";	
}else{
	$sql = "select * from tb_aluno_projeto where equipe = '$equipe' order by nomeAluno asc";
}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
	while ($linha = mysql_fetch_array($query)) {
	$i++;
	$lista = $lista.'<input type="radio" size="1"><font color="#000080"> '.$linha['nomeAluno'].'</font></font><br>';
	}
}
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center" class="botao">
'.$listaEquipe.'
<input type="radio" value="todos" name="Lista" onchange="form.submit()">Todos
</div>
'.$data.'<p>'.$lista.'</form>
';
?>