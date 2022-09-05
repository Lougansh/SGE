<?php
include './conexao.php';
include './conf.php';
head();
menuVertical();

if (isset($_POST['btnInserir']) && $_POST['textTituloInsert'] <> ""){
	$titulo = $_POST['textTituloInsert'];
   	$texto = $_POST['textTextoInsert'];
   	$creditos = $_POST['textCreditosInsert'];
   	$sqlInsert = "insert into tb_tutorial (Titulo, Texto, Creditos) values ('$titulo', '$texto', '$creditos')"; 
   	$queryInsert = mysql_query($sqlInsert); 
   	if($queryInsert){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="tutorial.php">';}
   }
if (isset($_POST['btnAtualizar']) && $_POST['textIDUpdate'] <> ""){
	$IDUpdate = $_POST['textIDUpdate'];
	$tituloUpdate = $_POST['textTituloUpdate'];
   	$textoUpdate = $_POST['textTextoUpdate'];
   	$creditosUpdate = $_POST['textCreditosUpdate'];
   	$sqlUpdate = 'update tb_tutorial set Titulo = "'.$tituloUpdate.'", Texto = "'.$textoUpdate.'", Creditos = "'.$creditosUpdate.'" where ID = "'.$IDUpdate.'"'; 
   	$queryUpdate = mysql_query($sqlUpdate); 
   	if($queryUpdate){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="tutorial.php">';}
   }
if (isset($_POST['btnPesquisar']) && $_POST['textIDUpdate'] <> ""){
	$ID = $_POST['textIDUpdate'];
	echo $ID;
	$sqlPesquisar = 'SELECT * from tb_tutorial where ID = '.$ID.' order by ID desc';
	$queryPesquisar = mysql_query($sqlPesquisar) or die("SQL:" . $sqlPesquisar . " - ERRO:" . mysql_error());
	while ($linhaPesquisar = mysql_fetch_array($queryPesquisar)) {
		$IDPesquisar = $linhaPesquisar['ID'];
		$tituloPesquisar = $linhaPesquisar['Titulo'];
		$textoPesquisar = $linhaPesquisar['Texto'];
		$creditosPesquisar = $linhaPesquisar['Creditos'];
	}
   }   
?>
<head>
    <meta http-equiv="Content-Language" content="pt-br">
</head>
<div class="Body">
    <div align="center">
        <form method="POST" action="tutorial.php">
            <hr><fieldset style="width: 600; padding: 2">
                <legend align="left">Inserir dicas ou tutoriais</legend>
                <div align="center">
                    <table border="0" width="500">
                        <tr>
                            <td width="81" align="center">Titulo</td>
                            <td width="501">
                                <input type="text" name="textTituloInsert" size="100">
                            </td>
                        </tr>
                        <tr>
                            <td width="81" align="center">Texto</td>
                            <td width="501">
                                <textarea rows="5" name="textTextoInsert" cols="100"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td width="81" align="center">Créditos</td>
                            <td width="501">
                                <input type="text" name="textCreditosInsert" size="100">
                            </td>
                        </tr>
                    </table>
                </div>
                <div align="center">
                        <input type="submit" value="Inserir" name="btnInserir"></div>

    </fieldset>
    <hr><fieldset style="width: 600; padding: 2">
        <legend align="left">Atualizar dicas ou tutoriais</legend>
        <div align="center">
            <table border="0" width="500">
                <tr>
                    <td width="81" align="center">ID</td>
                    <td width="501">
                        <input type="text" value="<?php echo $IDPesquisar; ?>" name="textIDUpdate" size="2">
                        <input type="submit" value="Pesquisar" name="btnPesquisar">
                    </td>
                </tr>
                <tr>
                    <td width="81" align="center">Titulo</td>
                    <td width="501">
                        <input type="text" value="<?php echo $tituloPesquisar; ?>" name="textTituloUpdate" size="100">
                    </td>
                </tr>
                <tr>
                    <td width="81" align="center">Texto</td>
                    <td width="501">
                        <textarea rows="5" name="textTextoUpdate" cols="100"><?php echo $textoPesquisar; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="81" align="center">Créditos</td>
                    <td width="501">
                        <input type="text" value="<?php echo $creditosPesquisar; ?>" name="textCreditosUpdate" size="100">
                    </td>
                </tr>
            </table>
        </div>
        <div align="center">
                        <input type="submit" value="Atualizar" name="btnAtualizar"></div>
</div>
</div>
</fieldset>
</form>
</div>
</div>
