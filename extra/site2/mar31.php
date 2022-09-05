<?php
include './conexao.php';
include './conf.php';
if (isset($_POST['pesquisa'])){
	$titulo = 'Lista de Aniversariantes de ';
	$mes = $_POST['mes'];
	switch ($mes) {
        case "01":    $mesNome = Janeiro;     break;
        case "02":    $mesNome = Fevereiro;   break;
        case "03":    $mesNome = Março;       break;
        case "04":    $mesNome = Abril;       break;
        case "05":    $mesNome = Maio;        break;
        case "06":    $mesNome = Junho;       break;
        case "07":    $mesNome = Julho;       break;
        case "08":    $mesNome = Agosto;      break;
        case "09":    $mesNome = Setembro;    break;
        case "10":    $mesNome = Outubro;     break;
        case "11":    $mesNome = Novembro;    break;
        case "12":    $mesNome = Dezembro;    break; 
 }	
$sql = 'SELECT Nome, Ano, Turma,Nascimento FROM tb_aluno where MONTH(Nascimento) = '.$mes.' and Situacao = "A"  and Ano <= 5 Order By Ano desc, turma desc, nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$date = new DateTime( $linha['Nascimento'] );
	$ano = $linha['Ano'];
	$turma = $linha['Turma'];
	if ($ano == 0 && $turma == 'D'){
			$varAno = 'PRÉ I - ';
			$varTurma = 'A';
		}
	if ($ano == 0 && $turma <> 'D'){
			$varAno = 'PRÉ II - ';
			$varTurma = $turma;
		}
	if ($ano > 0){
			$varAno = $ano.'º ANO ';
			$varTurma = $turma;
		}
$retorno =  '
	<tr>
		<td><p align="center">'.$varAno.$varTurma.'</td>
		<td>'.$linha['Nome'].'</td>
		<td><p align="center">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td>
	</tr>	
'.$retorno;
}
}
echo '
<form method="POST" action="mar31.php">
<div align="center">
<select size="1" name="mes">
<option value="1">Janeiro</option>
	<option value="2">Fevereiro</option>
	<option value="3">Março</option>
	<option value="4">Abril</option>
	<option value="5">Maio</option>
	<option value="6">Junho</option>
	<option value="7">Julho</option>
	<option value="8">Agosto</option>
	<option value="9">Setembro</option>
	<option value="10">Outubro</option>
	<option value="11">Novembro</option>
	<option value="12">Dezembro</option>
</select> 
<input type="submit" value="Pesquisar" name="pesquisa"> 
<a href="index.php"> <img style="margin: 0px; padding: 0px" src="../images/sair.gif"> </a></p></div></form>
</body>
<div align="center">
<h1>'.$titulo.$mesNome.'</h1>
<table border="1" cellspacing="3" cellpadding="2">
'.$retorno.'
</table>
</div>
';
?>
