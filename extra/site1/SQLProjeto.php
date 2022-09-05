<?php
include './conexao.php'; 
include './conf.php';
alunosProjeto();
$sql = "select distinct(equipe) from tb_aluno_projeto order by equipe";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$listaEquipe = '<input type="radio" value="'.$linha['equipe'].'" name="Lista" onchange="form.submit()">'.($linha['equipe']).$listaEquipe;
}
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
'.$listaEquipe.'
<p>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	$equipe = ($_POST['Lista']);
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_aluno_projeto where equipe = '$equipe' Order by nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

$n = 0;
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<tr>
		<td align="center"><input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"></td>
		<td>'. $linha['nomeAluno'].'</td>
	</tr>
'.$montaLista;
}
echo '<table border="1" style="border-collapse: collapse" width="25%">
<tr>
		<td align="center"></td>
		<td align="center">Nome</td>
	</tr>
'.$montaLista.'
</table>
<p>	Dado: <input type="text" name="dado" size="3" " style="text-align:center"> 
	Campo: <input type="text" name="campo" size="9" " style="text-align:center"> 
	<input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID'])) {
$dado = $_POST['dado'];
$campo = $_POST['campo'];
foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno_projeto set $campo = '$dado' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Mudança realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=SQLProjeto.php'\",1)</script>";
}
?>