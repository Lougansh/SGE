<?php
include './conexao.php';
include './conf.php';
head();
menuVertical();
$sqldb = 'SELECT * from tb_horarios';	
$querydb = mysql_query($sqldb) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($querydb)) {
		if ($linha['ID'] == 1){$dbseg1M =  $linha['turma'];}
		if ($linha['ID'] == 2){$dbseg2M =  $linha['turma'];}
		if ($linha['ID'] == 3){$dbseg3M =  $linha['turma'];}
		if ($linha['ID'] == 4){$dbseg4M =  $linha['turma'];}
		if ($linha['ID'] == 5){$dbseg5M =  $linha['turma'];}
		if ($linha['ID'] == 6){$dbseg6M =  $linha['turma'];}
		if ($linha['ID'] == 7){$dbter1M =  $linha['turma'];}
		if ($linha['ID'] == 8){$dbter2M =  $linha['turma'];}
		if ($linha['ID'] == 9){$dbter3M =  $linha['turma'];}
		if ($linha['ID'] == 10){$dbter4M =  $linha['turma'];}
		if ($linha['ID'] == 11){$dbter5M =  $linha['turma'];}
		if ($linha['ID'] == 12){$dbter6M =  $linha['turma'];}
		if ($linha['ID'] == 13){$dbqua1M =  $linha['turma'];}
		if ($linha['ID'] == 14){$dbqua2M =  $linha['turma'];}
		if ($linha['ID'] == 15){$dbqua3M =  $linha['turma'];}
		if ($linha['ID'] == 16){$dbqua4M =  $linha['turma'];}
		if ($linha['ID'] == 17){$dbqua5M =  $linha['turma'];}
		if ($linha['ID'] == 18){$dbqua6M =  $linha['turma'];}
		if ($linha['ID'] == 19){$dbqui1M =  $linha['turma'];}
		if ($linha['ID'] == 20){$dbqui2M =  $linha['turma'];}
		if ($linha['ID'] == 21){$dbqui3M =  $linha['turma'];}
		if ($linha['ID'] == 22){$dbqui4M =  $linha['turma'];}
		if ($linha['ID'] == 23){$dbqui5M =  $linha['turma'];}
		if ($linha['ID'] == 24){$dbqui6M =  $linha['turma'];}
		if ($linha['ID'] == 25){$dbsex1M =  $linha['turma'];}
		if ($linha['ID'] == 26){$dbsex2M =  $linha['turma'];}
		if ($linha['ID'] == 27){$dbsex3M =  $linha['turma'];}
		if ($linha['ID'] == 28){$dbsex4M =  $linha['turma'];}
		if ($linha['ID'] == 29){$dbsex5M =  $linha['turma'];}
		if ($linha['ID'] == 30){$dbsex6M =  $linha['turma'];}
		if ($linha['ID'] == 31){$dbseg1T =  $linha['turma'];}
		if ($linha['ID'] == 32){$dbseg2T =  $linha['turma'];}
		if ($linha['ID'] == 33){$dbseg3T =  $linha['turma'];}
		if ($linha['ID'] == 34){$dbseg4T =  $linha['turma'];}
		if ($linha['ID'] == 35){$dbseg5T =  $linha['turma'];}
		if ($linha['ID'] == 36){$dbseg6T =  $linha['turma'];}
		if ($linha['ID'] == 37){$dbter1T =  $linha['turma'];}
		if ($linha['ID'] == 38){$dbter2T =  $linha['turma'];}
		if ($linha['ID'] == 39){$dbter3T =  $linha['turma'];}
		if ($linha['ID'] == 40){$dbter4T =  $linha['turma'];}
		if ($linha['ID'] == 41){$dbter5T =  $linha['turma'];}
		if ($linha['ID'] == 42){$dbter6T =  $linha['turma'];}
		if ($linha['ID'] == 43){$dbqua1T =  $linha['turma'];}
		if ($linha['ID'] == 44){$dbqua2T =  $linha['turma'];}
		if ($linha['ID'] == 45){$dbqua3T =  $linha['turma'];}
		if ($linha['ID'] == 46){$dbqua4T =  $linha['turma'];}
		if ($linha['ID'] == 47){$dbqua5T =  $linha['turma'];}
		if ($linha['ID'] == 48){$dbqua6T =  $linha['turma'];}
		if ($linha['ID'] == 49){$dbqui1T =  $linha['turma'];}
		if ($linha['ID'] == 50){$dbqui2T =  $linha['turma'];}
		if ($linha['ID'] == 51){$dbqui3T =  $linha['turma'];}
		if ($linha['ID'] == 52){$dbqui4T =  $linha['turma'];}
		if ($linha['ID'] == 53){$dbqui5T =  $linha['turma'];}
		if ($linha['ID'] == 54){$dbqui6T =  $linha['turma'];}
		if ($linha['ID'] == 55){$dbsex1T =  $linha['turma'];}
		if ($linha['ID'] == 56){$dbsex2T =  $linha['turma'];}
		if ($linha['ID'] == 57){$dbsex3T =  $linha['turma'];}
		if ($linha['ID'] == 58){$dbsex4T =  $linha['turma'];}
		if ($linha['ID'] == 59){$dbsex5T =  $linha['turma'];}
		if ($linha['ID'] == 60){$dbsex6T =  $linha['turma'];}
	}
