<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<div align="center" class="botao">'
.$mostraMenu.'
<p>
</div>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
$sql = "select * from tb_alunoMFT where turma = '$turma' and ano = '$ano' and situacao = 'A' Order By oferta asc, nomeAluno asc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$n = 0;
while ($linha = mysql_fetch_array($query)) {
	if($linha['oferta']=='R'){$r++;}
    if($linha['oferta']=='H1'){$h++;}
$i++;
$n++;
$professor = $linha['prof'];
if($linha['situacao']=='A'){
/*$montaLista  = $montaLista.$linha['ID'].' - '.$linha['nomeAluno'].'<br>';*/
$montaLista  = $montaLista.'<input disabled type="text" size="1" value="'. $linha['ano'] .$linha['turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['nomeAluno'] .'" style="text-align:left" name="T1"><input type="text" size="2" value="'. $linha['oferta'] .'" style="text-align:center" name="T1"><input type="text" size="3" style="text-align:center" name="T2"><input type="text" size="3" style="text-align:center" name="T3"><input type="text" size="3" style="text-align:center" name="T4"><input type="text" size="3" style="text-align:center" name="T5"><input type="text" size="3" style="text-align:center" name="T6"><input type="text" size="3" style="text-align:center" name="T7"><input type="text" size="3" style="text-align:center" name="T8"><input type="text" size="3" style="text-align:center" name="T9"><input type="text" size="3" style="text-align:center" name="T1"><input type="text" size="3" style="text-align:center" name="T1"><br>';
}
}
$qtdeAlunos = $i;
$qtdeRemotos = $r;
$qtdeHibrido = $h;
$professor = ' - Prof.: <b>'.$professor.'</b>';
$hoje = $data;

echo '

<div align="center"><font size="5" color="#0000FF"> Total:'.$qtdeAlunos.' Hibrido:'.$qtdeHibrido.' Remoto:'.$qtdeRemotos.'</font><hr color="#FF0000" width="50%" size="1">'.$hoje.$professor.'<hr color="#FF0000" width="70%" size="1"></div>

<input disabled type="text" size="1" value="Ano" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="Nome" style="text-align:left" name="T1"><input type="text" size="2" value="Tipo" style="text-align:center" name="T1"><input type="text" size="3" style="text-align:center" name="T2"><input type="text" size="3" style="text-align:center" name="T3"><input type="text" size="3" style="text-align:center" name="T4"><input type="text" size="3" style="text-align:center" name="T5"><input type="text" size="3" style="text-align:center" name="T6"><input type="text" size="3" style="text-align:center" name="T7"><input type="text" size="3" style="text-align:center" name="T8"><input type="text" size="3" style="text-align:center" name="T9"><input type="text" size="3" style="text-align:center" name="T1"><input type="text" size="3" style="text-align:center" name="T1"><br>

'.$montaLista.'<p>';
}
?>