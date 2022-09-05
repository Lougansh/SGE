<?php
include './conexao.php';
include './conf.php';
head();
menuVertical();

$sql = 'SELECT * from tb_horarios';	
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['ID'] == 1){$seg1M =  $linha['turma'];}
		if ($linha['ID'] == 2){$seg2M =  $linha['turma'];}
		if ($linha['ID'] == 3){$seg3M =  $linha['turma'];}
		if ($linha['ID'] == 4){$seg4M =  $linha['turma'];}
		if ($linha['ID'] == 5){$seg5M =  $linha['turma'];}
		if ($linha['ID'] == 6){$seg6M =  $linha['turma'];}
		if ($linha['ID'] == 7){$ter1M =  $linha['turma'];}
		if ($linha['ID'] == 8){$ter2M =  $linha['turma'];}
		if ($linha['ID'] == 9){$ter3M =  $linha['turma'];}
		if ($linha['ID'] == 10){$ter4M =  $linha['turma'];}
		if ($linha['ID'] == 11){$ter5M =  $linha['turma'];}
		if ($linha['ID'] == 12){$ter6M =  $linha['turma'];}
		if ($linha['ID'] == 13){$qua1M =  $linha['turma'];}
		if ($linha['ID'] == 14){$qua2M =  $linha['turma'];}
		if ($linha['ID'] == 15){$qua3M =  $linha['turma'];}
		if ($linha['ID'] == 16){$qua4M =  $linha['turma'];}
		if ($linha['ID'] == 17){$qua5M =  $linha['turma'];}
		if ($linha['ID'] == 18){$qua6M =  $linha['turma'];}
		if ($linha['ID'] == 19){$qui1M =  $linha['turma'];}
		if ($linha['ID'] == 20){$qui2M =  $linha['turma'];}
		if ($linha['ID'] == 21){$qui3M =  $linha['turma'];}
		if ($linha['ID'] == 22){$qui4M =  $linha['turma'];}
		if ($linha['ID'] == 23){$qui5M =  $linha['turma'];}
		if ($linha['ID'] == 24){$qui6M =  $linha['turma'];}
		if ($linha['ID'] == 25){$sex1M =  $linha['turma'];}
		if ($linha['ID'] == 26){$sex2M =  $linha['turma'];}
		if ($linha['ID'] == 27){$sex3M =  $linha['turma'];}
		if ($linha['ID'] == 28){$sex4M =  $linha['turma'];}
		if ($linha['ID'] == 29){$sex5M =  $linha['turma'];}
		if ($linha['ID'] == 30){$sex6M =  $linha['turma'];}
		if ($linha['ID'] == 31){$seg1T =  $linha['turma'];}
		if ($linha['ID'] == 32){$seg2T =  $linha['turma'];}
		if ($linha['ID'] == 33){$seg3T =  $linha['turma'];}
		if ($linha['ID'] == 34){$seg4T =  $linha['turma'];}
		if ($linha['ID'] == 35){$seg5T =  $linha['turma'];}
		if ($linha['ID'] == 36){$seg6T =  $linha['turma'];}
		if ($linha['ID'] == 37){$ter1T =  $linha['turma'];}
		if ($linha['ID'] == 38){$ter2T =  $linha['turma'];}
		if ($linha['ID'] == 39){$ter3T =  $linha['turma'];}
		if ($linha['ID'] == 40){$ter4T =  $linha['turma'];}
		if ($linha['ID'] == 41){$ter5T =  $linha['turma'];}
		if ($linha['ID'] == 42){$ter6T =  $linha['turma'];}
		if ($linha['ID'] == 43){$qua1T =  $linha['turma'];}
		if ($linha['ID'] == 44){$qua2T =  $linha['turma'];}
		if ($linha['ID'] == 45){$qua3T =  $linha['turma'];}
		if ($linha['ID'] == 46){$qua4T =  $linha['turma'];}
		if ($linha['ID'] == 47){$qua5T =  $linha['turma'];}
		if ($linha['ID'] == 48){$qua6T =  $linha['turma'];}
		if ($linha['ID'] == 49){$qui1T =  $linha['turma'];}
		if ($linha['ID'] == 50){$qui2T =  $linha['turma'];}
		if ($linha['ID'] == 51){$qui3T =  $linha['turma'];}
		if ($linha['ID'] == 52){$qui4T =  $linha['turma'];}
		if ($linha['ID'] == 53){$qui5T =  $linha['turma'];}
		if ($linha['ID'] == 54){$qui6T =  $linha['turma'];}
		if ($linha['ID'] == 55){$sex1T =  $linha['turma'];}
		if ($linha['ID'] == 56){$sex2T =  $linha['turma'];}
		if ($linha['ID'] == 57){$sex3T =  $linha['turma'];}
		if ($linha['ID'] == 58){$sex4T =  $linha['turma'];}
		if ($linha['ID'] == 59){$sex5T =  $linha['turma'];}
		if ($linha['ID'] == 60){$sex6T =  $linha['turma'];}
	}
