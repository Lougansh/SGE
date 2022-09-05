<?php 
date_default_timezone_set('America/Sao_Paulo');
echo '
<style type="text/css">
.footer {
    position:absolute;
    bottom:0;
    width:90%;
}
.content {overflow:hidden;}
.aside {width:200px;}
.fleft {float:left;}
.fright {float:right;}
<!---------------------------------
}
</style>
<style media="print">.botao {display: none;}</style>';
include './conexao.php';
include './conf.php';
	$sql = "select * from tb_aluno where Programacao = 'S' and Situacao = 'A' order by Nome desc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$dropMenu = '<option value="'.$linha['ID'].'">'.$linha['Nome'].'</option>'.$dropMenu;
	}

if (isset($_POST['btnSelect'])){
	$ID = $_POST['dropAluno'];
	$sql = "select * from tb_aluno where ID = $ID order by Nome asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$aluno = ucwords(strtolower($linha['Nome']));
	$sexo  = $linha['Sexo'];
	if ($sexo == 'F'){
		$pronome = 'ela';
	}
	if ($sexo == 'M'){
		$pronome = 'ele';
	}
}
}
echo '
<div class="botao"><form method="POST" action="bilheteFotografiaLivre.php">
	<p align="right"><select size="1" name="dropAluno">
	'.$dropMenu.'
	</select><input type="submit" value="Criar" name="btnSelect"> <a href="menu.php">Voltar</a></p>
</form></div>
<table border="0" width="100%">
	<tr>
		<td width="15%">
		<p align="center">
		<img border="0" src="../images/logoRobotica00.png" height="150"></td>
		<td>
		<p align="center"><font size="4">ESCOLA MUNICIPAL TEREZINHA PICOLI CEZAROTTO</font><br>
		<b><font size="6">PROJETO DE ROBÓTICA
</font></b><br>
		<font size="4">CONSTRUINDO O FUTURO HOJE</font></td>
		<td width="15%">
		<p align="center">
		<img border="0" src="../images/logoEscola00.png" height="100"></td>
	</tr>
	</table>
<div align="center">
';
//------------------------------------------------------
echo'
<table border="0" width="80%" style="border-width: 0px">
	<tr>
		<td style="border-style: none; border-width: medium" colspan="2">
<p align="center"><b><font size="4">FOTOGRAFIA LIVRE</font></b></td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" colspan="2">
Neste curso o aluno vai aprender técnicas para fotografar com bom enquadramento, 
foco, abertura e velocidade.</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" width="50%" valign="top">
<ul>
	<li>Historia da fotografia<ul>
		<li>Tipos de maquinas</li>
		<li>Evolução da fotografia</li>
		<li>fotografia analógica e fotografia digital</li>
	</ul>
	</li>
	<li>Enquadramento<ul>
		<li>Composição do quadro</li>
		<li>regra dos terços</li>
	</ul>
	</li>
	<li>Foco<ul>
		<li>Distancia focal</li>
		<li>lente Fixa</li>
		<li>Grande angular</li>
		<li>Teleobjetivas</li>
		<li>Macro</li>
	</ul>
	</li>
	<li>Abertura<ul>
		<li>Profundidade de campo</li>
		<li>efeitos de luminosidade</li>
		<li>Efeitos de realçar o objeto da foto</li>
	</ul>
	</li>
</ul>
		</td>
		<td style="border-style: none; border-width: medium" width="50%" valign="top">
<ul>
	<li>Velocidade<ul>
		<li>Tempo de exposição</li>
		<li>Foto Noturna</li>
	</ul>
	</li>
	<li>ISO<ul>
		<li>Tipos de ISO</li>
		<li>Ruído nas fotos</li>
	</ul>
	</li>
	<li>Iluminação<ul>
		<li>Luz frontal</li>
		<li>Luz lateral</li>
		<li>Luz 45º</li>
		<li>Contra Luz</li>
		<li>Luz Zenital</li>
		<li>Luz Negativa</li>
	</ul>
	</li>
	<li>Mostra de fotografia<ul>
		<li>WorkShop de fotografia</li>
	</ul>
	</li>
</ul>
		</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" width="100%" valign="top" colspan="2">
A partir da segunda aula os alunos que possuírem equipamento fotográfico, 
poderão trazer para fazer as aulas práticas, os alunos que por ventura não 
possuam ou não possam trazer, participaram das aulas normalmente, apenas não 
terão as aulas praticas. Porem aprenderão toda teoria.<p>A escola Terezinha 
Picoli Cezarotto não se responsabiliza por danos ou perdas de equipamentos 
cabendo a responsabilidade a cada aluno.</p>
<p>Autorizo '.$aluno.' a levar equipamento fotográfico e estou ciente que 
qualquer prejuízo do equipamento e de minha inteira responsabilidade.</td>
	</tr>
</table>
';
//------------------------------------------------------
echo'
</div>
<div class="footer"><table border="0" width="100%" style="border-width: 0px">
	<tr>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">
		<p align="right">Cascavel '.date('d/m/Y').'.</td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style:none; border-width:medium; ">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium">&nbsp;</td>
	</tr>
	<tr>
		<td style="border-top-style: solid; border-top-width: 1px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" width="40%">
		<p align="center">MÃE</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-top-style: solid; border-top-width: 1px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" width="40%">
		<p align="center">PAI OU RESPONSÁVEL</td>
	</tr>
</table>
';
?>