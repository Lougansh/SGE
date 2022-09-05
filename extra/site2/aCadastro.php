<?php
include './conexao.php';
include './conf.php';
menuA();
if (isset($_POST['btnPesquisar']) && $_POST['dropMatricula'] <> '' ){
$matricula = $_POST['dropMatricula'];
$sql = "SELECT * from tb_aluno where ID = $matricula";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$ID = $linha[ID];
$nome = $linha[Nome];
$nascimento = $linha[Nascimento];
$dataDia = substr($nascimento,8,2);
$dataMes = substr($nascimento,5,2);
$dataAno = substr($nascimento,0,4);
$ano = $linha[Ano];
$turma = $linha[Turma];
$nascimento = $linha[Nascimento];
$sexo = $linha[Sexo];
$obs = $linha[Obs];
$obsReforco = $linha[ObsReforco];
$msg = $linha[msg];
$grupo = $linha[Grupo];
$ponto = $linha[Ponto];
$avaliacao = $linha[Avaliacao];
$responsavel = $linha[Responsavel];
$pai = $linha[Pai];
$mae = $linha[Mae];
$telefone = $linha[Telefone];
$situacao = $linha[Situacao];
$prof = $linha[Prof];
$dificuldade = $linha[Dificuldade];
$fotografia = $linha[Fotografia];
$programacao = $linha[Programacao];
$leitura = $linha[Leitura];
$escrita = $linha[Escrita];
$numerais = $linha[Numerais];
$operacoes = $linha[Operacoes];
$relacionamento = $linha[Relacionamento];
$movimentacao = $linha[Movimentacao];
$tipo = $linha[Tipo];
$preConselho = $linha[preConselho];
$profisaoPai = $linha[profissaoPai];
$profissaoMae = $linha[profissaoMae];
$profissaoresponsavel = $linha[profissaoResponsavel];
mysql_free_result($query);
}
}
if ($sexo ='F'){
$sexo = 'Feminino';
}
if ($sexo ='M'){
$sexo = 'Masculino';
}
echo '
<div align="center"><h1>Atualização de Cadastro</h1><form method="POST" action="?ID=atualizaCadastro"><table border="0" width="660"><tr>
<td width="76" align="right">Matricula</td><td width="568"><input type="text"name="dropMatricula" size="10" value="'.$ID.'"><input type="submit" value="Pesquisar" name="btnPesquisar"></td></tr><tr>
<td width="76" align="right">Nome</td><td width="568">
	<input type="text"name="dropNome" size="80" value="'.$nome.'"></td></tr><tr>
<td width="76" align="right">Ano</td><td width="568"><select size="1" name="dropAno">
	<option>'.$ano.'</option><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>10</option></select></td></tr><tr>
<td width="76" align="right">Turma</td><td width="568"><select size="1" name="dropTurma">
	<option>'.$turma.'</option><option>A</option><option>B</option><option>C</option><option>D</option></select></td></tr><tr>
<td width="76" align="right">Nascimento</td><td width="568">
	<input type="text" name="dataDia" size="1" value="'.$dataDia.'">/<input type="text" name="dataMes" size="1" value="'.$dataMes.'">/<input type="text" name="dataAno" size="1" value="'.$dataAno.'"></td></tr><tr>
<td width="76" align="right">Sexo</td><td width="568"><select size="1" name="dropSexo">
	<option>'.$sexo.'</option><option value="M">Masculino</option><option value="F">Feminino</option></select></td></tr><tr>
<td width="76" align="right">Pai</td><td width="568">
	<input type="text" name="dropPai" size="80" value="'.$pai.'"></td></tr><tr>
<td width="76" align="right">Mãe</td><td width="568">
	<input type="text" name="dropMae" size="80" value="'.$mae.'"></td></tr><tr>
<td width="76" align="right">Responsável</td><td width="568">
	<input type="text" name="dropResp" size="80" value="'.$responsavel.'"></td></tr><tr>
<td width="76" align="right">Telefone</td><td width="568">
	<input type="text" name="dropTel" size="10" value="'.$telefone.'"></td></tr><tr>
<td width="76" align="right">Situação</td><td width="568">
	<input type="text" name="dropTel0" size="10" value="'.$situacao.'"></td></tr><tr>
<td width="644" align="right" colspan="2">
<p align="center">
	<input type="submit" value="Atualizar" name="btnAtualizar"></td></tr></table></form></div>
';
if (isset($_POST['btnAtualizar']) && $_POST['dropMatricula'] <> '' ){
$id = 			$_POST['dropMatricula'];
$nome = 	strtoupper($_POST['dropNome']);
$ano = 			$_POST['dropAno'];
$turma = 		$_POST['dropTurma'];
$dataAno = 		$_POST['dataAno'];
$dataMes = 		$_POST['dataMes'];
$dataDia = 		$_POST['dataDia'];
$nascimento = 		$dataAno.'-'.$dataMes.'-'.$dataDia;
$sexo = 		$_POST['dropSexo'];
$pai = 			strtoupper($_POST['dropPai']);
$mae = 			strtoupper($_POST['dropMae']);
$responsavel = 	strtoupper($_POST['dropResp']);
$telefone = 	$_POST['dropTel'];
$situacao = 	'A';
//----------------------------------------------------
$sql = "update tb_aluno set ID = $id, Nome = '$nome', Ano = $ano, Turma = '$turma', Nascimento = '$nascimento', Sexo = '$sexo', Responsavel = '$responsavel', Pai = '$pai', Mae = '$mae', Telefone = '$telefone', Situacao = '$situacao' where ID = $id"; 
$query = mysql_query($sql); 
if($query){
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro atualizado com sucesso!!!")</SCRIPT>';
}else{
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Erro ao atualizar!!!")</SCRIPT>';
}
}
?>