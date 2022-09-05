<?php
include './conexao.php';
include './conf.php';
menuA();
if (isset($_POST['pesquisa']) || ($_POST['aluno'] != '') ) {
$textID = $_POST['aluno'];
echo $textID;
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ID = $textID";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
/*
$date = new DateTime( $linha['Nascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$$_SESSION["movimentacao"] = $linha['Situacao'];
*/

//
$ID	= $linha['ID'];
$nome	= $linha['Nome'];
$ano	= $linha['Ano'];
$turma	= $linha['Turma'];
$ndia = date('d', strtotime("+0 days",strtotime($linha['Nascimento'])));
$nmes = date('m', strtotime("+0 days",strtotime($linha['Nascimento'])));
$nano = date('Y', strtotime("+0 days",strtotime($linha['Nascimento'])));
$sexo	= $linha['Sexo'];
$obs	= $linha['Obs'];
$obsReforco	= $linha['ObsReforco'];
$msg	= $linha['msg'];
$grupo	= $linha['Grupo'];
$ponto	= $linha['Ponto'];
$avaliacao	= $linha['Avaliacao'];
$responsavel	= $linha['Responsavel'];
$pai	= $linha['Pai'];
$mae	= $linha['Mae'];
$telefone	= $linha['Telefone'];
$situacao	= $linha['Situacao'];
$prof	= $linha['Prof'];
$dificuldade	= $linha['Dificuldade'];
$fotografia	= $linha['Fotografia'];
$programacao	= $linha['Programacao'];
$leitura	= $linha['Leitura'];
$escrita	= $linha['Escrita'];
$numerais	= $linha['Numerais'];
$operacoes	= $linha['Operacoes'];
$relacionamento	= $linha['Relacionamento'];
$mdia = date('d', strtotime("+0 days",strtotime($linha['Movimentacao'])));
$mmes = date('m', strtotime("+0 days",strtotime($linha['Movimentacao'])));
$mano = date('Y', strtotime("+0 days",strtotime($linha['Movimentacao'])));
$tipo	= $linha['Tipo'];
$preConselho	= $linha['preConselho'];
$profissaoPai	= $linha['profissaoPai'];
$profissaoMae	= $linha['profissaoMae'];
$profissaoResponsavel	= $linha['profissaoResponsavel'];
$professor	= $linha['Professor'];
$sala	= $linha['Sala'];
$turno	= $linha['Turno'];
$matr	= $linha['Matr'];

if ($sexo 		== 'M') {$sexo = '<select size="1" name="sexo"><option selected value="'.$sexo.'">Masculino</option><option value="F">Feminino</option></select>';}else{$sexo = '<select size="1" name="sexo"><option selected value="'.$sexo.'">Feminino</option><option value="M">Masculino</option></select>';}
if ($dificuldade	== 'S') {$dificuldade = '<select size="1" name="dificuldade"><option selected value="'.$dificuldade.'">Masculino</option><option value="F">Feminino</option></select>';}else{$dificuldade = '<select size="1" name="dificuldade"><option selected value="'.$dificuldade.'">Feminino</option><option value="M">Masculino</option></select>';}
//if ($linha['Fotografia']	== 'S') {$fotografia='<input type="checkbox" name="chkFotografia" checked>';} else {$fotografia='<input type="checkbox" name="chkFotografia">';}
//if ($linha['Programacao']	== 'S') {$programacao='<input type="checkbox" name="chkProgramacao" checked>';} else {$programacao='<input type="checkbox" name="chkProgramacao">';}
//if ($linha['Leitura']		== 'S') {$leitura='<input type="checkbox" name="chkLeitura" checked>';} else {$leitura='<input type="checkbox" name="chkLeitura">';}
//if ($linha['Escrita']		== 'S') {$escrita='<input type="checkbox" name="chkEscrita" checked>';} else {$escrita='<input type="checkbox" name="chkEscrita">';}
//if ($linha['Numerais']		== 'S') {$numerais='<input type="checkbox" name="chkNumerais" checked>';} else {$numerais='<input type="checkbox" name="chkNumerais">';}
//if ($linha['Operacoes']		== 'S') {$operacoes='<input type="checkbox" name="chkOperacoes" checked>';} else {$operacoes='<input type="checkbox" name="chkOperacoes">';}
//if ($linha['Relacionamento']	== 'B') {$relacionamento=  '<input type="radio" value="B" checked name="chkRelacionamento">Bom<input type="radio" value="R" name="chkRelacionamento">Ruim';} else {$relacionamento='<input type="radio" value="B" name="chkRelacionamento">Bom<input type="radio" value="R" checked name="chkRelacionamento">Ruim';}
//if ($linha['preConselho']		== 'S') {$preConselhoAluno='<input type="radio" value="S" checked name="chkPreConselho">SIM   <input type="radio" value="N" name="chkPreConselho">NAO';} else {$preConselhoAluno=  '<input type="radio" value="S" name="chkPreConselho">SIM<input type="radio" value="N" checked name="chkPreConselho">NAO';}
//if ($linha['Turma']			== 'A') {$mTurma = '<select size="1" name="dropTurma"><option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="B">B</option><option value="C">C</option></select>';}else if ($linha['Turma']== 'B') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="C">C</option></select>';}else if ($linha['Turma']== 'C') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option></select>';}
//if ($linha['Avaliacao']		== 'Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Nao Apropriou">Nao Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else if ($linha['Avaliacao']== 'Nao Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option><option value="Nao Apropriou">Nao Apropriou</option></select>';}
//if ($linha['Situacao']		== 'A') {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="A">Matriculado</option><option value="T">Transferido</option></select>';}else {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="T">Transferido</option><option value="A">Matriculado</option></select>';}
}
echo'
<html>

