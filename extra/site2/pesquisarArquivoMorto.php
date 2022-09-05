<?php
include './conexao.php';
include './conf.php';
menuA();
$sql = 'select count(ID) Alunos, count(distinct(ano)) Turmas from tb_arquivo_morto';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$qtdeAlunos = $linha['Alunos'];
$qtdeTurmas = $linha['Turmas'];
}
mysql_free_result($query);
echo '<form method="POST" action="?id=cadInativo" onsearch="form.submit()"><div align="Center"><br><fieldset style="width: 50%; height: 7% padding: 0"><legend>Sistema de pesquisa</legend><p align="center">Pesquisar '.$qtdeAlunos.' inativos em '.$qtdeTurmas.' anos <input type="text" name="dropPesquisar" size="20" onsearch="form.submit()"><input type="radio" value="Nome" name="tipo" checked>Nome<input type="radio" value="Ano" name="tipo">Ano <a title="Click aqui para inserir um novo registro" href="cadastroArquivoMorto.php">Cadastrar</a> / <a href="pesquisarArquivoMorto.php?duplicado=S">Duplicados</a></fieldset>';if (isset($_POST['dropPesquisar'])&& $_POST['dropPesquisar'] != ''){
if ($_POST['tipo']=='Nome'){
$nome = $_POST['dropPesquisar'];
$sql = 'select * from tb_arquivo_morto where nome like "%'.$nome.'%" Order By ano ';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
$tabela = '
<tr><td width="15%" bgcolor="red" align="center">Ano Letivo</td><td width="70%" bgcolor="red" align="center">Nome</td><td width="15%" bgcolor="red" align="center">Evento</td></tr>
';
while ($linha = mysql_fetch_array($query)) {
$i++;
$lista = '
<tr><td width="15%" bgcolor="#C0C0C0"><p align="center">'.$linha['Ano'].'</td><td width="70%" bgcolor="#C0C0C0">'.$linha['Nome'].'</td><td width="15%" bgcolor="#C0C0C0" align="center"><a href="atualizaArquivoMorto.php?altera='.$linha['ID'].'">Alterar</a> / <a href="pesquisarArquivoMorto.php?deleta='.$linha['ID'].'" onclick="return confirm(\'Deseja mesmo excluir?\');">Excluir</a></td></tr>
'.$lista;
}
echo $i.' Alunos encontrados com essa pesquisa.
<hr color="#0000FF" width="10%"><hr color="#FFFF00" width="30%"><hr color="#00FF00" width="50%">
<table border="1" width="75%" style="border-collapse: collapse" bordercolorlight="#000080" bordercolordark="#808080">'.$tabela.$lista.'</table>
<hr color="#00FF00" width="50%"><hr color="#FFFF00" width="30%"><hr color="#0000FF" width="10%">
';
}
if ($_POST['tipo']=='Ano'){
$anoInativo = $_POST['dropPesquisar'];
$sql = 'select * from tb_arquivo_morto where Ano ='.$anoInativo.' Order By Nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
$tabela = '
<td width="50%" bgcolor="red" align="center"><font size="4"><b>Ano Letivo '.$anoInativo.'</b></font></td></tr>
';
while ($linha = mysql_fetch_array($query)) {
$i++;
$lista = '
<tr><td width="70%" bgcolor="#C0C0C0">'.$linha['Nome'].'</td></tr>'.$lista;
}
echo $i.' Alunos encontrados com essa pesquisa.
<hr color="#0000FF" width="10%"><hr color="#FFFF00" width="30%"><hr color="#00FF00" width="50%">
<table border="1" width="95%" style="border-collapse: collapse" bordercolorlight="#000080" bordercolordark="#808080">'.$tabela.$lista.'</table>
<hr color="#00FF00" width="50%"><hr color="#FFFF00" width="30%"><hr color="#0000FF" width="10%">
';
}
}

$idDeleta = $_GET["deleta"];
if (isset($idDeleta) && $idDeleta >= 1){
$deleta = mysql_query("DELETE FROM tb_arquivo_morto WHERE id = $idDeleta");
if($deleta){
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Registro excluido com sucesso!!!")</SCRIPT>';
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=pesquisarArquivoMorto.php'>";
}else{
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Falha ao excluir!!!")</SCRIPT>';
}
}
if (isset($_GET["duplicado"])){
$sql = "SELECT COUNT(*) AS Contador, ID, Nome, Ano FROM tb_arquivo_morto GROUP BY Nome HAVING COUNT(*) > 1 order by Contador";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
$tabela = '
<tr><td width="15%" bgcolor="red" align="center">Ano Letivo</td><td width="70%" bgcolor="red" align="center">Nome</td><td width="15%" bgcolor="red" align="center">Evento</td></tr>
';
while ($linha = mysql_fetch_array($query)) {
$i++;
$lista = '
<tr><td width="15%" bgcolor="#C0C0C0"><p align="center">'.$linha['Ano'].'</td><td width="70%" bgcolor="#C0C0C0">('.$linha['Contador'].') '.$linha['Nome'].'</td><td width="15%" bgcolor="#C0C0C0" align="center"><a href="atualizaArquivoMorto.php?altera='.$linha['ID'].'">Alterar</a> / <a href="pesquisarArquivoMorto.php?deleta='.$linha['ID'].'" onclick="return confirm(\'Deseja mesmo excluir?\');">Excluir</a></td></tr>
'.$lista;
}
echo $i.' Alunos encontrados com essa pesquisa.
<hr color="#0000FF" width="10%"><hr color="#FFFF00" width="30%"><hr color="#00FF00" width="50%">
<table border="1" width="75%" style="border-collapse: collapse" bordercolorlight="#000080" bordercolordark="#808080">'.$tabela.$lista.'</table>
<hr color="#00FF00" width="50%"><hr color="#FFFF00" width="30%"><hr color="#0000FF" width="10%">
';
}
?>