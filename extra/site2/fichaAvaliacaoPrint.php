<?php
include './conexao.php';
include './conf.php';
if ($_POST['btnTurma']){
$ano = $_POST['Ano'];
$turma = $_POST['Turma'];
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ano = $ano and aluno.Turma = '$turma'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
else if ($_POST['btnAluno']){
$ID = $_POST['ID'];
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.Nome like '%$ID%'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
else if ($_POST['btnGeral']){
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ano <= 3 order by Ano, Turma, Nome";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
echo'<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><style type="text/css" media="print">div.page{page-break-after: always;page-break-inside: avoid;}</style></head><body><font size= "3" face="Times New Roman">';
while ($linha = mysql_fetch_array($query)) {
$i = $i+1;
if ($linha['Sexo']=='M'){
$estadoCivil = 'SOLTEIRO';
$nacionalidade = 'BRASILEIRO';
$sexo = 'MASCULINO';
}else{
$estadoCivil = 'SOLTEIRA';
$nacionalidade = 'BRASILEIRA';
$sexo = 'FEMININO';
}
if ($linha['Ano']<1){
$retAno = 'PRÉ';
}else{
$retAno = $linha['Ano'].'º ANO';
}
echo'
<table border="0" width="100%" style="border-collapse: collapse">
<tr>
<td width="118">
<img border="0" src="../images/escudo.jpg" width="118" height="132"></td>
<td>
<p align="center">FICHA DE AVALIAÇÃO DO '.$retAno.' DE '.date(Y).'</td>
</tr></table><div align="center">
<table border="0" width="50%" style="border-collapse: collapse"><tr>
<td bgcolor="#C0C0C0"><p align="center"><b><font size="4">DADOS DE IDENTIFICAÇÃO</font></b></td></tr></table></div>
<table border="0" style="border-collapse: collapse"><tr>
<td width="923">ESCOLA MUNICIPAL TEREZINHA PICOLI CEZAROTTO</td>
<td rowspan="13"><p align="center">
<img border="0" src="../images/alunos/'.$linha['ID'].'.JPG" width="180" height="270"></td></tr><tr>
<td width="923">Municipio: CASCAVEL - Estado: PR</td></tr><tr>
<td width="923">Nome: '.$linha['Nome'].'</td></tr><tr>
<td width="923">Data de nascimento: '.date('d/m/Y', strtotime($linha['Nascimento'])).'</td></tr><tr>
<td width="923">Sexo : '.$sexo.'</td></tr><tr>
<td width="923">Naturalidde: CASCAVEL - UF: PR</td></tr><tr>
<td width="923">Nacionalidde: '.$nacionalidade.'</td></tr><tr>
<td width="923">Filiação</td></tr><tr>
<td width="923">Nome da Mãe: '.$linha['Mae'].'</td></tr><tr>
<td width="923">Nome do Pai: '.$linha['Pai'].'</td></tr><tr>
<td width="923">Turma: '.$retAno.' '.$linha['Turma'].'</td></tr><tr>
<td width="923">Turno: '.$linha['Turno'].'</td></tr><tr>
<td width="923">Professora: '.$linha['Professor'].'</td></tr><tr>
<td width="923" align="right">Data da transferêcia: <input type="text" name="T4" size="1">/<input type="text" name="T5" size="1">/<input type="text" name="T6" size="1">(quando transferido)</td>
<td></td><tr>
<td align="right" colspan="2">Escola: <input type="text" name="T7" size="80"></td></tr><tr>
<td align="right" colspan="2">Turma: <input type="text" name="T1" size="1"> Turno: <input type="text" name="T2" size="1"> Professor(a): 
<input type="text" name="T3" size="50"></td></tr></table>
<p align="justify">A avaliação é parte fundamental do processo ensino-aprendizagem. É um momento em que se verifica o nível de apropriação dos conteúdos pelo aluno, sendo o ponto de partida de acompanhamento e reorientação permanente da prática docente, como forma de comprovar se os resultados foram alcançados, a partir dos objetivos previamente definidos. Durante o processo ensino-aprendizagem, a avaliação desenvolvida pelo professor orienta constantemente sua ação, é por meio dela que se verifica se o plano de aula está adequado e a metodologia utilizada garante aprendizagem do conteúdo [...] (CASCAVEL, 2008, volume ll p. 49). 
</p></font></div>';
echo'<div class="page">';
}
echo'</body>';
?>