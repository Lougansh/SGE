<?php
include './conexao.php';
$contador = 0;
if (isset($_POST['btnCopiar'])){
	$sql = 'select * from tb_aluno Order By ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		
	$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 
	$copia_aluno = '../images/xxx/'.$linha['ID'].'.JPG';

if (!copy($foto_aluno, $copia_aluno)) {
	$contador ++;
    echo " $contador - falha ao copiar $foto_aluno...<br>";
}
	}
}
?>
<form method="POST" action="copiarFotosAlunos.php">
<p align="right"><input type="submit" value="Copiar" name="btnCopiar"></p>
</form>