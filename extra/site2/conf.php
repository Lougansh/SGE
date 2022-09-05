<?php
include './conexao.php';
function menuA(){
session_start();
if(!isset($_SESSION['Login'])){
header("LOCATION:./login.php");
exit;
}
if (isset($_POST['btnSair']) ) {
	echo "<script> alert('Obrigado por usar SGA - Sistema Gerenciador de Alunos!!!');</script>";
session_start();
session_destroy();

header("LOCATION:./index.php");
exit;
}
echo '
<head>
<style type="text/css">
<!--
#menu ul {
margin:0px;
padding: 5px;
float: center;
width: 100%;
list-style:none;
font:80% Tahoma;
}
#menu ul li { display: inline; }
#menu ul li a {
color: #333;
text-decoration: none;
border-bottom:3px solid #EDEDED;
padding: 0px 10px;
float:center;
}
#menu ul li a:hover {
background-color:#D6D6D6;
color: #6D6D6D;
border-bottom:3px solid #EA0000;
}
-->
</style>
</head>
<form method="POST" action="?logout=1">
<div align="center"><div id="menu">
<ul>
<li><a href="./index.php">	Inicio</a></li>
<li><a href="./historico.php">	Histórico</a></li>
<li><a href="./avaliacao.php">	Avaliação</a></li>
<li><a href="./pesquisa.php">	Pesquisa</a></li>
<li><a href="./curso.php">	Curso</a></li>
<li><a href="./listaGeral.php">	Lista Geral</a></li>
<li><a href="./cadastro.php">	Cadastro</a></li>
<li><a href="./preConselho.php">Pré Conselho</a></li>
<li><a href="./relatorio.php">	Relatorio</a></li>
<li><a href="./turma.php">	Turma</a></li>
<li><a href="./pesquisarArquivoMorto.php">	Arquivo Morto</a></li>
<li><a href="./movimentacao.php">	Movimentacao</a></li>
<li><a href="./menu.php">	Menu</a></li>
</ul>
</div>
</div>
</form>
';
}
function alunosProjeto(){
session_start();
if(!isset($_SESSION['Login'])){
header("LOCATION:./login.php");
exit;
}
if (isset($_POST['btnSair']) ) {
	echo "<script> alert('Obrigado por usar SGA - Sistema Gerenciador de Alunos!!!');</script>";
session_start();
session_destroy();

header("LOCATION:./index.php");
exit;
}
echo '
<head>
<style type="text/css">
<!--
#menu ul {
margin:0px;
padding: 5px;
float: center;
width: 100%;
list-style:none;
font:80% Tahoma;
}
#menu ul li { display: inline; }
#menu ul li a {
color: #333;
text-decoration: none;
border-bottom:3px solid #EDEDED;
padding: 0px 10px;
float:center;
}
#menu ul li a:hover {
background-color:#D6D6D6;
color: #6D6D6D;
border-bottom:3px solid #EA0000;
}
-->
</style>
</head>
<form method="POST" action="?logout=1">
<div align="center" class="botao"><div id="menu">
<ul>
<li><a href="./index.php">	Inicio</a></li>
<li><a href="./cadastrarAluno.php">	Cadastrar</a></li>
<li><a href="./editarAluno.php">	Editar</a></li>
<li><a href="./pesquisarAluno.php">	Pesquisar</a></li>
<li><a href="./imprimirAluno.php">	Imprimir</a></li>
<li><a href="./enviarFoto.php">	Enviar Foto</a></li>
<li><a href="./menu.php">	Menu</a></li>
</ul>
</div>
</div>
</form>
';
}
function aniversario (){
$sql = "select * from tb_aluno where MONTH(Nascimento) = MOD(MONTH(CURDATE()), 12) and day(Nascimento) = MOD(day(CURDATE()), 31) order by ano desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
if (mysql_num_rows($query) != 0) {
while ($linha = mysql_fetch_array($query)) {
	$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 	
	if (file_exists($foto_aluno)){
	//$aluno =  '<font size="2" face="Arial" color="blue">'.$linha['Nome'].'</font> <font size="2" face="Arial" color="gray">'.$linha['Ano'].$linha['Turma'].'</font><br>'.$aluno;
	//$aluno = '<img style="margin: 5px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../images/alunos/'.$linha['ID'].'.JPG" height="50">'.$aluno;
	$aluno = '<a href="http://www.construindoofuturohoje.com/site/qrcode.php?id='.$linha['ID'].'"><img style="margin: 5px; padding: 1px; border: 1px solid gray" alt="'.$linha['Nome'].'" title="'.$linha['Nome'].'" src="../images/alunos/'.$linha['ID'].'.JPG" height="50"></a>'.$aluno;
	}
}
//$aluno = '<img border="0" src="../images/aluno.jpg" width="25" height="40"><br>'.$aluno;
}
$aniversariante = $servidor.$aluno;
if($aniversariante != ''){
//echo '<h3>Hoje é o <img border="0" src="../images/bolo1.jpg" width="50" height="50"> de: </h3><ul>'.$aniversariante;
//echo'<p align="right"><font face="Edwardian Script ITC" size="5" color="green">Aniversáriantes:</font><br>'.$aniversariante.'</p>';
echo '
<div align="center"><table border="1" width="100%" bgcolor="yellow" style="border-collapse: collapse"><tr><td><p align="center"><b><font face="Times New Roman">Aniversariantes</font></b></td></tr></table></div>
<div align="center">'.$aniversariante.'</div>
	 ';
}
}
function head(){
echo'
<div class="Head"><p align="center">
<img border="0" src="../images/titulo.jpg" width="600" height="40">
<center></div></div>
<body topmargin="0" leftmargin="1" rightmargin="1" bottommargin="0">
';
}
function mostraLogin(){
	session_start();
echo'
<div style="position: absolute; top: 5; float: right; right: 5">
<div align="right">
Logado: <a href="destroiSecao.php" alt="Sair da Secao"><font color="red">'.strtoupper($_SESSION["Usuario"]).'</font></a><br>'.$_SESSION["Login"].'
</div></div>
';
}
function menuVertical(){
echo'
<div class="Menu">
<p align="center" valign="bottom">
<a href="../ChatAjax/">	<img src="../images/chat.png" width="80" height="80"></a><br>
<a href="index.php">		<img src="../images/inicio.gif"</a>
<a href="planoAula.php">	<img src="../images/planoAula.htm_cmp_loosegst000_vbtn.gif"</a>
<a href="cronograma.php">	<img src="../images/cronograma.gif"</a>
<a href="planejamento.php">	<img src="../images/planejamento.gif"</a>
<a href="linux.php">		<img src="../images/linux.gif"</a>
<a href="programas.php">	<img src="../images/programas.gif"</a>
<a href="menu.php">		<img src="../images/restrito.gif"</a>
<a href="lista.php">		<img src="../images/lista.gif" width="80" height="80"></a><br>
<a href="jogos.php">		<img src="../images/jogos.png" width="120" height="80"></a>
</div></div>
';
}
function photoshow(){
echo'
<div align="center"><table border="1" width="100%" bgcolor="darkblue" style="border-collapse: collapse"><tr><td><p align="center"><b><font face="Times New Roman">Photo Show</font></b></td></tr></table></div>
<a href="../photoShow"><img border="0" src="../images/lente.jpg" width="100" height="100" align="left"></a>
<p align="justify">Atualmente, a introdução da tecnologia digital tem modificado drasticamente os paradigmas que norteiam o mundo da fotografia. Os equipamentos, ao mesmo tempo que são oferecidos a preços cada vez menores, disponibilizam ao usuário médio recursos cada vez mais sofisticados, assim como maior qualidade de imagem e facilidade de uso. A simplificação dos processos de captação...</p>
';
}
function mp3(){
echo'
<div align="center"><table border="1" width="100%" bgcolor="darkred" style="border-collapse: collapse"><tr><td><p align="center"><b><font face="Times New Roman">Musicas MP3</font></b></td></tr></table></div>
<a href="../music"><img border="0" src="../images/Musicas.jpg" width="98" height="100" align="left"></a>
<p align="justify">MP3 é um formato eletrônico que permite ouvir músicas em computadores, com ótima qualidade. Assim como o LP, o K7 e o CD, o MP3 vem se fortalecendo como um popular meio de distribuição de canções. Mas porquê?</p>
';
}
function alunosProg(){
$sql = "SELECT * from tb_aluno where programacao = 'S' order by ano asc, turma desc, nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$qtde = 0;
while ($linha = mysql_fetch_array($query)) {
$qtde ++;
$retAlunoProg = '<input type="radio" value="'.$linha['ID'].'"  name="R1" onchange="form.submit()">'.$linha['Ano'].$linha['Turma'].' - '.$linha['Nome'].'<br>'.$retAlunoProg;
}
mysql_free_result($query);
echo '
<div align="center"><table border="1" width="100%" bgcolor="green" style="border-collapse: collapse"><tr><td><p align="center"><b><font face="Times New Roman">Alunos de Programação</font></b></td></tr></table></div>
São '.$qtde.' aprovados:<br>'.$retAlunoProg;
}

