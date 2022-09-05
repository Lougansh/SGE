<?php 
include './conexao.php';
include './conf.php';
//alunosMFT();
if (isset($_POST['selectTurma'])) { 
	$anoTurma = substr($_POST['selectTurma'],0,1);
	$turmaAno = substr($_POST['selectTurma'],1,1);
	$sql = "select * from tb_alunoMFT where ano = '$anoTurma' and turma = '$turmaAno' and situacao = 'A' Order By nomeAluno desc";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	if ($anoTurma >= 1){$titulo = $anoTurma.'º Ano '.$turmaAno;}
	while ($linha = mysql_fetch_array($query)) {
		$professor = $linha['prof'];
		$turma = $linha['turma'];
		$foto_aluno = '../images/alunos/'.$linha['cgm'].'.JPG'; 	
		$explodeNome = explode(" ",$linha['nomeAluno']);
		$primeiroNome = current($explodeNome);
			if (file_exists($foto_aluno)) {
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/alunos/'.$linha['cgm'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
				
			}else{
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/semfoto.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
			}	
	}
}
mysql_free_result($query);
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Pesquisa de Alunos CFH</title>
		</head>
		<meta charset="utf-8">
		<body>
		<form method="POST" action="?id=18" onchange="form.submit()">
			<p align="center"><font size="7">ESCOLA MARIA FUMIKO TOMINAGA</font><p align="center">&nbsp;<select size="1" name="selectTurma" onchange="form.submit()">
			<option value=" ">'.$titulo.'</option>		
			<option value="5A">5º Ano - A</option>
			<option value="5B">5º Ano - B</option>
			<option value="5C">5º Ano - C</option>
			<option value="5D">5º Ano - D</option>
			</select> 
		</form>
			<form method="POST" action="editarAlunoMFT.php" onchange="form.submit()"><div align="center">'.$mostraFotos.'</div></form>
		<p align="center"><font size="7">2021</font></p>
		</body>
</html>
';
?>