<?php
if (isset($_POST['btn_calcular']) && $_POST['ct_peso'] != ''){
	$peso = $_POST['ct_peso'];
	$precoKilo=[$peso*90/1000,$peso*160/1000,$peso*500/1000,$peso*800/1000,$peso*1000/1000];
	$texto = ['90/KG','160/KG','500/KG','800/KG','1000/KG'];
	for ($i = 0; $i <= 4; $i++) {
		$money = number_format($precoKilo[$i], 2, ',', '.');
		$mostraCalculo = $mostraCalculo.'<tr><td align="right"><b>'.$texto[$i].'</b></td><td align="right"> R$ '.$money.' reais</td></tr>';
	}
}
?>
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<p align="center"><b><font size="5">Calculadora Impresso 3D</font></b></p>
<form method="POST" action="calc3D.php">
	<div align="center">
		<table border="0">
			<tr>
				<td align="right"><b>Peso</b></td>
				<td align="right">
				<input type="text" name="ct_peso" size="5" value="" autofocus> gramas</td>
			</tr>
				<?php echo $mostraCalculo; ?>
		</table>
	</div>
	<p align="center"><input type="submit" value="Calcular" name="btn_calcular"></p>
</form>