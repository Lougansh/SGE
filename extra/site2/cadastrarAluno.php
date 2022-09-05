<?php
include './conexao.php';
include './conf.php';
alunosProjeto();
if (isset($_POST['btnSalvar']) ){
$local 								= ucwords(strtolower($_POST['local']));
$anoProjeto 						= $_POST['anoProjeto'];
$nomeAluno 							= ucwords(strtolower($_POST['nomeAluno']));
$dataNascimento 					= $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
$sexo 								= $_POST['sexo'];
$rgAluno 							= $_POST['rgAluno'];
$cpfAluno 							= $_POST['cpfAluno'];
$nomePai 							= ucwords(strtolower($_POST['nomePai']));
$nomeMae 							= ucwords(strtolower($_POST['nomeMae']));
$profissaoPai 						= ucwords(strtolower($_POST['profissaoPai']));
$profissaoMae 						= ucwords(strtolower($_POST['profissaoMae']));
$nomeResponsavel 					= ucwords(strtolower($_POST['nomeResponsavel']));
$rgResponsavel 						= $_POST['rgResponsavel'];
$escolaridade 						= ucwords(strtolower($_POST['escolaridade']));
$cpfResponsavel 					= $_POST['cpfResponsavel'];
$emailResponsavel 					= strtolower($_POST['emailResponsavel']);
$tel1 								= $_POST['tel1'];
$tel2								= $_POST['tel2'];
$tel3 								= $_POST['tel3'];
$tel4 								= $_POST['tel4'];
$bairro 							= ucwords(strtolower($_POST['bairro']));
$rua 								= ucwords(strtolower($_POST['rua']));
$nr 								= $_POST['nr'];
$obs 								= $_POST['obs'];
$dataHoje 							= date('Y-m-d');
$cgm								= $_POST['cgm'];
$sql = "insert into tb_aluno_projeto (
local,				
anoProjeto,			
nomeAluno,			
dataNascimento,		
rgAluno,			
cpfAluno,			
nomePai,			
nomeMae,			
bairro,				
rua,				
nr,					
tel1,				
tel2,				
tel3,				
tel4,				
rgResponsavel,		
escolaridade,		
profissaoPai,		
nomeResponsavel,	
cpfResponsavel,		
emailResponsavel,	
sexo,				
profissaoMae,		
obs,				
cadastro,
cgm
) values (
'$local',						
'$anoProjeto',						
'$nomeAluno',						
'$dataNascimento',						
'$rgAluno',						
'$cpfAluno',						
'$nomePai',						
'$nomeMae',						
'$bairro',						
'$rua',						
'$nr',						
'$tel1',						
'$tel2',						
'$tel3',						
'$tel4',						
'$rgResponsavel',						
'$escolaridade',						
'$profissaoPai',						
'$nomeResponsavel',						
'$cpfResponsavel',						
'$emailResponsavel',					
'$sexo',						
'$profissaoMae',						
'$obs',						
'$dataHoje',
'$cgm')"; 
$query = mysql_query($sql); 
if($query){echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro efetuado com sucesso!!!")</SCRIPT><meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="cadastrarAluno.php">';}
}
echo'
<!DOCTYPE html>
<html lang="pt-br">
<head><title>Cadastro de Alunos CFH</title></head>
<meta charset="utf-8">
<body>
<form method="POST" action="?id=18" onchange="form.submit()">
<div align="Center">
<h2>CONSTRUINDO O FUTURO HOJE</h2>FICHA CADASTRAL
</div>
';
echo'
<div align="center"><table border="0" width="1080">
	<tr>
			<td rowspan="13" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../images/CFH/55.JPG" height="300">
				<hr width="50%">
			<p>
				<select size="1" name="dropCodigo"><option selected value="CFH">CFH '.date("Y").'</option></select></p>
			<hr width="30%">
				<hr width="10%">
				<br>
				<hr width="10%"><hr width="30%"><hr width="50%">
			</td>
		</tr>
	<tr>	
		<td align="right" width="116" >Local: 
		</td>
		<td colspan="2">
			<select size="1" name="local">
							<option selected>CFH LAB</option>
							<option>TEREZINHA PICOLI CEZAROTTO</option>
							<option>UNOPAR</option>
							<option>CEEP</option>
							<option>CEAVEL</option>
							<option>MARIA FUMIKO TOMINAGA</option>
							</select>&nbsp;Ano: 
						<select size="1" name="anoProjeto">
							<option>'.date("Y").'</option>
							<option>'.date("Y", strtotime('-1 years', strtotime(date('Y-m-d')))).'</option>
							<option>'.date("Y", strtotime('-2 years', strtotime(date('Y-m-d')))).'</option>
							<option>'.date("Y", strtotime('-3 years', strtotime(date('Y-m-d')))).'</option>
							<option>'.date("Y", strtotime('-4 years', strtotime(date('Y-m-d')))).'</option>
							<option>'.date("Y", strtotime('-5 years', strtotime(date('Y-m-d')))).'</option>
							<option>'.date("Y", strtotime('-6 years', strtotime(date('Y-m-d')))).'</option>
						</select></td>
	</tr>
	<tr>
					<td align="right" width="116" >Nome: 
					</td>
					<td colspan="2">
						<input type="text" size="40" name="nomeAluno"> CGM&nbsp;: 
							<input type="text" size="15" name="cgm" maxlength="11"></td>
	</tr>
		<tr>
						<td align="right" width="116" >Nascimento: 
						</td>
						<td colspan="2">
							<input style="text-align:center" type="text" size="3" name="dia">
							<input style="text-align:center" type="text" size="3" name="mes">
							<input style="text-align:center" type="text" size="3" name="ano"> Escolaridade: 
							<select size="1" name="escolaridade">
								<option>Ensino Fundamental 1</option>
								<option>Ensino Fundamental 2</option>
								<option>Ensino Medio</option>
								<option>Ensino Tecnico</option>
								<option>Ensino Superior</option>
							</select>
						</td>
		</tr>
		<tr>
						<td align="right" width="116" >Sexo: 
						</td>
						<td colspan="2">
							<p><select size="1" name="sexo">
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
							</select> RG: 
						<input type="text" size="18" name="rgAluno" maxlength="9"> CPF: 
							<input type="text" size="19" name="cpfAluno" maxlength="11">
						</p>
						</td>
		</tr>
		<tr>
						<td align="right" width="116" >Pai: 
						</td>
						<td colspan="2">
							<input type="text" size="40" name="nomePai"> Profissão: 
							<input type="text" size="20" name="profissaoPai">
						</td>
		</tr>
		<tr>
						<td align="right" width="116" >Mãe: 
						</td>
						<td colspan="2">
							<input type="text" size="40" name="nomeMae"> Profissão: 
							<input type="text" size="20" name="profissaoMae">
						</td>
		</tr>
		<tr>
						<td align="right" width="116" >Responsável:
						</td>
						<td colspan="2">
							<input type="text" size="30" name="nomeResponsavel"> RG: 
							<input type="text" size="15" name="rgResponsavel">
							CPF: 
							<input type="text" size="15" name="cpfResponsavel"></td>
		</tr>
		<tr>
						<td align="right" width="116" >Email:
						</td>
						<td colspan="2">
							<input type="text" size="30" name="emailResponsavel"></td>
		</tr>

		<tr>
						<td align="right" width="116" >Contato: 
						</td>
						<td colspan="2">
							<input style="text-align:center" type="text" size="10" name="tel1"> 
							<input style="text-align:center" type="text" size="10" name="tel2">
							<input style="text-align:center" type="text" size="10" name="tel3">
							<input style="text-align:center" type="text" size="10" name="tel4">
						</td>
		</tr>
		<tr>
			<td align="right" width="116" >Bairro: 
			</td>
			<td colspan="2">
				<input type="text" size="15" name="bairro"> Rua: 
				<input type="text" size="28" name="rua"> Nº: 
				<input type="text" size="4" name="nr" style="text-align:center">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >
			</td>
			<td>
				<textarea rows="7" name="obs" cols="70">
				</textarea>
			</td>
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
?>