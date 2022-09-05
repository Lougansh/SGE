<?php
session_start("fotosCFH");
include './conexao.php';
include './conf.php';
alunosProjeto();
$sql = 'select * from tb_aluno_projeto order by anoProjeto desc' ;
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$turma = $linha['anoProjeto'];
	$foto_aluno = '../images/CFH/'.$linha['ID'].'.JPG'; 	
	$explodeNome = explode(" ",$linha['nomeAluno']);
	$primeiroNome = current($explodeNome);
		if (file_exists($foto_aluno)) {
			$mostraFotos = '<table border="0" style="display:inline;"><tr><td><img style="margin: 1px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../images/CFH/'.$linha['ID'].'.JPG" height="150"></td></tr><tr><td><p align="center">'.$primeiroNome.'</td></tr><tr><td><p align="center">'.$turma.'</td></tr></table>'.$mostraFotos;
			
		}else{
			$montaDropCodigo = '<option value="'.$linha['ID'].'">'.ucwords(mb_strtolower($linha['nomeAluno'])).'</option>'.$montaDropCodigo;
			$mostraFotos = '<table border="0" style="display:inline;"><tr><td><img style="margin: 1px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../images/semfoto.JPG"              height="150"></td></tr><tr><td><p align="center">'.$primeiroNome.'</td></tr><tr><td><p align="center">'.$turma.'</td></tr></table>'.$mostraFotos;
		}	
	$mostraFotos = $turma2014.$mostraFotos;
}
$_SESSION["mostraFotos"] = $mostraFotos;
$_SESSION["montaDropCodigo"] = $montaDropCodigo;
mysql_free_result($query);
echo'
<div class="Body2"><div align="center">
<form method="post" enctype="multipart/form-data" action="?foto">
  <hr width="50%" color="#0000FF">
  <hr width="30%" color="#FF0000">
  <input name="arquivo" type="file" />
  <select size="1" name="dropCodigo">'.$_SESSION["montaDropCodigo"].'</select><input type="submit" name="salvar" value="Salvar" /> <a href="index.php">voltar</a>
  <hr width="30%" color="#FF0000">
  <hr width="50%" color="#0000FF">
</form></div></div>
';
if(isset($_POST['salvar']) and $_POST['dropCodigo'] != ''){
$id = $_POST['ID'];
$dropCodigo = $_POST['dropCodigo'];
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
$retorno = '<div align=left><strong>'.$_FILES["arquivo"]["name"].'</strong><br>Tipo: <strong>'.$_FILES["arquivo"]["type"].'</strong><br> Temporariamente salvo em: <strong>'.$_FILES["arquivo"]["tmp_name"].'</strong><br> Tamanho: <strong>'.$_FILES['arquivo']['size'].'</strong> Bytes<div>';
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome = $_FILES['arquivo']['name'];
$extensao = strrchr($nome, '.');
$extensao = strtoupper($extensao);
if(strstr('.jpg;.JPG;', $extensao)){
$novoNome = $dropCodigo.$extensao;

$destino = '../images/CFH/' . $novoNome; 
if( @move_uploaded_file( $arquivo_tmp, $destino  )){
	echo 'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br><br>';
	echo '<img src="'.$destino.'" width="auto" height="400"><br>'.$retorno;
	echo '<br>Nome modificado para: '.$dropCodigo.$extensao;
} 
else{
	echo "Permissão negada".$destino;}
} 
else {
	echo "Formato de foto invalido!!!";}
} 
else {
	echo "Nenhum arquivo enviado!!!";}
}	
echo $_SESSION["mostraFotos"];
?>