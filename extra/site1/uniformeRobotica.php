<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php'; 
include './conf.php';
alunosMFT();


if (isset($_POST['selectTurma'])){
	$anoTurma = substr($_POST['selectTurma'],0,1);
	$turmaAno = substr($_POST['selectTurma'],1,1);
	if ($anoTurma=='F' and $turmaAno=='U'){
	$sql = "select * from tb_aluno_projeto where tamanhoCamiseta = '' and situacao = 'A' order by turma asc, nomeAluno asc ";
	$titulo = 'FALTA ESCOLHER UNIFORME ';
	}
	else if ($anoTurma=='1' and $turmaAno=='R'){
	$sql = "select * from tb_aluno_projeto where equipe = 'Remota' order by turma asc, nomeAluno asc ";
	$titulo = 'ALUNOS DA MODALIDADE REMOTA';
	}
	else if ($anoTurma=='1' and $turmaAno=='P'){
	$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' and situacao = 'A' order by turma asc, nomeAluno asc ";
	$titulo = 'ALUNOS DA MODALIDADE PRESENCIAL';
	}
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	$n=1;
	while ($linha = mysql_fetch_array($query)) {
	$n++;
	$aluno = $linha['nomeAluno'];
	if ($linha['turma'] == 'A'){$turmaAluno = 'Turma A ';}
	if ($linha['turma'] == 'B'){$turmaAluno = 'Turma B ';}
	if ($linha['turma'] == 'C'){$turmaAluno = 'Turma C ';}
	if ($linha['turma'] == 'D'){$turmaAluno = 'Turma D ';}
	if ($linha['turma'] == 'E'){$turmaAluno = 'Turma E ';}
	if ($linha['turma'] == 'F'){$turmaAluno = 'Turma F ';}
	if ($linha['turma'] == 'G'){$turmaAluno = 'Turma G ';}
	if ($linha['turma'] == 'H'){$turmaAluno = 'Turma H ';}
	if ($linha['turma'] == 'I'){$turmaAluno = 'Turma I ';}
	if ($linha['turma'] == 'J'){$turmaAluno = 'Turma J ';}
	if ($linha['turma'] == 'K'){$turmaAluno = 'Turma K ';}
	if ($linha['turma'] == 'L'){$turmaAluno = 'Turma L ';}
	
	$tabela = $tabela.'	
	<tr>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['cgm'].'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$turmaAluno.'</td>
		<td align="left" style="border-style: solid; border-width: 1px">'.$aluno.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['sexo'].'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['tamanhoCamiseta'].'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['tamanhoTenis'].'</td>
	</tr>
	';
	}
	//=====================================================================================
	if ($anoTurma=='F' and $turmaAno=='U'){
	$sql = 'SELECT COUNT(ID) total FROM tb_aluno_projeto where tamanhoCamiseta = "" and situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	mysql_free_result($query);
	}
	//=====================================================================================
	else if ($anoTurma=='1' and $turmaAno=='R'){
	$sql = 'SELECT COUNT(ID) total FROM tb_aluno_projeto where equipe = "Remota"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	mysql_free_result($query);
	}
	//=====================================================================================
	else if ($anoTurma=='1' and $turmaAno=='P'){
	$sql = 'SELECT * FROM tb_aluno_projeto where situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());	
	mysql_free_result($query);
	//=====================================================================================
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['tamanhoCamiseta']=='2' && $linha['sexo']=='F'){$tamanhoCamisetaF2++;}
		if ($linha['tamanhoCamiseta']=='4' && $linha['sexo']=='F'){$tamanhoCamisetaF4++;}
		if ($linha['tamanhoCamiseta']=='6' && $linha['sexo']=='F'){$tamanhoCamisetaF6++;}
		if ($linha['tamanhoCamiseta']=='8' && $linha['sexo']=='F'){$tamanhoCamisetaF8++;}
		if ($linha['tamanhoCamiseta']=='10' && $linha['sexo']=='F'){$tamanhoCamisetaF10++;}
		if ($linha['tamanhoCamiseta']=='12' && $linha['sexo']=='F'){$tamanhoCamisetaF12++;}
		if ($linha['tamanhoCamiseta']=='14' && $linha['sexo']=='F'){$tamanhoCamisetaF14++;}
		if ($linha['tamanhoCamiseta']=='16' && $linha['sexo']=='F'){$tamanhoCamisetaF16++;}
		if ($linha['tamanhoCamiseta']=='P' && $linha['sexo']=='F'){$tamanhoCamisetaFP++;}
		if ($linha['tamanhoCamiseta']=='M' && $linha['sexo']=='F'){$tamanhoCamisetaFM++;}
		if ($linha['tamanhoCamiseta']=='G' && $linha['sexo']=='F'){$tamanhoCamisetaFG++;}
		if ($linha['tamanhoCamiseta']=='GG' && $linha['sexo']=='F'){$tamanhoCamisetaFGG++;}
		if ($linha['tamanhoCamiseta']=='2' && $linha['sexo']=='M'){$tamanhoCamiseta2++;}
		if ($linha['tamanhoCamiseta']=='4' && $linha['sexo']=='M'){$tamanhoCamiseta4++;}
		if ($linha['tamanhoCamiseta']=='6' && $linha['sexo']=='M'){$tamanhoCamiseta6++;}
		if ($linha['tamanhoCamiseta']=='8' && $linha['sexo']=='M'){$tamanhoCamiseta8++;}
		if ($linha['tamanhoCamiseta']=='10' && $linha['sexo']=='M'){$tamanhoCamiseta10++;}
		if ($linha['tamanhoCamiseta']=='12' && $linha['sexo']=='M'){$tamanhoCamiseta12++;}
		if ($linha['tamanhoCamiseta']=='14' && $linha['sexo']=='M'){$tamanhoCamiseta14++;}
		if ($linha['tamanhoCamiseta']=='16' && $linha['sexo']=='M'){$tamanhoCamiseta16++;}
		if ($linha['tamanhoCamiseta']=='P' && $linha['sexo']=='M'){$tamanhoCamisetaP++;}
		if ($linha['tamanhoCamiseta']=='M' && $linha['sexo']=='M'){$tamanhoCamisetaM++;}
		if ($linha['tamanhoCamiseta']=='G' && $linha['sexo']=='M'){$tamanhoCamisetaG++;}
		if ($linha['tamanhoCamiseta']=='GG' && $linha['sexo']=='M'){$tamanhoCamisetaGG++;}
		if ($linha['tamTenis']=='18') {$tamTenis18++;}
		if ($linha['tamTenis']=='19') {$tamTenis19++;}
		if ($linha['tamTenis']=='20') {$tamTenis20++;}
		if ($linha['tamTenis']=='21') {$tamTenis21++;}
		if ($linha['tamTenis']=='22') {$tamTenis22++;}
		if ($linha['tamTenis']=='23') {$tamTenis23++;}
		if ($linha['tamTenis']=='24') {$tamTenis24++;}
		if ($linha['tamTenis']=='25') {$tamTenis25++;}
		if ($linha['tamTenis']=='26') {$tamTenis26++;}
		if ($linha['tamTenis']=='27') {$tamTenis27++;}
		if ($linha['tamTenis']=='28') {$tamTenis28++;}
		if ($linha['tamTenis']=='29') {$tamTenis29++;}
		if ($linha['tamTenis']=='30') {$tamTenis30++;}
		if ($linha['tamTenis']=='31') {$tamTenis31++;}
		if ($linha['tamTenis']=='32') {$tamTenis32++;}
		if ($linha['tamTenis']=='33') {$tamTenis33++;}
		if ($linha['tamTenis']=='34') {$tamTenis34++;}
		if ($linha['tamTenis']=='35') {$tamTenis35++;}
		if ($linha['tamTenis']=='36') {$tamTenis36++;}
		if ($linha['tamTenis']=='37') {$tamTenis37++;}
		if ($linha['tamTenis']=='38') {$tamTenis38++;}
		if ($linha['tamTenis']=='39') {$tamTenis39++;}
		if ($linha['tamTenis']=='40') {$tamTenis40++;}
		if ($linha['tamTenis']=='41') {$tamTenis41++;}
		if ($linha['tamTenis']=='42') {$tamTenis42++;}
		if ($linha['tamTenis']=='43') {$tamTenis43++;}
		if ($linha['tamTenis']=='44') {$tamTenis44++;}
		if ($linha['tamTenis']=='45') {$tamTenis45++;}
		if ($linha['tamTenis']=='46') {$tamTenis46++;}
		if ($linha['tamTenis']=='47') {$tamTenis47++;}
	}
	mysql_free_result($query);
	}
	//=====================================================================================
	else{
	$sql = 'SELECT * FROM tb_aluno_projeto where ano = '.$anoTurma.' and turma = "'.$turmaAno.'" and situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['tamanhoCamiseta']=='2' && $linha['sexo']=='F'){$tamanhoCamisetaF2++;}
		if ($linha['tamanhoCamiseta']=='4' && $linha['sexo']=='F'){$tamanhoCamisetaF4++;}
		if ($linha['tamanhoCamiseta']=='6' && $linha['sexo']=='F'){$tamanhoCamisetaF6++;}
		if ($linha['tamanhoCamiseta']=='8' && $linha['sexo']=='F'){$tamanhoCamisetaF8++;}
		if ($linha['tamanhoCamiseta']=='10' && $linha['sexo']=='F'){$tamanhoCamisetaF10++;}
		if ($linha['tamanhoCamiseta']=='12' && $linha['sexo']=='F'){$tamanhoCamisetaF12++;}
		if ($linha['tamanhoCamiseta']=='14' && $linha['sexo']=='F'){$tamanhoCamisetaF14++;}
		if ($linha['tamanhoCamiseta']=='16' && $linha['sexo']=='F'){$tamanhoCamisetaF16++;}
		if ($linha['tamanhoCamiseta']=='P' && $linha['sexo']=='F'){$tamanhoCamisetaFP++;}
		if ($linha['tamanhoCamiseta']=='M' && $linha['sexo']=='F'){$tamanhoCamisetaFM++;}
		if ($linha['tamanhoCamiseta']=='G' && $linha['sexo']=='F'){$tamanhoCamisetaFG++;}
		if ($linha['tamanhoCamiseta']=='GG' && $linha['sexo']=='F'){$tamanhoCamisetaFGG++;}
		if ($linha['tamanhoCamiseta']=='2' && $linha['sexo']=='M'){$tamanhoCamiseta2++;}
		if ($linha['tamanhoCamiseta']=='4' && $linha['sexo']=='M'){$tamanhoCamiseta4++;}
		if ($linha['tamanhoCamiseta']=='6' && $linha['sexo']=='M'){$tamanhoCamiseta6++;}
		if ($linha['tamanhoCamiseta']=='8' && $linha['sexo']=='M'){$tamanhoCamiseta8++;}
		if ($linha['tamanhoCamiseta']=='10' && $linha['sexo']=='M'){$tamanhoCamiseta10++;}
		if ($linha['tamanhoCamiseta']=='12' && $linha['sexo']=='M'){$tamanhoCamiseta12++;}
		if ($linha['tamanhoCamiseta']=='14' && $linha['sexo']=='M'){$tamanhoCamiseta14++;}
		if ($linha['tamanhoCamiseta']=='16' && $linha['sexo']=='M'){$tamanhoCamiseta16++;}
		if ($linha['tamanhoCamiseta']=='P' && $linha['sexo']=='M'){$tamanhoCamisetaP++;}
		if ($linha['tamanhoCamiseta']=='M' && $linha['sexo']=='M'){$tamanhoCamisetaM++;}
		if ($linha['tamanhoCamiseta']=='G' && $linha['sexo']=='M'){$tamanhoCamisetaG++;}
		if ($linha['tamanhoCamiseta']=='GG' && $linha['sexo']=='M'){$tamanhoCamisetaGG++;}
		if ($linha['tamTenis']=='18') {$tamTenis18++;}
		if ($linha['tamTenis']=='19') {$tamTenis19++;}
		if ($linha['tamTenis']=='20') {$tamTenis20++;}
		if ($linha['tamTenis']=='21') {$tamTenis21++;}
		if ($linha['tamTenis']=='22') {$tamTenis22++;}
		if ($linha['tamTenis']=='23') {$tamTenis23++;}
		if ($linha['tamTenis']=='24') {$tamTenis24++;}
		if ($linha['tamTenis']=='25') {$tamTenis25++;}
		if ($linha['tamTenis']=='26') {$tamTenis26++;}
		if ($linha['tamTenis']=='27') {$tamTenis27++;}
		if ($linha['tamTenis']=='28') {$tamTenis28++;}
		if ($linha['tamTenis']=='29') {$tamTenis29++;}
		if ($linha['tamTenis']=='30') {$tamTenis30++;}
		if ($linha['tamTenis']=='31') {$tamTenis31++;}
		if ($linha['tamTenis']=='32') {$tamTenis32++;}
		if ($linha['tamTenis']=='33') {$tamTenis33++;}
		if ($linha['tamTenis']=='34') {$tamTenis34++;}
		if ($linha['tamTenis']=='35') {$tamTenis35++;}
		if ($linha['tamTenis']=='36') {$tamTenis36++;}
		if ($linha['tamTenis']=='37') {$tamTenis37++;}
		if ($linha['tamTenis']=='38') {$tamTenis38++;}
		if ($linha['tamTenis']=='39') {$tamTenis39++;}
		if ($linha['tamTenis']=='40') {$tamTenis40++;}
		if ($linha['tamTenis']=='41') {$tamTenis41++;}
		if ($linha['tamTenis']=='42') {$tamTenis42++;}
		if ($linha['tamTenis']=='43') {$tamTenis43++;}
		if ($linha['tamTenis']=='44') {$tamTenis44++;}
		if ($linha['tamTenis']=='45') {$tamTenis45++;}
		if ($linha['tamTenis']=='46') {$tamTenis46++;}
		if ($linha['tamTenis']=='47') {$tamTenis47++;}
	}
	mysql_free_result($query);
	}
}  
//----------------------------------------------------------------------------------
echo'
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>

