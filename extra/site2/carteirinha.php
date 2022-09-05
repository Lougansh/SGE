<?php 
include('../phpqrcode/qrlib.php'); 
include 'conexao.php';
$aux = '../qr_img0.50j/php/qr_img.php?';
$aux .= 'e=L&';
$aux .= 's=4&';
$aux .= 't=J';
$aux .= 'd=&';
#new barCodeGenrator($code_number,0,'hello.gif'); 

//-----------Monta dropSelect da lista dos alunos
$sql = "select * from tb_aluno_projeto where equipe = 'presencial' Order By nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
while ($linha = mysql_fetch_array($query)) {
	$explodeNomeAluno = explode(" ",$linha['nomeAluno']);
	//$aluno = ucwords(strtolower(current($explodeNomeAluno)));
	$aluno = '<font size="2" color="blue">'.$linha['nomeAluno'].'</font>';
	$explodeNomeResponsavel = explode(" ",$linha['nomeResponsavel']);
	$responsavel = ucwords(strtolower(current($explodeNomeResponsavel)));
	$ID = $linha['ID'];
	$projeto = 'CONSTRUINDO O FUTURO HOJE';
	$curso = 'ROBOTICA 2021';
	$telefone = $linha['tel1'];
	$aux .= 'd=http://www.construindoofuturohoje.com/site/qrcode.php?id='.$ID.'&';
	$i++;
if ($i>=4){
$i = 0;
echo'
<form method="POST" action="?id=carteirinha"><div align="center"><table border="0" width="99%" style="border-collapse: collapse">
<tr><td width="40%" valign="bottom"><div align="center"><br>
	<fieldset style="padding: 2"><legend><div align="left"><font size="4">'.$projeto.'</font></div></legend><table border="0" width="90%"><tr>
<td width="30%" valign="top"><p align="center">
	<img border="0" src="../images/alunos/'.$ID.'.JPG" width="96" height="125" style="border-radius: 15px;"></td>
<td width="70%" valign="top">
	<fieldset style="margin:1; padding:2; word-spacing:0; line-height:1; text-indent:0"><legend>Curso</legend><div align="center"><font size="2">'.$curso.'</font></fieldset>
	<center><b><font size="1" color="#0000FF"><br>
&nbsp;</font></b></center>
	<fieldset style="padding: 2"><legend>Responsável / Contato</legend><div align="center"><font size="3">'.$responsavel.' / '. $telefone.'</font></fieldset></td></tr><tr>
<td width="100%" valign="top" colspan="2">
	<fieldset style="padding: 2"><legend> Estudante </legend><div align="center">'.$aluno.'</fieldset></td></tr></table></fieldset><br></td>
<td width="40%" align="center"><font size="3">http://www.contruindoofuturohoje.com<br><img border="0" src="'.$aux.'"><center>'.$ID.'</center></font></td></tr>
</table><hr style="text-align: center; word-spacing: 0; line-height: 100%; margin: 0"></form>
';
echo "<div style='page-break-before:always;'>&nbsp</div>";	
}else{
echo'
<form method="POST" action="?id=carteirinha"><div align="center"><table border="0" width="99%" style="border-collapse: collapse">
<tr><td width="40%" valign="bottom"><div align="center"><br>
	<fieldset style="padding: 2"><legend><div align="left"><font size="4">'.$projeto.'</font></div></legend><table border="0" width="90%"><tr>
<td width="30%" valign="top"><p align="center">
	<img border="0" src="../images/alunos/'.$ID.'.JPG" width="96" height="125" style="border-radius: 15px;"></td>
<td width="70%" valign="top">
	<fieldset style="margin:1; padding:2; word-spacing:0; line-height:1; text-indent:0"><legend>Curso</legend><div align="center"><font size="2">'.$curso.'</font></fieldset>
	<center><b><font size="1" color="#0000FF"><br>
&nbsp;</font></b></center>
	<fieldset style="padding: 2"><legend>Responsável / Contato</legend><div align="center"><font size="3">'.$responsavel.' / '. $telefone.'</font></fieldset></td></tr><tr>
<td width="100%" valign="top" colspan="2">
	<fieldset style="padding: 2"><legend> Estudante </legend><div align="center">'.$aluno.'</font></fieldset></td></tr></table></fieldset><br></td>
<td width="40%" align="center"><font size="3">http://www.contruindoofuturohoje.com<br><img border="0" src="'.$aux.'"><center>'.$ID.'</center></font></td></tr>
</table><hr style="text-align: center; word-spacing: 0; line-height: 100%; margin: 0"></form>
';

}

}
mysql_free_result($query);
echo'';

?>
<head><link rel="shortcut icon" href="../images/favicon.ico"><style type="text/css">
fieldset {
border:2px solid black;
background-color: #f0ffff;
-moz-border-radius:15px; -webkit-border-radius:15px; border-radius:15px;
}
legend {
background-color: #ffffff;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
</style><title>Carteirinha</title></head>