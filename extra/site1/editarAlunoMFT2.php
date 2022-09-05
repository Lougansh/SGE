<?php 
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['btnSalvar']) ){
$codigo 				= $_POST['dropCodigo'];
$prof 					= $_POST['prof'];
$anoSerie		 		= $_POST['anoSerie'];
$nomeAluno 				= $_POST['nomeAluno'];
$dataNascimento 		= $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
$sexo 					= $_POST['sexo'];
$rgAluno 				= $_POST['rgAluno'];
$cpfAluno 				= $_POST['cpfAluno'];
$nomePai 				= $_POST['nomePai'];
$nomeMae 				= $_POST['nomeMae'];
$profissaoPai 			= $_POST['profissaoPai'];
$profissaoMae 			= $_POST['profissaoMae'];
$nomeResponsavel 		= $_POST['nomeResponsavel'];
$rgResponsavel 			= $_POST['rgResponsavel'];
$situacao 				= $_POST['situacao'];
$cpfResponsavel 		= $_POST['cpfResponsavel'];
$cidade 				= $_POST['cidade'];
$UF 					= $_POST['UF'];
$tel1 					= $_POST['tel1'];
$tel2					= $_POST['tel2'];
$tel3 					= $_POST['tel3'];
$tel4 					= $_POST['tel4'];
$bairro 				= $_POST['bairro'];
$rua 					= $_POST['rua'];
$nr 					= $_POST['nr'];
$obs 					= $_POST['obs'];
$dataHoje 				= date('Y-m-d');
$cgm					= $_POST['cgm'];
$turma					= $_POST['turma'];
$sql = "update tb_alunoMFT set prof = '$prof', ano = '$anoSerie', nomeAluno = '$nomeAluno', dataNascimento = '$dataNascimento', rgAluno = '$rgAluno', cpfAluno = '$cpfAluno', nomePai = '$nomePai', nomeMae = '$nomeMae', bairro = '$bairro', rua = '$rua', nr = '$nr', tel1 = '$tel1', tel2 = '$tel2', tel3 = '$tel3', tel4 = '$tel4', rgResponsavel = '$rgResponsavel', situacao = '$situacao', profissaoPai = '$profissaoPai', nomeResponsavel = '$nomeResponsavel', cpfResponsavel = '$cpfResponsavel', cidade = '$cidade',UF = '$UF', sexo = '$sexo', profissaoMae = '$profissaoMae', obs = '$obs', cadastro = '$dataHoje', cgm = '$cgm', turma = '$turma'
where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
	$sql = 'select * from tb_alunoMFT Order By situacao, ano, turma, nomeAluno asc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$menu = $menu.'<option value="'.$linha['ID'].'">'.$linha['ano'].$linha['turma'].' - '.ucwords(strtolower(utf8_decode($linha['nomeAluno']))).'</option>';
}
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Atualização de Alunos CFH</title>
		</head>
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<h2>Ficha Individual do Aluno</h2>
					<p align="right">
						<select size="1" name="menu" onchange="form.submit()"><option value=""></option>'.utf8_encode($menu).'</select>
					</p>
				</div>
