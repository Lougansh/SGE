<?php 
include './conf.php';
$path = './../jogos/betaJogos/'; 
$img = './../jogos/betaImagens/';
$diretorio = dir($path);
$ico = dir($img);
echo'<CENTER><h1>JOGOS PICOLI</H1><hr color="#008000" width="50%" size="1"><hr color="#FFFF00" width="30%" size="1">';
$i = 0;
//while(($icone = $ico -> read()) && ($arquivo = $diretorio -> read())){
while(($arquivo = $diretorio -> read())){
if (($icone != '.picasa.ini') && ($icone != '.') && ($icone != '..') && ($arquivo != '.directory') && ($arquivo != '.') && ($arquivo != '..')){
$nome = substr($arquivo , 0, -4);
$i++;
echo '<a href="'.$path.$arquivo.'"><img src="'.$img.$nome.'.jpg" width="110" height="90" title="'.$nome.'"> </a>';
}
}
$diretorio -> close(); 
$ico -> close(); 
echo'<CENTER><h1>'.$i.' JOGOS</H1><hr color="#008000" width="50%" size="1"><hr color="#FFFF00" width="30%" size="1"><br><br><br>';
?>
