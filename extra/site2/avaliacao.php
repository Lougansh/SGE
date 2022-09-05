<?php include './conexao.php'; 
include './conf.php'; 
//menu2();
menuA(); 
echo'
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head>
<form method="POST" action="?id=18" onchange="form.submit()">
<div class="botao">
<DIV ALIGN=CENTER>
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="A"  >Apropriou
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="AP" >Apropriou Parcialmente
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="NA" >Não Apropriou
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="R" >Reforço 
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="F" >Fotografia
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="P" >Programação
<INPUT TYPE=RADIO NAME="Avaliacao" onchange="form.submit()" VALUE="PC" >Pré-Conselho
</DIV></div></FORM><P>
';
if (isset($_POST['Avaliacao'])) { 
$Avaliacao = $_POST['Avaliacao'];
if($Avaliacao=='A'){ 
$sql = 'select * from tb_turma order by ano';
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red">'.$ano.' ('.$linha['Turma'].')</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and Avaliacao = "Apropriou" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>.';
}
}
}
if($Avaliacao=='AP'){ 
$sql = 'select * from tb_turma order by ano';
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red">'.$ano.' ('.$linha['Turma'].')</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and Avaliacao = "Apropriou Parcialmente" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>.';
}
}
} 
if($Avaliacao=='NA'){ 
$sql = 'select * from tb_turma order by ano';
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red">'.$ano.' ('.$linha['Turma'].')</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and Avaliacao = "Nao Apropriou" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>.';
}
}
}
if($Avaliacao=='R'){ 
$sql = 'select * from tb_turma order by ano';
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red">'.$ano.' ('.$linha['Turma'].')</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and dificuldade = "S" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>.';
}
}
}
if($Avaliacao=='F'){ 
$sql = 'select * from tb_turma order by ano';
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red">'.$ano.' ('.$linha['Turma'].')</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and fotografia = "S" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>.';
}
}
}
if($Avaliacao=='P'){ 
$sql = 'select * from tb_turma where ano = 5';
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red">'.$ano.' ('.$linha['Turma'].')</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and programacao = "S" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>.';
}
}
}
if ($Avaliacao=='PC'){ 
$sql = "select * from tb_turma order by ano, turma";
$query = mysql_query($sql);
echo '<p align="justify">';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = 'PRÉ ESCOLA';}
else if ($linha['Ano']==1){$ano = 'PRIMEIRO ANO';}
else if ($linha['Ano']==2){$ano = 'SEGUNDO ANO';}
else if ($linha['Ano']==3){$ano = 'TERCEIRO ANO';}
else if ($linha['Ano']==4){$ano = 'QUARTO ANO';}
else if ($linha['Ano']==5){$ano = 'QUINTO ANO';}
echo '<font color="red"> '.$ano.' ('.$linha['Turma'].')</font> - <font color="black">'.$linha['Obs'].'</font> ';
$ano = $linha['Ano'];
$turma = $linha['Turma'];
$sqlAluno = 'select * from tb_aluno where ano = '.$ano.' and turma = "'.$turma.'" and preConselho = "S" and situacao = "A" order by Nome';
$queryAluno = mysql_query($sqlAluno);
while ($linhaAluno = mysql_fetch_array($queryAluno)) {
$frase = $linhaAluno['Nome'];
$palavras = str_word_count($frase, 1);
$count_palavras = str_word_count($frase);
for($i=0; $i < $count_palavras; $i++){
	$palavra = (strlen($palavras[$i]) > 1) ? (ucwords(strtolower($palavras[$i]))) : (strtolower($palavras[$i]));
	$nomeAlunoConvertido = ($i < $count_palavras) ? $palavra." " : $palavra;
	print '<b><font size="4" color="green"> '.$nomeAlunoConvertido.'</font></b>';
}
//echo '<b><font color="orange">'.$linhaAluno['Nome'].'</font></b> - <font color="blue">'.$linhaAluno['Obs'].'</font>';
echo '- <font color="blue">Com base nos objetivos trabalhado no bimestre: '.$linhaAluno['Obs'].'</font>';
}
}

}
if ($Avaliacao==''){ 
include './part/avaliacaoGeral.php';
}
}
?>
</div>
