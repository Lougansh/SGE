<?php
include './conexao.php';
session_start("Pesquisa");
echo '<style media="print">.botao {display: none;}</style>';
$index = 0;
//if (isset($_POST['btnPesquisar']) && $_POST['RA'] <> '' ){
if ($_POST['RA'] <> '' ){
$RA = $_POST['RA'];
$index = $RA+1;
$sqlID = "SELECT ID from tb_aluno_projeto";
$queryID = mysql_query($sqlID) or die("SQL:" . $sqlID . " - ERRO:" . mysql_error());
while ($linhaID = mysql_fetch_array($queryID)) {
$ID[]= $linhaID[ID];
}
//echo $_POST['RA'];
$sql = 'SELECT * from tb_aluno_projeto where ID = "'.$RA.'" Order By nomeAluno';
//$sql = 'select * from tb_aluno where situacao <> "T" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By ano desc,nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$ID = $linha[ID];
$matricula = '2020';
$dataHoje = date('Y-m-d');
$anoProjeto = $linha[anoProjeto];
$nomeAluno = $linha[nomeAluno];
$rgAluno = $linha[rgAluno];
$cpfAluno = $linha[cpfAluno];
$dataNascimento = $linha[dataNascimento];
$dataDia = substr($dataNascimento ,8,2);
$dataMes = substr($dataNascimento ,5,2);
$dataAno = substr($dataNascimento ,0,4);
$nomePai = $linha[nomePai];
$nomeMae = $linha[nomeMae];
$bairro = $linha[bairro];
$rua = $linha[rua];
$nr = $linha[nr];
$telFixo = $linha[tel1];
$telCelular = $linha[tel2];
$telCelularPai = $linha[tel3];
$telCelularMae = $linha[tel4];
$rgResponsavel = $linha[rgResponsavel];
$escolaridade = $linha[escolaridade];
$nomeResponsavel = $linha[nomeResponsavel];
$cpfResponsavel = $linha[cpfResponsavel];
$email = strtolower ( $linha[email] );
$profissaoPai = $linha[profissaoPai];
$profissaoMae = $linha[profissaoMae];
}
}
echo '
<form method="POST" action="?id=proximoRegistro" onsearch="form.submit"()>
<p align="center">PROJETO ROBÓTICA EDUCACIONAL - CONSTRUINDO O FUTURO HOJE</p>
<p align="center"><font size="3">FICHA DE MATRICULA</fonte> <div align="center" class="botao"><input type="text" style="text-align:center" name="RA" size="3" value="'.$index.'" autofocus></div></p>
<p align="center"><font size="5">DADOS DO ALUNO</font></p><hr>
<table border="0" width="100%">
	<tr>
		<td width="924"><font size="3">
<p align="left"><b>Cadastro no Projeto</b>: '.$anoProjeto.' - Matriculado: <b>'.$matricula.'</b>
		</td>
		<td rowspan="14">
		<p align="center">
		<img border="0" src="../images/CFH/'.$ID.'.JPG" height="210" style="border-radius: 15px;"></td>
	</tr>
	<tr>
		<td width="924"><font size="3">
<p align="left"><b>Nome</b>: '.$nomeAluno.' </p>
		</td>
	</tr>
	<tr>
		<td width="924"><font size="3">
		<b>Telefone Celular</b>: '.$telCelular.'</td>
	</tr>
	<tr>
		<td width="924"><font size="3">
<p align="left"><b>Data de Nascimento</b>: '.$dataDia.'/'.$dataMes.'/'.$dataAno.' </p>
		</td>
	</tr>
	<tr>
		<td width="924"><font size="3">
<p align="left"><b>Identidade</b>: '.$rgAluno.' - <b>CPF</b>: '.$cpfAluno.' </p>
		</td>
	</tr>
	<tr>
		<td width="924"><font size="3"><b>Nome do Pai</b>: '.$nomePai.' </td>
	</tr>
	<tr>
		<td width="924"><font size="3"> <b>Telefone Celular</b>: '.$telCelularPai.'</td>
	</tr>
	<tr>
		<td width="924"><font size="3"><b>Nome da Mãe</b>: '.$nomeMae.' </td>
	</tr>
	<tr>
		<td width="924"><font size="3"> <b>Telefone Celular</b>: '.$telCelularMae.'</td>
	</tr>
	<tr>
		<td width="924"><font size="3"><b>Bairro</b>: '.$bairro.' <b>Rua</b>: '.$rua.' <b>Nr</b>: '.$nr.'</td>
	</tr>
	<tr>
		<td width="924"><font size="3"><b>Telefone Fixo</b>: '.$telFixo.'</td>
	</tr>
	<tr>
		<td width="924"><font size="3"><b>Escolaridade</b>: '.$escolaridade.'</td>
	</tr>
</table>
<p align="left">&nbsp;</p><p align="left"></p>

<p align="center"><font size="5">DADOS DO RESPONSÁVEL</font></p><hr>
<table border="0" width="100%">
	<tr>
		<td><font size="3"><b>Nome do Responsável</b>: '.$nomeResponsavel.' </td>
	</tr>
	<tr>
		<td><font size="3"> <b>Telefone Celuar</b>: '.$telCelularResponsavel.'</td>
	</tr>
	<tr>
		<td><font size="3">
<p align="left"><b>CPF</b>: '.$cpf.'</p></td>
	</tr>
	<tr>
		<td><font size="3">
		<p align="left"><b>Identidade</b>: '.$identidade.'</p></td>
	</tr>
	<tr>
		<td><font size="3"><b>E-Mail</b>: '.$email.'</td>
	</tr>
	<tr>
		<td><b>Profissão</b><font size="3">: '.$profissao.'</td>
	</tr>
</table>
<p align="left">&nbsp;</p>
<p align="center"></p>
<p align="center"><font size="5">AUTORIZAÇÃO DE USO DE IMAGEM</font></p><hr>
<p align="justify">Autorizo a gravação em vídeo da imagem e depoimentos, bem como a veiculação da imagem e depoimentos em qualquer meio de comunicação para fins didáticos, de pesquisa e divulgação de conhecimento cientifico, elaboração de produtos e divulgação de projetos audiovisuais sem quaisquer ônus, durante o decorrer do curso. Fica ainda autorizada, de livre e espontânea vontade, para os mesmos fins, a cessão de direitos de veiculação das imagens e depoimentos, não recebendo para tanto qualquer tipo de remuneração.</p><br><br><br><br>
<table border="0" width="100%"><tr><td width="33%"><p align="center">____________________________________________<br>'.$nomePai.'</td><td width="33%"></td><td width="33%"><p align="center">____________________________________________<br>'.$nomeMae.'</td></tr></table>
';
?>

