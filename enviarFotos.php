	<?php
	session_start();
	include './conexao.php';
	include './conf.php';
	//-----------------------------------------
	menu();
	if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
		$ano = substr($_POST['Lista'],0,1);
		$turma = substr($_POST['Lista'],1,1);
		$sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";		
		$result = mysqli_query($connection, $sql);
    	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$foto_aluno = './img/aluno/'.$row['cgm'].'.JPG';
			$montaDropCodigo = $montaDropCodigo.'<option value="'.$row['cgm'].'">'.$row['nome'].'</option>';
		}
		$_SESSION["montaDropCodigo"] = $montaDropCodigo;
	}
	if(isset($_POST['salvar']) and $_POST['dropCodigo'] != ''){
				$id = $_POST['ID'];
		$dropCodigo = $_POST['dropCodigo'];
		if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0){
		$retorno = $_FILES["arquivo"]["name"].'Tipo: '.$_FILES["arquivo"]["type"].' Temporariamente salvo em: '.$_FILES["arquivo"]["tmp_name"].' Tamanho: '.$_FILES['arquivo']['size'].' Bytes';
		$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
		$nome = $_FILES['arquivo']['name'];
		$extensao = strrchr($nome, '.');
		$extensao = strtoupper($extensao);
		if(strstr('.jpg;.JPG;', $extensao)){
		$novoNome = $dropCodigo.$extensao;
		$destino = './img/aluno/' . $novoNome; 

	if( @move_uploaded_file( $arquivo_tmp, $destino  )){
		$salvoLocal =  'Arquivo salvo com sucesso em : <strong>'.$destino.'</strong><br>';
		$imagemEnviada =  '<img src="'.$destino.'" width="auto" height="400"><br>';
		$modificadoPara = '<br>Nome modificado para: '.$dropCodigo.$extensao;
		} else{$permissao = "Permissão negada".$destino;}
		} else {$formato = "Formato de foto invalido!!!";}
		} else {$situacao = "Nenhum arquivo enviado!!!";}
	}
	echo'
	<div align="center">
	<form method="post" enctype="multipart/form-data" action="?foto">
	<h2 align="center">SISTEMA DE INCLUSÃO E ALTERAÇÃO DE FOTO</h2>
	<h3>'.$titulo.'</h3><br></font></b> '.$mostraMenu.'
	<hr width="50%" color="#0000FF">
	<hr width="30%" color="#FF0000">
	'.$ano.$turma.'
	<select size="1" name="dropCodigo">'.$_SESSION["montaDropCodigo"].'</select>
	<input name="arquivo" type="file" />
	<input type="submit" name="salvar" value="Salvar">
	<hr width="30%" color="#FF0000">
	<hr width="50%" color="#0000FF">
	</form>
	'.$imagemEnviada.'<br>
	'.$salvoLocal.'</div>';
?>