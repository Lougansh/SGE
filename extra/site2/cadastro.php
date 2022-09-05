<?php
include './conf.php';
menuA();
?>
<div align="center"><h1>Cadastro</h1><form method="POST" action="?id=cadastro"><table border="0" width="660"><tr>
<td width="76" align="right">Matricula	</td><td width="568"><input type="text"	name="dropMatricula" size="10"></td></tr><tr>
<td width="76" align="right">Nome		</td><td width="568"><input type="text"	name="dropNome" size="80"></td></tr><tr>
<td width="76" align="right">Ano		</td><td width="568"><select size="1" 	name="dropAno"><option value="0">PRE</option><option value="1">1º Ano</option><option value="2">2º Ano</option><option value="3">3º Ano</option><option value="4">4º Ano</option><option value="5">5º Ano</option></select></td></tr><tr>
<td width="76" align="right">Turma		</td><td width="568"><select size="1" 	name="dropTurma"><option>A</option><option>B</option><option>C</option><option>D</option></select></td></tr><tr>
<td width="76" align="right">Nascimento	</td><td width="568"><input type="text" name="dataDia" size="1">/<input type="text" name="dataMes" size="1">/<input type="text" name="dataAno" size="1"></td></tr><tr>
<td width="76" align="right">Sexo		</td><td width="568"><select size="1" 	name="dropSexo"><option value="M">Masculino</option><option value="F">Feminino</option></select></td></tr><tr>
<td width="76" align="right">Pai		</td><td width="568"><input type="text" name="dropPai" size="80"></td></tr><tr>
<td width="76" align="right">Mãe		</td><td width="568"><input type="text" name="dropMae" size="80"></td></tr><tr>
<td width="76" align="right">Responsável	</td><td width="568"><input type="text" name="dropResp" size="80"></td></tr><tr>
<td width="76" align="right">Telefone		</td><td width="568"><input type="text" name="dropTel" size="10"></td></tr><tr>
<td width="76" align="right">			</td><td width="568"><input type="submit" value="Cadastrar" name="btnCadastrar"></td></tr></table></form></div><p align="center"><a href="aCadastro.php">Atualização de Cadastro</a></p>
<?php
if (isset($_POST['btnCadastrar']) && $_POST['dropMatricula'] <> '' ){
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
$dataHoje = date('Y-m-d');

include './conexao.php'; 
$sql = "insert into tb_aluno (ID, Nome, Ano, Turma, Nascimento, Sexo, Responsavel, Pai, Mae, Telefone, Situacao, Movimentacao, Tipo) values ($id, '$nome', '$ano', '$turma', '$nascimento', '$sexo', '$responsavel', '$pai', '$mae', '$telefone', '$situacao', '$dataHoje', 'M')"; 
$query = mysql_query($sql); 
if($query){
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro efetuado com sucesso!!!")</SCRIPT>';
}else{
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Erro ao cadastrar!!!")</SCRIPT>';
}
}
?>
