<?php
session_start();
if($ano=='L') {
}else{
	$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";
}
		<tr>
			<td align="center">'.$cgm.'</td>
			<td align="center">'.$ano.'</td>
			<td align="center">'.$turma.'</td>
			<td>'.$nome.'</td>
			<td align="center"><a href="editarDireto.php?cgm='.$cgm.'">Editar</a></td>
			<td align="center"><a href="info.php?cgm='.$cgm.'">Informações</a></td>
			<td align="center"><a href="Direto.php?id='.$cgm.'" target="_blank" rel="noopener noreferrer">Imprimir</a></td>
		</tr>
		';
		$_SESSION["alunos"] = $lista;
				<table border="1">
				<tr>
					<td align="center">CGM</td>
					<td align="center">Ano</td>
					<td align="center">Turma</td>
					<td align="center">Nome</td>
					<td align="center">Editar</td>
					<td align="center">Observação</td>
					<td align="center">Imprimir</td>
				</tr>
				'.$_SESSION["alunos"].'
				</table>
				</div>