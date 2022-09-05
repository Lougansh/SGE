<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
if (isset($_POST['btnSalvar']) ){
$local 								= strtoupper($_POST['local']);
$anoProjeto 						= $_POST['anoProjeto'];
$nomeAluno 							= $_POST['nomeAluno'];
$dataNascimento 					= $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
$sexo 								= $_POST['sexo'];
$rgAluno 							= $_POST['rgAluno'];
$cpfAluno 							= $_POST['cpfAluno'];
$nomePai 							= (($_POST['nomePai']));
$nomeMae 							= (($_POST['nomeMae']));
$profissaoPai 						= (($_POST['profissaoPai']));
$profissaoMae 						= (($_POST['profissaoMae']));
$nomeResponsavel 					= (($_POST['nomeResponsavel']));
$rgResponsavel 						= $_POST['rgResponsavel'];
$escolaridade 						= (($_POST['escolaridade']));
$cpfResponsavel 					= $_POST['cpfResponsavel'];
$emailResponsavel 					= ($_POST['emailResponsavel']);
$tel1 								= $_POST['tel1'];
$tel2								= $_POST['tel2'];
$tel3 								= $_POST['tel3'];
$tel4 								= $_POST['tel4'];
$bairro 							= (($_POST['bairro']));
$rua 								= (($_POST['rua']));
$nr 								= $_POST['nr'];
$obs 								= $_POST['obs'];
$dataHoje 							= date('Y-m-d');
$agora 								= date('Y-m-d H:i'); //2021-02-26 09:10:43
$cgm								= $_POST['cgm'];
$equipe								= strtoupper($_POST['equipe']);
$turno								= $_POST['turno'];
$sql = "insert into tb_aluno_projeto (
local,				
anoProjeto,			
nomeAluno,			
dataNascimento,		
rgAluno,			
cpfAluno,			
nomePai,			
nomeMae,			
bairro,				
rua,				
nr,					
tel1,				
tel2,				
tel3,				
tel4,				
rgResponsavel,		
escolaridade,		
profissaoPai,		
nomeResponsavel,	
cpfResponsavel,		
emailResponsavel,	
sexo,				
profissaoMae,		
obs,				
cadastro,
dataMatricula,
cgm,
equipe,
turno
) values (
'$local',						
'$anoProjeto',						
'$nomeAluno',						
'$dataNascimento',						
'$rgAluno',						
'$cpfAluno',						
'$nomePai',						
'$nomeMae',						
'$bairro',						
'$rua',						
'$nr',						
'$tel1',						
'$tel2',						
'$tel3',						
'$tel4',						
'$rgResponsavel',						
'$escolaridade',						
'$profissaoPai',						
'$nomeResponsavel',						
'$cpfResponsavel',						
'$emailResponsavel',					
'$sexo',						
'$profissaoMae',						
'$obs',						
'$dataHoje',
'$agora',
'$cgm',
'$equipe',
'$turno'
)"; 
$query = mysql_query($sql);
if($query){	mysql_free_result($query);echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Cadastro efetuado com sucesso!!!")</SCRIPT><meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="cadastrarMFT2.php">';
}
}
$sql = 'select * from tb_alunoMFT where situacao = "A" and ano >= 4 and ano <= 5 Order By nomeAluno asc';