<head>
<title>EditarDados</title>
</head>

<body>

</body>
<form method="POST" action="editar.php">
	
	<table border="0" width="100%">
		<tr>
			<td width="33%">&nbsp;</td>
			<td width="33%"><p align="center"><font size="5">Sistema de edição de dados</font></p></td>
			<td width="33%">
			<p align="right"><input type="text" name="aluno" size="20"><input type="submit" value="Pesquisar" name="pesquisar"></td>
		</tr>
	</table>
	<table border="0">
		<tr>
			<td align="right" width="7%">ID</td>
			<td width="13%">
			<input type="text" name="ID" size="20" value="'.$ID.'"></td>
			<td align="right" width="3%">Nome</td>
			<td colspan="2">
			<input type="text" name="nome" size="50" value="'.$nome.'"></td>
			<td align="right" width="7%">&nbsp;</td>
			<td width="33%" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="right" width="7%">Ano</td>
			<td width="13%"><select size="1" name="ano">
			<option>'.$ano.'</option>
			</select></td>
			<td align="right" width="3%">Turma</td>
			<td colspan="2"><select size="1" name="turma">
			<option>'.$turma.'</option>
			</select></td>
			<td align="right" width="7%">Professora</td>
			<td width="33%" colspan="3">
			<input type="text" name="professora" size="50" value="'.$professor.'"></td>
		</tr>
		<tr>
			<td align="right" width="7%">Nascimento</td>
			<td width="13%"><input type="text" name="dia" size="2" value="'.$ndia.'"> /
			<input type="text" name="mes" size="2" value="'.$nmes.'"> /
			<input type="text" name="ano2" size="4" value="'.$nano.'"></td>
			<td align="right" width="3%">Sexo</td>
			<td colspan="6">'.$sexo.'</td>
		</tr>
		<tr>
			<td align="right" width="7%">Telefone</td>
			<td width="13%"><input type="text" name="telefone" size="20" value="'.$telefone.'"></td>
			<td align="right" colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="right">Obs</td>
			<td colspan="2"><textarea rows="10" name="obs" cols="45">'.$obs.'</textarea></td>
			<td align="right" width="7%">Obs Reforço</td>
			<td width="33%" colspan="3">
			<textarea rows="10" name="obsReforco" cols="45">'.$obsReforco.'</textarea></td>
		</tr>
		<tr>
			<td align="right" width="7%">Situação</td>
			<td colspan="2"><select size="1" name="situacao">
			<option>'.$situacao.'</option>
			</select></td>
			<td>
			<p align="right">Avaliação</td>
			<td>
			<select size="1" name="avaliacao">
			<option>'.$avaliacao.'</option>
			</select></td>
			<td align="left" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td align="right" width="7%">Grupo</td>
			<td colspan="2"><select size="1" name="grupos">
			<option>'.$grupo.'</option>
			</select></td>
			<td>
			<p align="right">Pontos</td>
			<td>
			<input type="text" name="pontos" size="5" value="'.$ponto.'"></td>
			<td align="left" colspan="4">
			&nbsp;</td>
		</tr>
		<tr>
			<td align="right" width="7%">PréConselho</td>
			<td colspan="2"><select size="1" name="preConselho">
			<option>'.$preConselho.'</option>
			</select></td>
			<td colspan="2">&nbsp;</td>
			<td align="left" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td align="right" width="7%">Pai</td>
			<td colspan="2">
			<input type="text" name="pai" size="40" value="'.$pai.'"></td>
			<td width="9%">
			<p align="right">Mãe</td>
			<td width="25%">
			<input type="text" name="mae" size="40" value="'.$mae.'"></td>
			<td align="left" width="7%">
			<p align="right">Responsável</td>
			<td align="left" width="33%" colspan="3">
			<input type="text" name="responsavel" size="40" value="'.$responsavel.'"></td>
		</tr>
		<tr>
			<td align="right" width="7%">Profissão</td>
			<td colspan="2">
			<input type="text" name="profissaoPai" size="40" value="'.$profissaoPai.'"></td>
			<td width="9%">
			<p align="right">Profissão</td>
			<td width="25%">
			<input type="text" name="profissaoMae" size="40" value="'.$profissaoMae.'"></td>
			<td align="left" width="7%">
			<p align="right">Profissão</td>
			<td align="left" width="33%" colspan="3">
			<input type="text" name="profissaoResponsavel" size="40" value="'.$profissaoResponsavel.'"></td>
		</tr>
		<tr>
			<td align="right" width="7%">Dificuldade</td>
			<td colspan="2"><select size="1" name="dificuldade">
			<option>'.$dificuldade.'</option>
			</select></td>
			<td width="9%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
			<td align="left" width="7%">&nbsp;</td>
			<td align="left" width="33%" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="right" width="7%">Leitura</td>
			<td colspan="2"><select size="1" name="leitura">
			<option>'.$leitura.'</option>
			</select></td>
			<td width="9%">
			<p align="right">Escrita</td>
			<td width="25%"><select size="1" name="escrita">
			<option>'.$escrita.'</option>
			</select></td>
			<td align="left" width="7%">
			<p align="right">Numerais</td>
			<td align="left" width="15%"><select size="1" name="numerais">
			<option>'.$numerais.'</option>
			</select></td>
			<td align="left" width="5%">
			<p align="right">Operações</td>
			<td align="left" width="11%"><select size="1" name="operacoes">
			<option>'.$operacoes.'</option>
			</select></td>
		</tr>
		<tr>
			<td align="right" width="7%">Fotografia</td>
			<td colspan="2"><select size="1" name="fotografia">
			<option>'.$fotografia.'</option>
			</select></td>
			<td width="9%">
			<p align="right">Programação</td>
			<td width="25%"><select size="1" name="programacao">
			<option>'.$programacao.'</option>
			</select></td>
			<td align="left" width="7%">&nbsp;</td>
			<td align="left" width="15%">&nbsp;</td>
			<td align="left" width="5%">&nbsp;</td>
			<td align="left" width="11%">&nbsp;</td>
		</tr>
		<tr>
			<td align="right" width="7%">Relacionamento</td>
			<td colspan="2"><select size="1" name="relacionamento">
			<option>'.$relacionamento.'</option>
			</select></td>
			<td width="9%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
			<td align="left" width="7%">
			<p align="right">Movimentação</td>
			<td align="left" width="15%">
			<input type="text" name="mDia" size="2" value="'.$mdia.'"> /
			<input type="text" name="mMes" size="2" value="'.$mmes.'"> /
			<input type="text" name="mAno" size="4" value="'.$mano.'"></td>
			<td align="left" width="5%">
			<p align="right">Tipo</td>
			<td align="left" width="11%"><select size="1" name="tipo">
			<option>'.$tipo.'</option>
			</select></td>
		</tr>
	</table>
	<p align="center"><input type="submit" value="Enviar" name="enviar"></p>
</form>
</html>';
?>