function alunosProg2(){
$sql = "SELECT count(ID) qtde from tb_aluno where programacao = 'S' and situacao = 'A' order by ano asc, turma desc, nome desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$qtde = $linha['qtde'];
}
mysql_free_result($query);
echo '
<div align="center"><table border="1" width="100%" bgcolor="green" style="border-collapse: collapse"><tr><td><p align="center"><b><font face="Times New Roman">ContraTurno Escolar</font></b></td></tr></table></div>
São '.$qtde.' os alunos interessados.<br>
';
}

function recado(){
echo' 
<div align="center">
<table border="1" width="100%" bgcolor="gray" style="border-collapse: collapse"><tr><td>
<p align="center"><b><font face="Times New Roman">Informações</font></b></td></tr></table>
<a href="ranking.php">
Com o  intuito de promover o espírito competitivo, lançamos a maratona</a><br>
<a href="ranking.php">
&nbsp;<img border="0" src="../imagens/melhor.png" height="150"></a></div>
';
}
function montaMenuPlanoAula(){
$sql = 'select * from tb_aula order by ID desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['ID'] <= 9){
$montaMenu = '<button value="' . $linha['ID'] . '" name="dropAula" >0'.$linha['ID'].'</button>'.$montaMenu;
}else{
$montaMenu = '<button value="' . $linha['ID'] . '" name="dropAula" >'.$linha['ID'].'</button>'.$montaMenu;
}
}
mysql_free_result($query);
echo '<div class="Body"><div align="center"><form method="POST" action="?id=18">'.$montaMenu.'</form></div>'; 
}
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');
switch ($mes){
case 1:  $mes = "Janeiro"; break;
case 2:  $mes = "Fevereiro"; break;
case 3:  $mes = "Março"; break;
case 4:  $mes = "Abril"; break;
case 5:  $mes = "Maio"; break;
case 6:  $mes = "Junho"; break;
case 7:  $mes = "Julho"; break;
case 8:  $mes = "Agosto"; break;
case 9:  $mes = "Setembro"; break;
case 10: $mes = "Outubro"; break;
case 11: $mes = "Novembro"; break;
case 12: $mes = "dezembro"; break;
}
switch ($semana) {
case 0: $semana = "Domingo"; break;
case 1: $semana = "Segunda"; break;
case 2: $semana = "Terça"; break;
case 3: $semana = "Quarta"; break;
case 4: $semana = "Quinta"; break;
case 5: $semana = "Sexta"; break;
case 6: $semana = "Sabado"; break;
}
$data = $semana.', '.$dia.' de '.$mes.' de '.$ano;
$menuBox = '
<form method="POST" action="?id=Lista" onchange="form.submit()"><div align="center">
<input type="radio" value="0A" name="Lista" onchange="form.submit()">PA
<input type="radio" value="0B" name="Lista" onchange="form.submit()">PB
<input type="radio" value="1A" name="Lista" onchange="form.submit()">1ºA
<input type="radio" value="1B" name="Lista" onchange="form.submit()">1ºB
<input type="radio" value="1C" name="Lista" onchange="form.submit()">1ºC
<input type="radio" value="2A" name="Lista" onchange="form.submit()">2ºA
<input type="radio" value="2B" name="Lista" onchange="form.submit()">2ºB
<input type="radio" value="2C" name="Lista" onchange="form.submit()">2ºC
<input type="radio" value="3A" name="Lista" onchange="form.submit()">3ºA
<input type="radio" value="3B" name="Lista" onchange="form.submit()">3ºB
<input type="radio" value="3C" name="Lista" onchange="form.submit()">3ºC
<input type="radio" value="4A" name="Lista" onchange="form.submit()">4ºA
<input type="radio" value="4B" name="Lista" onchange="form.submit()">4ºB
<input type="radio" value="4C" name="Lista" onchange="form.submit()">4ºC
<input type="radio" value="5A" name="Lista" onchange="form.submit()">5ºA
<input type="radio" value="5B" name="Lista" onchange="form.submit()">5ºB
<input type="radio" value="5C" name="Lista" onchange="form.submit()">5ºC
<input type="radio" value="RM" name="Lista" onchange="form.submit()">RM
<input type="radio" value="RT" name="Lista" onchange="form.submit()">RT
<input type="radio" value="CP" name="Lista" onchange="form.submit()">CP
<input type="radio" value="LG" name="Lista" onchange="form.submit()">LG
<div align="right">'.$data.$print.' <a href="menu.php"><img src="../images/sair.gif"></a></div>
<i><b><font size="6" color="#0000FF">'.$titulo.'</div></font></b></i></form>
';
$_SESSION["menu"] = 
'
	<input type="submit" value="Cadastrar" name="btnCadastrar" style="margim: 10px; padding: 1px; width:150px"> 
	<input type="submit" value="Pesquisar" name="btnPesquisar" style="margim: 10px; padding: 1px; width:150px">
	<input type="submit" value="Dados" name="btnDados" style="margim: 10px; padding: 1px; width:150px">