';
if (isset($_POST['menu'])&& $_POST['menu'] != '') { 
$codigo = $_POST['menu'] ;
$sql = "select * FROM tb_alunoMFT WHERE ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['dataNascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$nomeAlunoDB = utf8_decode($linha['nomeAluno']);
$nomePaiDB = utf8_decode($linha['nomePai']);
$nomeMaeDB = utf8_decode($linha['nomeMae']);
$nomeResposanvelDB = utf8_decode($linha['nomeResponsavel']);
if ($linha['sexo'] 		== 'M') {$Sexo = '<select size="1" name="sexo"><option selected value="'.$linha['sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$Sexo = '<select size="1" name="sexo"><option selected value="'.$linha['sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
echo'
<div align="center"><table border="0" width="1080">
		<tr>
			<td rowspan="13" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../images/CFH/'.$linha['cgm'].'.JPG" height="300">
				<hr width="50%">
			<p>
				<select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select></p>
			<hr width="30%">
				<hr width="10%">
				<br>
				<hr width="10%"><hr width="30%"><hr width="50%">
			</td>
		</tr>
		<tr>	
			<td align="right" width="116" >Aluno: 
			</td>
			<td colspan="2">
				<input type="text" value="'.utf8_encode(ucwords(strtolower($nomeAlunoDB))).'" size="40" name="nomeAluno">&nbsp; 
				Ano: 
				<input type="text" value="'.$linha['ano'].'" size="2" name="anoSerie" style="text-align:center"> 
				Turma: 
				<input style="text-align:center" type="text" value="'.strtoupper($linha['turma']).'" size="2" name="turma"></td>
		</tr>
		<tr>
			<td align="right" width="116" >Prof: 
			</td>
			<td colspan="2">
				<input type="text" value="'.utf8_encode(ucwords(strtolower($linha['prof']))).'" size="40" name="prof">
				CGM: 
				<input style="text-align:center" type="text" value="'.$linha['cgm'].'" size="15" name="cgm">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Nascimento: 
			</td>
			<td colspan="2">
				<input style="text-align:center" type="text" value="'.date('d', strtotime($linha['dataNascimento'])).'" size="3" name="dia">
				<input style="text-align:center" type="text" value="'.date('m', strtotime($linha['dataNascimento'])).'" size="3" name="mes">
				<input style="text-align:center" type="text" value="'.date('Y', strtotime($linha['dataNascimento'])).'" size="3" name="ano"> Situação: 
				<input style="text-align:center" type="text" value="'.ucwords(strtolower($linha['situacao'])).'" size="1" name="situacao">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Idade: 
			</td>
			<td colspan="2">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Sexo: 
			</td>
			<td colspan="2">'.$Sexo.' RG: 
			<input type="text" value="'.$linha['rgAluno'].'" size="18" name="rgAluno" maxlength="9"> CPF: 
				<input type="text" value="'.$linha['cpfAluno'].'" size="19" name="cpfAluno" maxlength="11">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Pai: 
			</td>
			<td colspan="2">
				<input type="text" value="'.utf8_encode(ucwords(strtolower($nomePaiDB))).'" size="40" name="nomePai"> Profissão: 
				<input type="text" value="'.ucwords(strtolower($linha['profissaoPai'])).'" size="20" name="profissaoPai">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Mãe: 
			</td>
			<td colspan="2">
				<input type="text" value="'.utf8_encode(ucwords(strtolower($nomeMaeDB))).'" size="40" name="nomeMae"> Profissão: 
				<input type="text" value="'.ucwords(strtolower($linha['profissaoMae'])).'" size="20" name="profissaoMae">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Responsável:
			</td>
			<td colspan="2">
				<input type="text" value="'.utf8_encode(ucwords(strtolower($nomeResponsavelDB))).'" size="30" name="nomeResponsavel"> RG: 
				<input type="text" value="'.$linha['rgResponsavel'].'" size="15" name="rgResponsavel">
				CPF: 
				<input type="text" value="'.$linha['cpfResponsavel'].'" size="15" name="cpfResponsavel"></td>
		</tr>
		<tr>
			<td align="right" width="116" >Cidade:
			</td>
			<td colspan="2">
				<input type="text" value="'.ucwords(strtolower($linha['cidade'])).'" size="30" name="cidade"> UF <input type="text" value="'.strtoupper($linha['UF']).'" size="2" name="UF"></td>
		</tr>

		<tr>
			<td align="right" width="116" >Contato: 
			</td>
			<td colspan="2">
				<input style="text-align:center" type="text" value="'.$linha['tel1'].'" size="10" name="tel1"> 
				<input style="text-align:center" type="text" value="'.$linha['tel2'].'" size="10" name="tel2">
				<input style="text-align:center" type="text" value="'.$linha['tel3'].'" size="10" name="tel3">
				<input style="text-align:center" type="text" value="'.$linha['tel4'].'" size="10" name="tel4">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Bairro: 
			</td>
			<td colspan="2">
				<input type="text" value="'.ucwords(strtolower($linha['bairro'])).'" size="15" name="bairro"> Rua: 
				<input type="text" value="'.ucwords(strtolower($linha['rua'])).'" size="28" name="rua"> Nº: 
				<input type="text" value="'.$linha['nr'].'" size="4" name="nr" style="text-align:center">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >
				&nbsp;
			</td>
			<td>
				<textarea rows="7" name="obs" cols="70">' .$linha['obs'].'
				</textarea></td>
			<td>
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
';
}

?>