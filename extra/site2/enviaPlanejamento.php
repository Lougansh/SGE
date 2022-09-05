<?php
session_start("planejamento");
include './conexao.php';
include './conf.php';
menuA();
if (empty($_SESSION["ano"])){
$_SESSION["ano"] = 0;
}
$altura = 150;
$largura = 800;
$data = date();
$partes = explode("/", $data);
$dia = $partes[0];
$mes = $partes[1];
$ano = $partes[2];
echo '<center><h3>PLANEJAMENTO DE INFORMÁTICA EDUCACIONAL - 20'.date('y').'</h3></center>';
//------------>
if (isset($_POST['ano'])){
	$_SESSION["ano"] = $_POST['ano'];
	$anoSelect = $_SESSION["ano"];
	$sql = 'SELECT * from tb_planejamento where turma = '.$anoSelect.' order by ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		//if ($linha['Objetivo'] == ''){
		$conteudo = '<option value="'.$linha['ID'].'">'.$linha['ID'].' - '.$linha['Conteudo'].'</option>'.$conteudo;
		//}
	}
	mysql_free_result($query);
}
	elseif ($_SESSION["ano"] >= 0) {
	$anoSelect = $_SESSION["ano"];
	$sql = 'SELECT * from tb_planejamento where turma = '.$anoSelect.' order by ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['Objetivo'] == ''){
		$conteudo = '<option value="'.$linha['ID'].'">'.$linha['ID'].' - '.$linha['Conteudo'].'</option>'.$conteudo;
		}
	}
	mysql_free_result($query);
	}
if (isset($_POST['conteudo'])){
	$anoSelect = $_POST['ano'];
	$conteudoSelect = $_POST['conteudo'];
	$sql = 'SELECT * from tb_planejamento where turma = '.$anoSelect.' and ID = '.$conteudoSelect.' order by ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	if ($anoSelect == 0){ $anoSelectText = 'Pré Escola';}
	if ($anoSelect == 1){ $anoSelectText = '1º Ano';}
	if ($anoSelect == 2){ $anoSelectText = '2º Ano';}
	if ($anoSelect == 3){ $anoSelectText = '3º Ano';}
	if ($anoSelect == 4){ $anoSelectText = '4º Ano';}
	if ($anoSelect == 5){ $anoSelectText = '5º Ano';}
	if ($anoSelect == 6){ $anoSelectText = 'Contra Turno';}
	while ($linha = mysql_fetch_array($query)) {
		$conteudoSelect = '<option value="'.$linha['ID'].'">'.$linha['Conteudo'].'</option>';
		$objetivo = $linha['Objetivo'];
		$encaminhamento = $linha['Encaminhamento'];
		$recurso = $linha['Recurso'];
	}
	mysql_free_result($query);
}
//------------>
if (isset($_POST['btnSalvar'])){
	$upAno = $_POST['ano'];
	$upConteudo = $_POST['conteudo'];
	$upObjetivo = $_POST['objetivo'];
	$upEncaminhamento = $_POST['encaminhamento'];
	$upRecurso = $_POST['recurso'];

	$sql = "update tb_planejamento set Objetivo = '$upObjetivo', Encaminhamento = '$upEncaminhamento', Recurso = '$upRecurso' where Turma = '$upAno' and ID = '$upConteudo'";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	mysql_free_result($query);
	echo '<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="enviaPlanejamento.php">';
}
//------------>

echo'
<form method="POST" action="?id=51" onchange="form.submit()">
	<hr color="#FF0000" width="90%">
	<div align="center">
	<select  size="1" name="ano" onchange="form.submit()"><option selected value="'.$anoSelect.'">'.$anoSelectText.'</option><option value="1"><option value="0">Pre</option><option value="1">1º Ano</option><option value="2">2º Ano</option><option value="3">3º Ano</option><option value="4">4º Ano</option><option value="5">5º Ano</option><option value="6">Contra Turno</option></select>
	<select style="width:800px;" size="1" name="conteudo" onchange="form.submit()">'.$conteudoSelect.$conteudo.'</select>
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left">                    Objetivos</legend><textarea rows="7"  name="objetivo" cols="100">'.$objetivo.'</textarea></fieldset></div>	
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left">Encaminhamentos metodológicos</legend><textarea rows="7"  name="encaminhamento" cols="100">'.$encaminhamento.'</textarea></fieldset></div>	
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left"> Recursos auxiliares externos</legend><textarea rows="7"  name="recurso" cols="100">'.$recurso.'</textarea></fieldset></div>	

	<hr color="#FF0000" width="90%">
	
	<p align="center"><input type="submit" value="Salvar" name="btnSalvar">
	<input type="reset" value="Limpar" name="btnLimpar"></p>
</form>
';
?>