';
function mainServidor(){
	echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<form method="POST" action="servidor.php">
	<p align="center">
		'.$_SESSION["menu"].'
	</p>
</form>
	';
}
function dadosServidor(){
	$sql = 'select * from tb_servidor order by concurso';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['matricula']){
			$textMatricula = $linha['matricula'];
			$diaMatricula = substr($linha['dataMatricula'],8,2);
			$mesMatricula = substr($linha['dataMatricula'],5,2);
			$anoMatricula = substr($linha['dataMatricula'],0,4);
			$diaTransferencia = substr($linha['dataTransferencia'],8,2);
			$mesTransferencia = substr($linha['dataTransferencia'],5,2);
			$anoTransferencia = substr($linha['dataTransferencia'],0,4);
			$textNome = ucwords(strtolower($linha['nome']));
			$diaNascimento = substr($linha['dataNascimento'],8,2);
			$mesNascimento = substr($linha['dataNascimento'],5,2);
			$anoNascimento = substr($linha['dataNascimento'],0,4);
			$textTelefone = $linha['telefone'];
			$textEndereco = $linha['endereco'];
			$dropEstadoCivil = $linha['estadoCivil'];
			if ($linha['estadoCivil']=='C'){$dropEstadoCivilText = 'Casado';}
			if ($linha['estadoCivil']=='S'){$dropEstadoCivilText = 'Solteiro';}
			$dropFilhos = $linha['filhos'];
			$dropSexo = $linha['sexo'];
			if ($linha['sexo']=='M'){$dropSexoText = 'O servidor';}
			if ($linha['sexo']=='F'){$dropSexoText = 'A servidora';}
			$textEmail = $linha['email'];
			$dropAno = substr($linha['turma'],0,1);
			$dropTurma = substr($linha['turma'],1,1);
			$dropFuncao = $linha['funcao'];
			$dropConcurso = $linha['concurso'];
			$dropEscolaridade = $linha['escolaridade'];
			$dropSituacao = $linha['situacao'];	
			if ($linha['situacao']=='A'){$dropSituacaoText = 'Ativo';}
			if ($linha['situacao']=='T'){$dropSituacaoText = 'Transferido';}			
				$montaTexto = '
					<tr>
						<td style="text-align:center">'.$textMatricula.'</td>
						<td >'.$textNome.'</td>
						<td style="text-align:center">'.$textTelefone.'</td>
						<td style="text-align:center">'.$dropConcurso.'</td>
					</tr>
				'.$montaTexto;
		}
	}		
echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<form method="POST" action="servidor.php">
<p align="center">
	'.$_SESSION["menu"].'
	</p>	
	<div align="center">
		<table border="1" width="80%" bgcolor="#C0C0C0" style="border-collapse: collapse">
		<tr>
			<td align="center">Matricula</td>
			<td align="center">Nome</td>
			<td align="center">Telefone</td>
			<td align="center">Cargo</td>
		</tr>
		'.$montaTexto.'
	</table>

	</div>	
</form>
';


}
function pesquisaServidor(){
	echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<form method="POST" action="servidor.php">
	<p align="center">
	'.$_SESSION["menu"].'
	</p>	
	<div align="center">
		<table border="0" width="70%">
			<tr>
				<td align="right">
				<p align="right">Matricula:</td>
				<td>
				<p align="left">
				<input type="text" name="textMatricula" style="margim: 10px; padding: 1px; width:150px" size="20"> 
				<input type="submit" value="OK" name="btnOK" style="margim: 10px; padding: 1px; width:30px"></td>
			</tr>
			<tr>
		</table>
	</div>
</form>	
';
}
function cadastraServidor(){
	echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
<form method="POST" action="servidor.php">
	<p align="center">
	'.$_SESSION["menu"].'
	</p>
	<div align="center">
		<table border="0" width="70%">
			<tr>
				<td align="right">
				<p align="right">Matricula:</td>
				<td>
				<p align="left">
				<input type="text" name="textMatricula" style="margim: 10px; padding: 1px; width:150px" size="20"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Data Matricula:</td>
				<td>
				<input type="text" name="diaMatricula" size="2"> / 
				<input type="text" name="mesMatricula" size="2"> / 
				<input type="text" name="anoMatricula" size="2">
				</td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Data Transferência:</td>
				<td>
				<input type="text" name="diaTransferencia" size="2"> / 
				<input type="text" name="mesTransferencia" size="2"> / 
				<input type="text" name="anoTransferencia" size="2">
				</td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Nome:</td>
				<td><input type="text" name="textNome" size="50"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Nascimento:</td>
				<td>
				<input type="text" name="diaNascimento" size="2"> / 
				<input type="text" name="mesNascimento" size="2"> / 
				<input type="text" name="anoNascimento" size="2">
				</td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Telefone:</td>
				<td>
				<input type="text" name="textTelefone" style="margim: 10px; padding: 1px; width:150px" size="20"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Endereço:</td>
				<td>
				<input type="text" name="textEndereco" style="margim: 10px; padding: 1px; width:500px" size="20"></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Estado Civil:</td>
				<td>
				<select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropEstadoCivil">
				<option value="C">Casado</option>
				<option selected value="S">Solteiro</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Filhos:</td>
				<td>
				<select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropFilhos">
				<option selected>0</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">
				<p align="right">Sexo:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropSexo">
				<option value="M">Masculino</option>
				<option selected value="F">Feminino</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">E-Mail:</td>
				<td><input type="text" name="textEmail" size="50"></td>
			</tr>
			<tr>
				<td align="right">Função:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropFuncao">
				
				<option >Limpeza</option>
				<option>Cozinha</option>
				<option>Sala de Recurso</option>
				<option>Reforço</option>
				<option>Hora Atividade</option>
				<option>Hora Fracionada</option>
				<option>Regente</option>
				<option>Auxiliar</option>
				<option>Biblioteca</option>
				<option>Informática</option>
				<option>Coordenação</option>	
				<option>Direção</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Concurso/PSS</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropConcurso">
				<option selected>Professor</option>
				<option>Instrutor</option>
				<option>Monitor</option>
				<option>Zelador</option>
				<option>Coordenador</option>
				<option>Diretor</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Escolaridade:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropEscolaridade">
				<option>Fundamental</option>
				<option>Ensino Médio</option>
				<option>Curso Técnico</option>
				<option selected>Graduação</option>
				<option>Mestrado/MBA</option>
				<option>Doutorado</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Situação:</td>
				<td><select style="margim: 10px; padding: 1px; width:150px" size="1" name="dropSituacao">
				<option selected value="A">Ativo</option>
				<option value="T">Transferido</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td><input type="submit" value="Salvar" name="btnSalvar" style="margim: 10px; padding: 1px; width:150px"></td>
			</tr>
		</table>
	</div>
</form>
	';
}
function ucwords_improved($s, $e = array())
{
return join(' ',
array_map(
create_function(
'$s',
'return (!in_array($s, ' . var_export($e, true) . ')) ? ucfirst($s) : $s;'
),
explode(
' ',
strtolower($s)
)
)
);
}
setlocale(LC_CTYPE, 'pt_BR');
print ucwords_improved(htmlentities($linhaAluno['Nome']), array('da', 'das', 'de', 'do', 'dos', 'e'));
?>
<head><link rel="shortcut icon" href="../images/favicon.ico"><style type="text/css">
a:link{color: blue;text-decoration: none}
a:visited{color: gray; text-decoration: none} 
a:active {color: yellow;text-decoration: none}
a:hover {color: red;text-decoration: none}
div.Head {
position: absolute; width: 86%; height: 10%; top: 0%; right: 8px;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:7px;
}
div.Menu {
border:1px solid #888;
background-color: #fffacd;
position: absolute; width: 12%; height: 95%; left: 5px; bottom: 5px;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:15px;
}
div.Body {
position: absolute; width: 86%; height: 90%; right: 5px; bottom: 5px;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:7px;
}
div.text1 {
position: absolute; width: 32%; height: 99%; left: 0%; bottom: 0%;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:7px;
}
div.text2 {
position: absolute; width: 32%; height: 99%; left: 33%; bottom: 0%;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:7px;
}
div.text3 {
position: absolute; width: 32%; height: 99%; left: 66%; bottom: 0%;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:7px;
}
div.cantoDireito {
position: absolute; right: 0%; top: 0%;
}
div.cantoDireitoAtividades {
position: absolute; right: 20px; top: 30px;
}
input {
border:1px solid black;
background-color: #fffacd;
color: blue;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
textarea {
border:1px solid black;
background-color: #fffacd;
color: blue;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
fieldset {
border:2px solid black;
background-color: #f0ffff;
color: blue;
-moz-border-radius:15px; -webkit-border-radius:15px; border-radius:15px;
}
select {
border:1px solid black;
background-color: #fffacd;
color: blue;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
legend {
border:2px solid black;
background-color: #ffffff;
color: blue;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
radio {
border:1px solid black;
background-color: #ffffff;
color: blue;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
button{
background-color: #ffffff;
color: blue;
-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
}
</style><title>Picoli Web Site</title></head>
