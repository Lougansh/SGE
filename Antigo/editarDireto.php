﻿<?php 
session_start("editar");
include './conexao.php';
include './conf.php';
menu();
//----------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['btnSalvar']) && $_POST['textCGM'] != ''){
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
		$result = mysqli_query($connection, $sql);
			$mesNascimento = date("m", strtotime($row['nascimento']));
			$anoNascimento = date("Y", strtotime($row['nascimento']));
			$diaMatricula = date("d", strtotime($row['dataMatricula']));
			$mesMatricula = date("m", strtotime($row['dataMatricula']));
			$anoMatricula = date("Y", strtotime($row['dataMatricula']));
		}
	}
echo
	'<html>
';
}
?>