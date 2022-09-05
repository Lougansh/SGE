<?php
include './conexao.php';
include './conf.php';
menuA();

echo '
<form method="POST" action="fichaProjeto.php"><div align="Center"><br><fieldset style="width: 50%; height: 7% padding: 0"><legend>Sistema de pesquisa</legend>
<p align="center">RA: <input type="text" name="RA" size="20"><input type="submit" value="Pesquisar" name="btnPesquisar"></fieldset>';
?>

