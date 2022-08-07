<?php 
session_start("editar");
include './conexao.php';
include './conf.php';
menu();
//----------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['btnSalvar']) && $_POST['textCGM'] != ''){		$cgm = $_POST['textCGM'];      $ano = $_POST['textAno'];      $turma = $_POST['textTurma'];		$nome = $_POST['textNome'];		$nascimento = $_POST['textAnoNascimento'].'-'.$_POST['textMesNascimento'].'-'.$_POST['textDiaNascimento'];		$sexo = $_POST['textSexo'];		$situacao = $_POST['textSituacaoMatricula'];		$matriculado = $_POST['textAnoMatricula'].'-'.$_POST['textMesMatricula'].'-'.$_POST['textDiaMatricula'];		$observacao = $_POST['textObservacao'];$sql = "update tb_aluno set cgm='$cgm', ano='$ano',turma='$turma',nome='$nome',nascimento='$nascimento',sexo='$sexo',situacaoMatricula='$situacao',dataMatricula='$matriculado',observacao='$observacao' where cgm = '$cgm'"; $result = mysqli_query($connection, $sql);
if($result){echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Atualizado com sucesso!!!")
			window.location="listar.php"	
		</SCRIPT>
	';}
}
//----------------------------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['cgm'])){
		$aluno = $_GET['cgm'];		
		$sql = "select * from tb_aluno where cgm = $aluno";
		$result = mysqli_query($connection, $sql);   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {			$i++;      	$cgm = $row['cgm'];      	$ano = $row['ano'];      	$turma = $row['turma'];			$nome = $row['nome'];			$diaNascimento = date("d", strtotime($row['nascimento']));
			$mesNascimento = date("m", strtotime($row['nascimento']));
			$anoNascimento = date("Y", strtotime($row['nascimento']));			$sexo = $row['sexo'];			$situacao = $row['situacaoMatricula'];
			$diaMatricula = date("d", strtotime($row['dataMatricula']));
			$mesMatricula = date("m", strtotime($row['dataMatricula']));
			$anoMatricula = date("Y", strtotime($row['dataMatricula']));			$observacao = $row['observacao'];
		}
	}
echo
	'<html>	<head>	<title>Cadastro de aluno</title>	</head>	<body>		<div align="center"><h2>Cadastro de Aluno</h2><hr width="50%"><hr width="70%"></div>			<form method="POST" action="?id=18" onchange="form.submit()">				<div align="center">					<br><table border="0">						<tr>							<td rowspan="7" align="center" width="315"><hr width="10%"><hr width="30%"><hr width="50%">								<img src="../upload/logoMFT.jpg">								<hr width="50%">								<hr width="30%">								<hr width="10%">							</td>						</tr>						<tr>								<td align="right" width="116" >CGM: 							</td>							<td>								<input style="text-align:center" type="text" size="10" name="textCGM" value="'.$cgm.'"> Ano:								<input style="text-align:center" type="text" size="1" name="textAno" value="'.$ano.'"> Turma: 								<input style="text-align:center" type="text" size="1" name="textTurma" value="'.$turma.'">							</td>						</tr>						<tr>							<td align="right" width="116" >Aluno: 							</td>							<td>								<input type="text" size="50" name="textNome" value="'.$nome.'">							</td>						</tr>						<tr>							<td align="right" width="116" >Nascimento: 							</td>							<td>								<input style="text-align:center" type="text" size="1" name="textDiaNascimento" value="'.$diaNascimento.'">								<input style="text-align:center" type="text" size="1" name="textMesNascimento" value="'.$mesNascimento.'">								<input style="text-align:center" type="text" size="3" name="textAnoNascimento" value="'.$anoNascimento.'"> 							</td>						</tr>						<tr>							<td align="right" width="116" style="text-align:center">								<p style="text-align: right">Sexo: 							</td>							<td> 								<input style="text-align:center" type="text" size="1" name="textSexo" maxlength="1" value="'.$sexo.'"> Situação da Matricula: 								<input style="text-align:center" type="text" size="1" name="textSituacaoMatricula" maxlength="1" value="'.$situacao.'"> Data da Matricula: 								<input style="text-align:center" type="text" size="1" name="textDiaMatricula" value="'.$diaMatricula.'">								<input style="text-align:center" type="text" size="1" name="textMesMatricula" value="'.$mesMatricula.'">								<input style="text-align:center" type="text" size="3" name="textAnoMatricula" value="'.$anoMatricula.'"> 							</td>						</tr>						<tr>							<td align="right" width="116" >Observações:</td>							<td>								<textarea rows="10" name="textObservacao" cols="50">'.$observacao.'</textarea>							</td>						</tr>						<tr>							<td align="center" valign="top" >								&nbsp;</td>							<td valign="top">								<input type="submit" value="Salvar" name="btnSalvar"</center></td>						</tr>					</table>					</div>		</form>	</body></html>
';
}
?>