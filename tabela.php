<?php
include("conexao.php");
include("conf.php");
menu();
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";
//$sql = "select * from tb_aluno order by nome";
$result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $cgm = $row['cgm'];
        $ano = $row['ano'];
        $turma = $row['turma'];
		$nome = $row['nome'];
		$nascimento = date("d/m/Y", strtotime($row['nascimento']));
		$sexo = $row['sexo'];
		$situacao = $row['situacaoMatricula'];
		$matriculado = date("d/m/Y", strtotime($row['dataMatricula']));
		$observacao = $row['observacao'];
		$tabela = $tabela.'<tr><td align="center">'.$cgm.'</td><td align="center">'.$ano.'</td><td align="center">'.$turma.'</td><td align="left">'.$nome.'</td><td align="center">'.$nascimento.'</td><td align="center">'.$sexo.'</td><td align="center">'.$situacao.'</td><td align="center">'.$matriculado.'</td><td align="center">'.$observacao.'</td><tr>';
    }
}	
	echo '
	<html>
	<head>
	<title> Lista de alunos '.$ano.'º'.$turma.'</title>
	</head>
	<body>	
	<form method="POST" action="?id=Lista" onchange="form.submit()">
	<div align="center">
		'.$mostraMenu.'
		</div>
		<div align="center"><font size="5" color="#0000FF">'.$titulo.$qtdeAlunos.'</font><hr color="#FF0000" width="50%" size="1">'.$hoje.$professor.'<hr color="#FF0000" width="70%" size="1"></div>
		<div align="left">'.$lista.'</div>
	</form>
	<div align="center">
	<table border="1">
	<tr><td align="center">CGM</td><td align="center">ANO</td><td align="center">TURMA</td><td align="center">NOME</td><td align="center">NASCIMENTO</td><td align="center">SEXO</td><td align="center">SITUAÇÃO</td><td align="center">MATRICULA</td><td align="center">OBSERVAÇÃO</td><tr>'
