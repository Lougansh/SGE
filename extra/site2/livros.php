<?php
session_start("livros");
include './conexao.php';
include './conf.php';
if (isset($_POST['btnCadastrar'])){
	$_SESSION["op"] = 'cadastro';
}
if ($_SESSION["op"] == 'cadastro'){
	$resultadoPost = 
'
<div align="center"><h1>Cadastrar Livro</h1></div>
<div align="center">
	<table border="0" width="90%" cellpadding="2">
		<tr>
			<td align="right">Titulo:</td>
			<td align="left"><input type="text" name="tituloLivro" size="50"></td>
		</tr>
		<tr>
			<td align="right">Autor:</td>
			<td align="left"><input type="text" name="autorLivro" size="50"></td>
		</tr>
		<tr>
			<td align="right">ISBN:</td>
			<td align="left"><input type="text" name="isbnLivro" size="30"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td align="left">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">Capa:</td>
			<td align="left">
				<p><input type="file" name="capaLivro" size="20"></p>
			</td>
		</tr>
		<tr>
			<td align="right">PDF:</td>
			<td align="left">
				<p><input type="file" name="pdfLivro" size="20"></p>
			</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td align="left">
			<p align="center">
			<input type="submit" value="Salvar" name="btnSalvar"></td>
		</tr>
	</table>
</div>
';
}
if (isset($_POST['btnPesquisar'])){
	$tipoPesquisa = $_POST['radioPesquisa'];
	$valorPesquisa = $_POST['textPesquisa'];
	$resultadoPost =  ucwords($tipoPesquisa).': '.$valorPesquisa;
}
if (isset($_POST['btnSalvar'])){
	$tituloLivro = $_POST['tituloLivro'];
	$autorLivro = $_POST['autorLivro'];
	$isbnLivro = $_POST['isbnLivro'];
	$capaLivro = $_POST['capaLivro'];
	$pdfLivro = $_POST['pdfLivro'];
	$resultadoPost =  	'Titulo: '.ucwords($tituloLivro).'<br>
						 Autor:  '.ucwords($autorLivro).'<br>
						 ISBN:   '.ucwords($isbnLivro).'<br>
						 Capa:   '.ucwords($capaLivro).'<br>
						 PDF:    '.ucwords($pdfLivro).'<br>
						';
	$refresh =  "<script>window.setTimeout(\"location.href='livros.php'\",10)</script>";
}
echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<form method="POST" action="livros.php">
	<fieldset style="padding: 2"><legend>SISTEMA GERENCIADOR DE LIVROS</legend>
		<div align="center">
			<table border="0" width="100%">
				<tr>
					<div align="center">
						<td align="center" width="50%">
							<fieldset style="width: 90%; height: 45px; padding: 2"><legend align="center">CADASTRAR</legend>
								<div align="center">
									<input type="submit" value="OK" name="btnCadastrar">
								</div>
							</fieldset>
						</td>
						<td align="center" width="50%">
							<fieldset style="width: 90%; height: 45px; padding: 2"><legend align="center">PESQUISAR</legend>
								<div align="center">
									<input type="text" name="textPesquisa" size="20">
									<input type="radio" value="titulo" name="radioPesquisa" checked>Titulo
									<input type="radio" value="autor" name="radioPesquisa">Autor
									<input type="radio" value="chave" name="radioPesquisa">Chave 
									<input type="submit" value="OK" name="btnPesquisar">
								</div>
							</fieldset>
						</td>
					</div>
				</tr>
			</table>
		</div>
	</fieldset>	
	'.$resultadoPost.'
</form>
'.$refresh
;
$refresh = '';
?>