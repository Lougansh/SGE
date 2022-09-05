<?php
include './conexao.php'; include './conf.php';
menuA();
echo'<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Dificuldade</title></head><body><br>';
echo'<div align="left"><form method="POST" action="dificuldade.php"><div align="Center"><table border="0">
<tr>
    <td align="right">Ano:</td>
    <td><input type="radio" value="Pre"  name="Ano">Pré</td>
    <td><input type="radio" value="1"    name="Ano">1º</td>
    <td><input type="radio" value="2"    name="Ano">2º</td>
    <td><input type="radio" value="3"    name="Ano">3º</td>
    <td><input type="radio" value="4"    name="Ano">4º</td>
    <td><input type="radio" value="5"    name="Ano">5º</td>
    <td><input type="radio" value="Geral"    name="Ano">Geral</td>

</tr><tr>
    <td align="right">Turma:</td>
    <td><input type="radio" value="A"   name="Turma">A</td>
    <td><input type="radio" value="B"   name="Turma">B</td>
    <td><input type="radio" value="C"   name="Turma">C</td>
    <td><input type="radio" value="Geral"   name="Turma">Geral</td>

    <td colspan="3"><p align="center"><input type="submit" value="Filtrar" name="btnFiltrar"></td>
</tr></table></div>
';

if (isset($_POST['btnFiltrar']) && isset($_POST['Ano'])  && isset($_POST['Turma'])) {
    $ano = $_POST['Ano'];
    $turma = $_POST['Turma'];
if ($ano == 'Geral' && $turma == 'Geral'){

$sql = "select * from tb_aluno Order By nome";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
echo '
<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="T1"><input disabled type="text" size="2" value="'. $linha['Dificuldade'] .'" style="text-align:center" name="T1"><br>';
}
echo 'Dificuldade <input type="text" name="dificuldade" size="1" value="S"><input type="submit" value="Submeter" name="Submeter"></div></form>'; //<input type="radio" value="+"  name="sinal">ADD<input type="radio" value="-"  name="sinal">DEL

}
else{

$sql = "select * from tb_aluno where Turma = '$turma' and Ano = '$ano' and Situacao = 'A'Order By nome,ano,turma";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
echo '
<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="50" value="'. $linha['Nome'] .'" style="text-align:left" name="T1"><input disabled type="text" size="2" value="'. $linha['Dificuldade'] .'" style="text-align:center" name="T1"><br>';
}
echo 'Dificuldade <input type="text" name="dificuldade" size="1" value="S"><input type="submit" value="Submeter" name="Submeter"></div></form>'; //<input type="radio" value="+"  name="sinal">ADD<input type="radio" value="-"  name="sinal">DEL
}
}
else{
$sql = "select * from tb_aluno where Dificuldade = 'S' order by nome, ano, turma;";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
echo '<hr>';
while ($linha = mysql_fetch_array($query)) {
echo '<div align="left"><li><img src="../images/seta.jpg"> "'. $linha['Ano'] . $linha['Turma'] .'" - '. $linha['Nome'] . '</li>';
}
if (isset($_POST['Submeter']) && isset($_POST['ID']) && isset($_POST['dificuldade'])) { //&& isset($_POST['sinal'])
$dificuldade = $_POST['dificuldade'];
$sinal = $_POST['sinal'];
foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno set Dificuldade = '$dificuldade' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Dados atualizados com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href='dificuldade.php'\",1)</script>";
}
}
?>