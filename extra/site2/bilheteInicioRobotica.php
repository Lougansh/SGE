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
	$sql = "select * from tb_aluno where Programacao = 'S' and Situacao = 'A' order by Nome desc";
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
<div class="botao"><form method="POST" action="bilheteInicioRobotica.php">
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
		<td colspan="4" style="border-style: none; border-width: medium">
Informo aos pais ou responsáveis o horário do &quot;Contra Turno Escolar&quot; que ocorre 
na segunda, terça e quarta .<br>
&nbsp;</td>
	</tr>
	<tr>
		<td width="50%" valign="top" colspan="2" align="center" style="border-style: solid; border-width: 1px">
MANHA</td>
		<td width="50%" valign="top" colspan="2" align="center" style="border-style: solid; border-width: 1px">
TARDE</td>
	</tr>
	<tr>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
LANCHE</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
09:00</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
LANCHE</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
15:00</td>
	</tr>
	<tr>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
INICIO</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
09:20</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
INICIO</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
15:20</td>
	</tr>
	<tr>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
TERMINO</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
11:00</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
TERMINO</td>
		<td width="25%" valign="top" align="center" style="border-style: solid; border-width: 1px">
17:00</td>
	</tr>
	<tr>
		<td width="100%" valign="top" colspan="4" style="border-style: none; border-width: medium">
<br>
A escola Terezinha Picoli Cezarotto tem oferecido aos seus alunos, cursos nas 
seguintes areas:<ul>
	<li>Informática Básica.</li>
	<li>Digitação.</li>
	<li>Fotografia Livre.</li>
	<li>Edição de Imagens.</li>
	<li>Scratch.</li>
	<li>Web Designer.</li>
	<li>Robótica Educacional.</li>
	<li>Modelagem 3D.</li>
	<li>Impressão 3D.</li>
	<li>Manutenção de Computadores.</li>
	<li>Robótica Livre.</li>
</ul>
		</td>
	</tr>
	<tr>
		<td width="100%" valign="top" colspan="4" style="border-style: none; border-width: medium">
<p align="justify">É de sua inteira responsabilidade, trazer e buscar '.$aluno.' para oferecer a 
devida segurança, bem como verificar o vestuário para '.$pronome.' não vir para 
a escola com roupas inapropriadas, cumprir rigorosamente os horários acima 
mencionados e acompanhar a vida escolar para que '.$pronome.' não fique sem a 
supervisão de um adulto.</p>
<p align="justify">Foi colocado em votação com os alunos no início 
do projeto como seria o lanche, se eles queriam trazer de casa ou queriam 
consumir o lanche providenciado pela escola, por unanimidade decidiram que 
trariam o lanche para compartilhar com seus colegas.</p>
<p align="justify">Lembrando que a aula inicia às 09:20 no turno da manha e 15:20 no turno da 
tarde, se '.$aluno.' não tiver interesse em compartilhar o lanche poderá chegar 
esse horário sem qualquer problema.</p>
<p align="justify">Também informo que minha hora atividade é na sexta-feira onde estarei à 
disposição de todos para tratar de assuntos referentes ao projeto Contra Turno 
Escolar.</p>
<p align="justify">Ao assinar este bilhete o responsável&nbsp; por '.$aluno.' declara estar ciente 
de todas as informações.</td>
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