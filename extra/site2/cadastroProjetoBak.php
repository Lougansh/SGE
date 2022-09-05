<?php
include './conexao.php';
include './conf.php';
menuA();
$dataHoje = date('Y-m-d');
$local = strtoupper($_POST['local']);
$anoProjeto = $_POST['anoProjeto']; //substr($dataHoje,0,4);
if (isset($_POST['cadastrar'])) { 
$nomeAluno = strtoupper($_POST['nomeCompleto']);
$dataNascimento = $_POST['dataAno'].'-'.$_POST['dataMes'].'-'.$_POST['dataDia'];
$rgAluno = $_POST['rgAluno'];
$cpfAluno = $_POST['cpfAluno'];
$nomePai = strtoupper($_POST['nomePai']);
$nomeMae = strtoupper($_POST['nomeMae']);
$bairro = strtoupper($_POST['bairro']);
$rua = strtoupper($_POST['rua']);
$nr = $_POST['nr'];
$telFixo = $_POST['telFixo'];
$telCelular = $_POST['telCelular'];
$telCelularPai = $_POST['telCelularPai'];
$telCelularMae = $_POST['telCelularMae'];
$telCelularResponsavel = $_POST['telCelularResponsavel'];
$escolaridade = $_POST['escolaridade'];
$nomeResponsavel = strtoupper($_POST['nomeResponsavel']);
$cpf = $_POST['cpf'];
$identidade = $_POST['identidade'];
$email = strtolower($_POST['email']);
$situacao = 'A';
$profissao = strtoupper($_POST['profissao']);
}
$sql = "insert into tb_aluno_projeto (local, anoProjeto, nomeAluno, dataNascimento, rgAluno, cpfAluno, nomePai, nomeMae, bairro, rua, nr, telefoneFixo, telefoneCelular, telefoneCelularPai, telefoneCelularMae, telefoneCelularResponsavel, escolaridade, nomeInstituicaoEnsino, nomeResponsavel, CPF, identidade, email, profissao, situacao) 
values ('$local', '$anoProjeto', '$nomeAluno', '$dataNascimento', '$rgAluno', '$cpfAluno', '$nomePai', '$nomeMae', '$bairro', '$rua', $nr, '$telFixo', '$telCelular', '$telCelularPai', '$telCelularMae', '$telCelularResponsavel', '$escolaridade', '$nomeInstituicaoEnsino', '$nomeResponsavel', '$cpf', '$identidade', '$email', '$profissao', '$situacao')"; 
$query = mysql_query($sql); 
if($query){echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro efetuado com sucesso!!!")</SCRIPT>';}
?>
<p align="center">FICHA DE CADASTRO</p>
<form method="POST" action="cadastroProjeto.php"><fieldset style="padding: 2">
<legend align="center">Dados do Aluno</legend><table border="0" width="100%">
<tr><td width="250">Local</td><td><select size="1" name="local">
<option>MARIA FUMIKO</option>
<option>CFH</option>
<option>CEEP</option>
</select></td><td width="200">Ano Projeto</td><td><input type="text" name="anoProjeto" value="" size="10" style="text-align: center;"></td></tr>
<tr><td>Nome Completo</td><td width="400"><input type="text" name="nomeCompleto" size="50"></td><td width="200">Celular do Aluno</td><td><input type="text" name="telCelular" size="10"></td></tr>
<tr><td>Data de Nascimento</td><td><input type="text" name="dataDia" size="2">/<input type="text" name="dataMes" size="2">/<input type="text" name="dataAno" size="4"></td></td><td>RG</td><td><input type="text" name="rgAluno" size="7" style="text-align: center;"></td><td>CPF</td><td><input type="text" name="cpfAluno" size="11" style="text-align: center;"></td></tr>


<tr><td>Nome do Pai</td><td><input type="text" name="nomePai" size="50"></td><td>Celular do Pai</td><td><input type="text" name="telCelularPai" size="10"></td></tr>
<tr><td>Nome da Mãe</td><td><input type="text" name="nomeMae" size="50"></td><td>Celular da Mãe</td><td><input type="text" name="telCelularMae" size="10"></td></tr>
<tr><td>Bairro</td><td>
<select size="1" name="bairro">
<option>14 de Novembro</option>
<option>Alto Alegre</option>
<option>Alvorada</option>
<option>Belo Horizonte</option>
<option>Brasília I</option>
<option>Brasília II</option>
<option>Brasmadeira</option>
<option>Canadá</option>
<option>Cancelli</option>
<option>Cascavel Velho</option>
<option>Cataratas</option>
<option>Centralito</option>
<option>Centro</option>
<option>Ciro Nardi</option>
<option>Clarito</option>
<option>Claudete</option>
<option>Colonial</option>
<option>Condomínio Residencial Gramado II</option>
<option>Consolata</option>
<option>Coqueiral</option>
<option>Country</option>
<option>Distrito Industrial</option>
<option>Esmeralda</option>
<option>Espigão Azul</option>
<option>Esteves</option>
<option>Floresta</option>
<option>Guarujá	</option>
<option>Interlagos</option>
<option>Loteamento Fag</option>
<option>Maria Luíza</option>
<option>Morumbi</option>
<option>Neva</option>
<option>Nova Cidade</option>
<option>Núcleo Industrial</option>
<option>Núcleo Industrial II</option>
<option>Pacaembu</option>
<option>Parque São Paulo</option>
<option>Parque Verde</option>
<option>Periolo</option>
<option>Pioneiros Catarinenses</option>
<option>Recanto Tropical</option>
<option>Reassentamento São Francisco</option>
<option>Região do Lago</option>
<option>Residencial Golden Garden</option>
<option>Santa Cruz</option>
<option>Santa Felicidade</option>
<option>Santo Inácio</option>
<option>Santo Onofre</option>
<option>Santos Dumont</option>
<option>São Cristóvão</option>
<option>São Salvador</option>
<option>Switch</option>
<option>Taruma</option>
<option>Universitário</option>
<option>Vila Industrial</option>
</select></td><td>Rua</td><td><input type="text" name="rua" size="45"></td><td>Nr</td><td><input type="text" name="nr" size="4"></td></tr>
<tr><td>Telefone Fixo</td><td><input type="text" name="telFixo" size="10"></td></tr>
<tr></tr>
<tr><td>Escolaridade</td><td><select size="1" name="escolaridade"><option>ENSINO FUNDAMENTAL 1</option><option>ENSINO FUNDAMENTAL 2</option><option>ENSINO MÉDIO</option><option>ENSINO SUPERIOR</option></select></td></tr>
<tr></tr>
</table></fieldset>

<fieldset style="padding: 2"><legend align="center">Dados do Responsável</legend><table border="0" width="100%">
<tr><td width="250">Nome do Responsável</td><td width="400"><input type="text" name="nomeResponsavel" size="50"></td><td width="200">Celular do Responsável</td><td><input type="text" name="telCelularResponsavel" size="10"></td></tr>
<tr><td>CPF</td><td><input type="text" name="cpf" size="15"></td></tr>
<tr><td>Identidade</td><td><input type="text" name="identidade" size="15"></td></tr>
<tr><td>Email</td><td><input type="text" name="email" size="50"></td></tr>
<tr><td>Profissão</td><td><input type="text" name="profissao" size="50"></td></tr>
</table></fieldset>

<fieldset style="padding: 2">
<legend align="center">Autorização de Uso de Imagem</legend>
<p align="center"><textarea rows="5" name="autorizacaoUsoImagem" cols="150">
Autorizo a gravação em vídeo da imagem e depoimentos, bem como a veiculação da imagem e depoimentos em qualquer meio de comunicação para fins didáticos, de pesquisa e divulgação de conhecimento cientifico, elaboração de produtos e divulgação de projetos audiovisuais sem quaisquer ônus, durante o decorrer do curso. Fica ainda autorizada, de livre e espontânea vontade, para os mesmos fins, a cessão de direitos de veiculação das imagens e depoimentos, não recebendo para tanto qualquer tipo de remuneração.
</textarea></fieldset><p align="center">
<input type="submit" value="Cadastrar" name="cadastrar"></p>
</form>