echo '
<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="cronograma.php">
<div class="Body">
<div align="center">
<h1>CRONOGRAMA 2019</h1>
<h3>MANHA</h3>
	<table border="2">
		<tr>
			<td align="center" width="100"><b>INICIO</b></td>
			<td align="center" width="100"><b>TERMINO</b></td>
			<td align="center" width="101"><b>SEG</b></td>
			<td align="center" width="101"><b>TER</b></td>
			<td align="center" width="101"><b>QUA</b></td>
			<td align="center" width="101"><b>QUI</b></td>
			<td align="center" width="101"><b>SEX</b></td>
		</tr>
		<tr>
			<td align="center" width="100">07:35</td>
			<td align="center" width="100">08:15</td>
			<td align="center" width="101">'.$seg1M.'</td>
			<td align="center" width="101">'.$ter1M.'</td>
			<td align="center" width="101">'.$qua1M.'</td>
			<td align="center" width="101">'.$qui1M.'</td>
			<td align="center" width="101">'.$sex1M.'</td>
		</tr>
		<tr>
			<td align="center" width="100">08:15</td>
			<td align="center" width="100">08:55</td>
			<td align="center" width="101">'.$seg2M.'</td>
			<td align="center" width="101">'.$ter2M.'</td>
			<td align="center" width="101">'.$qua2M.'</td>
			<td align="center" width="101">'.$qui2M.'</td>
			<td align="center" width="101">'.$sex2M.'</td>
		</tr>
		<tr>
			<td align="center" width="100">08:55</td>
			<td align="center" width="100">09:35</td>
			<td align="center" width="101">'.$seg3M.'</td>
			<td align="center" width="101">'.$ter3M.'</td>
			<td align="center" width="101">'.$qua3M.'</td>
			<td align="center" width="101">'.$qui3M.'</td>
			<td align="center" width="101">'.$sex3M.'</td>
		</tr>
		<tr>
			<td align="center" width="100">09:35</td>
			<td align="center" width="100">10:15</td>
			<td align="center" width="101">'.$seg4M.'</td>
			<td align="center" width="101">'.$ter4M.'</td>
			<td align="center" width="101">'.$qua4M.'</td>
			<td align="center" width="101">'.$qui4M.'</td>
			<td align="center" width="101">'.$sex4M.'</td>
		</tr>
		<tr>
			<td align="center" width="100">10:15</td>
			<td align="center" width="100">10:55</td>
			<td align="center" width="101">'.$seg5M.'</td>
			<td align="center" width="101">'.$ter5M.'</td>
			<td align="center" width="101">'.$qua5M.'</td>
			<td align="center" width="101">'.$qui5M.'</td>
			<td align="center" width="101">'.$sex5M.'</td>
		</tr>
		<tr>
			<td align="center" width="100">10:55</td>
			<td align="center" width="100">11:35</td>
			<td align="center" width="101">'.$seg6M.'</td>
			<td align="center" width="101">'.$ter6M.'</td>
			<td align="center" width="101">'.$qua6M.'</td>
			<td align="center" width="101">'.$qui6M.'</td>
			<td align="center" width="101">'.$sex6M.'</td>
		</tr>
		</table>
