<?php
include './conexao.php'; 
include './conf.php';
alunosMFT();
echo'<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">';
$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' order by nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
//----------------------------------------------->
while ($linha = mysql_fetch_array($query)) {
$montaLista  = '<input type="checkbox" name= "ID[]" value="' . $linha['ID'] .'"><input disabled type="text" size="2" value="'. $linha['ano'] .$linha['turma'] .'" style="text-align:center" name="anoTurma"><input disabled type="text" size="50" value="'. $linha['nomeAluno'] .'" style="text-align:left" name="Nome"><input disabled type="text" size="2" value="'. $linha['ativo'] .'" style="text-align:center" name="retSexo"><br>'.$montaLista;
}
echo $montaLista.'<p>Mudar Status Ativo S/N <input type="text" name="ativo" size="1" " style="text-align:center"> <input type="submit" value="Submeter" name="Submeter" onchange="form.submit()"></div></form>';
if (isset($_POST['Submeter']) && isset($_POST['ID'])) {
$ativo = $_POST['ativo'];

foreach($_POST['ID'] AS $key => $value){
$sql = mysql_query("update tb_aluno_projeto set ativo = '$ativo' where ID = $value");
}
echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Mudança de status realizada com sucesso")</SCRIPT>';
echo "<script>window.setTimeout(\"location.href=mudaSexo.php'\",1)</script>";
}
?>