<?php
session_start("historico");
include './conexao.php';
include './conf.php';
menuA();
$retTurma = '
<input type="radio" value="2020" name="R1" onchange="form.submit()" >2020
<input type="radio" value="2019" name="R1" onchange="form.submit()" >2019
<input type="radio" value="2018" name="R1" onchange="form.submit()" >2018
<input type="radio" value="2017" name="R1" onchange="form.submit()" >2017
<input type="radio" value="2016" name="R1" onchange="form.submit()" >2016
<input type="radio" value="2015" name="R1" onchange="form.submit()" >2015
<input type="radio" value="2014" name="R1" onchange="form.submit()" >2014
';
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$_SESSION["ano"] = $_POST['R1'];
$sql = 'select * from tb_aluno_projeto  where equipe = '.$_SESSION["ano"].' Order By anoProjeto desc, nomeAluno desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$explodeNome = explode(" ",$linha['nomeAluno']);
$primeiroNome = current($explodeNome);
$foto_aluno = '../images/CFH/'.$linha['cgm'].'.JPG'; 	
if (file_exists($foto_aluno)) {
	$caminho = 'CFH/'.$linha["cgm"].'.JPG';
}else{
	$caminho = 'semfoto.JPG';	
	}

$menuFotos = '<button value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/alunos/'.$linha['cgm'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.$linha['AnoProjeto'].'</font></td></tr></table>'.$menuFotos;
}
$_SESSION["menuFotos"] = $menuFotos;
mysql_free_result($query);
}
//------------>
echo '<body><form method="POST" action="?id=18" onchange="form.submit()"><div align="Center"><font color="gray">ATIVO</font>:<b><font size="5" color="red">'.$_SESSION["ano"].'</font></b> | '.$retTurma.'<br>'.$_SESSION["menuFotos"].'</div>';
if (isset($_POST['dropSelecionar'])) {
$codigo = $_POST['dropSelecionar'];
$proximo = $_SESSION["ano"]+1;
$sql = "update tb_aluno_projeto set anoProjeto = $proximo, equipe = $proximo WHERE ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="atualizarCFH.php">';
}
?>