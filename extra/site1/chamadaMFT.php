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
$sql = "select * from tb_alunoMFT where turma = '$turma' and ano = '$ano' and situacao = 'A' Order By nomeAluno asc";
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
$montaLista  = $montaLista.'
	<tr>
		<td align="center">'. $i .'</td>
		<td>'. $linha['nomeAluno'] .'</td>
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
		<td>&nbsp;</td>
	</tr>
';
$turma = $linha['ano'] .$linha['turma'];
}
}
$qtdeAlunos = $i;
$qtdeRemotos = $r;
$qtdeHibrido = $h;
$professor = ' - Prof.: <b>'.$professor.'</b>';
$hoje = $data;

echo '

<div align="center"><hr color="#FF0000" width="50%" size="1">'.$hoje.$professor.' Turma:'.$turma.' | '.$i++.' Alunos<hr color="#FF0000" width="70%" size="1"></div>

<table border="1" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">

	<tr>
		<td width="1%"><center>CH</center></td>
		<td width="25%"><center>Nome</center></td>
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
		<td>&nbsp;</td>
	</tr>

'.$montaLista.'<p></table>';
}
?>