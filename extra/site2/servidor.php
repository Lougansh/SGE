<?php
session_start("Servidor");
include './conexao.php';
include './conf.php';
menuA();
if (empty($_SESSION["retorno"])){
	$_SESSION["retorno"] = 'main';
}
elseif (isset($_POST["btnCadastrar"])){
	$_SESSION["retorno"] = 'cadastrar';
}
elseif (isset($_POST["btnPesquisar"])){
	$_SESSION["retorno"] = 'pesquisar';
}
elseif (isset($_POST["btnpontuacao"])){
	$_SESSION["retorno"] = 'main';
}
if (isset($_POST["btnDados"])){
	$_SESSION["retorno"] = 'mostrarDados';
}
if (($_SESSION["retorno"])=='cadastrar'){
	$retornob = cadastraServidor();
}
if (($_SESSION["retorno"])=='pesquisar'){
	$retornob = pesquisaServidor();
}
if (($_SESSION["retorno"])=='resultadoPesquisa'){
	$retornob = resultadoPesquisa();
}
if (($_SESSION["retorno"])=='pontuacao'){
	$retornob = pontuacaoServidor();
}
if (($_SESSION["retorno"])=='main'){
	$retornob = mainServidor();
}
if (($_SESSION["retorno"])=='mostrarDados'){
	$retornob = dadosServidor();
}
if (isset($_POST["btnAtualizar"])){
	$textMatricula = $_POST["textMatricula"];
	$diaMatricula = $_POST["diaMatricula"];
	$mesMatricula = $_POST["mesMatricula"];
	$anoMatricula = $_POST["anoMatricula"];
	$diaTransferencia = $_POST["diaTransferencia"];
	$mesTransferencia = $_POST["mesTransferencia"];
	$anoTransferencia = $_POST["anoTransferencia"];
	$textNome = $_POST["textNome"];
	$diaNascimento = $_POST["diaNascimento"];
	$mesNascimento = $_POST["mesNascimento"];
	$anoNascimento = $_POST["anoNascimento"];
	$textTelefone = $_POST["textTelefone"];
	$textEndereco = $_POST["textEndereco"];
	$dropEstadoCivil = $_POST["dropEstadoCivil"];
	$dropFilhos = $_POST["dropFilhos"];
	$dropSexo = $_POST["dropSexo"];
	$textEmail = $_POST["textEmail"];
	$dropFuncao = $_POST['dropFuncao'];
	$dropConcurso = $_POST["dropConcurso"];
	$dropEscolaridade = $_POST["dropEscolaridade"];
	$dropSituacao = $_POST["dropSituacao"];
	$sql = 'update tb_servidor set matricula = "'.$textMatricula.'", dataMatricula = "'.$anoMatricula.'-'.$mesMatricula.'-'.$diaMatricula.'", dataTransferencia = "'.$anoTransferencia.'-'.$mesTransferencia.'-'.$diaTransferencia.'", 	nome = "'.ucwords(strtolower($textNome)).'", 	dataNascimento = "'.$anoNascimento.'-'.$mesNascimento.'-'.$diaNascimento.'", telefone = "'.$textTelefone.'", endereco = "'.$textEndereco.'", estadoCivil = "'.$dropEstadoCivil.'", filhos = "'.$dropFilhos.'", sexo = "'.$dropSexo.'", email ="'.strtolower($textEmail).'", 	funcao = "'.$dropFuncao.'", 	concurso = "'.$dropConcurso.'", 	escolaridade = "'.$dropEscolaridade.'", 	situacao = "'.$dropSituacao.'" where matricula = "'.$textMatricula.'"'; 
	$query = mysql_query($sql); 
		if($query){
			echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Atualização do cadastro efetuado com sucesso!!!")</SCRIPT>';
		}
			else{
				echo $sql;
				echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Erro ao Atualizar!!!")</SCRIPT>';
			}
}
if (isset($_POST["btnOK"])){
	$textMatricula = $_POST["textMatricula"];
	$sql = 'select * from tb_servidor where matricula = '.$textMatricula.'';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['matricula']){
			$textMatricula = $linha['matricula'];
			$diaMatricula = substr($linha['dataMatricula'],8,2);
			$mesMatricula = substr($linha['dataMatricula'],5,2);
			$anoMatricula = substr($linha['dataMatricula'],0,4);
			$diaTransferencia = substr($linha['dataTransferencia'],8,2);
			$mesTransferencia = substr($linha['dataTransferencia'],5,2);
			$anoTransferencia = substr($linha['dataTransferencia'],0,4);
			$textNome = $linha['nome'];
			$diaNascimento = substr($linha['dataNascimento'],8,2);
			$mesNascimento = substr($linha['dataNascimento'],5,2);
			$anoNascimento = substr($linha['dataNascimento'],0,4);
			$textTelefone = $linha['telefone'];
			$textEndereco = $linha['endereco'];
			$dropEstadoCivil = $linha['estadoCivil'];
			if ($linha['estadoCivil']=='C'){$dropEstadoCivilText = 'Casado';}
			if ($linha['estadoCivil']=='S'){$dropEstadoCivilText = 'Solteiro';}
			$dropFilhos = $linha['filhos'];
			$dropSexo = $linha['sexo'];
			if ($linha['sexo']=='M'){$dropSexoText = 'Masculino';}
			if ($linha['sexo']=='F'){$dropSexoText = 'Femenino'; }
			$textEmail = $linha['email'];
			$dropAno = substr($linha['turma'],0,1);
			$dropTurma = substr($linha['turma'],1,1);
			$dropFuncao = $linha['funcao'];
			$dropConcurso = $linha['concurso'];
			$dropEscolaridade = $linha['escolaridade'];
			$dropSituacao = $linha['situacao'];	
			if ($linha['situacao']=='A'){$dropSituacaoText = 'Ativo';}
			if ($linha['situacao']=='T'){$dropSituacaoText = 'Transferido';}			
			$retornoBanco = '
		<table border="0" width="70%">
			<tr>
				<td align="right">
				<p align="right">Matricula:</td>
				<td>
				<p align="left">
				<input type="text" name="textMatricula" value="'.$textMatricula.'" style="margim: 10px; padding: 1px; width:150px" size="20"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Data Matricula:</td>
				<td>
				<input type="text" name="diaMatricula" style="text-align:center" value="'.$diaMatricula.'" size="2"> / 
				<input type="text" name="mesMatricula" style="text-align:center" value="'.$mesMatricula.'" size="2"> / 
				<input type="text" name="anoMatricula" style="text-align:center" value="'.$anoMatricula.'" size="2">
				</td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Data Transferência:</td>
				<td>
				<input type="text" name="diaTransferencia" style="text-align:center" value="'.$diaTransferencia.'" size="2"> / 
				<input type="text" name="mesTransferencia" style="text-align:center" value="'.$mesTransferencia.'" size="2"> / 
				<input type="text" name="anoTransferencia" style="text-align:center" value="'.$anoTransferencia.'" size="2">
				</td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Nome:</td>
				<td><input type="text" name="textNome" value="'.$textNome.'" size="50"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Nascimento:</td>
				<td>
				<input type="text" name="diaNascimento" style="text-align:center" value="'.$diaNascimento.'" size="2"> / 
				<input type="text" name="mesNascimento" style="text-align:center" value="'.$mesNascimento.'" size="2"> / 
				<input type="text" name="anoNascimento" style="text-align:center" value="'.$anoNascimento.'" size="2">
				</td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Telefone:</td>
				<td>
				<input type="text" name="textTelefone" value="'.$textTelefone.'" style="margim: 10px; padding: 1px; width:150px" size="20"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Endereço:</td>
				<td>
				<input type="text" name="textEndereco" value="'.$textEndereco.'" style="margim: 10px; padding: 1px; width:650px" size="20"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Estado Civil:</td>
				<td>
				<select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropEstadoCivil">
				<option selected value="'.$dropEstadoCivil.'">'.$dropEstadoCivilText.'</option>
				<option value="C">Casado</option>
				<option value="S">Solteiro</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Filhos:</td>
				<td>
				<select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropFilhos">
				<option selected>'.$dropFilhos.'</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Sexo:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropSexo">
				<option selected value="'.$dropSexo.'">'.$dropSexoText.'</option>
				<option value="M">Masculino</option>
				<option value="F">Feminino</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">E-Mail:</td>
				<td><input type="text" name="textEmail" value="'.$textEmail.'" size="50"></td>
			</tr>
			<tr>
				<td align="right">Função:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropFuncao">
				<option>'.$dropFuncao.'</option>
				<option>Zeladoria</option>
				<option>Cozinha</option>
				<option>Sala de Recurso</option>
				<option>Reforço</option>
				<option">Hora Atividade</option>
				<option>Hora Fracionada</option>
				<option>Regente</option>
				<option>Auxiliar</option>
				<option>Biblioteca</option>
				<option>Informática</option>
				<option>Coordenação</option>	
				<option>Direção</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Concurso/PSS</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropConcurso">
				<option selected>'.$dropConcurso.'</option>
				<option>Professor</option>
				<option>Instrutor</option>
				<option>Monitor</option>
				<option>Zelador</option>
				<option>Secretario</option>
				<option>Coordenador</option>
				<option>Diretor</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Escolaridade:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropEscolaridade">
				<option selected>'.$dropEscolaridade.'</option>
				<option>Fundamental</option>
				<option>Ensino Médio</option>
				<option>Curso Técnico</option>
				<option>Graduação</option>
				<option>Pós Graduação</option>
				<option>Mestrado/MBA</option>
				<option>Doutorado</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Situação:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropSituacao">
				<option selected value="'.$dropSituacao.'">'.$dropSituacaoText.'</option>
				<option value="A">Ativo</option>
				<option value="T">Transferido</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td><input type="submit" value="Atualizar" name="btnAtualizar" style="margim: 10px; padding: 1px; width:150px"></td>
			</tr>
		</table>
	'; 
		}else{
			$retornoBanco =  'Nenhum registro encontrado';
		}
	}
echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<form method="POST" action="servidor.php">
	<p align="center">
	</p>	
	<div align="center">
		'.$retornoBanco.'
	</div>
</form>	
';
}
if (isset($_POST["btnSalvar"])){
$textMatricula = $_POST["textMatricula"];
$diaMatricula = $_POST["diaMatricula"];
$mesMatricula = $_POST["mesMatricula"];
$anoMatricula = $_POST["anoMatricula"];
$diaTransferencia = $_POST["diaTransferencia"];
$mesTransferencia = $_POST["mesTransferencia"];
$anoTransferencia = $_POST["anoTransferencia"];
$textNome = $_POST["textNome"];
$diaNascimento = $_POST["diaNascimento"];
$mesNascimento = $_POST["mesNascimento"];
$anoNascimento = $_POST["anoNascimento"];
$textTelefone = $_POST["textTelefone"];
$textEndereco = $_POST["textEndereco"];
$dropEstadoCivil = $_POST["dropEstadoCivil"];
$dropFilhos = $_POST["dropFilhos"];
$dropSexo = $_POST["dropSexo"];
$textEmail = $_POST["textEmail"];
$dropFuncao = $_POST['dropFuncao'];
$dropConcurso = $_POST["dropConcurso"];
$dropEscolaridade = $_POST["dropEscolaridade"];
$dropSituacao = $_POST["dropSituacao"];
$sql = 'insert into tb_servidor (matricula, dataMatricula, dataTransferencia, nome, dataNascimento, telefone, endereco, estadoCivil, filhos, sexo, email, funcao, concurso, escolaridade, situacao) values ("'.$textMatricula.'","'.$anoMatricula.'-'.$mesMatricula.'-'.$diaMatricula.'","'.$anoTransferencia.'-'.$mesTransferencia.'-'.$diaTransferencia.'","'.ucwords(strtolower($textNome)).'","'.$anoNascimento.'-'.$mesNascimento.'-'.$diaNascimento.'","'.$textTelefone.'","'.$textEndereco.'","'.$dropEstadoCivil.'","'.$dropFilhos.'","'.$dropSexo.'","'.strtolower($textEmail).'","'.$dropFuncao.'","'.$dropConcurso.'","'.$dropEscolaridade.'","'.$dropSituacao.'")';
$query = mysql_query($sql); 
	if($query){
		echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro efetuado com sucesso!!!")</SCRIPT>';
	}
		else{
			echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Erro ao cadastrar!!!")</SCRIPT>';
		}
}
echo $retornob;

?>