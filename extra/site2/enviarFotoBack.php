<?php
session_start("historico");
include './conexao.php';
//include './conf.php';
//menuA();
//------------>
$sql = "SELECT * from tb_turma turma where ano <> 'P1' order by ano desc, turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano'] == 0){$decodAno = 'Pre';}else{$decodAno = $linha['Ano'];}
$retTurma = '<input type="radio" value="'.$linha['Ano'].$linha['Turma'].'"  name="R1" onchange="form.submit()">'.$decodAno.$linha['Turma'].$retTurma;
}
mysql_free_result($query);
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$_SESSION["ano"] = substr($_POST['R1'],0,1);
$_SESSION["turma"] = substr($_POST['R1'],1,1);
$sql = 'select * from tb_aluno where situacao = "A" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By ano, nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG';
	//if (!file_exists($foto_aluno)) {
		$montaDropCodigo = '<option value="'.$linha['ID'].'">'.$linha['Nome'].'</option>'.$montaDropCodigo;
	//}
}
$_SESSION["montaDropCodigo"] = $montaDropCodigo;
mysql_free_result($query);
}
echo'
<div class="Body2"><div align="center">
<form method="post" enctype="multipart/form-data" action="?foto">
'.$_SESSION["ano"].$_SESSION["turma"].'</font></b> | '.$retTurma.'
  <hr width="50%" color="#0000FF">
  <hr width="30%" color="#FF0000">
  <input name="arquivo" type="file" />
  <select size="1" name="dropCodigo">'.$_SESSION["montaDropCodigo"].'</select><input type="submit" name="salvar" value="Salvar" /> <a href="index.php">voltar</a>
  <hr width="30%" color="#FF0000">
  <hr width="50%" color="#0000FF">
</form>
';
if(isset($_POST['salvar']) and $_POST['dropCodigo'] != ''){
$id = $_POST['ID'];
$dropCodigo = $_POST['dropCodigo'];
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
$retorno = '<div align=left><strong>'.$_FILES["arquivo"]["name"].'</strong><br>Tipo: <strong>'.$_FILES["arquivo"]["type"].'</strong><br> Temporariamente salvo em: <strong>'.$_FILES["arquivo"]["tmp_name"].'</strong><br> Tamanho: <strong>'.$_FILES['arquivo']['size'].'</strong> Bytes<div>';
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome = $_FILES['arquivo']['name'];
$extensao = strrchr($nome, '.');
$extensao = strtoupper($extensao);
if(strstr('.jpg;.JPG;', $extensao)){
$novoNome = $dropCodigo.$extensao;

$destino = '../images/alunos/' . $novoNome; 
if( @move_uploaded_file( $arquivo_tmp, $destino  )){
echo 'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br><br>';
echo '<img src="'.$destino.'" width="auto" height="400"><br>'.$retorno;
echo '<br>Nome modificado para: '.$dropCodigo.$extensao;
} else{echo "Permissão negada".$destino;}
} else {echo "Formato de foto invalido!!!";}
} else {echo "Nenhum arquivo enviado!!!";}
}
?>