<body style="text-align: center">

<p align="center">UNIFORME ESCOLAR 2021 - '.$titulo.' - '.$n.' alunos</p>
<form method="POST" action="?id=18" onchange="form.submit()">
	<p align="center"><select size="1" name="selectTurma" onchange="form.submit()">
	<option value=""></option>
	<option value="1R">Remota</option>
	<option value="1P">Presencial</option>
	<option value="FU">Falta Unif</option>
	</select>
</form>
<div align="center">
	Quantidade de Uniformes por Turma
	<table border="0" style="border-collapse: collapse" width="50%" bordercolordark="#000000">
		<tr>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Sexo</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 2</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 4</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 6</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 8</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 10</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 12</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 14</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam 16</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam P</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam M</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam G</td>
			<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">Tam GG</td>
		</tr>
		<tr>
			<td align="center" style="border-style:solid; border-width:1px; ">
			M</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta2.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta4.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta6.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta8.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta10.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta12.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta14.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamiseta16.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaP.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaM.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaG.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaGG.'</td>
		</tr>
		<tr>
			<td align="center" style="border-style:solid; border-width:1px; ">
			F</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF2.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF4.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF6.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF8.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF10.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF12.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF14.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaF16.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaFP.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaFM.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaFG.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamanhoCamisetaFGG.'</td>
		</tr>
	</table>
	Quantidade de Tênis por Turma