$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$menu = $menu.'<option value="'.$linha['ID'].'">'.$linha['ano'].$linha['turma'].' - '.$linha['nomeAluno'].'</option>';
}
echo'
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Atualização de Alunos CFH</title>
</head>
<body>
<form method="POST" action="?id=18" onchange="form.submit()">
<div align="Center">
<h2>CONSTRUINDO O FUTURO HOJE</h2>
<div align="right">
<select size="1" name="menu" onchange="form.submit()"><option value=""></option>'.($menu).'</select>
</div>
</div>
';
if (isset($_POST['menu'])&& $_POST['menu'] != '') { 
$codigo = $_POST['menu'] ;
$sql = "select * FROM tb_alunoMFT WHERE ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['dataNascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$nomeAluno = $linha['nomeAluno'];
$nomePai = (($linha['nomePai']));
$profissaoPai = (($linha['profissaoPai']));
$nomeMae = (($linha['nomeMae']));
$profissaoMae = (($linha['profissaoMae']));
$nomeResponsavel = (($linha['nomeResponsavel']));
if ($linha['sexo'] 		== 'M') {$Sexo = '<select size="1" name="sexo"><option selected value="'.$linha['sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$Sexo = '<select size="1" name="sexo"><option selected value="'.$linha['sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
echo'
<div align="center"><table border="0" width="90%">
<tr>
<td rowspan="13" align="center" valign="top" width="10%"><hr width="10%"><hr width="30%"><hr width="50%">
<img src="../images/CFH/'.$linha['cgm'].'.JPG" height="300">
<hr width="50%">
<p>
<select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select></p>
<hr width="30%">
<hr width="10%">
<br>
<hr width="10%"><hr width="30%"><hr width="50%">
</td>
</tr>
<tr>	
<td align="right" width="5%" >Local: 
</td>
<td colspan="2" width="85%">
<input type="text" value="MFT" size="40" name="local">&nbsp; 
Ano: 
<input type="text" value="'.date(Y).'" size="4" name="anoProjeto" style="text-align:center"> 
Equipe: 
<select size="1" name="equipe">
<option>Presencial</option>
<option>Remota</option>
</select>
Turno: 
<select size="1" name="turno">
<option value="M">Manhã</option>
<option value="T">Tarde</option>
<option value="R">Remoto</option>
</select>
</td>
</tr>
<tr>
<td align="right" width="116" >Nome: 
</td>
<td colspan="2">
<input type="text" value="'.$nomeAluno.'" size="40" name="nomeAluno">
CGM: 
<input style="text-align:center" type="text" value="'.$linha['cgm'].'" size="15" name="cgm">
</td>
</tr>
<tr>
<td align="right" width="116" >Nascimento: 
</td>
<td colspan="2">
<input style="text-align:center" type="text" value="'.date('d', strtotime($linha['dataNascimento'])).'" size="3" name="dia">
<input style="text-align:center" type="text" value="'.date('m', strtotime($linha['dataNascimento'])).'" size="3" name="mes">
<input style="text-align:center" type="text" value="'.date('Y', strtotime($linha['dataNascimento'])).'" size="3" name="ano"> Escolaridade: 
<input style="text-align:center" type="text" value="Ensino Fundamental" size="20" name="escolaridade">
</td>
</tr>
<tr>
<td align="right" width="116" >Idade: 
</td>
<td colspan="2">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'
</td>
</tr>
<tr>
<td align="right" width="116" >Sexo: 
</td>
<td colspan="2">'.$Sexo.' RG: 
<input type="text" value="'.$linha['rgAluno'].'" size="18" name="rgAluno" maxlength="9"> CPF: 
<input type="text" value="'.$linha['cpfAluno'].'" size="19" name="cpfAluno" maxlength="11">
</td>
</tr>
<tr>
<td align="right" width="116" >Pai: 
</td>
<td colspan="2">
<input type="text" value="'.($nomePai).'" size="40" name="nomePai"> Profissão: 
<input type="text" value="'.($profissaoPai).'" size="20" name="profissaoPai">
</td>
</tr>
<tr>
<td align="right" width="116" >Mãe: 
</td>
<td colspan="2">
<input type="text" value="'.($nomeMae).'" size="40" name="nomeMae"> Profissão: 
<input type="text" value="'.($profissaoMae).'" size="20" name="profissaoMae">
</td>
</tr>
<tr>
<td align="right" width="116" >Responsável:
</td>
<td colspan="2">
<input type="text" value="'.($nomeResponsavel).'" size="45" name="nomeResponsavel"> RG: 
<input type="text" value="'.$linha['rgResponsavel'].'" size="15" name="rgResponsavel">
CPF: 
<input type="text" value="'.$linha['cpfResponsavel'].'" size="15" name="cpfResponsavel"></td>
</tr>
<tr>
<td align="right" width="116" >Email:
</td>
<td colspan="2">
<input type="text" value="'.($linha['emailResponsavel']).'" size="30" name="emailResponsavel"></td>
</tr>

<tr>
<td align="right" width="116" >Contato: 
</td>
<td colspan="2">
<input style="text-align:center" type="text" value="'.$linha['tel1'].'" size="10" name="tel1"> 
<input style="text-align:center" type="text" value="'.$linha['tel2'].'" size="10" name="tel2">
<input style="text-align:center" type="text" value="'.$linha['tel3'].'" size="10" name="tel3">
<input style="text-align:center" type="text" value="'.$linha['tel4'].'" size="10" name="tel4">
</td>
</tr>
<tr>
<td align="right" width="116" >Bairro: 
</td>
<td colspan="2">
<input type="text" value="'.(($linha['bairro'])).'" size="15" name="bairro"> Rua: 
<input type="text" value="'.(($linha['rua'])).'" size="28" name="rua"> Nº: 
<input type="text" value="'.$linha['nr'].'" size="4" name="nr" style="text-align:center">
</td>
</tr>
<tr>
<td align="right" width="116" >
&nbsp;
</td>
<td>
<textarea rows="7" name="obs" cols="70">' .$linha['obs'].'
</textarea></td>
<td>
<button value="Salvar" name="btnSalvar" title="Click aqui para salvar">
<img src="../images/btnSalvar.jpg" width="80" height="80">
</button>
</td>
</tr>
</table>
</div>
</form>
</body>
</html>
';
}else{
//=====================================================================================
$sql = "SELECT * FROM tb_aluno_projeto WHERE local = 'MFT' and anoProjeto = YEAR(CURDATE()) order by equipe desc, nomeAluno desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$meninasManha = 0;
$meninasTarde = 0;
$meninasRemoto = 0;
$meninosManha = 0;
$meninosTarde = 0;
$meninosRemoto = 0;
while ($linha = mysql_fetch_array($query)) {
if ($linha['sexo'] == 'F' && $linha['turno'] == 'M'){$meninasManha++;}
if ($linha['sexo'] == 'F' && $linha['turno'] == 'T'){$meninasTarde++;}
if ($linha['sexo'] == 'F' && $linha['turno'] == 'R'){$meninasRemoto++;}
if ($linha['sexo'] == 'M' && $linha['turno'] == 'M'){$meninosManha++;}
if ($linha['sexo'] == 'M' && $linha['turno'] == 'T'){$meninosTarde++;}
if ($linha['sexo'] == 'M' && $linha['turno'] == 'R'){$meninosRemoto++;}

if ($linha['turno'] == 'M'){$iM++;	$alunoRoboticaManha  = '<font size="2"> '.$linha['nomeAluno'].'</font><br>'.$alunoRoboticaManha;}
if ($linha['turno'] == 'T'){$iT++;	$alunoRoboticaTarde  = '<font size="2"> '.$linha['nomeAluno'].'</font><br>'.$alunoRoboticaTarde;}
if ($linha['turno'] == 'R'){$iR++;	$alunoRoboticaRemoto = '<font size="2"> '.$linha['nomeAluno'].'</font><br>'.$alunoRoboticaRemoto;}
}
$meninasTotal = $meninasManha+$meninasTarde;
$meninosTotal = $meninosManha+$meninosTarde;
$totalGeral   = $meninasTotal+$meninosTotal;
mysql_free_result($query);
//=====================================================================================
$sql = "SELECT anoProjeto, equipe, COUNT( ID ) Total FROM tb_aluno_projeto WHERE local = 'MFT' and anoProjeto = YEAR(CURDATE()) group by equipe order by equipe desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$contaSelectTurma  = 0;
while ($linha = mysql_fetch_array($query)) {
$equipe = $linha['equipe'];
$contaSelectTurma ++;
$selectTurma = '<font size="2">Equipe: '.$equipe.' - '.$linha['Total'].' Alunos</font> </br>'.$selectTurma;
}
mysql_free_result($query);
//=====================================================================================
echo'
<font size="2"><div align="center">
<table border="0" width="90%"><tr><td>
<fieldset style="padding: 2"><legend>SISTEMA DE RELATÓRIOS</legend><div align="center">
<table border="0" width="100%"><tr><td width="50%">
<fieldset style="padding: 2"><legend>Geral: '.$meninosTotal.' meninos e '.$meninasTotal.' meninas, totalizando '.$totalGeral.' alunos.</legend>
<table border="0" width="100%"><tr>

<td>
<fieldset style="padding: 2"><legend>Período / Manhã '.($meninosManha+$meninasManha).' Alunos</legend>
<table border="0"><tr><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninos</legend>
'.$meninosManha.'</fieldset></td><td align="center" width="33%"><fieldset style="padding: 2"><legend>
Meninas</legend>
'.$meninasManha.'</fieldset></td></tr></table></fieldset></b></td>

<td>
<fieldset style="padding: 2"><legend>Período / Tarde '.($meninosTarde+$meninasTarde).' Alunos</legend>
<table border="0"><tr><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninos</legend>
'.$meninosTarde.'</fieldset></td><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninas</legend>
'.$meninasTarde.'</fieldset></td></tr></table></fieldset>

<td>
<fieldset style="padding: 2"><legend>Período / Remoto '.($meninosRemoto+$meninasRemoto).' Alunos</legend>
<table border="0"><tr><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninos</legend>
'.$meninosRemoto.'</fieldset></td><td align="center" width="33%"><fieldset style="padding: 2"><legend>Meninas</legend>
'.$meninasRemoto.'</fieldset></td></tr></table></fieldset>

</b></td><td></tr></table></fieldset>



</td><td width="50%">

&nbsp;</td></tr></table>
<table border="0" width="100%"><tr><td align="center"><fieldset style="padding: 2"><legend>
<b>Informações e distribuições</b></legend>
<table border="0" width="100%"><tr><td width="25%" valign="top"><fieldset style="padding: 2">
<legend>Distribuição de '.$totalGeral.' alunos em '.$contaSelectTurma.' equipes</legend>
'.$selectTurma.'</fieldset>
</td>

<td width="25%" valign="top"><fieldset style="padding: 2"><legend>
Robótica / Manhã '.$iM.' alunos</legend>
'.$alunoRoboticaManha.'</fieldset></td>

<td width="25%" valign="top"><fieldset style="padding: 2"><legend>
Robótica / Tarde '.$iT.' alunos</legend>
'.$alunoRoboticaTarde.'</fieldset></td>

<td width="25%" valign="top"><fieldset style="padding: 2"><legend>
Robótica / Remoto '.$iR.' alunos</legend>
'.$alunoRoboticaRemoto.'</fieldset></td>

</tr></table></fieldset></td>
</tr></table></div></fieldset></td></tr></table></div>
';
}
?>