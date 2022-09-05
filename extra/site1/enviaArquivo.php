<div align="center">
<h1>CONSTRUINDO O FUTURO HOJE</h1>
<form method="post" enctype="multipart/form-data" action="?enviaArquivo">
<hr width="50%" color="#0000FF">
<hr width="30%" color="#FF0000">
<input name="arquivo" type="file" /> <input type="submit" name="salvar" value="Enviar" /></form>
<hr width="30%" color="#FF0000">
<hr width="50%" color="#0000FF">
<?php
include 'conf.php';
$mostraArquivo = '';
if(isset($_POST['salvar']) ){
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome = $_FILES['arquivo']['name'];
$destino = '../upload/'.$nome; 
if( @move_uploaded_file( $arquivo_tmp, $destino  )){
echo 'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br><br>';
} 
else {
	echo "Permissão negada".$destino;
	}
} 
else {
	echo "Nenhum arquivo enviado!!!";
	}
echo'<meta HTTP-EQUIV="refresh" CONTENT= "3"; URL="enviaArquivo.php">';
}

$path = '../upload/'; 
$diretorio = dir($path);
natsort($diretorio);
$i = 0;
while(($arquivo = $diretorio -> read())){
if (($arquivo != '.directory') && ($arquivo != '.') && ($arquivo != '..')){
$lista = substr($arquivo , 0, -4);
$i++;
$mostraArquivo = '<a href="'.$path.$arquivo.'">'.$lista.'</a><br>'.$mostraArquivo;
}
}
$diretorio -> close();
echo '
<style type="text/css">
<!---------------------------------
*  {
    margin:0;
    padding:0;
}
html, body {height:100%;}
.geral {
    min-height:100%;
    position:relative;
    width:800px;
}
.footer {
    position:absolute;
    bottom:0;
    width:100%;
}
.content {overflow:hidden;}
.aside {width:200px;}
.fleft {float:left;}
.fright {float:right;}
<!---------------------------------
}
</style>
<div align="left">'.$mostraArquivo.'</div>';
?>