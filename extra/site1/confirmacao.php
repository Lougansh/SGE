<?php
session_start("confirmacao");
include './conexao.php'; 
include './conf.php';
alunosProjeto();
$sql = "select distinct(equipe) from tb_aluno_projeto order by equipe asc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$listaEquipe = '<input type="radio" value="'.$linha['equipe'].'" name="Lista" onchange="form.submit()">'.strtoupper($linha['equipe']).$listaEquipe;
}
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
'.$listaEquipe.'<div align = "right">
<select size="1" name="tipo">
	<option selected value="'.$_SESSION["tipo"].'">'.$_SESSION["tipo"].'</option>
	<option value="todos">Todos</option>
	<option value="pendencia">Pendencia</option>
	<option value="selecionado">Selecionados</option>
</select>
</div>
<p>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	$equipe = ($_POST['Lista']);
	$_SESSION["tipo"] = $_POST['tipo'];
	if ($_POST['tipo'] == 'pendencia') {
		$sql = "select * from tb_aluno_projeto where equipe = '$equipe' and confirmacao = '' and situacao = 'A' order by nomeAluno asc";
	}
	elseif ($_POST['tipo'] == 'selecionado') {
		$sql = "select * from tb_aluno_projeto where equipe = '$equipe' and selecionado = 'S' and situacao = 'A' order by turno, nomeAluno asc";
	}
	elseif ($_POST['tipo'] == 'todos') {
		$sql = "select * from tb_aluno_projeto where equipe = '$equipe' and situacao = 'A' order by nomeAluno asc";
	}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$n = 0;
while ($linha = mysql_fetch_array($query)) {
$n++;
$montaLista  = $montaLista.'
<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'">
<input disabled type="text" size="50" value="'. $linha['nomeAluno'] .'" style="text-align:left" name="T1">
<a href="https://wa.me/5545'.$linha['tel1'].'?text='. $linha['nomeAluno'] .'" target="_blank" class="button">Chamar</a>
<br>
';
}
echo '<h2>'.$n.'Alunos</h2><p>'.$montaLista.'<p>
<input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID'])) {
foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno_projeto set confirmacao = 'OK' where ID = $value") or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Atualizado com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaTurma.php'\",1)</script>";
}
?>