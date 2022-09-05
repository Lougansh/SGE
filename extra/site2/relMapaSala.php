<?php
include './conexao.php'; 
include './conf.php';
menuA();

$montaLista;
$qtde = 0;
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.PC >= '1' and aluno.Programacao = 'S' and turma.Turno = 'TARDE' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma and aluno.Situacao = 'A'Order by aluno.PC desc, aluno.Ano desc, aluno.Turma desc, aluno.Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$qtde++;
	$montaLista =  '<input disabled type="text" size="2" value="'. $linha['PC'] .'" style="text-align:center" name="retPC"><input disabled type="text" size="2" value="'. $linha['Ano'] .$linha['Turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><br>'.$montaLista;
}
echo '<h3>CONTRA TURNO ESCOLAR MANHA - '.$qtde.' ALUNOS</h3><br>'.$montaLista;
mysql_free_result($query);
//--------------------------------------------------------------------------->

$montaLista = '';
$qtde = 0;
$sql = "select * from tb_aluno aluno, tb_turma turma where aluno.PC >= '1' and aluno.Programacao = 'S' and turma.Turno = 'MANHA' and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma and aluno.Situacao = 'A'Order by aluno.PC desc, aluno.Ano desc, aluno.Turma desc, aluno.Nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$qtde++;
	$montaLista =  '<input disabled type="text" size="2" value="'. $linha['PC'] .'" style="text-align:center" name="retPC"><input disabled type="text" size="2" value="'. $linha['Ano'] .$linha['Turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><br>'.$montaLista;
}
echo '<h3>CONTRA TURNO ESCOLAR MANHA - '.$qtde.' ALUNOS</h3><br>'.$montaLista;
mysql_free_result($query);
//--------------------------------------------------------------------------->
$vetSql = array ("5C","5B","5A","4C","4B","4A","3C","3B","3A","2C","2B","2A","1C","1B","1A","0D","0C","0B","0A");
for ($i = 0; $i <= 18; $i++) {
	$subAno = substr($vetSql[$i],0,1);
	$subTurma = substr($vetSql[$i],1,1);
	$montaLista = '';
	$qtde = 0;
	$sql = 'select * from tb_aluno aluno, tb_turma turma where aluno.PC >= "1" and aluno.Ano = turma.Ano and aluno.Turma = turma.Turma and aluno.Situacao = "A" and aluno.Ano = "'.$subAno.'" and aluno.Turma = "'.$subTurma.'" Order by aluno.PC desc, aluno.Ano desc, aluno.Turma desc, aluno.Nome desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$qtde++;
		$montaLista =  '<input disabled type="text" size="2" value="'. $linha['PC'] .'" style="text-align:center" name="retPC"><input disabled type="text" size="2" value="'. $linha['Ano'] .$linha['Turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="Nome"><br>'.$montaLista;
	}
	echo '<h3>'.$subAno.'º Ano '.$subTurma.' - '.$qtde.' ALUNOS</h3><br>'.$montaLista;
	mysql_free_result($query);
}
//--------------------------------------------------------------------------->
?>