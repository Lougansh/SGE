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
elseif (isset($_POST["btnAtualizar"])){
	$_SESSION["retorno"] = 'atualizar';
}
elseif (isset($_POST["btnpontuacao"])){
	$_SESSION["retorno"] = 'main';
}
if (($_SESSION["retorno"])=='cadastrar'){
	$retornob = cadastraServidor();
}
if (($_SESSION["retorno"])=='atualizar'){
	$retornob = atualizaServidor();
}
if (($_SESSION["retorno"])=='pontuacao'){
	$retornob = pontuacaoServidor();
}
if (($_SESSION["retorno"])=='main'){
	$retornob = mainServidor();
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
$dropSexo = $_POST["dropSexo"];
$textEmail = $_POST["textEmail"];
$dropAno = substr($_POST['dropTurma'],0,1);
$dropTurma = substr($_POST['dropTurma'],1,1);
$dropFuncao = $_POST["dropFuncao"];
$dropEscolaridade = $_POST["dropEscolaridade"];
$dropSituacao = $_POST["dropSituacao"];
$sql = 'insert into tb_servidor (matricula, dataMatricula, dataTransferencia, nome, dataNascimento, sexo, email, ano, turma, funcao, escolaridade, situacao) values ("'.$textMatricula.'","'.$anoMatricula.'-'.$mesMatricula.'-'.$diaMatricula.'","'.$anoTransferencia.'-'.$mesTransferencia.'-'.$diaTransferencia.'","'.ucwords($textNome).'","'.$anoNascimento.'-'.$mesNascimento.'-'.$diaNascimento.'","'.$dropSexo.'","'.strtolower($textEmail).'","'.$dropAno.'","'.$dropTurma.'","'.$dropFuncao.'","'.$dropEscolaridade.'","'.$dropSituacao.'")';
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