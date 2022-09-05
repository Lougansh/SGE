<?php 
include './conexao.php';
include './conf.php';
alunosMFT();
if (isset($_POST['parametro'])){
	$parametro = $_POST['parametro'];
	$bdParametro = '$linha["'.$parametro.'"]';
	$sql = "select * from tb_alunoMFT where $parametro = '' and situacao = 'A' order by ano, turma, nomeAluno asc ";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
		while ($linha = mysql_fetch_array($query)) {
			$conta++;
		$tabela = $tabela.'
		
	<tr>
		<td align="center">'.$linha['ID'].'</td>
		<td align="center">'.$linha['ano'].'</td>
		<td align="center">'.$linha['turma'].'</td>
		<td align="left  ">'.$linha['nomeAluno'].'</td>
		<td align="center">'.$linha['sexo'].'</td>
		<td align="center">'.$linha['dataNascimento'].'</td>
		<td align="left  ">'.$linha['cidade'].'</td>
		<td align="center">'.$linha['UF'].'</td>
		<td align="left  ">'.$linha['rua'].'</td>
		<td align="left  ">'.$linha['bairro'].'</td>
		<td align="left  ">'.$linha['nomePai'].'</td>
		<td align="left  ">'.$linha['nomeMae'].'</td>
		<td align="center">'.$linha[$parametro].'</td>
	</tr>
	';
	}
	$titulo = '<h2 align="center">Falta '.$conta.': '.$parametro.'</h2>';
}
echo'

<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
	<p align="right"><select size="1" name="parametro" onchange="form.submit()">
	<option value="xx" ></option>
	<option value = "ano"> Ano </option>
	<option value = "anoProjeto"> Ano Projeto </option>
	<option value = "bairro"> Bairro </option>
	<option value = "cadastro"> Data Cadastro </option>
	<option value = "cep"> CEP </option>
	<option value = "cgm"> CGM </option>
	<option value = "chamada"> Chamada </option>
	<option value = "cidade"> Cidade </option>
	<option value = "copel"> Copel </option>
	<option value = "covid19"> Covid19 </option>
	<option value = "cpfAluno"> CPF </option>
	<option value = "cpfResponsavel"> CPF Resp </option>
	<option value = "dataMatricula"> Data Matricula </option>
	<option value = "dataNascimento"> Data Nascimento </option>
	<option value = "emailResponsavel"> Email Resp </option>
	<option value = "equipe"> Equipe </option>
	<option value = "escolaridade"> Escolaridade </option>
	<option value = "ID"> ID </option>
	<option value = "local"> Local </option>
	<option value = "nomeAluno"> Aluno </option>
	<option value = "nomeMae"> Mae </option>
	<option value = "nomePai"> Pai </option>
	<option value = "nomeResponsavel"> Resp </option>
	<option value = "nr"> Nr </option>
	<option value = "obs"> Obs </option>
	<option value = "oferta"> Oferta </option>
	<option value = "parentesco"> Parentesco </option>
	<option value = "prof"> Prof </option>
	<option value = "profissaoMae"> Profissao Mae </option>
	<option value = "profissaoPai"> Profissao Pai </option>
	<option value = "relacionamento"> Relacionamento </option>
	<option value = "rgAluno"> RG </option>
	<option value = "rgResponsavel"> RG Resp </option>
	<option value = "rua"> Rua </option>
	<option value = "salaRecurso"> Sala Recurso </option>
	<option value = "sexo"> Sexo </option>
	<option value = "situacao"> Situacao </option>
	<option value = "tamTenis"> Tenis </option>
	<option value = "tamUniforme"> Uniforme </option>
	<option value = "tel1"> Tel1 </option>
	<option value = "tel2"> Tel2 </option>
	<option value = "tel3"> Tel3 </option>
	<option value = "tel4"> Tel4 </option>
	<option value = "turma"> Turma </option>
	<option value = "turno"> Turno </option>
	<option value = "UF"> UF </option>

	</select></p>
</form>
'.$titulo.'
<table border="1" width="100%" cellspacing="0">
	<tr>
		<td align="center">CGM</td>
		<td align="center">Ano</td>
		<td align="center">Turma</td>
		<td align="center">Aluno</td>
		<td align="center">Sexo</td>
		<td align="center">Nascimento</td>
		<td align="center">Naturalidade</td>
		<td align="center">UF</td>
		<td align="center">Rua</td>
		<td align="center">Bairro</td>
		<td align="center">Pai</td>
		<td align="center">Mae</td>
		<td align="center">'.$parametro.'</td>
	</tr>
	'.($tabela).'
</table>
';
?>