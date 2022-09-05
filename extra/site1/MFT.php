<?php
include './conexao.php';
include './conf.php';
alunosMFT();
echo'
<!DOCTYPE html>
<html lang="pt-br">
<head><title>Cadastro de Alunos CFH</title></head>
<meta charset="utf-8">
<body>
<div align="center"><table border="0" width="1080">
	<tr>
			<td rowspan="4" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../upload/RoboCFH3.png" height="300">
				<hr width="50%">
			<p>
				<select size="1" name="dropCodigo"><option selected value="CFH">CFH '.date("Y").'</option></select></p>
			<hr width="30%">
				<hr width="10%">
				<br>
				<hr width="10%"><hr width="30%"><hr width="50%">
			</td>
		</tr>
	<tr>	
		<td align="right" valign="top" ><font size="7" face="Cooper Black">
		CONSTRUINDO</font><p><font size="7" face="Cooper Black">O FUTURO</font></p>
		<p><font size="7" face="Cooper Black">HOJE</font></p>
		<p align="left">
		<img src="../upload/engrenagem.jpg"></td>
	</tr>
	<tr>
		<td align="center" >
		<p align="center"><font face="Cooper Black" size="5">Você é o criador do 
		seu próprio mérito</font></td>
		</tr>
	</table>
</div>
</form>
</body>
</html>
';
?>