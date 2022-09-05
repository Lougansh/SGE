<?php
include './conexao.php';
include './conf.php';
nexus();
echo'
<!DOCTYPE html>
<html lang="pt-br">
<head><title>Cadastro de Alunos CFH</title></head>
<meta charset="utf-8">
<body>
<div align="center"><table border="0" width="1080">
	<tr>
			<td rowspan="4" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../upload/NexusFotografia.png" height="300">
				<hr width="50%">
			<p>
				<select size="1" name="dropCodigo"><option selected value="nexus">Cascavel, '.date("d/m/Y").'</option></select></p>
			</td>
		</tr>
	<tr>	
		<td align="center" >
		<p align="center"><font face="Cooper Black" size="8">Nexus</font></p>
		<p align="center"><font face="Cooper Black" size="8">Fotografia</font></p>
		</td>
	</tr>
	<tr>
		<td align="center" >
		<p align="center"><font face="Cooper Black" size="5" color="#FF0000">
		Eternizando Momentos</font></td>
		</tr>
	</table>
</div>
</form>
</body>
</html>
';
?>