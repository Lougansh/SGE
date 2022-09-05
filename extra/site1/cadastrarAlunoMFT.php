<?php 
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['btnSalvar']) && $_POST['cgm']!='' && $_POST['nomeAluno']!='' ){
$prof 					= ucwords(strtolower($_POST['prof']));
$anoSerie		 		= $_POST['anoSerie'];
$nomeAluno 				= ucwords(strtolower($_POST['nomeAluno']));
$dataNascimento 		= $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
$sexo 					= $_POST['sexo'];
$rgAluno 				= $_POST['rgAluno'];
$cpfAluno 				= $_POST['cpfAluno'];
$nomePai 				= ucwords(strtolower($_POST['nomePai']));
$nomeMae 				= ucwords(strtolower($_POST['nomeMae']));
$profissaoPai 			= ucwords(strtolower($_POST['profissaoPai']));
$profissaoMae 			= ucwords(strtolower($_POST['profissaoMae']));
$nomeResponsavel 		= ucwords(strtolower($_POST['nomeResponsavel']));
$rgResponsavel 			= $_POST['rgResponsavel'];
$cpfResponsavel 		= $_POST['cpfResponsavel'];
$cidade 				= ucwords(strtolower($_POST['cidade']));
$UF 					= $_POST['UF'];
$tel1 					= $_POST['tel1'];
$tel2					= $_POST['tel2'];
$tel3 					= $_POST['tel3'];
$tel4 					= $_POST['tel4'];
$bairro 				= ucwords(strtolower($_POST['bairro']));
$rua 					= ucwords(strtolower($_POST['rua']));
$nr 					= $_POST['nr'];
$obs 					= $_POST['obs'];
$dataHoje 				= date('Y-m-d');
$cgm					= $_POST['cgm'];
$turma					= $_POST['turma'];
$sql = "insert into tb_alunoMFT (ID, ano, nomeAluno, dataNascimento, rgAluno, cpfAluno, nomePai, nomeMae, bairro, rua, nr, tel1, tel2, tel3, tel4, rgResponsavel, situacao, profissaoPai, nomeResponsavel, cpfResponsavel, cidade, UF, sexo, profissaoMae, obs, cadastro, cgm, turma)values('$cgm', '$anoSerie', '$nomeAluno', '$dataNascimento', '$rgAluno', '$cpfAluno', '$nomePai', '$nomeMae', '$bairro', '$rua', '$nr', '$tel1', '$tel2', '$tel3', '$tel4', '$rgResponsavel', 'A', '$profissaoPai', '$nomeResponsavel', '$cpfResponsavel', '$cidade','$UF', '$sexo', '$profissaoMae', '$obs', '$dataHoje', '$cgm', '$turma')";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Cadastro de alunos MFT</title>
		</head>
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<h2>Cadastro de Alunos</h2>
					<div align="right">
						&nbsp;</div>
				</div>
<div align="center"><table border="0" width="1080">
		<tr>
			<td rowspan="12" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../upload/logoMFT.jpg">
				<hr width="50%">
			<hr width="30%">
				<hr width="10%">
			</td>
		</tr>
		<tr>	
			<td align="right" width="116" >Aluno: 
			</td>
			<td>
				<input type="text" size="40" name="nomeAluno">&nbsp; 
				Ano: 
				<input type="text" size="2" name="anoSerie" style="text-align:center"> 
				Turma: 
				<input style="text-align:center" type="text" size="2" name="turma"></td>
		</tr>
		<tr>
			<td align="right" width="116" >Prof: 
			</td>
			<td>
				<input type="text" size="40" name="prof">
				CGM: 
				<input style="text-align:center" type="text" size="15" name="cgm">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Nascimento: 
			</td>
			<td>
				<input style="text-align:center" type="text" size="3" name="dia">
				<input style="text-align:center" type="text" size="3" name="mes">
				<input style="text-align:center" type="text" size="3" name="ano"> 
			</td>
		</tr>
		<tr>
			<td align="right" width="116" style="text-align:center">Sexo: 
			</td>
			<td> 
			<input type="text" size="1" name="sexo" maxlength="1"> RG: 
			<input type="text" size="18" name="rgAluno" maxlength="9"> CPF: 
				<input type="text" size="19" name="cpfAluno" maxlength="11">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Pai: 
			</td>
			<td>
				<input type="text" size="40" name="nomePai"> Profissão: 
				<input type="text" size="20" name="profissaoPai">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Mãe: 
			</td>
			<td>
				<input type="text" size="40" name="nomeMae"> Profissão: 
				<input type="text" size="20" name="profissaoMae">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Responsável:
			</td>
			<td>
				<input type="text" size="30" name="nomeResponsavel"> RG: 
				<input type="text" size="15" name="rgResponsavel">
				CPF: 
				<input type="text" size="15" name="cpfResponsavel"></td>
		</tr>
		<tr>
			<td align="right" width="116" >Cidade:
			</td>
			<td>
				<input type="text" size="30" name="cidade"> UF 
				<input type="text" size="2" name="UF"></td>
		</tr>

		<tr>
			<td align="right" width="116" >Contato: 
			</td>
			<td>
				<input style="text-align:center" type="text" size="10" name="tel1"> 
				<input style="text-align:center" type="text" size="10" name="tel2">
				<input style="text-align:center" type="text" size="10" name="tel3">
				<input style="text-align:center" type="text" size="10" name="tel4">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Bairro: 
			</td>
			<td>
				<input type="text" size="15" name="bairro"> Rua: 
				<input type="text" size="28" name="rua"> Nº: 
				<input type="text" size="4" name="nr" style="text-align:center">
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" valign="top" >
				&nbsp;
				<button value="Salvar" name="btnSalvar" title="Click aqui para salvar">
					<img src="../images/btnSalvar.jpg" width="80" height="80">
				</button>
			</td>
		</tr>
	</table>
</div>
</form>
</body>
</html>