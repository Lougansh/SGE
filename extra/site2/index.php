<?php
include 'conf.php';
head();
menuVertical();
echo'
<div class="Body"><p align="center" valign="bottom">
<div class="text1">
';
photoshow();
mp3();
aniversario();
echo'
</div>
<div class="text2">
';
recado();

echo'
</div>
<div class="text3">
';
alunosProg2();
echo'<div align="center"><p align="center">
<hr>
<a href="http://www.qdivertido.com.br/contos.php">Contos e Historias</a>
<hr>
<a href="../biblioteca/Fontes%20Irineu">Fontes Irineu</a>
<hr>
<a href="./enviarFoto.php"><img border="0" src="../images/tablet.jpg" height="200" align="center"></a>
<a href="./fotos.php"><img border="0" src="../images/biometria.jpg" height="100" align="center"></a>
<hr>
<a href="../simulado/Executar/MatematicaGeral.htm">		<img src="../images/simulado.jpg" width="120" height="40"></a>
<a href="ebook.php">		<img src="../images/ebook.png" width="80" height="90"></a>
<a href="atividades.php">	<img src="../images/codOrg.png" width="120" height="80"></a></p>

</p></div>';
echo'
</div>
</div>
';
?>
