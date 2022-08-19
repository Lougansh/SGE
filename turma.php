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
			<td align="left">'.$obs.'</td>
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
				</div>
				<div align="center" width="90%">
				<table class="turma" border="1">
				<tr>
					<td align="center">ID</td>
					<td align="center">Ano</td>
					<td align="center">Turma</td>
                    <td align="center">Editar</td>
					<td align="center">Observação</td>
				</tr>
				'.$_SESSION["turma"].'
				</table>
				</div>
			</form>
		</body>
	</html>
	';
?>