<h3>TARDE</h3>
<table border="2">
		<tr>
			<td align="center" width="100"><b>INICIO</b></td>
			<td align="center" width="100"><b>TERMINO</b></td>
			<td align="center" width="101"><b>SEG</b></td>
			<td align="center" width="101"><b>TER</b></td>
			<td align="center" width="101"><b>QUA</b></td>
			<td align="center" width="101"><b>QUI</b></td>
			<td align="center" width="101"><b>SEX</b></td>
		</tr>
		<tr>
			<td align="center" width="100">13:20</td>
			<td align="center" width="100">14:00</td>
			<td align="center" width="101">'.$seg1T.'</td>
			<td align="center" width="101">'.$ter1T.'</td>
			<td align="center" width="101">'.$qua1T.'</td>
			<td align="center" width="101">'.$qui1T.'</td>
			<td align="center" width="101">'.$sex1T.'</td>
		</tr>
		<tr>
			<td align="center" width="100">14:00</td>
			<td align="center" width="100">14:40</td>
			<td align="center" width="101">'.$seg2T.'</td>
			<td align="center" width="101">'.$ter2T.'</td>
			<td align="center" width="101">'.$qua2T.'</td>
			<td align="center" width="101">'.$qui2T.'</td>
			<td align="center" width="101">'.$sex2T.'</td>
		</tr>
		<tr>
			<td align="center" width="100">14:40</td>
			<td align="center" width="100">15:20</td>
			<td align="center" width="101">'.$seg3T.'</td>
			<td align="center" width="101">'.$ter3T.'</td>
			<td align="center" width="101">'.$qua3T.'</td>
			<td align="center" width="101">'.$qui3T.'</td>
			<td align="center" width="101">'.$sex3T.'</td>
		</tr>
		<tr>
			<td align="center" width="100">15:20</td>
			<td align="center" width="100">16:00</td>
			<td align="center" width="101">'.$seg4T.'</td>
			<td align="center" width="101">'.$ter4T.'</td>
			<td align="center" width="101">'.$qua4T.'</td>
			<td align="center" width="101">'.$qui4T.'</td>
			<td align="center" width="101">'.$sex4T.'</td>
		</tr>
		<tr>
			<td align="center" width="100">16:00</td>
			<td align="center" width="100">16:40</td>
			<td align="center" width="101">'.$seg5T.'</td>
			<td align="center" width="101">'.$ter5T.'</td>
			<td align="center" width="101">'.$qua5T.'</td>
			<td align="center" width="101">'.$qui5T.'</td>
			<td align="center" width="101">'.$sex5T.'</td>
		</tr>
		<tr>
			<td align="center" width="100">16:40</td>
			<td align="center" width="100">17:20</td>
			<td align="center" width="101">'.$seg6T.'</td>
			<td align="center" width="101">'.$ter6T.'</td>
			<td align="center" width="101">'.$qua6T.'</td>
			<td align="center" width="101">'.$qui6T.'</td>
			<td align="center" width="101">'.$sex6T.'</td>
			
		</tr>
	</table>
</div><p align="center"><a href="horario.php">Modificar Cronograma</a></p></div>
';
?>
<head>
  <style type="text/css">
	td{
		border: 1px solid #C1DAD7; padding:2px; 
	}
	.c1{
		background:#4b8c74;
	}
	.c2{
		background:#74c476;
	}
	.c3{
		background:#a4e56d;
	}
	.c4{
		background:#cffc83;
	}
  </style>
</head>