<table border="0" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
	<tr>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">18</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">19</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">20</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">21</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">22</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">23</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">24</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">25</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">26</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">27</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">28</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">29</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">30</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">31</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">32</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">33</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">34</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">35</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">36</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">37</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">38</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">39</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">40</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">41</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">42</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">43</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">44</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">45</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">46</td>
		<td align="center" style="border-style: solid; border-width: 1px" bgcolor="#FF0000">47</td>
	</tr>
	<tr>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis18.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis19.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis20.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis21.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis22.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis23.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis24.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis25.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis26.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis27.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis28.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis29.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis30.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis31.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis32.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis33.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis34.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis35.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis36.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis37.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis38.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis39.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis40.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis41.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis42.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis43.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis44.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis45.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis46.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$tamTenis47.'</td>
	</tr>
</table>
<hr width="80%" size="1">  
	<table border="0" style="border-collapse: collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
		<tr>
			<td align="center" style="border-style: solid; border-width: 1px">CGN</td>
			<td align="center" style="border-style: solid; border-width: 1px">Ano/Turma</td>
			<td align="center" style="border-style: solid; border-width: 1px">Nome do Aluno</td>
			<td align="center" style="border-style: solid; border-width: 1px">Sexo</td>
			<td align="center" style="border-style: solid; border-width: 1px">Uniforme</td>
			<td align="center" style="border-style: solid; border-width: 1px">Tênis</td>
		</tr>
		'.$tabela.'
	</table>
</div>
';
?>