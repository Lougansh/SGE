<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
if (isset($_POST['Lista'])) { 
$lista = $_POST['Lista'] ;

	if ($lista == 'Presencial'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' Order By ID desc";
	}
	if ($lista == 'Presencial'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' Order By ID desc";
	}
	if ($lista == 'Presencial'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' Order By ID desc";
	}
	if ($lista == 'Selecionados'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' and selecionado = 'S' Order By ID desc";
	}
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$turma = $linha['anoProjeto'];
		$foto_aluno = '../images/CFH/'.$linha['cgm'].'.JPG'; 	
		$explodeNome = explode(" ",$linha['nomeAluno']);
		$primeiroNome = current($explodeNome);
			if (file_exists($foto_aluno)) {
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['cgm'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
				
			}else{
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/'.$caminho.'" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
			}	
	}
}
mysql_free_result($query);
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Equipe Robotica</title>
		</head>
		<meta charset="utf-8">
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<h2>Equipe '.$lista.'</h2>
					<input type="radio" value="CFH" name="Lista" onchange="form.submit()">CFH
					<input type="radio" value="Selecionados" name="Lista" onchange="form.submit()">Selecionados
					<input type="radio" value="2014" name="Lista" onchange="form.submit()">2014
					<input type="radio" value="2015" name="Lista" onchange="form.submit()">2015
					<input type="radio" value="2016" name="Lista" onchange="form.submit()">2016
					<input type="radio" value="2017" name="Lista" onchange="form.submit()">2017
					<input type="radio" value="2018" name="Lista" onchange="form.submit()">2018
					<input type="radio" value="2019" name="Lista" onchange="form.submit()">2019
					<input type="radio" value="2020" name="Lista" onchange="form.submit()">2020
					<input type="radio" value="2021" name="Lista" onchange="form.submit()">2021
					<input type="radio" value="Presencial" name="Lista" onchange="form.submit()">Presencial
					<input type="radio" value="Remota" name="Lista" onchange="form.submit()">Remota
					<input type="radio" value="Unopar" name="Lista" onchange="form.submit()">Unopar
					<input type="radio" value="CEAVEL" name="Lista" onchange="form.submit()">CEAVEL
				</div>
			</form>
			<form method="POST" action="editarAluno.php" onchange="form.submit()"><div align="center">'.$mostraFotos.'</div></form>
		</body>
</html>
';
?>