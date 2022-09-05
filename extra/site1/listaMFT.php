<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
$sql = "select * from tb_alunoMFT where ano = '$ano' and turma = '$turma' and situacao = 'A' order by nomeAluno asc";

//Titulos
if ($ano == 0 && $turma == 'X'){$titulo = 'Turma: Pré - Escola I A ';}
if ($ano == 0 && $turma == 'Y'){$titulo = 'Turma: Pré - Escola I B ';}

if ($ano == 0 && $turma == 'A'){$titulo = 'Turma: Pré - Escola II A ';}
if ($ano == 0 && $turma == 'B'){$titulo = 'Turma: Pré - Escola II B ';}
if ($ano == 0 && $turma == 'C'){$titulo = 'Turma: Pré - Escola II C ';}
if ($ano == 0 && $turma == 'D'){$titulo = 'Turma: Pré - Escola II D ';}
if ($ano == 0 && $turma == 'E'){$titulo = 'Turma: Pré - Escola II E ';}
if ($ano == 0 && $turma == 'F'){$titulo = 'Turma: Pré - Escola II F ';}

if ($ano >= 1){$titulo = $ano.'º Ano '.$turma;}
//-------------Processamento da qry e estrutura de repetição para gerar a lista
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
while ($linha = mysql_fetch_array($query)) {
$i++;
$lista = $lista.'<input type="radio" value="'.$linha['ID'].'" name="menu"><font color="#000080"> '.$linha['nomeAluno'].'</font></font><br>';
$professor = $linha['prof'];
}
$qtdeAlunos = ' - '.$i.' alunos';
$professor = ' - Prof.: <b>'.$professor.'</b>';
$hoje = $data;
}
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()">
<div align="center" class="botao">
'.$mostraMenu.'
</div>
<div align="center"><font size="5" color="#0000FF">'.$titulo.$qtdeAlunos.'</font><hr color="#FF0000" width="50%" size="1">'.$hoje.$professor.'<hr color="#FF0000" width="70%" size="1"></div>
<div align="left">'.$lista.'</div>
</form>
';
?>