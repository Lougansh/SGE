<?php
session_start("editar");include("conexao.php");include("conf.php");menu();if (isset($_POST['Lista']) && $_POST['Lista'] != ''){$ano = substr($_POST['Lista'],0,1);$turma = substr($_POST['Lista'],1,1);$titulo = $ano.'º Ano '.$turma;$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";$result = mysqli_query($connection, $sql);    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {		$i++;        $cgm = $row['cgm'];        $ano = $row['ano'];        $turma = $row['turma'];		$nome = $row['nome'];		$nascimento = date("d/m/Y", strtotime($row['nascimento']));		$sexo = $row['sexo'];		$situacao = $row['situacaoMatricula'];		$matriculado = date("d/m/Y", strtotime($row['dataMatricula']));		$observacao = $row['observacao'];		$lista = $lista.'
		<tr>
			<td align="center">'.$cgm.'</td>
			<td>'.$nome.'</td>
			<td align="center"><a href="editarDireto.php?cgm='.$cgm.'">Editar</a></td>
			<td align="center"><a href="personalidade.php?cgm='.$cgm.'">Observação</a></td>
			<td align="center"><a href="Direto.php?id='.$cgm.'" target="_blank" rel="noopener noreferrer">Imprimir</a></td>
		</tr>
		';
		$_SESSION["alunos"] = $lista;    }	$turmaQTDE = $titulo.' - '.$i.' alunos';}		echo '	<html>		<head><title> Lista de alunos '.$ano.'º'.$turma.'</title></head>		<body>				<form method="POST" action="?id=Lista" onchange="form.submit()">				<div align="center"><h2>Editar Alunos'.$mostraCaixaSuspensa.'</h2>'.$turmaQTDE.'<hr width="50%"><hr width="70%"></div>				<div align="center">
				<table border="1">
				<tr>
					<td align="center">CGM</td>
					<td align="center">Nome</td>
					<td align="center">Editar</td>
					<td align="center">Observação</td>
					<td align="center">Imprimir</td>
				</tr>
				'.$_SESSION["alunos"].'
				</table>
				</div>			</form>		</body>	</html>	';?>