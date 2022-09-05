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
}
echo '
<div class="botao"><form method="POST" action="bilheteTechnovacao.php">
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
		<td style="border-style: none; border-width: medium">
<p align="center"><font size="7"><b>TECHNOVAÇÃO 2019</b></font></td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium">
<p align="justify"><font size="4">Informo aos pais ou responsáveis que os alunos 
do projeto CONTRA TURNO ESCOLAR irão participar do &quot; Technovação 2019&quot; que sera 
realizado no Centro de Convenções de Cascavel no dia 3 de maio de 2019, sexta 
feira.</font></p>
<p align="justify"><font size="4">Com Saida Prevista para:</font></p>
<p align="justify"><font size="4">Turma da manha as 07:35 e retorno previsto 
11:35.</font></p>
<p align="justify"><font size="4">Turma da tarde as 13:20 e retorno previsto 
17:20.</font></p>
<p align="justify"><font size="4">Durante o evento '.$aluno.' poderá participar 
de diversas oficinas a sua escolha bem como participar e diversos desafios de 
robótica.</font></p>
<p align="justify"><font size="4">OS alunos serão acompanhados por pedagogos e 
pelo instrutor de informática durante o evento.</font></p>
<p align="justify"><font size="4">Os pais ou responsáveis que quiserem 
participar poderão fazê-lo levando em consideração que o evento é de entrada 
livre, cabendo apenas aos interessados fazerem o seu devido cadastro em: </font>
</p>
<p align="center"><a href="https://doity.com.br/technovacao2019/inscricao">
<font size="4">https://doity.com.br/technovacao2019/inscricao</font></a><font size="4">.</font></p>
<p align="justify"><font size="4"><br>
É interessante que cada aluno leve água e algum lanche ou mesmo dinheiro, 
ficando a critério de cada família.</font></p>
<p align="justify"><font size="4">Autorizo a participação de '.$aluno.', no 
TECHNOVAÇÃO 2019, a gravação em vídeo da imagem e depoimentos, bem como a 
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