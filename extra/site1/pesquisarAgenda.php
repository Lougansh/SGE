<?php 
include './conexao.php';
include './conf.php';
nexus();
if (isset($_POST['pesquisar'])&& $_POST['textPesquisa'] != '') { 
$modelo = $_POST['textPesquisa'] ;
	$sql = "select * from tb_agendaNF where modelo like '%$modelo%' Order By modelo desc";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$ID = $linha['ID'];
		$modelo = ucwords(strtolower($linha['modelo']));
		$dataNascimento = $linha['dataNascimento'];
		$tipo = ucwords(strtolower($linha['tipo']));
		$local = ucwords(strtolower($linha['local']));
		$dataTrabalho = $linha['dataTrabalho'];
		$horario = $linha['horario'];
		$responsavel = ucwords(strtolower($linha['resposanvel']));
		$rg = $linha['rg'];
		$cpf = $linha['cpf'];
		$email = strtolower($linha['email']);
		$telefone = $linha['telefone'];
		$dia = date('d', strtotime($linha['dataNascimento']));
		$mes = date('m', strtotime($linha['dataNascimento']));
		$ano = date('Y', strtotime($linha['dataNascimento']));
		$diaTrabalho = date('d', strtotime($linha['dataTrabalho']));
		$mesTrabalho = date('m', strtotime($linha['dataTrabalho']));
		$anoTrabalho = date('Y', strtotime($linha['dataTrabalho']));
		$date = new DateTime( $linha['dataNascimento'] );
		$interval = $date->diff( new DateTime( date() ) );
		$foto_modelo = '../images/CFH/'.$linha['cgm'].'.JPG'; 	
		$explodeNome = explode(" ",$linha['modelo']);
		$primeiroNome = current($explodeNome);
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="pessoa" title="'.$linha['modelo'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['ID'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;	
	}
}
mysql_free_result($query);
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Pesquisar Modelos</title>
		</head>
		<meta charset="utf-8">
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<h2>Modelos Pesquisar Modelos</h2>
					<input type="text" value="" size="10" name="textPesquisa"><input type="submit" value="Pesquisar" name="pesquisar">
				</div>
			</form>
			<form method="POST" action="editarAgenda.php" onchange="form.submit()"><div align="center">'.$mostraFotos.'</div></form>
		</body>
</html>
';
?>