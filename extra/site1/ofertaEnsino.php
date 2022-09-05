<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<div align="center" class="botao">'
.$mostraMenu.'
<input type="radio" value="R" name="Lista" onchange="form.submit()">R
<input type="radio" value="H" name="Lista" onchange="form.submit()">H
<input type="radio" value="F" name="Lista" onchange="form.submit()">F
<p>
</div>
';
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
	     if ($_POST['Lista'] == 'R'){
		echo '<h2>Alunos que escolheram a oferta remota </h2>';
		$sql = "select * from tb_alunoMFT where oferta = 'R' and situacao = 'A' Order By ano, turma, nomeAluno asc";
	}
	else if ($_POST['Lista'] == 'H'){
		echo '<h2>Alunos que escolheram a oferta hibrida</h2>';
		$sql = "select * from tb_alunoMFT where oferta = 'H1' and situacao = 'A' Order By nomeAluno asc";
	}
	else if($_POST['Lista'] == 'F'){
		echo '<h2>Alunos que faltam responder a pesquisa</h2>';
		$sql = "select * from tb_alunoMFT where oferta = '' and situacao = 'A' Order By ano, turma, nomeAluno asc";
	}
	else{
	$ano = substr($_POST['Lista'],0,1);
	$turma = substr($_POST['Lista'],1,1);
	
//----------------------------------------------->
$sql = "select * from tb_alunoMFT where turma = '$turma' and ano = '$ano' and situacao = 'A' Order By situacao asc, nomeAluno asc";
	}
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
$montaLista  = $montaLista.'<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="1" value="'. $linha['ano'] .$linha['turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="1" value="'.$n.'" style="text-align:center" name="nun"><input disabled type="text" size="50" value="'. $linha['nomeAluno'] .'" style="text-align:left" name="T1"><input type="text" size="2" value="'. $linha['oferta'] .'" style="text-align:center" name="T1"><br>';
}
}
$qtdeAlunos = $i;
$qtdeRemotos = $r;
$qtdeHibrido = $h;
$professor = ' - Prof.: <b>'.$professor.'</b>';
$hoje = $data;

echo '

<div align="center"><font size="5" color="#0000FF"> Total:'.$qtdeAlunos.' Hibrido:'.$qtdeHibrido.' Remoto:'.$qtdeRemotos.'</font><hr color="#FF0000" width="50%" size="1">'.$hoje.$professor.'<hr color="#FF0000" width="70%" size="1"></div>'.$montaLista.'<p>
<div align="center" class="botao">
Oferta:<select size="1" name="oferta">
<option value="R">Remoto</option>
<option value="H1">Hibrido (semana 1)</option>
<option value="H2">Hibrido (semana 2)</option>
</select>&nbsp;<input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>
</div>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID']) && $_POST['ano'] >=0) {
$menuOferta = $_POST['oferta'];

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_alunoMFT set oferta = '$menuOferta' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Movimentação realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=ofertaEnsino.php'\",1)</script>";

}
?>