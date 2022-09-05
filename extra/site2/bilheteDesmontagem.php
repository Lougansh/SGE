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
$print = '<input type=image src="../images/print.png" width="20" height="20" value="Imprimir" onClick="self.print();" /> ';

}
echo '
<div class="botao"><form method="POST" action="bilheteDesmontagem.php">
	<p align="right"><select size="1" name="dropAluno">
	'.$dropMenu.'
	</select><input type="submit" value="Criar" name="btnSelect"> '.$print.' <a href="menu.php">Voltar</a></p>
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
		<td style="border-style: none; border-width: medium">
<p align="center"><font size="7"><b>Encontro Robótica 2019</b></font></td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium">
<p align="justify">&nbsp;</p>
<p align="justify"><font size="4">Informo aos pais ou responsáveis que os alunos 
do projeto CONTRA TURNO ESCOLAR irão participar no sábado dia 25 de maio de 
2019. De uma aula pratica de desmontagem de equipamentos eletrônicos doados pela 
Itaipu Binacional.</font></p>
<p align="justify"><font size="4">Os trabalhos irão iniciar as 09:00 com 
separação e organização do material a ser desmontado.</font></p>
<p align="justify"><font size="4">As 12:00 faremos uma parada para o nosso 
piquenique.</font></p>
<p align="justify"><font size="4">A previsão de termino dos trabalhos será 
18:00.</font></p>
<ul>
	<li>  
	<p align="justify"><font size="4">Os interessados em participar do 
	piquenique deverão trazer um prato ou refrigerante.</font></p></li>
	<li>
	<p align="justify"><font size="4">Não é obrigatório que o aluno fique o 
	tempo todo (09:00 as 18:00).</font></p></li>
	<li>
	<p align="justify"><font size="4">Quem não puder vir as 09:00, pode vir no 
	seu melhor horário.</font></p></li>
	<li>
	<p align="justify"><font size="4">Os pais que puderem nos ajudar serão bem 
	vindos.</font></p></li>  
</ul>
<p align="justify"><font size="4">Autorizo a participação de '.$aluno.', no 
encontro da robótica, a gravação em vídeo da imagem e depoimentos, bem como a 
veiculação de sua imagem e depoimentos em qualquer meio de comunicação para fins 
didáticos, de pesquisa e divulgação de conhecimento científico, elaboração de 
produtos e divulgação de projetos audiovisuais sem quaisquer ônus. Fica ainda 
autorizada, de livre e espontânea vontade, para os mesmos fins, a cessão de 
direitos de veiculação das imagens e depoimentos, não recebendo para tanto 
qualquer tipo de remuneração.</font><br>
&nbsp;</td>
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