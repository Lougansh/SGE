<?php
include 'conf.php';
head();
menuVertical();
//menuA();
echo'
<div class="Body"><div align="center">

<form method="post" enctype="multipart/form-data" action="?ebook">
<hr width="50%" color="#0000FF">
<hr width="30%" color="#FF0000">
<input name="arquivo" type="file" /> Digite o nome do Ebook: <input name="ebook" type="text" size="50"/>
<hr width="30%" color="#FF0000">
<hr width="50%" color="#0000FF">

<input type="submit" name="salvar" value="Salvar" /></form>
';
if(isset($_POST['salvar']) and $_POST['ebook'] != ''){
$id = $_POST['ID'];
$ebook = $_POST['ebook'];
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
$retorno = '<div align=left><strong>'.$_FILES["arquivo"]["name"].'</strong><br>Tipo: <strong>'.$_FILES["arquivo"]["type"].'</strong><br> Temporariamente salvo em: <strong>'.$_FILES["arquivo"]["tmp_name"].'</strong><br> Tamanho: <strong>'.$_FILES['arquivo']['size'].'</strong> Bytes<div>';
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome = $_FILES['arquivo']['name'];
$extensao = strrchr($nome, '.');
$extensao = strtoupper($extensao);
if(strstr('.pdf;.PDF;', $extensao)){
$novoNome = $ebook.$extensao;
$destino = './../biblioteca/ebook/' . $novoNome; 
if( @move_uploaded_file( $arquivo_tmp, $destino  )){
echo 'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br><br>';
echo '<img src="'.$destino.'" width="350" height="400"><br>'.$retorno;
echo '<br>Nome modificado para: '.$ebook.$extensao;
} else{echo "Permissão negada".$destino;}
} else {echo "Formato de foto invalido!!!";}
} else {echo "Nenhum arquivo enviado!!!";}
}
?>
