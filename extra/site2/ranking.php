<?php
include './conexao.php';
include './conf.php';
$colocacao = 0;
$limite = 100;
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
	$retAno = substr($_POST['R1'],0,1);
	$retTurma = substr($_POST['R1'],1,1);
	if ($retAno == '4' && $retTurma =='A'){
		$sql = 'select * from tb_aluno where situacao = "A" and Ano = 4 and Turma = "A" Order By ponto desc limit '.$limite.'';
	}
	if ($retAno == '4' && $retTurma =='B'){
		$sql = 'select * from tb_aluno where situacao = "A" and Ano = 4 and Turma = "B" Order By ponto desc limit '.$limite.'';
	}
	if ($retAno == '4' && $retTurma =='C'){
		$sql = 'select * from tb_aluno where situacao = "A" and Ano = 4 and Turma = "C" Order By ponto desc limit '.$limite.'';
	}
	if ($retAno == '5' && $retTurma =='A'){
		$sql = 'select * from tb_aluno where situacao = "A" and Ano = 5 and Turma = "A" Order By ponto desc limit '.$limite.'';
	}
	if ($retAno == '5' && $retTurma =='B'){
		$sql = 'select * from tb_aluno where situacao = "A" and Ano = 5 and Turma = "B" Order By ponto desc limit '.$limite.'';
	}
	if ($retAno == 'C' && $retTurma =='T'){
		$sql = 'select * from tb_aluno where situacao = "A" and Programacao = "S" Order By ponto desc limit '.$limite.'';
	}
	if ($retAno == 'R' && $retTurma =='G'){
		$sql = 'select * from tb_aluno where situacao = "A" and Ano >=3 and Ano <= 5 Order By ponto desc limit '.$limite.'';
	}
}
else{
$sql = 'select * from tb_aluno where situacao = "A" and Ano >=3 and Ano <= 5 Order By ponto desc limit '.$limite.'';
}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$colocacao ++;
	$pontuacao = $linha['Ponto'];
	$explodeNome = explode(" ",$linha['Nome']);
	$primeiroNome = current($explodeNome);
	$turma = $linha['Ano'].$linha['Turma'];
	$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 	
	if (file_exists($foto_aluno)) {
		$caminho = 'alunos/'.$linha["ID"].'.JPG';
	}else{
		$caminho = 'semfoto.JPG';	
		}
			$menuFotos = $menuFotos.'
			<table border="0" style="display:inline;">
			<tr><td><img style="margin: 0px; padding: 0px" src="../images/'.$caminho.'" height="200" width="150"></td></tr>
			<tr><td><p align="center">'.$colocacao.'º LUGAR</td></tr>
			<tr><td><p align="center"><b><font color="blue">'.$primeiroNome.'</font> - <font color="red">'.$turma.'</font></b></td></tr>
			<tr><td><p align="center">'.$pontuacao.' PONTOS</td></tr>
			</table>
			';
}
mysql_free_result($query);
//------------>
echo '
<html>
<head>
<title>Ranking TOP ++</title></head>
<style type="text/css">
img {
border:2px solid black;
background-color: #f0ffff;
-moz-border-radius:15px; -webkit-border-radius:15px; border-radius:15px;
}
table {
background-color: #ffffff;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
</style>
<body>
<h1 align="center">RANKING 2019</h1>
<div align="Center">
<form method="POST" action="?id=18" onchange="form.submit()">
<input type="radio" value="4A"  name="R1" onchange="form.submit()" >4º A 
<input type="radio" value="4B"  name="R1" onchange="form.submit()" >4º B 
<input type="radio" value="4C"  name="R1" onchange="form.submit()" >4º C
<input type="radio" value="5A"  name="R1" onchange="form.submit()" >5º A 
<input type="radio" value="5B"  name="R1" onchange="form.submit()" >5º B 
<input type="radio" value="CT"  name="R1" onchange="form.submit()" >Contra Turno
<input type="radio" value="RG"  name="R1" onchange="form.submit()" >Geral
<a href="index.php">voltar</a>
</form>
'.$menuFotos.'</div>
</body>
</html>
';
?>