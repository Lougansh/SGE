	<?php
	session_start("historico");
	include './conexao.php';
	include './conf.php';
	alunosMFT();
	if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
		$_SESSION["ano"] = substr($_POST['Lista'],0,1);
		$_SESSION["turma"] = substr($_POST['Lista'],1,1);
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'G'){$titulo = 'Turma: Pré - Escola I A ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'H'){$titulo = 'Turma: Pré - Escola I B ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'A'){$titulo = 'Turma: Pré - Escola II A ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'B'){$titulo = 'Turma: Pré - Escola II B ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'C'){$titulo = 'Turma: Pré - Escola II C ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'D'){$titulo = 'Turma: Pré - Escola II D ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'E'){$titulo = 'Turma: Pré - Escola II E ';}
		if ($_SESSION["ano"] == 0 && $_SESSION["turma"] == 'F'){$titulo = 'Turma: Pré - Escola II F ';}
		if ($_SESSION["ano"] >= 1){$titulo = 'Turma: '.$_SESSION["ano"].'º Ano '.$_SESSION["turma"];}
		
		$sql = 'select * from tb_alunoMFT where situacao = "A" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By ano, nomeAluno desc';
		$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
		while ($linha = mysql_fetch_array($query)) {
			$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG';
			//if (!file_exists($foto_aluno)) {
			$montaDropCodigo = '<option value="'.$linha['ID'].'">'.$linha['nomeAluno'].'</option>'.$montaDropCodigo;
			//}
		}
		$_SESSION["montaDropCodigo"] = $montaDropCodigo;
		mysql_free_result($query);
	}
	echo'
	<div class="Body2"><div align="center">
	<form method="post" enctype="multipart/form-data" action="?foto">
	<h2 align="center">SISTEMA DE INCLUSÃO E ALTERAÇÃO DE FOTO</h2>
	<h3>'.$titulo.'</h3><br></font></b> | '.$mostraMenu.'
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