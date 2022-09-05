<?php
session_start("planejamento");
include './conexao.php';
include './conf.php';
//echo '<meta http-equiv="content-type" content="text/html;charset=utf-8" />';
//head();
//menuVertical();
echo '
<br><br><br><br>
<form method="POST" action="?id=10" onchange="form.submit()"><div align="center">
<input type="submit" value="Home" name="btnHome" style="padding: 1; width:150px"><input type="submit" value="Refresh" name="btnRefresh" style="padding: 1; width:150px">
<table border="0" width="90%"><tr>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>Pré Escola</legend><div align="center"><input type="radio" value="0a" name="pesquisaPlanejamento" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>1º Ano    </legend><div align="center"><input type="radio" value="1a" name="pesquisaPlanejamento" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>2º Ano    </legend><div align="center"><input type="radio" value="2a" name="pesquisaPlanejamento" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>3º Ano    </legend><div align="center"><input type="radio" value="3a" name="pesquisaPlanejamento" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>4º Ano    </legend><div align="center"><input type="radio" value="4a" name="pesquisaPlanejamento" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>5º Ano    </legend><div align="center"><input type="radio" value="5a" name="pesquisaPlanejamento" onchange="form.submit()"></fieldset></div></td>
</div></td></tr></table></form>
';
//-----------------------------------------------------------------------------------------------
if (isset($_POST['pesquisaPlanejamento']) && $_POST['pesquisaPlanejamento'] != ''){
	$ano = substr($_POST['pesquisaPlanejamento'],0,1);
	$_SESSION["ano"] = $ano;
if ($ano==0){
	$anoTurma = 'Pré Escola';
}else{
	$anoTurma = $ano.'º Ano';
}
$conteudoID = 0;
$titulo = '<div align="center"><h3>PLANEJAMENTO DE INFORMÁTICA EDUCACIONAL - '.$anoTurma.'</h3></div>';
	$sql = 'SELECT * from tb_planejamento where turma = '.$_SESSION["ano"].' order by ID asc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$conteudoID ++;
	$objetivo =       str_replace( "\n",'</li><li>',$linha['Objetivo']);
		$encaminhamento = str_replace( "\n",'</li><li>',$linha['Encaminhamento']);
		$recurso =        str_replace( "\n",'</li><li>',$linha['Recurso']);
		
		$conteudo = $conteudo.'<p><b><font color="blue">CONTEÚDO '.$conteudoID.'</font>: <font color="gray">'.$linha['Conteudo'].'</font></b></p><p><b>          
												 <font color="green">OBJETIVOS:</font></b></p><ul><li>'.$objetivo.'</ul><p><b>  
												 <font color="brown">ENCAMINHAMENTOS METODOLÓGICOS:</font></b></p><ul><li>'.$encaminhamento.'</ul><b>
												 <font color="red">RECURSOS AUXILIARES EXTERNOS:</font></b><ul>
									<li>'.$recurso.'</ul><hr>';
	}
	mysql_free_result($query);
}
elseif (isset($_POST['btnPesquisar'])){
	if ($_SESSION["ano"]==0){
	$anoTurma = 'Pré Escola';
	}else{
	$anoTurma = $_SESSION["ano"].'º Ano';
	}
	$coluna = $_POST['pesquisa'];
	$assunto = $_POST['textPesquisar'];
	$sql = 'SELECT * from tb_planejamento where turma = '.$_SESSION["ano"].' and '.$coluna.' like "%'.$assunto.'%" order by ID desc';
	$titulo = '<div align="center"><h3>PLANEJAMENTO DE INFORMÁTICA EDUCACIONAL - '.$anoTurma.'</h3></div>';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		//$previsao = '<li>'.$linha['Conteudo'].'</li>'.$previsao;
		$objetivo =       str_replace( "\n",'</li><li>',$linha['Objetivo']);
		$encaminhamento = str_replace( "\n",'</li><li>',$linha['Encaminhamento']);
		$recurso =        str_replace( "\n",'</li><li>',$linha['Recurso']);
		
		$conteudo = '<p><b><font color="blue">CONTEÚDO</font>: <font color="gray">'.$linha['Conteudo'].'</font></b></p><p><b>          
												 <font color="green">OBJETIVOS:</font></b></p><ul><li>'.$objetivo.'</ul><p><b>  
												 <font color="brown">ENCAMINHAMENTOS METODOLÓGICOS:</font></b></p><ul><li>'.$encaminhamento.'</ul><b>
												 <font color="red">RECURSOS AUXILIARES EXTERNOS:</font></b><ul>
									<li>'.$recurso.'</ul><hr>'.$conteudo;
	}
	mysql_free_result($query);
}
elseif (isset($_POST['btnHome'])){
	//echo '<script>window.setTimeout(\"location.href='index.php'\",10)</script>';
	$refresh =  "<script>window.setTimeout(\"location.href='index.php'\",10)</script>";
}
/*elseif ($_POST['btnRefresh'])){
	echo '<script>window.setTimeout(\"location.href='planejamento.php'\",10)</script>';
}*/
else{
	$titulo = '<div align="center"><h3>PLANEJAMENTO DE INFORMÁTICA EDUCACIONAL - '.$ano.'</h3></div>';
	//--------------------------------------------------------------------------------------------------
$path = './../planejamento/'; 
$diretorio = dir($path);
$i = 0;
while(($arquivo = $diretorio -> read())){
if (($arquivo != '.directory') && ($arquivo != '.') && ($arquivo != '..')){
$nome = substr($arquivo , 0, -4);
$i++;
$fieldset = '<li><a href="'.$path.$arquivo.'">'.$nome.'</a></li>'.$fieldset;
$organizar = natcasesort ($fieldset);
}
}
$diretorio -> close(); 
//--------------------------------------------------------------------------------------------------
}
	echo'
<table border="0" width="90%"><tr><td><hr>
<p align="center">
<input type="text" name="textPesquisar" size="30">
<input type="radio" value="Objetivo" name="pesquisa" checked>Objetivo
<input type="radio" value="Encaminhamento" name="pesquisa">Encaminhamento
<input type="radio" value="Recurso" name="pesquisa">Recurso
<input type="submit" value="Pesquisar" name="btnPesquisar">
</p>
'.$titulo.'<br>'.$fieldset.'

<div align="left">
<ul><ul>
	'.$previsao.'
</ul>
</li>
</ul>
	'.$conteudo.'
	'.$refresh.'
	</td></tr></table>';
	
?>
