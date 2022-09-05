<?php
echo'
<div class="Body2"><div align="center">
<form method="post" enctype="multipart/form-data" action="?foto">
<input name="arquivo" type="file" />
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