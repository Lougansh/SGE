<?php
include './conexao.php';
include './conf.php';
menuA();
?>
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>

<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center">DIFERENTES IDADES DE ALUNOS EM MESMA SALA</td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 0 and turma = 'A' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">PRÉ II - A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 0 and turma = 'B' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">PRÉ II - B</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 0 and turma = 'C' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">PRÉ II C</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 1 and turma = 'A' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">1º ANO - A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 1 and turma = 'B' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">1º ANO - B</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 0 and turma = 'D' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">PRÉ  I A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 2 and turma = 'A' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">2º ANO - A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 2 and turma = 'B' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">2º ANO - B</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 2 and turma = 'C' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">2º ANO - C</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 3 and turma = 'A' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">3º ANO - A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 3 and turma = 'B' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">3º ANO - B</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 3 and turma = 'C' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:115PX"><legend align="center">3º ANO - C</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 4 and turma = 'A' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:150PX"><legend align="center">4º ANO - A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 4 and turma = 'B' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:150PX"><legend align="center">4º ANO - B</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 4 and turma = 'C' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:150PX"><legend align="center">4º ANO - C</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 5 and turma = 'A' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:150PX"><legend align="center">5º ANO - A</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 5 and turma = 'B' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:150PX"><legend align="center">5º ANO - B</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
			<td align="center"><?php
include './conexao.php';
$sql = "SELECT COUNT(*) AS Contador, Ano, Turma, YEAR(Nascimento) Nascido FROM tb_aluno where ano= 5 and turma = 'C' and situacao='A' GROUP BY YEAR(Nascimento) HAVING COUNT(*) > 0";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<fieldset style="padding: 2; width:300px; height:150PX"><legend align="center">5º ANO - C</legend><div align="center"><table border="0"><tr><td>CONTADOR</td><td>ANO</td><td>TURMA</td><td>NASCIDO</td></tr>';
while ($linha = mysql_fetch_array($query)) {
echo '<tr><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Contador'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Ano'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Turma'].'</td><td align="center" style="border-style: solid; border-width: 1px">'.$linha['Nascido'].'</td></tr>';
}
echo '</table></div></fieldset>';
?></td>
		</tr>
	</table>
</div>
