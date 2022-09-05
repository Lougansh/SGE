<?php
include './conexao.php';
include './conf.php';
menuA();
//-----------Monta dropSelect da lista dos alunos
$sql = "select * from tb_aluno where programacao = 'S' and Grupo = '' Order By nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$listaAlunos = ' <option value="' . $linha['ID'] . '">' . $linha['Ano'] . '' . $linha['Turma'] . ' - ' . $linha['Nome'] . '</option>'.$listaAlunos;
}
mysql_free_result($query);
//-----------Monta os grupos para exibir
$a = 0;$b = 0;$c = 0;$d = 0;$e = 0;$f = 0;$g = 0;$h = 0;$i = 0;
$sql = "select * from tb_aluno where programacao = 'S' Order By nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['Grupo']=='A'){ $grupoA = $linha['Nome'].'<br>'.$grupoA;$a++;if($qtde < $a){$qtde = $a;}}
if ($linha['Grupo']=='B'){ $grupoB = $linha['Nome'].'<br>'.$grupoB;$b++;if($qtde < $b){$qtde = $b;}}
if ($linha['Grupo']=='C'){ $grupoC = $linha['Nome'].'<br>'.$grupoC;$c++;if($qtde < $c){$qtde = $c;}}
if ($linha['Grupo']=='D'){ $grupoD = $linha['Nome'].'<br>'.$grupoD;$d++;if($qtde < $d){$qtde = $d;}}
if ($linha['Grupo']=='E'){ $grupoE = $linha['Nome'].'<br>'.$grupoE;$e++;if($qtde < $e){$qtde = $e;}}
if ($linha['Grupo']=='F'){ $grupoF = $linha['Nome'].'<br>'.$grupoF;$f++;if($qtde < $f){$qtde = $f;}}
if ($linha['Grupo']=='G'){ $grupoG = $linha['Nome'].'<br>'.$grupoG;$g++;if($qtde < $g){$qtde = $g;}}
if ($linha['Grupo']=='H'){ $grupoH = $linha['Nome'].'<br>'.$grupoH;$h++;if($qtde < $h){$qtde = $h;}}
if ($linha['Grupo']=='I'){ $grupoI = $linha['Nome'].'<br>'.$grupoI;$i++;if($qtde < $i){$qtde = $i;}}
}
mysql_free_result($query);
//-----------Atualizar grupos
if (isset($_POST['radioGrupo'])) {
$Aluno = $_POST['dropAluno'];
$Grupo = $_POST['radioGrupo'];
$sql = "update tb_aluno set grupo = '$Grupo' where ID='$Aluno'";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
mysql_free_result($query);
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=grupos.php'>";
}
echo'
<div align="center"><b>DISTRIBUIÇÃO DOS GRUPOS</b><form method="POST" action="?id=Grupo" onsearch="form.submit()"><div align="right">
<table border="0"><tr>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>A</legend><input type="radio" value="A" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>B</legend><input type="radio" value="B" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>C</legend><input type="radio" value="C" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>D</legend><input type="radio" value="D" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>E</legend><input type="radio" value="E" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>F</legend><input type="radio" value="F" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>G</legend><input type="radio" value="G" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>H</legend><input type="radio" value="H" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend>I</legend><input type="radio" value="I" name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><fieldset style="width: 33px; height: 40px; padding: 2" align="center"><legend> </legend><input type="radio" value=" " name="radioGrupo" onclick="form.submit()"></fieldset></td>
<td><select size="0" name="dropAluno">'.$listaAlunos.'</select></td></tr></table></div><hr color="#00FF00" width="90%"><hr color="#FFFF00" width="70%"><table border="0" width="70%" style="border-collapse: collapse"><tr>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO A - '.$a.' Alunos</legend>'.$grupoA .'</fieldset></td>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO B - '.$b.' Alunos</legend>'.$grupoB .'</fieldset></td>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO C - '.$c.' Alunos</legend>'.$grupoC .'</fieldset></td>
</tr><tr><td></td><td>.</td><td>.</td></tr><tr>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO D - '.$d.' Alunos</legend>'.$grupoD .'</fieldset></td>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO E - '.$e.' Alunos</legend>'.$grupoE .'</fieldset></td>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO F - '.$f.' Alunos</legend>'.$grupoF .'</fieldset></td>
</tr><tr><td></td><td>.</td><td>.</td></tr><tr>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO G - '.$g.' Alunos</legend>'.$grupoG .'</fieldset></td>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO H - '.$h.' Alunos</legend>'.$grupoH .'</fieldset></td>
<td align="center" width="33%"><fieldset style="width: 350px; height: '.($qtde*22).'px;" align="left"><legend>GRUPO I - '.$i.' Alunos</legend>'.$grupoI .'</fieldset></td>
</tr></table></div>
';
?>