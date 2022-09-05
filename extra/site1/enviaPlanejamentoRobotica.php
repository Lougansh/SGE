<?php
session_start("planejamento");
include './conexao.php';
include './conf.php';
alunosProjeto();
$altura = 150;
$largura = 800;
$data = date();
$partes = explode("/", $data);
$dia = $partes[0];
$mes = $partes[1];
$ano = $partes[2];
echo '<center><h3>PLANEJAMENTO DE ROBÓTICA EDUCACIONAL - 20'.date('y').'</h3></center>';
//------------>

	$sql = 'SELECT * from tb_planejamento where turma = "R" order by ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$conteudo = '<option value="'.$linha['ID'].'">'.$linha['Conteudo'].'</option>'.$conteudo;
	}
	mysql_free_result($query);
	if (isset($_POST['conteudo'])){
	$conteudoSelect = $_POST['conteudo'];
	$sql = 'SELECT * from tb_planejamento where turma = "R" and ID = '.$conteudoSelect.' order by ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$titulo = $linha['Conteudo'];
		$conteudoSelect = '<option value="'.$linha['ID'].'">'.$linha['Conteudo'].'</option>';
		$objetivo = $linha['Objetivo'];
		$encaminhamento = $linha['Encaminhamento'];
		$recurso = $linha['Recurso'];
	}
	mysql_free_result($query);
}
if (isset($_POST['btnSalvar'])){
	$upAno = $_POST['ano'];
	$upConteudo = $_POST['conteudo'];
	$upObjetivo = $_POST['objetivo'];
	$upEncaminhamento = $_POST['encaminhamento'];
	$upRecurso = $_POST['recurso'];
	$sql = "update tb_planejamento set Objetivo = '$upObjetivo', Encaminhamento = '$upEncaminhamento', Recurso = '$upRecurso' where Turma = 'R' and ID = '$upConteudo'";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	mysql_free_result($query);
	echo '<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="enviaPlanejamento.php">';
}
echo'
	<form method="POST" action="?id=51" onchange="form.submit()">
	<hr color="#FF0000" width="90%">
	<div align="center">
	<select style="width:800px;" size="1" name="conteudo" onchange="form.submit()">'.$conteudoSelect.$conteudo.'</select>
	<h3 align="center">'.$titulo.'</h3>
	<div align="center">
	
	<fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left">                    Objetivos</legend><textarea rows="7"  name="objetivo" cols="100">'.$objetivo.'</textarea></fieldset></div>	
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left">Encaminhamentos metodológicos</legend><textarea rows="7"  name="encaminhamento" cols="100">'.$encaminhamento.'</textarea></fieldset></div>	
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left"> Recursos auxiliares externos</legend><textarea rows="7"  name="recurso" cols="100">'.$recurso.'</textarea></fieldset></div>	

	<hr color="#FF0000" width="90%">
	
	<p align="center"><input type="submit" value="Salvar" name="btnSalvar">
	<input type="reset" value="Limpar" name="btnLimpar"></p>
</form>
';
?>