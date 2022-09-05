<script>
function enviarForm() {
  document.nomeDoForm.action = "./master.php";
  abreFormEnviado();
  document.nomeDoForm.target = "formulario";
  document.nomeDoForm.submit();
}
function abreFormEnviado() {
  var newwin = window.open("", "formulario", 'width=900, height=700, scrollbars=no, toolbar=no, location=no, status=no, menubar=no, resizable=yes, left=0, top=0');
  newwin.focus();
}
</script>
<?php
include './conexao.php';
include './conf.php';
menuA();
echo '<form method="POST" action="formulario" name= "nomeDoForm" id="15">';
$sql = "select * from tb_aluno where situacao = 'A' Order By ano desc, turma desc, nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if($linha['Dificuldade'] == 'S'){
$menuFotos = '<button style="color:  red; border: 2px inset  red" value="' . $linha['ID'] . '" onClick="javascript:enviarForm();" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="80" height="100"></button>'.$menuFotos;
}elseif($linha['Programacao'] == 'S'){
$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" onClick="javascript:enviarForm();" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="80" height="100"></button>'.$menuFotos;
}else{
$menuFotos = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" onClick="javascript:enviarForm();" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="80" height="100"></button>'.$menuFotos;
}
}
echo '<div align="Center">'.$menuFotos.'</div></form>';
?>
