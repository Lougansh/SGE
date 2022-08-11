<?php
session_start();
include("conexao.php");
include("conf.php");
menu();
$sql = "select * from tb_turma where status = 'A' order by ano, turma";
$result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	  $i++;
      $id = $row['ID'];
      $ano = $row['ano'];
      $turma = $row['turma'];
      $status = $row['status'];
	  $obs = $row['obs'];
	  $lista = $lista.'
		<tr>
			<td align="center">'.$i.'</td>
			<td align="center">'.$ano.'</td>
			<td align="center">'.$turma.'</td>
            <td align="center"><a href="editarTurma.php?ID='.$id.'">Editar</a></td>
		</tr>
		';
		$_SESSION["turma"] = $lista;

    }
	$turmaQTDE = $titulo.' - '.$i.' alunos';
	echo '
	<html>
		<head><title> Lista de alunos '.$ano.'º'.$turma.'</title></head>
		<body>	
			<form method="POST" action="?id=Lista" onchange="form.submit()">
				<div align="center"><h2>Editar Turma</h2>
				<hr width="50%">
				<a href="editarPlanejamento.php?ano=0">Infantil V</a>
				<a href="editarPlanejamento.php?ano=1">1º Ano</a>
				<a href="editarPlanejamento.php?ano=2">2º Ano</a>
				<a href="editarPlanejamento.php?ano=3">3º Ano</a>
				<a href="editarPlanejamento.php?ano=4">4º Ano</a>
				<a href="editarPlanejamento.php?ano=5">5º Ano</a>
				<hr width="70%"></div>
				<div align="center" width="50%">
				<table class="turma" border="1">
				<tr>
					<td align="center">ID</td>
					<td align="center">Ano</td>
					<td align="center">Turma</td>
                    <td align="center">Editar</td>
				</tr>
				'.$_SESSION["turma"].'
				</table>
				</div>
			</form>
		</body>
	</html>
	';
?>