<?php
include './conf.php';
menuA();
?>
<div align="center"><h1><font color="#FF0000">Cadastro de Inativos</font></h1><form method="POST" action="?id=cadInativo"><table border="0" width="660"><tr>
<td width="76" align="right">Nome		</td><td width="568"><input type="text"	name="dropNome" size="80"></td></tr><tr>
<td width="76" align="right">Ano		</td><td width="568"><input type="text" name="dropAno" size="6"></td></tr><tr>
<td width="76" align="right">&nbsp;</td><td width="568"><p align="center"><input type="submit" value="Cadastrar" name="btnCadastrar"></td></tr></table></form></div>
<?php
if (isset($_POST['btnCadastrar']) && $_POST['dropNome'] <> '' && $_POST['dropAno'] <> ''){
$nome = 		strtoupper($_POST['dropNome']);
$ano = 			$_POST['dropAno'];
include './conexao.php'; 
$sql = "insert into tb_arquivo_morto (Nome, Ano) values ('$nome', '$ano')"; 
$query = mysql_query($sql); 
if($query){
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro efetuado com sucesso!!!")</SCRIPT>';
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=pesquisarArquivoMorto.php'>";
}else{
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Erro ao cadastrar!!!")</SCRIPT>';
}
}
?>