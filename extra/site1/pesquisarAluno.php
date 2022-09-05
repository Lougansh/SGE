<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
if (isset($_POST['pesquisar'])&& $_POST['textPesquisa'] != '') { 
$pesquisaAluno = $_POST['textPesquisa'] ;
	$sql = "select * from tb_aluno_projeto where nomeAluno like '%$pesquisaAluno%' Order By ID desc";
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
			<title>Pesquisa de Alunos CFH</title>
		</head>
		<meta charset="utf-8">
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<h2>CONSTRUINDO O FUTURO HOJE</h2>
					<input type="text" value="" size="10" name="textPesquisa"><input type="submit" value="Pesquisar" name="pesquisar">
				</div>
			</form>
			<form method="POST" action="editarAluno.php" onchange="form.submit()"><div align="center">'.$mostraFotos.'</div></form>
		</body>
</html>
';
?>