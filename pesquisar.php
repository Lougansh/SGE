<?php 
include './conexao.php';
include './conf.php';
menu();
if (isset($_POST['pesquisar'])&& $_POST['textPesquisa'] != '') { 
$pesquisaAluno = $_POST['textPesquisa'] ;
	$sql = "select * from tb_aluno where nome like '%$pesquisaAluno%' Order By cgm desc";
   	$result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $cgm = $row['cgm'];
		$foto_aluno = './img/aluno/'.$row['cgm'].'.JPG'; 	
		$explodeNome = explode(" ",$row['nome']);
		$primeiroNome = current($explodeNome);
			if (file_exists($foto_aluno)) {
				$mostraFotos = '<a href="editarDireto.php?cgm='.$cgm.'"><img style="margin: 0px; padding: 0px" src="./img/aluno/'.$row['cgm'].'.JPG" height="100" title="'.$row['nome'].'"></a>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
			}	
	}
}
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head><title>Pesquisa de Alunos CFH</title></head>
		<meta charset="utf-8">
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<h2>Pesquisar Alunos</h2>
					<input type="text" value="" size="10" name="textPesquisa"><input type="submit" value="Pesquisar" name="pesquisar">
				</div>
			</form>
			<form method="POST" action="editarAluno.php" onchange="form.submit()"><div align="center">'.$mostraFotos.'</div></form>
		</body>
</html>
';
?>