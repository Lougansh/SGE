<form method="POST" action="mapaSala.php">
<p align="right"><select name="dropAno" size="1">
<option>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select><select name="dropTurma" size="1">
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select><input type="submit" value="Filtrar" name="btnFiltrar"> <a href="menu.php">voltar</a></p>
</form>
<?php
include './conexao.php'; 
include './conf.php';
menuA();
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
if (isset($_POST['btnFiltrar'])){
	$ano = $_POST['dropAno'];
	$turma = $_POST['dropTurma'];
	if ($ano == 0 && $turma == 'D'){
			$varAno = 'PRÉ ESCOLA I - ';
			$varTurma = 'A';
		}
	if ($ano == 0 && $turma <> 'D'){
			$varAno = 'PRÉ ESCOLA II - ';
			$varTurma = $turma;
		}
	if ($ano > 0){
			$varAno = $ano.'º ANO ';
			$varTurma = $turma;
		}
	$sql = 'select * from tb_aluno where situacao = "A" and PC >= "1" and ano = "'.$ano.'" and turma = "'.$turma.'" Order By PC desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$montaLista  = '<input disabled type="text" size="2" value="'. $linha['PC'] .'" style="text-align:center" name="retPC"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><br>'.$montaLista;
	}
echo '<h1>'.$varAno.$varTurma.'</h1><div align="Center">'.$montaLista.'</div>';

}
		
$sql = "select * from tb_aluno where PC >= '1' and Ano <= 5 and ano >= 0 Order by PC desc, Ano desc, Turma desc, Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<input disabled type="text" size="2" value="'. $linha['PC'] .'" style="text-align:center" name="retPC"><input disabled type="text" size="2" value="'. $linha['Ano'] .$linha['Turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><br>'.$montaLista;
}
echo '

';
?>