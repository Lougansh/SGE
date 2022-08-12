<?php
    session_start();
    include("conexao.php");
    include("conf.php");
    menu();
?>
<html>
    <head><title>Editar Planejamento</title></head>
    <body>	
        <form method="POST" action="?id=Lista" onchange="form.submit()">
            <div align="center"><h2>Editar Planejamento</h2>
                <hr width="50%">
                <a href="editarPlanejamento.php?ano=0">Infantil V</a>
                <a href="editarPlanejamento.php?ano=1">1º Ano</a>
                <a href="editarPlanejamento.php?ano=2">2º Ano</a>
                <a href="editarPlanejamento.php?ano=3">3º Ano</a>
                <a href="editarPlanejamento.php?ano=4">4º Ano</a>
                <a href="editarPlanejamento.php?ano=5">5º Ano</a>
                <hr width="70%">
            </div>
        </form>
        <div align="center">
            <img class="master" align="center" border="0" src="./uploads/logoNew.png" height="400">
        </div>
        <fieldset align="center" style="padding: 2">
            <legend>Sistema Gerenciador Escolar</legend>
            <center>Desenvolvedor Everaldo José de Souza</center>
        </fieldset>
    </body>
</html>