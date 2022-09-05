<?php 
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
echo '
<div class="botao"><form method="POST" action="bilheteEscolhaRobotica.php">
	<p align="right"><select size="1" name="dropAluno">
	'.$dropMenu.'
	</select><input type="submit" value="Criar" name="btnSelect"> <a href="menu.php">Voltar</a></p>
</form></div>
';
if (isset($_POST['btnSelect'])){
	$ID = $_POST['dropAluno'];
	$sql = "select * from tb_aluno where ID = $ID order by Nome asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$aluno = $linha['Nome'];
	$sexo  = $linha['Sexo'];
}
}
//---------------------------------------------------------
echo'
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
	<tr>
		<td width="15%">&nbsp;</td>
		<td>
		&nbsp;</td>
		<td width="15%">&nbsp;</td>
	</tr>
	<tr>
		<td width="15%">&nbsp;</td>
		<td>
		&nbsp;</td>
		<td width="15%">&nbsp;</td>
	</tr>
</table>
';
//------------------------------------------------------
echo'
<div align="center">
<table border="0" width="80%">
	<tr>
		<td>
<hr><h1 align="center">SELEÇÃO PARA BATALHA DE ROBÔS</h1><hr>
<p align="justify">Foi verificado que '.$aluno.'. Apresentou grande autonomia, boa assimilação e fixação de conteúdo, realizando todas as atividades de maneira satisfatória.

<p align="justify">Destacou-se entre seus colegas de forma responsável, independente, participativa, apresentou bom comportamento e grande potencial.

<p align="justify">Sendo selecionada para compor a equipe de batalha de robôs, juntamente com os alunos de outras edições do curso que irão competir no desafio CEEP, durante o evento do TECNOVAÇÃO e INNOVACITIES.

<p align="justify">Que será nos dias 2,3 e 4 de maio de 2019, no Centro de Convenções de Cascavel.
Os encontros de preparação para o evento serão nas quintas – feiras, na Escola Terezinha Picoli Cezarotto, nos mesmos horários do projeto CONTRA TURNO.

<p align="justify">Grato pela sua atenção e contando com sua colaboração quanto à autorização da participação de 
'.$aluno.', atenciosamente Everaldo José de Souza – Instrutor de Informática.
<hr>
<p align="center"><b>AUTORIZAÇÃO</b> 
<p>Autorizo '.$aluno.' a participar da equipe de batalha de robôs.
<hr>
		</td>
	</tr>
</table>
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
<div style='page-break-before:always;'>&nbsp</div>
';
?>