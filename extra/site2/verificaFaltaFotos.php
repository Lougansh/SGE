<?php
include './conexao.php';
$hxx = 6;
$sql = "select * from tb_aluno where situacao = 'A'  Order By Ano desc, Turma desc, Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG';
 if (!file_exists($foto_aluno)) {
	//$strWeb = '<img style="margin: 5px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../images/alunos/'.$linha['ID'].'.JPG" height="150">';
	$strWeb =  $linha['Nome'].'<br>';
	if ($linha['Ano'] == 0 && $linha['Turma'] == "C"){
		$pre1A = $strWeb.$pre1A;
	}
	if ($linha['Ano'] == 0 && $linha['Turma'] == "D"){
		$pre1B = $strWeb.$pre1B;
	}
	if ($linha['Ano'] == 0 && $linha['Turma'] == "A"){
		$pre2A = $strWeb.$pre2A;
	}
	if ($linha['Ano'] == 0 && $linha['Turma'] == "B"){
		$pre2B = $strWeb.$pre2B;
	}
	if ($linha['Ano'] == 1 && $linha['Turma'] == "A"){
		$t1A = $strWeb.$t1A;
	}
	if ($linha['Ano'] == 1 && $linha['Turma'] == "B"){
		$t1B = $strWeb.$t1B;
	}
	if ($linha['Ano'] == 1 && $linha['Turma'] == "C"){
		$t1C = $strWeb.$t1C;
	}
	if ($linha['Ano'] == 2 && $linha['Turma'] == "A"){
		$t2A = $strWeb.$t2A;
	}
	if ($linha['Ano'] == 2 && $linha['Turma'] == "B"){
		$t2B = $strWeb.$t2B;
	}
	if ($linha['Ano'] == 2 && $linha['Turma'] == "C"){
		$t2C = $strWeb.$t2C;
	}
	if ($linha['Ano'] == 3 && $linha['Turma'] == "A"){
		$t3A = $strWeb.$t3A;
	}
	if ($linha['Ano'] == 3 && $linha['Turma'] == "B"){
		$t3B = $strWeb.$t3B;
	}
	if ($linha['Ano'] == 3 && $linha['Turma'] == "C"){
		$t3C = $strWeb.$t3C;
	}
	if ($linha['Ano'] == 4 && $linha['Turma'] == "A"){
		$t4A = $strWeb.$t4A;
	}
	if ($linha['Ano'] == 4 && $linha['Turma'] == "B"){
		$t4B = $strWeb.$t4B;
	}
	if ($linha['Ano'] == 4 && $linha['Turma'] == "C"){
		$t4C = $strWeb.$t4C;
	}
	if ($linha['Ano'] == 5 && $linha['Turma'] == "A"){
		$t5A = $strWeb.$t5A;
	}
	if ($linha['Ano'] == 5 && $linha['Turma'] == "B"){
		$t5B = $strWeb.$t5B;
	}
	if ($linha['Ano'] == 5 && $linha['Turma'] == "C"){
		$t5C = $strWeb.$t5C;
	}
	if ($linha['Ano'] == 6 && $linha['Turma'] == "A"){
		$t6A = $strWeb.$t6A;
	}
	if ($linha['Ano'] == 7 && $linha['Turma'] == "A"){
		$t7A = $strWeb.$t7A;
	}
	if ($linha['Ano'] == 8 && $linha['Turma'] == "A"){
		$t8A = $strWeb.$t8A;
	}
	if ($linha['Ano'] == 9 && $linha['Turma'] == "A"){
		$t9A = $strWeb.$t9A;
	}
	if ($linha['Ano'] == 10 && $linha['Turma'] == "A"){
		$t10A = $strWeb.$t10A;
	}
	if ($linha['Ano'] == 11 && $linha['Turma'] == "A"){
		$t11A = $strWeb.$t11A;
	}
 }
}
echo '<h'.$hxx.'>Pré Escola I - A | Professora: '.$professor.'</h'.$hxx.'><div align="Left">'.$pre1A.'</div>';
echo '<h'.$hxx.'>Pré Escola I - B</h'.$hxx.'><div align="Left">'.$pre1B.'</div>';
echo '<h'.$hxx.'>Pré Escola II - A</h'.$hxx.'><div align="Left">'.$pre2A.'</div>';
echo '<h'.$hxx.'>Pré Escola II - B</h'.$hxx.'><div align="Left">'.$pre2B.'</div>';
echo '<h'.$hxx.'>1º Ano - A</h'.$hxx.'><div align="Left">'.$t1A.'</div>';
echo '<h'.$hxx.'>1º Ano - B</h'.$hxx.'><div align="Left">'.$t1B.'</div>';
//echo '<h'.$hxx.'>1º Ano - C</h'.$hxx.'><div align="Left">'.$t1C.'</div>';
echo '<h'.$hxx.'>2º Ano - A</h'.$hxx.'><div align="Left">'.$t2A.'</div>';
echo '<h'.$hxx.'>2º Ano - B</h'.$hxx.'><div align="Left">'.$t2B.'</div>';
echo '<h'.$hxx.'>2º Ano - C</h'.$hxx.'><div align="Left">'.$t2C.'</div>';
echo '<h'.$hxx.'>3º Ano - A</h'.$hxx.'><div align="Left">'.$t3A.'</div>';
echo '<h'.$hxx.'>3º Ano - B</h'.$hxx.'><div align="Left">'.$t3B.'</div>';
echo '<h'.$hxx.'>3º Ano - C</h'.$hxx.'><div align="Left">'.$t3C.'</div>';
echo '<h'.$hxx.'>4º Ano - A</h'.$hxx.'><div align="Left">'.$t4A.'</div>';
echo '<h'.$hxx.'>4º Ano - B</h'.$hxx.'><div align="Left">'.$t4B.'</div>';
//echo '<h'.$hxx.'>4º Ano - C</h'.$hxx.'><div align="Left">'.$t4C.'</div>';
echo '<h'.$hxx.'>5º Ano - A</h'.$hxx.'><div align="Left">'.$t5A.'</div>';
echo '<h'.$hxx.'>5º Ano - B</h'.$hxx.'><div align="Left">'.$t5B.'</div>';
echo '<h'.$hxx.'>5º Ano - C</h'.$hxx.'><div align="Left">'.$t5C.'</div>';
echo '<h'.$hxx.'>Turma 2017</h'.$hxx.'><div align="Left">'.$t6A.'</div>';
echo '<h'.$hxx.'>Turma 2016</h'.$hxx.'><div align="Left">'.$t7A.'</div>';
echo '<h'.$hxx.'>Turma 2015</h'.$hxx.'><div align="Left">'.$t8A.'</div>';
echo '<h'.$hxx.'>Turma 2014</h'.$hxx.'><div align="Left">'.$t9A.'</div>';
echo '<h'.$hxx.'>Turma 2013</h'.$hxx.'><div align="Left">'.$t10A.'</div>';
?>
