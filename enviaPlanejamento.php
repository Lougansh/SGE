<?php
session_start();
include './conexao.php';
include './conf.php';
menu();
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
	$_SESSION['ano']= $_POST['ano'];
	$anoSelect = $_SESSION['ano'];
	$sql = 'SELECT * from tb_planejamento where turma = '.$anoSelect.' order by ID';
	$query = mysqli_query($connection, $sql);
	while($linha = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		$conteudo = $conteudo.'<option value="'.$linha['ID'].'">'.$linha['ID'].' - '.$linha['conteudo'].'</option>';
	}
}
if (isset($_POST['conteudo'])){
	$conteudoSelect = $_POST['conteudo'];
	$sql = 'SELECT * from tb_planejamento where ID = '.$conteudoSelect.' order by ID desc';
	echo $sql;
	$query = mysqli_query($connection, $sql);
	if ($anoSelect == 0){ $anoSelectText = 'Infantil';}
	if ($anoSelect == 1){ $anoSelectText = '1º Ano';}
	if ($anoSelect == 2){ $anoSelectText = '2º Ano';}
	if ($anoSelect == 3){ $anoSelectText = '3º Ano';}
	if ($anoSelect == 4){ $anoSelectText = '4º Ano';}
	if ($anoSelect == 5){ $anoSelectText = '5º Ano';}
	while($linha = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		$conteudoSelect = '<option value="'.$linha['ID'].'">'.$linha['conteudo'].'</option>';
		$objetivo = $linha['objetivo'];
		$encaminhamento = $linha['encaminhamento'];
		$recurso = $linha['recurso'];
	}
}
echo'
<form method="POST" action="?id=51" onchange="form.submit()">
	<hr color="#FF0000" width="90%">
	<div align="center">
	<select  size="1" name="ano" onchange="form.submit()"><
    option selected value="'.$anoSelect.'">'.$anoSelectText.'</option>
    <option></option>
	<option value="0">Pre   </option>
    <option value="1">1º Ano</option>
    <option value="2">2º Ano</option>
    <option value="3">3º Ano</option>
    <option value="4">4º Ano</option>
    <option value="5">5º Ano</option>
    </select>
	<select style="width:800px;" size="1" name="conteudo" onchange="form.submit()">'.$conteudo.'</select>
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left">                    Objetivos</legend><textarea linhas="7"  name="objetivo" cols="100">'.$objetivo.'</textarea></fieldset></div>	
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left">Encaminhamentos metodológicos</legend><textarea linhas="7"  name="encaminhamento" cols="100">'.$encaminhamento.'</textarea></fieldset></div>	
	<div align="center"><fieldset style="width: '.$largura.'px; height: '.$altura.'px; padding: 1"><legend align="left"> Recursos auxiliares externos</legend><textarea linhas="7"  name="recurso" cols="100">'.$recurso.'</textarea></fieldset></div>	

	<hr color="#FF0000" width="90%">
	
	<p align="center"><input type="submit" value="Salvar" name="btnSalvar">
	<input type="reset" value="Limpar" name="btnLimpar"></p>
</form>
';
?>