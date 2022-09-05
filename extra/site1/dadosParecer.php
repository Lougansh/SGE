<?php 
include './conexao.php';
include './conf.php';
alunosMFT();
echo'
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">'
.$mostraMenu.'<input type="radio" value="TG" name="Lista" onchange="form.submit()">Geral<input type="radio" value="SR" name="Lista" onchange="form.submit()">Sala Recurso
<p>
';
if (isset($_POST['Lista'])){
	$anoTurma = substr($_POST['Lista'],0,1);
	$turmaAno = substr($_POST['Lista'],1,1);
			 if ($anoTurma == 0 && $turmaAno == 'G'){$titulo = 'Turma: Pré - Escola I A ';}
		else if ($anoTurma == 0 && $turmaAno == 'H'){$titulo = 'Turma: Pré - Escola I B ';}
		else if ($anoTurma == 0 && $turmaAno == 'A'){$titulo = 'Turma: Pré - Escola II A ';}
		else if ($anoTurma == 0 && $turmaAno == 'B'){$titulo = 'Turma: Pré - Escola II B ';}
		else if ($anoTurma == 0 && $turmaAno == 'C'){$titulo = 'Turma: Pré - Escola II C ';}
		else if ($anoTurma == 0 && $turmaAno == 'D'){$titulo = 'Turma: Pré - Escola II D ';}
		else if ($anoTurma == 0 && $turmaAno == 'E'){$titulo = 'Turma: Pré - Escola II E ';}
		else if ($anoTurma == 0 && $turmaAno == 'F'){$titulo = 'Turma: Pré - Escola II F ';}
		else if ($anoTurma >= 1){$titulo = 'Turma: '.$anoTurma.'º Ano '.$turmaAno;}
	if($anoTurma=='T' and $turmaAno=='G'){
		$sql = "select * from tb_alunoMFT where situacao = 'A' order by ano, turma, chamada, nomeAluno asc ";
		$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());	
		$titulo = 'Banco de Dados Geral';
	}
	elseif($anoTurma=='S' and $turmaAno=='R'){
		$sql = "select * from tb_alunoMFT where salaRecurso = 'S' order by ano, turma, chamada, nomeAluno asc ";
		$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());	
		$titulo = 'Sala de Recurso';
	}
	else{
		$sql = "select * from tb_alunoMFT where ano = '$anoTurma' and turma = '$turmaAno' and situacao = 'A' order by nomeAluno asc ";
		$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	}
	while ($linha = mysql_fetch_array($query)) {
			 if ($linha['ano'] == 0 && $linha['turma'] == 'A'){$retAno = 'Pré II'; 		$retTurma = 'A';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'B'){$retAno = 'Pré II'; 		$retTurma = 'B';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'C'){$retAno = 'Pré II'; 		$retTurma = 'C';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'D'){$retAno = 'Pré II'; 		$retTurma = 'D';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'E'){$retAno = 'Pré II'; 		$retTurma = 'E';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'F'){$retAno = 'Pré II'; 		$retTurma = 'F';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'G'){$retAno = 'Pré I';  		$retTurma = 'A';}
		else if ($linha['ano'] == 0 && $linha['turma'] == 'H'){$retAno = 'Pré I';  		$retTurma = 'B';}
		else if ($linha['ano'] >= 1){                          $retAno = $linha['ano'];	$retTurma = $linha['turma'];}
		$tabela = $tabela.'
	<tr>
		<td align="center">'.$linha['ID'].'</td>
		<td align="center">'.$retAno.'</td>
		<td align="center">'.$retTurma.'</td>
		<td align="center">'.$linha['chamada'].'</td>
		<td align="left  ">'.$linha['nomeAluno'].'</td>
		<td align="center">'.$linha['sexo'].'</td>
		<td align="center">'.$linha['dataNascimento'].'</td>
		<td align="left  ">'.$linha['cidade'].'</td>
		<td align="center">'.$linha['UF'].'</td>
		<td align="left  ">'.$linha['nomePai'].'</td>
		<td align="left  ">'.$linha['nomeMae'].'</td>
		<td align="left  ">'.$linha['prof'].'</td>
		<td align="left  ">'.$linha['nomeResponsavel'].'</td>
		<td align="center">'.$linha['tel1'].'</td>
	</tr>
	';
	}
}
echo'
<h2 align="center">'.$titulo.'</h2>
<table border="1" width="95%" cellspacing="0">
	<tr>
		<td align="center">CGM</td>
		<td align="center">Ano</td>
		<td align="center">Turma</td>
		<td align="center">Chamada</td>
		<td align="center">Aluno</td>
		<td align="center">Sexo</td>
		<td align="center">Nascimento</td>
		<td align="center">Naturalidade</td>
		<td align="center">UF</td>
		<td align="center">Pai</td>
		<td align="center">Mãe</td>
		<td align="center">Professora</td>
		<td align="center">Responsavel</td>
		<td align="center">Telefone1</td>
	</tr>
	'.($tabela).'
</table>
';
?>