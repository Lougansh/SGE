<?php
include './conexao.php';
include './conf.php';
alunosProjeto();
$sql = 'select * from tb_aluno_projeto where equipe  = "presencial" Order By nomeAluno';
		//$sql = 'select * from tb_aluno_projeto where anoProjeto >= YEAR(CURDATE()) Order By ID desc';

	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	$menu = $menu.'<option value="'.$linha['ID'].'">'.(($linha['nomeAluno'])).'</option>';
}
echo'
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<title>Atualização de Alunos CFH</title>
			<meta http-equiv="Content-Language" content="pt-br">
			<meta charset="utf-8">
		</head>
		<body>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="Center">
					<style media="print">.botao {display: none;}</style>
					<div align="right" class="botao">
						<select size="1" name="menu" onchange="form.submit()"><option value=""></option>'.$menu.'</select>
					</div>
				</div>
';
if (isset($_POST['menu'])&& $_POST['menu'] != '') { 
$codigo = $_POST['menu'];
$sql = "select * FROM tb_aluno_projeto WHERE ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['dataNascimento'] );
$interval = $date->diff( new DateTime( date() ) );
if ($linha['sexo'] 		== 'M') {$Sexo = 'Masculino';}else{$Sexo = 'Feminino';}
if($linha['tel1'] != ''){ $contato = $linha['tel1'];}
if($linha['tel2'] != ''){ $contato = $contato.' / '.$linha['tel2'];}
if($linha['tel3'] != ''){ $contato = $contato.' / '.$linha['tel3'];}
if($linha['tel4'] != ''){ $contato = $contato.' / '.$linha['tel4'];}
echo'
<div align="center">
	<table border="0" width="95%">
	<tr>
		<td>
		<p align="center"><font face="Arial">
		<img border="0" src="../upload/RoboCFH3.png" width="72" height="100"></font></td>
		<td>
		<p align="center"><font face="Arial">PROJETO DE ROBÓTICA<br>
		<b><font size="6">CONSTRUINDO O FUTURO HOJE</font></b><br>
		<b>'.strtoupper($linha['local']).'</b></font></p>
		<p align="center"><font face="Arial">MATRICULA '.strftime('%Y', strtotime('today')).'</font></td>
		<td>
		<p align="center"><font face="Arial">
		<img border="0" src="../upload/LogoMariaFumiko.jpg" width="65" height="100"></font></td>
	</tr>
	<tr>
		<td colspan="3">
		<p align="center">
		<span style="color: rgb(0, 0, 0); font-family: Arial; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; display: inline; float: none">
		</span></td>
	</tr>
</table></div>
<div align="center">
	<table border="0" width="95%">
		<tr>
			<td>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Aluno</b>: '.(($linha['nomeAluno'])).'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>CGM</b>: '.$linha['cgm'].'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Data de Nascimento</b>: '.date('d', strtotime($linha['dataNascimento'])).'/'.date('m', strtotime($linha['dataNascimento'])).'/'.date('Y', strtotime($linha['dataNascimento'])).'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Escolaridade</b>: '.$linha['escolaridade'].'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Sexo</b>: '.$Sexo.'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>RG</b>: '.$linha['rgAluno'].'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>CPF</b>: '.$linha['cpfAluno'].'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Pai</b>: '.(($linha['nomePai'])).' </font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Profissão</b>: 
			'.(($linha['profissaoPai'])).'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Mãe</b>: '.(($linha['nomeMae'])).' </font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Profissão</b>: 
			'.(($linha['profissaoMae'])).'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Endereço</b>: '.(($linha['rua'])).', '.$linha['nr'].' - '.(($linha['bairro'])).'</font></p>
			<p style="margin-top: 2px; margin-bottom: 2px">
			<font face="Times New Roman">
			<b>Contato</b>: '.$contato.'</font></p>
			<p>&nbsp;</td>
			<td width="235">
			<img src="../images/CFH/'.$linha['cgm'].'.JPG" height="320"></td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="95%">
		<tr>
			<td>
			<p align="left" style="margin-top: 3px; margin-bottom: 3px">
			<font face="Times New Roman"><b>Responsável</b>: '.(($linha['nomeResponsavel'])).'</font></p>
			<p align="left" style="margin-top: 3px; margin-bottom: 3px">
			<font face="Times New Roman"><b>RG</b>: '.$linha['rgResponsavel'].'</font></p>
			<p style="margin-top: 3px; margin-bottom: 3px">
			<font face="Times New Roman">
			<b>CPF</b>: '.$linha['cpfResponsavel'].'</font></p>
			<p style="margin-top: 3px; margin-bottom: 3px">
			<font face="Times New Roman">
			<b>EMail</b>: '.$linha['emailResponsavel'].'</font></td>
		</tr>
		<tr>
			<td>
			<p align="justify">
			<span style="color: rgb(0, 0, 0); font-family: Arial; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none">&nbsp;&nbsp;&nbsp; </span>
			<font face="Times New Roman">
			<span style="letter-spacing: normal">Eu </span>'.(($linha['nomeResponsavel'])).', 
			autorizo '.(($linha['nomeAluno'])).', a participar do projeto de robótica educacioal <b>"CONSTRUINDO O FUTURO HOJE"</b>, em contra-turno escolar no período letivo de 2021 de forma presencial. Bem como participar das atividades externas como: viagens, apresentações, competições e mostras.
			</font>
			<p align="justify">
			<span style="font-family: Arial">&nbsp;&nbsp;&nbsp; </span>
			<span style="font-size: 12.0pt; line-height: 115%; font-family: Times New Roman">
			Estando ciente que a participação da família é de extrema importância no aprendizado do aluno bem como as atividades externas, reconheço que é de minha inteira responsabilidade, prover os meios necessários para que '.(($linha['nomeAluno'])).' possa participar das atividades. Bem como apoiar e motivar sua participação.
			</span></p>
			<p align="justify">
			<span style="font-size: 12.0pt; line-height: 115%; font-family: Arial">
			&nbsp;&nbsp;&nbsp; </span><font face="Times New Roman">
			<span style="font-size: 12.0pt; line-height: 115%; ">
			Autorizo a gravação em vídeo da imagem e depoimentos, bem como a veiculação da imagem e depoimentos em qualquer meio de comunicação para fins didáticos, de pesquisa e divulgação de conhecimento cientifico, elaboração de produtos e divulgação de projetos audiovisuais sem quaisquer ônus, durante o decorrer do curso. Fica ainda autorizada, de livre e espontânea vontade, para os mesmos fins, a cessão de direitos de veiculação das imagens e depoimentos, não recebendo para tanto qualquer tipo de remuneração.
			</span></font></p>
			</td>
		</tr>
		<tr>
			<td>
			<p align="right">Cascavel, '.date('d/m/Y').'.</td>
		</tr>
	</table>
</div>
<div align="center">
	<table border="0" width="95%" style="border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px">
		<tr>
			<td width="33%">&nbsp;<p>&nbsp;</td>
			<td width="33%" style="border-right-style: none; border-right-width: medium">&nbsp;</td>
			<td style="border-top-style: none; border-top-width: medium; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium">
			&nbsp;</td>
		</tr>
		<tr>
			<td width="33%">&nbsp;</td>
			<td width="33%">&nbsp;</td>
			<td style="border-top-style: solid; border-top-width: 1px; border-bottom-style:none; border-bottom-width:medium">
			<p align="center">'.(($linha['nomeResponsavel'])).'<br>
			RG: '.$linha['rgResponsavel'].'</td>
		</tr>
		</table>
</div>
';
}
?>