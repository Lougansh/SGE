<?php
include './conf.php';
menuA();
$idAltera = $_GET["altera"];
if (isset($idAltera) && $idAltera >= 1){
$sql = "select * FROM tb_arquivo_morto WHERE id = $idAltera";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
echo '
<div align="center"><h1><font color="#FF0000">Atualização de Inativos</font></h1>
<form method="POST" action="?id=UPInativo"><table border="0" width="660"><tr>
<td width="76" align="right">ID:</td><td width="568"><input type="text" name="dropID" size="10" value="'.$linha['ID'].'"></td></tr><tr>
<td width="76" align="right">Nome:</td><td width="568"><input type="text"	name="dropNome" size="80" value="'.$linha['Nome'].'"></td></tr><tr>
<td width="76" align="right">Ano:</td><td width="568"><input type="text" name="dropAno" size="6" value="'.$linha['Ano'].'"></td></tr><tr>
<td width="76" align="right">&nbsp;</td><td width="568"><p align="center"><input type="submit" value="Atualizar" name="btnAtualizar"></td></tr></table></form></div>
';
}
mysql_free_result($query);
}
if (isset($_POST['btnAtualizar'])) {
if ($_POST['dropID'] >= 1){
$ID = $_POST['dropID'];
$nome = strtoupper($_POST['dropNome']);
$ano = $_POST['dropAno'];
include './conexao.php'; 
$sql = "update tb_arquivo_morto set Nome = '$nome', Ano = '$ano' where ID = $ID"; 
$query = mysql_query($sql); 
if($query){
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Atualizado com sucesso!!!")</SCRIPT>';
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=pesquisarArquivoMorto.php'>";
}else{
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Erro ao atualizar!!!")</SCRIPT>';
}
}
}
?>