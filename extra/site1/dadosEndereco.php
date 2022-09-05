<?php 
include './conf.php';
alunosMFT();
$$i=0;
	$sql = "SELECT * from tb_alunoMFT where situacao = 'A' order by ano, turma, nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
			$i1++;
		if($linha['rua'] == ''){
			$i2++;
		}
		if($linha['nr'] == ''){
			$i3++;
		}
		if($linha['bairro'] == ''){
			$i4++;
		}
		if($linha['cep'] == ''){
			$i5++;
		}
		if($linha['ano'] == 0 && $linha['turma']=='G'){
			$anomod= 'PRE I';
			$turmamod = 'A';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='H'){
			$anomod= 'PRE I';
			$turmamod = 'B';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='A'){ 
			$anomod= 'PRE II';
			$turmamod = 'A';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='B'){
			$anomod= 'PRE II';
			$turmamod = 'B';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='C'){
			$anomod= 'PRE II';
			$turmamod = 'C';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='D'){
			$anomod= 'PRE II';
			$turmamod = 'D';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='E'){
			$anomod= 'PRE II';
			$turmamod = 'E';
		}
		elseif($linha['ano'] == 0 && $linha['turma']=='F'){
			$anomod= 'PRE II';
			$turmamod = 'F';
		}
		else{
			$anomod = $linha['ano'];
			$turmamod = $linha['turma'];
		}
	$tabela = $tabela.'
	<tr>
		<td align="center">'.$linha['ID'].'</td>
		<td align="center">'.$anomod.'</td>
		<td align="center">'.$turmamod.'</td>
		<td align="left">'.((($linha['nomeAluno']))).'</td>
		<td align="center">'.((($linha['cep']))).'</td>
		<td align="left">'.((($linha['rua']))).'</td> 
		<td align="right">'.((($linha['nr']))).'</td> 
		<td align="left">'.((($linha['bairro']))).'</td>
	</tr>
	';
	}
	if($i1<1){
		$i1 = 0;
	}
	if($i2<1){
		$i2 = 0;
	}
	if($i3<1){
		$i3 = 0;
	}
	if($i4<1){
		$i4= 0;
	}
echo'
O banco de dados retornou:<br>
	'.$i1.' alunos, encontrados, 	'.$i2.' alunos,  faltando rua, 	'.$i3.' alunos, faltando Nr, 	'.$i4.' alunos,  Faltando Bairro, 	'.$i5.' alunos,  Faltando CEP.
	
<table border="1" width="100%" cellspacing="0">
	<tr>
		<td align="center">CGM</td>
		<td align="center">Ano</td>
		<td align="center">Turma</td>
		<td align="center">Aluno</td>
		<td align="center">CEP</td>
		<td align="center">Rua</td> 
		<td align="center">Nr</td>
		<td align="center">Bairro</td>
	</tr>
	'.($tabela).'
</table>
';
?>