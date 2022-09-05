
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<div align="center">
<form method="POST" action="listaProjeto.php" webbot-action="listaProjeto.php">
<input type="radio" value="Nome" name="Tipo">Nome
<input type="radio" value="Local" name="Tipo">Local
<input type="radio" value="Ano" name="Tipo">Ano
<input type="submit" value="Ordenar" name="btnOrdenar"></form></div>
<div align="center">
<table border="1">
<tr>
<td align="center">Local</td>
<td align="center">Ano/Projeto</td>
<td align="center">Aluno</td>
<td align="center">Nascimento</td>
<td align="center">Pai</td>
<td align="center">Mae</td>
<td align="center">Bairro</td>
<td align="center">Rua, Nr</td>
<td align="center">Fixo</td>
<td align="center">Celular</td>
<td align="center">Celular Pai</td>
<td align="center">Celular Mãe</td>
<td align="center">Celular Resposanvel</td>
<td align="center">Escolaridade	</td>
<td align="center">Instituição de Ensino</td>
<td align="center">Nome do Responsavel</td>
<td align="center">CPF</td>
<td align="center">Identidade</td>
<td align="center">E-Mail</td>
<td align="center">Situação</td>
</tr>

<?php
include './conexao.php';
session_start("Pesquisa");
if (isset($_POST['btnOrdenar']) && $_POST['Tipo'] <> '' ){
$tipo = $_POST['Tipo'];
if ($tipo==Nome){
	$sql = 'SELECT * from tb_aluno_projeto where Situacao ="A" Order By nomeAluno';
}
if ($tipo==Local){
	$sql = 'SELECT * from tb_aluno_projeto where Situacao ="A" Order By Local';
}
if ($tipo==Ano){
	$sql = 'SELECT * from tb_aluno_projeto where Situacao ="A" Order By anoProjeto';
}
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());

while ($linha = mysql_fetch_array($query)) {
$local = $linha[local];
$dataHoje = date('Y-m-d');
$anoProjeto = $linha[anoProjeto];
$nomeAluno = $linha[nomeAluno];
$dataNascimento = $linha[dataNascimento];
$dataDia = substr($dataNascimento ,8,2);
$dataMes = substr($dataNascimento ,5,2);
$dataAno = substr($dataNascimento ,0,4);
$nomePai = $linha[nomePai];
$nomeMae = $linha[nomeMae];
$bairro = $linha[bairro];
$rua = $linha[rua];
$nr = $linha[nr];
$telFixo = $linha[telefoneFixo];
$telCelular = $linha[telefoneCelular];
$telCelularPai = $linha[telefoneCelularPai];
$telCelularMae = $linha[telefoneCelularMae];
$telCelularResponsavel = $linha[telefoneCelularResponsavel];
$escolaridade = $linha[escolaridade];
$nomeInstituicaoEnsino = $linha[nomeInstituicaoEnsino];
$nomeResponsavel = $linha[nomeResponsavel];
$cpf = $linha[CPF];
$identidade = $linha[identidade];
$email = strtolower ( $linha[email] );
$siatuacao = $linha[situacao];
echo'<tr><td>'.$local.'</td><td>'.$anoProjeto.'</td><td>'.$nomeAluno.'</td><td>'.$dataNascimento.'</td><td>'.$nomePai.'</td><td>'.$nomeMae.'</td>
<td>'.$bairro.'</td><td>'.$rua.', '.$nr.'</td><td>'.$telFixo.'</td><td>'.$telCelular.'</td><td>'.$telCelularPai.'</td><td>'.$telCelularMae.'</td>
<td>'.$telCelularResponsavel.'</td><td>'.$escolaridade.'</td><td>'.$nomeInstituicaoEnsino.'</td><td>'.$nomeResponsavel.'</td><td>'.$cpf.'</td><td>'.$identidade.'</td>
<td>'.$email.'</td><td>'.$situacao.'</td></tr>';
}
}
?>
</table>
</div>