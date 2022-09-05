<?php
include './conexao.php'; 
include './conf.php';
alunosProjeto();
$sql = "select distinct(turma) from tb_aluno_projeto where situacao = 'A' order by turma";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$listaEquipe = '
	<input type = "radio" value = "A" name="Lista" onchange="form.submit()">A
	<input type = "radio" value = "B" name="Lista" onchange="form.submit()">B
	<input type = "radio" value = "C" name="Lista" onchange="form.submit()">C
	<input type = "radio" value = "D" name="Lista" onchange="form.submit()">D
	<input type = "radio" value = "E" name="Lista" onchange="form.submit()">E
	<input type = "radio" value = "F" name="Lista" onchange="form.submit()">F
	<input type = "radio" value = "G" name="Lista" onchange="form.submit()">G
	<input type = "radio" value = "H" name="Lista" onchange="form.submit()">H
	<input type = "radio" value = "I" name="Lista" onchange="form.submit()">I
	<input type = "radio" value = "J" name="Lista" onchange="form.submit()">J
	<input type = "radio" value = "K" name="Lista" onchange="form.submit()">K
	<input type = "radio" value = "L" name="Lista" onchange="form.submit()">L
	';

	//$listaEquipe.'<input type="radio" value="'.$linha['turma'].'" name="Lista" onchange="form.submit()">'.($linha['turma']);
}
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
'.$listaEquipe.'
<p>
';
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' and situacao = 'A' Order By turma desc, hora desc, nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
$n = 0;
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<tr>
		<td align="center"><input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"></td>
		<td align="center">'. $linha['turma'].'</td>
		<td>'. $linha['nomeAluno'].'</td>
		<td align="center">'. $linha['dias'].'</td>
		<td align="center">'. $linha['hora'].'</td>
	</tr>
'.$montaLista;
}
echo '<table border="1" style="border-collapse: collapse" width="50%">
<tr>
		<td align="center"></td>
		<td align="center">Turma</td>
		<td align="center">Nome</td>
		<td align="center">Dia</td>
		<td align="center">Horario</td>
	</tr>
'.$montaLista.'</table>
<p>Mudar o dia 
<select size="1" name="diaProjeto">
<option value="3">SEG-QUA</option>
<option value="4">TER-QUI</option>
</select> 
Horas <select size="1" name="horaProjeto"><option>08</option><option>10</option><option>13</option><option>15</option></select> 
Turma: <input type="text" name="turmaProjeto" size="1" " style="text-align:center"> 
<input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';

if (isset($_POST['Submeter']) && isset($_POST['ID'])) {
$diaProjeto = $_POST['diaProjeto'];
$horaProjeto = $_POST['horaProjeto'];
$turmaProjeto = $_POST['turmaProjeto'];
foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno_projeto set turma = '$turmaProjeto', dia = '$diaProjeto', hora = '$horaProjeto', turma = '$turmaProjeto' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Mudança realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudadiaProjeto.php'\",1)</script>";
}
?>