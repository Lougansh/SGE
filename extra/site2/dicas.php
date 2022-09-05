<?php
include './conexao.php';
//include './conf.php';
//head();
//menuVertical();
$sql = "SELECT * from tb_tutorial order by ID desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$tutoriais = $linha[ID].' - <b><font size="4">'.$linha[Titulo].'</font></b></br>'.nl2br($linha[Texto]).'</br>Creditos para: <font color="#FF0000">'.$linha[Creditos].'</font><br><br>'.$tutoriais;
}
if (isset($_POST['btnInserir']) && $_POST['textTitulo'] <> ""){
	$titulo = $_POST['textTitulo'];
   	$texto = $_POST['textTexto'];
   	$creditos = $_POST['textCreditos'];
   	$sql = "insert into tb_tutorial (Titulo, Texto, Creditos) values ('$titulo', '$texto', '$creditos')"; 
   	$query = mysql_query($sql); 
   	if($query){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="tutorial.php">';}
	$teste = 'Titulo:'.$titulo.'<br> Texto:'.$texto.'<br>  Creditos:'.$creditos.'<br>';
   }
?>
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>

<div class="Body"><div class="tutorial"><div align="left"><?php echo $tutoriais; ?></div></div></div>