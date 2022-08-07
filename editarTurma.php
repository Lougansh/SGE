<?php 
session_start("editar");
include './conexao.php';
include './conf.php';
menu();
//----------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['btnSalvar']) && $_POST['textID'] != ''){
	    $ID = $_POST['textID'];
        $ano = $_POST['textAno'];
        $turma = $_POST['textTurma'];
		$status = $_POST['textStatus'];
		$obs = $_POST['textObs'];

$sql = "update tb_turma set ano='$ano',turma='$turma',status='$status',obs='$obs' where ID = '$ID'"; 
$result = mysqli_query($connection, $sql);
if($result){echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Atualizado com sucesso!!!")
			window.location="turma.php"	
		</SCRIPT>
	';}
}
//----------------------------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['ID'])){
		$ID = $_GET['ID'];		
		$sql = "select * from tb_turma where ID = $ID";
		$result = mysqli_query($connection, $sql);
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$i++;
      	$ID = $row['ID'];
      	$ano = $row['ano'];
      	$turma = $row['turma'];
		$status = $row['status'];
		$obs = $row['obs'];
		}
	}
echo
	'<html>
	<head>
	<title>Atualização de Turmas</title>
	</head>
	<body>
		<div align="center"><h2>Atualização de Turmas</h2><hr width="50%"><hr width="70%"></div>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="center">
					<br><table border="0">
						<tr>
							<td rowspan="7" align="center" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
								<img src="../upload/logoMFT.jpg">
								<hr width="50%">
								<hr width="30%">
								<hr width="10%">
							</td>
						</tr>
						<tr>	
							<td align="right" width="116" >ID: 
							</td>
							<td>
								<input style="text-align:center" type="text" size="10" name="textID" value="'.$ID.'"> Ano:
								<input style="text-align:center" type="text" size="1" name="textAno" value="'.$ano.'"> Turma: 
								<input style="text-align:center" type="text" size="1" name="textTurma" value="'.$turma.'">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Status: 
							</td>
							<td>
								<input type="text" size="1" name="textStatus" value="'.$status.'">
							</td>
						</tr>
						
						<tr>
							<td align="right" width="116" >Observações:</td>
							<td>
								<textarea rows="10" name="textObs" cols="50">'.$obs.'</textarea>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" >
								&nbsp;</td>
							<td valign="top">
								<input type="submit" value="Salvar" name="btnSalvar"</center></td>
						</tr>
					</table>
					</div>
		</form>
	</body>
</html>
';
}
?>