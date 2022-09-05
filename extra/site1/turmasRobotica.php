<?php
include './conexao.php'; 
//include './conf.php';
//alunosProjeto();
$sql = "select * from tb_aluno_projeto where situacao = 'A' and equipe = 'presencial' order by nomeAluno";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	 if($linha['turma']=='A'){
		$a = $a.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='B'){
		$b = $b.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='C'){
		$c = $c.' - '.$linha['nomeAluno'].'<br>';
	 }	 
else if($linha['turma']=='D'){
		$d = $d.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='E'){
		$e = $e.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='F'){
		$f = $f.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='G'){
		$g = $g.' - '.$linha['nomeAluno'].'<br>';
	 }	 
else if($linha['turma']=='H'){
		$h = $h.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='I'){
		$i = $i.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='J'){
		$j = $j.' - '.$linha['nomeAluno'].'<br>';
	 }
else if($linha['turma']=='K'){
		$k = $k.' - '.$linha['nomeAluno'].'<br>';
	 }	 
else if($linha['turma']=='L'){
		$l = $l.' - '.$linha['nomeAluno'].'<br>';
	 }
}
echo '
<h1 align="center">Turmas Robótica 2022</h1>
<div align="center">
	<table border="0" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
		<tr>
			<td style="border-style: solid; border-width: 1px" align="center"><b>
			Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>
			Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>
			Horário</b></td>
			<td style="border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Horário</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Horário</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Horário</b></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>A</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>Seg/Qua</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px" align="center">
		<b>08:00 - 09:40</b></td>
			<td style="border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>B</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>Seg/Qua</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>10:20 - 12:00</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<b>C</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>Ter/Qui</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>08:00 - 09:40</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<b>D</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>Ter/Qui</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>10:20 - 12:00</b></td>
		</tr>
		<tr>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$a.'</td>
			<td style="border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$b.'</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$c.'</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$d.'</td>
		</tr>
	</table>
<hr width="80%" size="1">
<div align="center">
	<table border="0" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
		<tr>
			<td style="border-style: solid; border-width: 1px" align="center"><b>
			Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>
			Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>
			Horário</b></td>
			<td style="border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Horário</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Horário</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Turma</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Dia</b></td>
			<td style="border-style: solid; border-width: 1px" align="center"><b>Horário</b></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>E</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>Seg/Qua</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px" align="center">
		<b>13:00 - 14:40</b></td>
			<td style="border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>F</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>Seg/Qua</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
		<b>15:20 - 17:00</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center"><b>G</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>Ter/Qui</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>13:00 - 14:40</b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center"><b>H</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>Ter/Qui</b></td>
			<td style="border-style: solid; border-width: 1px" align="center">
			<p align="center">
		<b>15:20 - 17:00</b></td>		</tr>
		<tr>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$e.'</td>
			<td style="border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$f.'</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$g.'</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
		<p align="right">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</td>
		<td align="center" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2" valign="top" width="25%">
		<p align="left">'.$h.'</td>
		</tr>
	</table>
</div>
';
?>