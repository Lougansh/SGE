<?php
include './conf.php';
menuA();
?>
<form method="POST" action="fichaAvaliacaoPrint.php"><div align="Center">
<table border="1" width="60%" style="border-collapse: collapse" bordercolorlight="#000080" bordercolordark="#808080">
<tr>
<td align="center" width="105%" colspan="3"><b><font size="7">Ficha 
de Avaliação dos Alunos</font></b></td>
</tr>
<tr>
<td align="center" width="35%">
<input type="radio" value="0"  name="Ano" checked>Pré<input type="radio" value="1"    name="Ano">1º<input type="radio" value="2"    name="Ano">2º<input type="radio" value="3"    name="Ano">3º<input type="radio" value="4"    name="Ano">4º<input type="radio" value="5"    name="Ano">5º<br>
<input type="radio" value="A"   name="Turma" checked>A<input type="radio" value="B"   name="Turma">B<input type="radio" value="C"   name="Turma">C
</td>
<td align="center" width="35%">
<input type="text" name="ID" size="31"></td>
<td align="center" width="35%">&nbsp;</td>
</tr>
<tr>
<td align="center" width="35%">
<input type="submit" value="Turma" name="btnTurma"></td>
<td align="center" width="35%">
<input type="submit" value=" Aluno" name="btnAluno"></td>
<td align="center" width="35%">
<input type="submit" value="Todos" name="btnGeral"></td>
</tr>
</table>
<div align="Center">';