if (isset($_POST['btnSalvar'])){
//----------MANHA
$seg1M=$_POST['seg1M'];
$seg2M=$_POST['seg2M'];
$seg3M=$_POST['seg3M'];
$seg4M=$_POST['seg4M'];
$seg5M=$_POST['seg5M'];
$seg6M=$_POST['seg6M'];
$ter1M=$_POST['ter1M'];
$ter2M=$_POST['ter2M'];
$ter3M=$_POST['ter3M'];
$ter4M=$_POST['ter4M'];
$ter5M=$_POST['ter5M'];
$ter6M=$_POST['ter6M'];
$qua1M=$_POST['qua1M'];
$qua2M=$_POST['qua2M'];
$qua3M=$_POST['qua3M'];
$qua4M=$_POST['qua4M'];
$qua5M=$_POST['qua5M'];
$qua6M=$_POST['qua6M'];
$qui1M=$_POST['qui1M'];
$qui2M=$_POST['qui2M'];
$qui3M=$_POST['qui3M'];
$qui4M=$_POST['qui4M'];
$qui5M=$_POST['qui5M'];
$qui6M=$_POST['qui6M'];
$sex1M=$_POST['sex1M'];
$sex2M=$_POST['sex2M'];
$sex3M=$_POST['sex3M'];
$sex4M=$_POST['sex4M'];
$sex5M=$_POST['sex5M'];
$sex6M=$_POST['sex6M'];
//----------TARDE
$seg1T=$_POST['seg1T'];
$seg2T=$_POST['seg2T'];
$seg3T=$_POST['seg3T'];
$seg4T=$_POST['seg4T'];
$seg5T=$_POST['seg5T'];
$seg6T=$_POST['seg6T'];
$ter1T=$_POST['ter1T'];
$ter2T=$_POST['ter2T'];
$ter3T=$_POST['ter3T'];
$ter4T=$_POST['ter4T'];
$ter5T=$_POST['ter5T'];
$ter6T=$_POST['ter6T'];
$qua1T=$_POST['qua1T'];
$qua2T=$_POST['qua2T'];
$qua3T=$_POST['qua3T'];
$qua4T=$_POST['qua4T'];
$qua5T=$_POST['qua5T'];
$qua6T=$_POST['qua6T'];
$qui1T=$_POST['qui1T'];
$qui2T=$_POST['qui2T'];
$qui3T=$_POST['qui3T'];
$qui4T=$_POST['qui4T'];
$qui5T=$_POST['qui5T'];
$qui6T=$_POST['qui6T'];
$sex1T=$_POST['sex1T'];
$sex2T=$_POST['sex2T'];
$sex3T=$_POST['sex3T'];
$sex4T=$_POST['sex4T'];
$sex5T=$_POST['sex5T'];
$sex6T=$_POST['sex6T'];
if ($seg1M <> '') { $sql = "update tb_horarios set turma = '$seg1M' where ID = 1"; $query = mysql_query($sql); }
if ($seg2M <> '') { $sql = "update tb_horarios set turma = '$seg2M' where ID = 2"; $query = mysql_query($sql); }
if ($seg3M <> '') { $sql = "update tb_horarios set turma = '$seg3M' where ID = 3"; $query = mysql_query($sql); }
if ($seg4M <> '') { $sql = "update tb_horarios set turma = '$seg4M' where ID = 4"; $query = mysql_query($sql); }
if ($seg5M <> '') { $sql = "update tb_horarios set turma = '$seg5M' where ID = 5"; $query = mysql_query($sql); }
if ($seg6M <> '') { $sql = "update tb_horarios set turma = '$seg6M' where ID = 6"; $query = mysql_query($sql); }
if ($ter1M <> '') { $sql = "update tb_horarios set turma = '$ter1M' where ID = 7"; $query = mysql_query($sql); }
if ($ter2M <> '') { $sql = "update tb_horarios set turma = '$ter2M' where ID = 8"; $query = mysql_query($sql); }
if ($ter3M <> '') { $sql = "update tb_horarios set turma = '$ter3M' where ID = 9"; $query = mysql_query($sql); }
if ($ter4M <> '') { $sql = "update tb_horarios set turma = '$ter4M' where ID = 10"; $query = mysql_query($sql); }
if ($ter5M <> '') { $sql = "update tb_horarios set turma = '$ter5M' where ID = 11"; $query = mysql_query($sql); }
if ($ter6M <> '') { $sql = "update tb_horarios set turma = '$ter6M' where ID = 12"; $query = mysql_query($sql); }
if ($qua1M <> '') { $sql = "update tb_horarios set turma = '$qua1M' where ID = 13"; $query = mysql_query($sql); }
if ($qua2M <> '') { $sql = "update tb_horarios set turma = '$qua2M' where ID = 14"; $query = mysql_query($sql); }
if ($qua3M <> '') { $sql = "update tb_horarios set turma = '$qua3M' where ID = 15"; $query = mysql_query($sql); }
if ($qua4M <> '') { $sql = "update tb_horarios set turma = '$qua4M' where ID = 16"; $query = mysql_query($sql); }
if ($qua5M <> '') { $sql = "update tb_horarios set turma = '$qua5M' where ID = 17"; $query = mysql_query($sql); }
if ($qua6M <> '') { $sql = "update tb_horarios set turma = '$qua6M' where ID = 18"; $query = mysql_query($sql); }
if ($qui1M <> '') { $sql = "update tb_horarios set turma = '$qui1M' where ID = 19"; $query = mysql_query($sql); }
if ($qui2M <> '') { $sql = "update tb_horarios set turma = '$qui2M' where ID = 20"; $query = mysql_query($sql); }
if ($qui3M <> '') { $sql = "update tb_horarios set turma = '$qui3M' where ID = 21"; $query = mysql_query($sql); }
if ($qui4M <> '') { $sql = "update tb_horarios set turma = '$qui4M' where ID = 22"; $query = mysql_query($sql); }
if ($qui5M <> '') { $sql = "update tb_horarios set turma = '$qui5M' where ID = 23"; $query = mysql_query($sql); }
if ($qui6M <> '') { $sql = "update tb_horarios set turma = '$qui6M' where ID = 24"; $query = mysql_query($sql); }
if ($sex1M <> '') { $sql = "update tb_horarios set turma = '$sex1M' where ID = 25"; $query = mysql_query($sql); }
if ($sex2M <> '') { $sql = "update tb_horarios set turma = '$sex2M' where ID = 26"; $query = mysql_query($sql); }
if ($sex3M <> '') { $sql = "update tb_horarios set turma = '$sex3M' where ID = 27"; $query = mysql_query($sql); }
if ($sex4M <> '') { $sql = "update tb_horarios set turma = '$sex4M' where ID = 28"; $query = mysql_query($sql); }
if ($sex5M <> '') { $sql = "update tb_horarios set turma = '$sex5M' where ID = 29"; $query = mysql_query($sql); }
if ($sex6M <> '') { $sql = "update tb_horarios set turma = '$sex6M' where ID = 30"; $query = mysql_query($sql); }
if ($seg1T <> '') { $sql = "update tb_horarios set turma = '$seg1T' where ID = 31"; $query = mysql_query($sql); }
if ($seg2T <> '') { $sql = "update tb_horarios set turma = '$seg2T' where ID = 32"; $query = mysql_query($sql); }
if ($seg3T <> '') { $sql = "update tb_horarios set turma = '$seg3T' where ID = 33"; $query = mysql_query($sql); }
if ($seg4T <> '') { $sql = "update tb_horarios set turma = '$seg4T' where ID = 34"; $query = mysql_query($sql); }
if ($seg5T <> '') { $sql = "update tb_horarios set turma = '$seg5T' where ID = 35"; $query = mysql_query($sql); }
if ($seg6T <> '') { $sql = "update tb_horarios set turma = '$seg6T' where ID = 36"; $query = mysql_query($sql); }
if ($ter1T <> '') { $sql = "update tb_horarios set turma = '$ter1T' where ID = 37"; $query = mysql_query($sql); }
if ($ter2T <> '') { $sql = "update tb_horarios set turma = '$ter2T' where ID = 38"; $query = mysql_query($sql); }
if ($ter3T <> '') { $sql = "update tb_horarios set turma = '$ter3T' where ID = 39"; $query = mysql_query($sql); }
if ($ter4T <> '') { $sql = "update tb_horarios set turma = '$ter4T' where ID = 40"; $query = mysql_query($sql); }
if ($ter5T <> '') { $sql = "update tb_horarios set turma = '$ter5T' where ID = 41"; $query = mysql_query($sql); }
if ($ter6T <> '') { $sql = "update tb_horarios set turma = '$ter6T' where ID = 42"; $query = mysql_query($sql); }
if ($qua1T <> '') { $sql = "update tb_horarios set turma = '$qua1T' where ID = 43"; $query = mysql_query($sql); }
if ($qua2T <> '') { $sql = "update tb_horarios set turma = '$qua2T' where ID = 44"; $query = mysql_query($sql); }
if ($qua3T <> '') { $sql = "update tb_horarios set turma = '$qua3T' where ID = 45"; $query = mysql_query($sql); }
if ($qua4T <> '') { $sql = "update tb_horarios set turma = '$qua4T' where ID = 46"; $query = mysql_query($sql); }
if ($qua5T <> '') { $sql = "update tb_horarios set turma = '$qua5T' where ID = 47"; $query = mysql_query($sql); }
if ($qua6T <> '') { $sql = "update tb_horarios set turma = '$qua6T' where ID = 48"; $query = mysql_query($sql); }
if ($qui1T <> '') { $sql = "update tb_horarios set turma = '$qui1T' where ID = 49"; $query = mysql_query($sql); }
if ($qui2T <> '') { $sql = "update tb_horarios set turma = '$qui2T' where ID = 50"; $query = mysql_query($sql); }
if ($qui3T <> '') { $sql = "update tb_horarios set turma = '$qui3T' where ID = 51"; $query = mysql_query($sql); }
if ($qui4T <> '') { $sql = "update tb_horarios set turma = '$qui4T' where ID = 52"; $query = mysql_query($sql); }
if ($qui5T <> '') { $sql = "update tb_horarios set turma = '$qui5T' where ID = 53"; $query = mysql_query($sql); }
if ($qui6T <> '') { $sql = "update tb_horarios set turma = '$qui6T' where ID = 54"; $query = mysql_query($sql); }
if ($sex1T <> '') { $sql = "update tb_horarios set turma = '$sex1T' where ID = 55"; $query = mysql_query($sql); }
if ($sex2T <> '') { $sql = "update tb_horarios set turma = '$sex2T' where ID = 56"; $query = mysql_query($sql); }
if ($sex3T <> '') { $sql = "update tb_horarios set turma = '$sex3T' where ID = 57"; $query = mysql_query($sql); }
if ($sex4T <> '') { $sql = "update tb_horarios set turma = '$sex4T' where ID = 58"; $query = mysql_query($sql); }
if ($sex5T <> '') { $sql = "update tb_horarios set turma = '$sex5T' where ID = 59"; $query = mysql_query($sql); }
if ($sex6T <> '') { $sql = "update tb_horarios set turma = '$sex6T' where ID = 60"; $query = mysql_query($sql); }
if($query){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="cronograma.php">';}
}
//----------OPTIONS
$opt = 
'
<option>PRE I A</option>
<option>PRE II A</option>
<option>PRE II B</option>
<option>PRE II C</option>
<option>1º A</option>
<option>1º B</option>
<option>1º C</option>
<option>2º A</option>
<option>2º B</option>
<option>3º A</option>
<option>3º B</option>
<option>3º C</option>
<option>4º A</option>
<option>4º B</option>
<option>4º C</option>
<option>5º A</option>
<option>5º B</option>
<option> TI </option>
<option> CT </option>
<option> C/F </option>
';
ECHO'
<div class="Body"><div align="center">
<form method="POST" action="horario.php">
	<hr>
	<table border="0">
	<tr>
		<td align="center" width="73">INICIO</td>
		<td align="center" width="71">TERMINO</td>
		<td align="center">SEG</td>
		<td align="center">TER</td>
		<td align="center">QUA</td>
		<td align="center">QUI</td>
		<td align="center">SEX</td>
	</tr>
	<tr>
		<td width="73" align="center">07:35</td>
		<td width="71" align="center">08:15</td>
		<td>		
			<select size="1" name="seg1M">
			'.$opt.'<option selected>'.$dbseg1M.'</option>
			</select>		
		</td>
		<td><select size="1" name="ter1M">
			'.$opt.'<option selected>'.$dbter1M.'</option>
			</select></td>
		<td><select size="1" name="qua1M">
			'.$opt.'<option selected>'.$dbqua1M.'</option>
			</select></td>
		<td><select size="1" name="qui1M">
			'.$opt.'<option selected>'.$dbqui1M.'</option>
			</select></td>
		<td><select size="1" name="sex1M">
			'.$opt.'<option selected>'.$dbsex1M.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">08:15</td>
		<td width="71" align="center">08:55</td>
		<td>		
			<select size="1" name="seg2M">
			'.$opt.'<option selected>'.$dbseg2M.'</option>
			</select></td>
		<td><select size="1" name="ter2M">
			'.$opt.'<option selected>'.$dbter2M.'</option>
			</select></td>
		<td><select size="1" name="qua2M">
			'.$opt.'<option selected>'.$dbqua2M.'</option>
			</select></td>
		<td><select size="1" name="qui2M">
			'.$opt.'<option selected>'.$dbqui2M.'</option>
			</select></td>
		<td><select size="1" name="sex2M">
			'.$opt.'<option selected>'.$dbsex2M.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">08:55</td>
		<td width="71" align="center">09:35</td>
		<td>
		
			<select size="1" name="seg3M">
			'.$opt.'<option selected>'.$dbseg3M.'</option>
			</select></td>
		<td><select size="1" name="ter3M">
			'.$opt.'<option selected>'.$dbter3M.'</option>
			</select></td>
		<td><select size="1" name="qua3M">
			'.$opt.'<option selected>'.$dbqua3M.'</option>
			</select></td>
		<td><select size="1" name="qui3M">
			'.$opt.'<option selected>'.$dbqui3M.'</option>
			</select></td>
		<td><select size="1" name="sex3M">
			'.$opt.'<option selected>'.$dbsex3M.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">09:35</td>
		<td width="71" align="center">10:15</td>
		<td>
			<select size="1" name="seg4M">
			'.$opt.'<option selected>'.$dbseg4M.'</option>
			</select></td>
		<td><select size="1" name="ter4M">
			'.$opt.'<option selected>'.$dbter4M.'</option>
			</select></td>
		<td><select size="1" name="qua4M">
			'.$opt.'<option selected>'.$dbqua4M.'</option>
			</select></td>
		<td><select size="1" name="qui4M">
			'.$opt.'<option selected>'.$dbqui4M.'</option>
			</select></td>
		<td><select size="1" name="sex4M">
			'.$opt.'<option selected>'.$dbsex4M.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">10:15</td>
		<td width="71" align="center">10:55</td>
		<td>
			<select size="1" name="seg5M">
			'.$opt.'<option selected>'.$dbseg5M.'</option>
			</select></td>
		<td><select size="1" name="ter5M">
			'.$opt.'<option selected>'.$dbter5M.'</option>
			</select></td>
		<td><select size="1" name="qua5M">
			'.$opt.'<option selected>'.$dbqua5M.'</option>
			</select></td>
		<td><select size="1" name="qui5M">
			'.$opt.'<option selected>'.$dbqui5M.'</option>
			</select></td>
		<td><select size="1" name="sex5M">
			'.$opt.'<option selected>'.$dbsex5M.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">10:55</td>
		<td width="71" align="center">11:35</td>
		<td>
			<select size="1" name="seg6M">
			'.$opt.'<option selected>'.$dbseg6M.'</option>
			</select></td>
		<td><select size="1" name="ter6M">
			'.$opt.'<option selected>'.$dbter6M.'</option>
			</select></td>
		<td><select size="1" name="qua6M">
			'.$opt.'<option selected>'.$dbqua6M.'</option>
			</select></td>
		<td><select size="1" name="qui6M">
			'.$opt.'<option selected>'.$dbqui6M.'</option>
			</select></td>
		<td><select size="1" name="sex6M">
			'.$opt.'<option selected>'.$dbsex6M.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">13:20</td>
		<td width="71" align="center">14:00</td>
		<td>
			<select size="1" name="seg1T">
			'.$opt.'<option selected>'.$dbseg1T.'</option>
			</select></td>
		<td><select size="1" name="ter1T">
			'.$opt.'<option selected>'.$dbter1T.'</option>
			</select></td>
		<td><select size="1" name="qua1T">
			'.$opt.'<option selected>'.$dbqua1T.'</option>
			</select></td>
		<td><select size="1" name="qui1T">
			'.$opt.'<option selected>'.$dbqui1T.'</option>
			</select></td>
		<td><select size="1" name="sex1T">
			'.$opt.'<option selected>'.$dbsex1T.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">14:00</td>
		<td width="71" align="center">14:40</td>
		<td>
			<select size="1" name="seg2T">
			'.$opt.'<option selected>'.$dbseg2T.'</option>
			</select></td>
		<td><select size="1" name="ter2T">
			'.$opt.'<option selected>'.$dbter2T.'</option>
			</select></td>
		<td><select size="1" name="qua2T">
			'.$opt.'<option selected>'.$dbqua2T.'</option>
			</select></td>
		<td><select size="1" name="qui2T">
			'.$opt.'<option selected>'.$dbqui2T.'</option>
			</select></td>
		<td><select size="1" name="sex2T">
			'.$opt.'<option selected>'.$dbsex2T.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">14:40</td>
		<td width="71" align="center">15:20</td>
		<td>
			<select size="1" name="seg3T">
			'.$opt.'<option selected>'.$dbseg3T.'</option>
			</select></td>
		<td><select size="1" name="ter3T">
			'.$opt.'<option selected>'.$dbter3T.'</option>
			</select></td>
		<td><select size="1" name="qua3T">
			'.$opt.'<option selected>'.$dbqua3T.'</option>
			</select></td>
		<td><select size="1" name="qui3T">
			'.$opt.'<option selected>'.$dbqui3T.'</option>
			</select></td>
		<td><select size="1" name="sex3T">
			'.$opt.'<option selected>'.$dbsex3T.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">15:20</td>
		<td width="71" align="center">16:00</td>
		<td>
			<select size="1" name="seg4T">
			'.$opt.'<option selected>'.$dbseg4T.'</option>
			</select></td>
		<td><select size="1" name="ter4T">
			'.$opt.'<option selected>'.$dbter4T.'</option>
			</select></td>
		<td><select size="1" name="qua4T">
			'.$opt.'<option selected>'.$dbqua4T.'</option>
			</select></td>
		<td><select size="1" name="qui4T">
			'.$opt.'<option selected>'.$dbqui4T.'</option>
			</select></td>
		<td><select size="1" name="sex4T">
			'.$opt.'<option selected>'.$dbsex4T.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">16:00</td>
		<td width="71" align="center">16:40</td>
		<td>
			<select size="1" name="seg5T">
			'.$opt.'<option selected>'.$dbseg5T.'</option>
			</select></td>
		<td><select size="1" name="ter5T">
			'.$opt.'<option selected>'.$dbter5T.'</option>
			</select></td>
		<td><select size="1" name="qua5T">
			'.$opt.'<option selected>'.$dbqua5T.'</option>
			</select></td>
		<td><select size="1" name="qui5T">
			'.$opt.'<option selected>'.$dbqui5T.'</option>
			</select></td>
		<td><select size="1" name="sex5T">
			'.$opt.'<option selected>'.$dbsex5T.'</option>
			</select></td>
	</tr>
	<tr>
		<td width="73" align="center">16:40</td>
		<td width="71" align="center">17:20</td>
		<td>
			<select size="1" name="seg6T">
			'.$opt.'<option selected>'.$dbseg6T.'</option>
			</select></td>
		<td><select size="1" name="ter6T">
			'.$opt.'<option selected>'.$dbter6T.'</option>
			</select></td>
		<td><select size="1" name="qua6T">
			'.$opt.'<option selected>'.$dbqua6T.'</option>
			</select></td>
		<td><select size="1" name="qui6T">
			'.$opt.'<option selected>'.$dbqui6T.'</option>
			</select></td>
		<td><select size="1" name="sex6T">
			'.$opt.'<option selected>'.$dbsex6T.'</option>
			</select></td>
	</tr>
</table>
	<p><input type="submit" value="Salvar" name="btnSalvar"></p>
	<hr>
</form>
</div>
</div>
';
?>