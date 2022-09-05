<form method="POST" action="fotos.php">
<p align="right"><select name="dropAno" size="1">
<option>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
</select><select name="dropTurma" size="1">
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select><input type="submit" value="Filtrar" name="btnFiltrar"> <input type="submit" value="Sem Foto" name="btnLimpar"> <a href="index.php">voltar</a></p>
</form>
<?php 
include './../conexao.php';
$contador = 0;
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
	$sql = 'select * from tb_aluno where situacao = "A" and ano = "'.$ano.'" and turma = "'.$turma.'" Order By Nome desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		
	$foto_aluno = '../../images/alunos/'.$linha['ID'].'.JPG'; 	
	$explodeNome = explode(" ",$linha['Nome']);
	$primeiroNome = current($explodeNome);
	if (file_exists($foto_aluno)) {
	$strWeb = '<table border="0" style="display:inline;"><tr><td><img style="margin: 1px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../../images/alunos/'.$linha['ID'].'.JPG" height="150"></td></tr><tr><td><p align="center">'.$primeiroNome.'</td></tr></table>';
	}else{
	$strWeb = '<table border="0" style="display:inline;"><tr><td><img style="margin: 1px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../../images/semfoto.JPG" height="150" width="100"></td></tr><tr><td><p align="center">'.$primeiroNome.'</td></tr></table>';
	}
	$mostraFotos = $strWeb.$mostraFotos;
}
echo '<h1>'.$varAno.$varTurma.'</h1><div align="Center">'.$mostraFotos.'</div>';
}
if (isset($_POST['btnLimpar'])){
	$ano = '';
	$turma = '';
	$mostraFotos = '';
	$varAno = '';
	$varTurma = '';
	$sql = "select * from tb_aluno where situacao = 'A'  Order By Ano asc, Turma asc, Nome asc";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		
		$foto_aluno = '../../images/alunos/'.$linha['ID'].'.JPG'; 	
		$explodeNome = explode(" ",$linha['Nome']);
		$primeiroNome = current($explodeNome);
		if (!file_exists($foto_aluno) && $linha['Ano'] <= 5 ) {
			$contador ++;
			if ($linha['Ano'] == 0 && $linha['Turma'] == 'A'){
				$ano = 'Pre II';
				$turma = 'A';
			}
			if ($linha['Ano'] == 0 && $linha['Turma'] == 'B'){
				$ano = 'Pre II';
				$turma = 'B';
			}
			if ($linha['Ano'] == 0 && $linha['Turma'] == 'C'){
				$ano = 'Pre I';
				$turma = 'A';
			}
			if ($linha['Ano'] == 0 && $linha['Turma'] == 'D'){
				$ano = 'Pre I';
				$turma = 'A';
			}
			if ($linha['Ano'] > 0 ){
				$ano = $linha['Ano'];
				$turma = $linha['Turma'];
			}
			if ($contador >= 25){
				$faltaFoto = '</td><td >'.$faltaFoto;
				$faltaFoto = $faltaFoto.'</td><td valign="top">';
				$contador = 1;
			}	
			$faltaFoto = $faltaFoto.'    '.$ano.' '.$turma.' - '.$linha['Nome'].'<br>';
		}
	}
	echo '<h1>Falta fotografar:</h1><div align="left"><table border="0" width="100%"><tr><td valign="top">'.$faltaFoto.'</td></tr></table></div>';
}
?>