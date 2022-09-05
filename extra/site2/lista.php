<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
if (isset($_POST['Lista'])) {
$print = '<input type=image src="../images/print.png" width="20" height="20" value="Imprimir" onClick="self.print();" /> ';
}
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
//-------------Pre1
if ($ano == 0 && $turma == 'D'){
$titulo = 'Turma: Pré - Escola I A ';
//$sql = "select * from tb_aluno where Ano = '$ano' and Turma = '$turma' and Situacao = 'A' order by Nome asc";
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.Ano = '$ano' and aluno.Turma = '$turma' and aluno.Situacao = 'A' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma order by Nome asc";
}
//-------------Pre2
if ($ano == 0 && $turma <> 'D'){
$titulo = 'Turma: Pré - Escola II '.$turma;
//$sql = "select * from tb_aluno where Ano = '$ano' and Turma = '$turma' and Situacao = 'A' order by Nome asc";
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.Ano = '$ano' and aluno.Turma = '$turma' and aluno.Situacao = 'A' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma order by Nome asc";
}
//-------------1A-5C
if ($ano >=1 && $ano <=12){
$titulo = $ano.'º Ano '.$turma;
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.Ano = '$ano' and aluno.Turma = '$turma' and aluno.Situacao = 'A' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma order by Nome asc";
}
//-------------Reforço Manha
if ($ano == 'R' && $turma == 'M'){
$titulo = 'Reforço Manhã';
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.ano = turma.ano and aluno.turma = turma.turma and aluno.dificuldade = 'S' and turma.turno = 'manhã' order by Nome asc";
}
//-------------Reforço Tarde
if ($ano == 'R' && $turma == 'T'){
$titulo = 'Reforço Tarde';
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.ano = turma.ano and aluno.turma = turma.turma and aluno.dificuldade = 'S' and turma.turno = 'tarde' order by Nome asc";
}
//-------------ContraTurno Escolar (Manhã)
if ($ano == 'C' && $turma == 'T'){
$titulo = 'Projeto ContraTurno Escolar (Tarde)';
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.Programacao = 'S' and turma.Turno = 'Manha' and aluno.Situacao = 'A' and aluno.ano = turma.ano and aluno.Turma = turma.Turma order by Nome asc ";
}
//-------------ContraTurno Escolar (Tarde)
if ($ano == 'C' && $turma == 'M'){
$titulo = 'Projeto ContraTurno Escolar (Manhã)';
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.Programacao = 'S' and turma.Turno = 'Tarde' and aluno.Situacao = 'A' and aluno.ano = turma.ano and aluno.Turma = turma.Turma order by Nome asc ";
}
//-------------Lista Geral
if ($ano == 'L' && $turma == 'G'){
$titulo = 'Lista Geral';
$sql = "select * from tb_aluno WHERE situacao = 'A' and Ano <= 5 order by Ano, Turma, Nome asc";
}
//-------------Processamento da qry e estrutura de repetição para gerar a lista
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
while ($linha = mysql_fetch_array($query)) {
$i++;
if ($ano == 'R' && $turma == 'U'){
$lista = $lista.'<input type="text" size="1"><font color="#000080"> '.$linha['nomeAluno'].'</font></font><br>';
$professor = $linha['Professor'];
}
elseif ($ano == 'L' && $turma == 'G'){
$lista = $lista.'<font color="#000080"> '.$linha['Ano'].$linha['Turma'].' - '.$linha['Nome'].'<br>';
$professor = $linha['Professor'];
}
elseif ($ano == 'C' && $turma == 'M' || $ano == 'C' && $turma == 'T'){
$lista = $lista.'<input type="text" size="1"><font color="#000080"> '.$linha['Ano'].$linha['Turma'].' | '.$linha['Nome'].'</font></font><br>';
$professor = 'EVERALDO';
}
ELSE{
$lista = $lista.'<input type="text" size="1"><font color="#000080"> '.$linha['Nome'].'</font></font><br>';
$professor = $linha['Professor'];
}
}
}
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center" class="botao">
<input type="radio" value="0D" name="Lista" onchange="form.submit()">P1A
<input type="radio" value="0A" name="Lista" onchange="form.submit()">PA
<input type="radio" value="0B" name="Lista" onchange="form.submit()">PB
<input type="radio" value="0C" name="Lista" onchange="form.submit()">PC
<input type="radio" value="1A" name="Lista" onchange="form.submit()">1A
<input type="radio" value="1B" name="Lista" onchange="form.submit()">1B
<input type="radio" value="1C" name="Lista" onchange="form.submit()">1C
<input type="radio" value="2A" name="Lista" onchange="form.submit()">2A
<input type="radio" value="2B" name="Lista" onchange="form.submit()">2B
<input type="radio" value="3A" name="Lista" onchange="form.submit()">3A
<input type="radio" value="3B" name="Lista" onchange="form.submit()">3B
<input type="radio" value="3C" name="Lista" onchange="form.submit()">3C
<input type="radio" value="4A" name="Lista" onchange="form.submit()">4A
<input type="radio" value="4B" name="Lista" onchange="form.submit()">4B
<input type="radio" value="4C" name="Lista" onchange="form.submit()">4C
<input type="radio" value="5A" name="Lista" onchange="form.submit()">5A
<input type="radio" value="5B" name="Lista" onchange="form.submit()">5B
<input type="radio" value="6A" name="Lista" onchange="form.submit()">6A
<input type="radio" value="7A" name="Lista" onchange="form.submit()">7A
<input type="radio" value="8A" name="Lista" onchange="form.submit()">8A
<input type="radio" value="9A" name="Lista" onchange="form.submit()">9A
<input type="radio" value="10A" name="Lista" onchange="form.submit()">10A
<input type="radio" value="RM" name="Lista" onchange="form.submit()">RM
<input type="radio" value="RT" name="Lista" onchange="form.submit()">RT
<input type="radio" value="CM" name="Lista" onchange="form.submit()">CT-M
<input type="radio" value="CT" name="Lista" onchange="form.submit()">CT-T
<input type="radio" value="LG" name="Lista" onchange="form.submit()">LG
<div class="cantoDireito">'.$print.'<a href="index.php"><img src="../images/sair.gif"></a></div></div>
<div align="center"><font size="5" color="#0000FF">'.$titulo.'</font><font size="3" color="green"> - </font><font size="3" color="red">('.$i.' alunos)</font></div>'.$data.' - Prof.: <b>'.$professor.'</b><p>'.$lista.'</form>
';
?>