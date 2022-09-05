<?php 
include './conexao.php';
$sql = "select * from tb_alunoMFT where sexo = 'F' and ano = '5' and turma = 'C'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$i++;
	$ID = $linha['ID'];
	$nome = $linha['nomeAluno'];
	$senha = sha1($linha['cgm']);
	$turma = $linha['ano'].$linha['turma'];
	$tabela = $tabela.'<tr><td>'.$ID.'</td><td>'.$turma.'</td><td>'.$nome.'</td><td>'.$senha.'</td></tr>';
	}
echo'
<html>
<head><title>Teste de php</title></head>
<body>
	<div align="center"><div align="center">'.$i.' alunos encontrados..<table border="1">
	<tr><td>ID</td><td>Turma</td><td>Nome</td><td>Senha</td></tr>
	'.$tabela.'
	</table></div>
</body>
</html>
';
?>