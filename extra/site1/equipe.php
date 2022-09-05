<?php 
session_start("equipe");
include './conexao.php';
include './conf.php';
alunosProjeto();
if (isset($_POST['Lista'])) { 
$_SESSION["lista"] =$_POST['Lista'];
$lista = $_SESSION["lista"] ;

	if ($lista == 'Presencial'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' and situacao = 'A' Order By turno desc, nomeAluno desc";
	}
	if ($lista == 'Remota'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Remota' Order By turno desc, nomeAluno desc";
	}
	if ($lista == 'Unopar'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Unopar' Order By turno desc, nomeAluno desc";
	}
	if ($lista == 'CEAVEL'){
		$sql = "select * from tb_aluno_projeto where equipe = 'CEAVEL' Order By turno desc, nomeAluno desc";
	}
	if ($lista == 'Selecionados'){
		$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' and selecionado = 'S' Order By turno desc, nomeAluno desc";
	}
	if ($lista == 'CFH'){
		$sql = "select * from tb_aluno_projeto where equipe = 'CFH' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2014'){
		$sql = "select * from tb_aluno_projeto where equipe = '2014' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2015'){
		$sql = "select * from tb_aluno_projeto where equipe = '2015' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2016'){
		$sql = "select * from tb_aluno_projeto where equipe = '2016' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2017'){
		$sql = "select * from tb_aluno_projeto where equipe = '2017' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2018'){
		$sql = "select * from tb_aluno_projeto where equipe = '2018' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2019'){
		$sql = "select * from tb_aluno_projeto where equipe = '2019' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2020'){
		$sql = "select * from tb_aluno_projeto where equipe = '2020' Order By turno desc, nomeAluno desc";
	}
	if ($lista == '2021'){
		$sql = "select * from tb_aluno_projeto where equipe = '2021' Order By turno desc, nomeAluno desc";
	}
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$turma = $linha['anoProjeto'];
		$foto_aluno = '../images/CFH/'.$linha['cgm'].'.JPG'; 	
		$explodeNome = explode(" ",$linha['nomeAluno']);
		$primeiroNome = current($explodeNome);
			if (file_exists($foto_aluno)) {
				if($linha['turno']=='M'){
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'" style="border: 1px solid #00FF00; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['cgm'].'.JPG" height="100" width ="70"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				}else{
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'" style="border: 1px solid #0000FF; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['cgm'].'.JPG" height="100" width ="70"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				}
$_SESSION["secMostraFotos"] = $mostraFotos;
				
			}else{
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/'.$caminho.'" height="100" width ="70"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
			}	
	}
	$_SESSION["mmostraFoto"] = $mostraFotos;
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
					<h2>Equipe '.$_SESSION["lista"].'</h2>
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
			<form method="POST" action="editarAluno.php" onchange="form.submit()"><div align="center">'.$_SESSION["mmostraFoto"].'</div></form>
		</body>
</html>
';
?>