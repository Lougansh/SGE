<?php
$dir = './betajogos/';
$img = './betaimagens/';
$listDiretorio = array_diff(scandir($dir),['.', '..']);
foreach($listDiretorio as $diretorio){
	$nome = substr($diretorio,0, -4);
    //echo '<p align=center><a href="./betajogos/'.substr($diretorio,0, -4).'.swf"><img src="./betaimagens/'.substr($diretorio,0, -4).'.jpg" width="150" height="100></a></p>';
    //echo $diretorio.' - '.$diretorio.'<br>';
    $jogos = $jogos.'<a href="./betajogos/'.$nome.'.swf"><img src="./betaimagens/'.$nome.'.jpg" width="150" height="100"></a>';
}
echo'
<html>
<head>

</head><title>Jogs Flash</title></head>
<body>
<div align="center">'.$jogos.'</div>
</body>
</html>
';
?>