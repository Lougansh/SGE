<?php
echo '<style media="print">.botao {display: none;}</style>';
include './conexao.php'; 
include './conf.php';
alunosMFT();


if (isset($_POST['selectTurma'])){
	$anoTurma = substr($_POST['selectTurma'],0,1);
	$turmaAno = substr($_POST['selectTurma'],1,1);
	if ($anoTurma=='F' and $turmaAno=='U'){
	$sql = "select * from tb_alunoMFT where tamUniforme = '' and tamTenis = '' and situacao = 'A' order by ano, turma, nomeAluno asc ";
	$titulo = 'FALTA ESCOLHER UNIFORME ';
	}
	else if ($anoTurma=='F' and $turmaAno=='R'){
	$sql = "select * from tb_alunoMFT where nomeResponsavel = '' and situacao = 'A' order by ano, turma, nomeAluno asc ";
	$titulo = 'FALTA PREENCHER RESPONSAVEL ';
	}
	else if ($anoTurma=='R' and $turmaAno=='G'){
	$sql = "select * from tb_alunoMFT where situacao = 'A' order by ano, turma, nomeAluno asc ";
	$titulo = 'RELATORIO GERAL ';
	}
	else{
	$sql = "select * from tb_alunoMFT where ano = '$anoTurma' and turma = '$turmaAno' and situacao = 'A' order by nomeAluno asc ";
	if ($anoTurma == 0 && $turmaAno == 'G'){$titulo = 'Turma: Pré - Escola I A ';}
	if ($anoTurma == 0 && $turmaAno == 'H'){$titulo = 'Turma: Pré - Escola I B ';}
	if ($anoTurma == 0 && $turmaAno == 'A'){$titulo = 'Turma: Pré - Escola II A ';}
	if ($anoTurma == 0 && $turmaAno == 'B'){$titulo = 'Turma: Pré - Escola II B ';}
	if ($anoTurma == 0 && $turmaAno == 'C'){$titulo = 'Turma: Pré - Escola II C ';}
	if ($anoTurma == 0 && $turmaAno == 'D'){$titulo = 'Turma: Pré - Escola II D ';}
	if ($anoTurma == 0 && $turmaAno == 'E'){$titulo = 'Turma: Pré - Escola II E ';}
	if ($anoTurma == 0 && $turmaAno == 'F'){$titulo = 'Turma: Pré - Escola II F ';}
	if ($anoTurma >= 1){$titulo = 'Turma: '.$anoTurma.'º Ano '.$turmaAno;}
	}
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	$n=1;
	while ($linha = mysql_fetch_array($query)) {
	$n++;
	$aluno = $linha['nomeAluno'];
	$prof = $linha['prof'];
	if ($linha['ano'] == 0 && $linha['turma'] == 'G'){$turmaAluno = 'PréI - A ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'H'){$turmaAluno = 'PréI - B ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'A'){$turmaAluno = 'PréII - A ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'B'){$turmaAluno = 'PréII - B ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'C'){$turmaAluno = 'PréII - C ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'D'){$turmaAluno = 'PréII - D ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'E'){$turmaAluno = 'PréII - E ';}
	if ($linha['ano'] == 0 && $linha['turma'] == 'F'){$turmaAluno = 'PréII - F ';}
	if ($linha['ano'] >= 1)					   {$turmaAluno = $linha['ano'].'º Ano '.$linha['turma'];}
	$tabela = $tabela.'	
	<tr>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['cgm'].'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$turmaAluno.'</td>
		<td align="left" style="border-style: solid; border-width: 1px">'.$aluno.'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['sexo'].'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['tamUniforme'].'</td>
		<td align="center" style="border-style: solid; border-width: 1px">'.$linha['tamTenis'].'</td>
	</tr>
	';
	}
	//=====================================================================================
	if ($anoTurma=='F' and $turmaAno=='U'){
	$sql = 'SELECT COUNT(ID) total FROM tb_alunoMFT where tamUniforme = "" and tamTenis = "" and situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	mysql_free_result($query);
	}
	//=====================================================================================
	else if ($anoTurma=='F' and $turmaAno=='R'){
	$sql = 'SELECT COUNT(ID) total FROM tb_alunoMFT where nomeResponsavel = "" and situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	mysql_free_result($query);
	}
	//=====================================================================================
	else if ($anoTurma=='R' and $turmaAno=='G'){
	$sql = 'SELECT * FROM tb_alunoMFT where situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['tamUniforme']=='2' && $linha['sexo']=='F'){$tamUniformeF2++;}
		if ($linha['tamUniforme']=='4' && $linha['sexo']=='F'){$tamUniformeF4++;}
		if ($linha['tamUniforme']=='6' && $linha['sexo']=='F'){$tamUniformeF6++;}
		if ($linha['tamUniforme']=='8' && $linha['sexo']=='F'){$tamUniformeF8++;}
		if ($linha['tamUniforme']=='10' && $linha['sexo']=='F'){$tamUniformeF10++;}
		if ($linha['tamUniforme']=='12' && $linha['sexo']=='F'){$tamUniformeF12++;}
		if ($linha['tamUniforme']=='14' && $linha['sexo']=='F'){$tamUniformeF14++;}
		if ($linha['tamUniforme']=='16' && $linha['sexo']=='F'){$tamUniformeF16++;}
		if ($linha['tamUniforme']=='P' && $linha['sexo']=='F'){$tamUniformeFP++;}
		if ($linha['tamUniforme']=='M' && $linha['sexo']=='F'){$tamUniformeFM++;}
		if ($linha['tamUniforme']=='G' && $linha['sexo']=='F'){$tamUniformeFG++;}
		if ($linha['tamUniforme']=='GG' && $linha['sexo']=='F'){$tamUniformeFGG++;}
		if ($linha['tamUniforme']=='2' && $linha['sexo']=='M'){$tamUniforme2++;}
		if ($linha['tamUniforme']=='4' && $linha['sexo']=='M'){$tamUniforme4++;}
		if ($linha['tamUniforme']=='6' && $linha['sexo']=='M'){$tamUniforme6++;}
		if ($linha['tamUniforme']=='8' && $linha['sexo']=='M'){$tamUniforme8++;}
		if ($linha['tamUniforme']=='10' && $linha['sexo']=='M'){$tamUniforme10++;}
		if ($linha['tamUniforme']=='12' && $linha['sexo']=='M'){$tamUniforme12++;}
		if ($linha['tamUniforme']=='14' && $linha['sexo']=='M'){$tamUniforme14++;}
		if ($linha['tamUniforme']=='16' && $linha['sexo']=='M'){$tamUniforme16++;}
		if ($linha['tamUniforme']=='P' && $linha['sexo']=='M'){$tamUniformeP++;}
		if ($linha['tamUniforme']=='M' && $linha['sexo']=='M'){$tamUniformeM++;}
		if ($linha['tamUniforme']=='G' && $linha['sexo']=='M'){$tamUniformeG++;}
		if ($linha['tamUniforme']=='GG' && $linha['sexo']=='M'){$tamUniformeGG++;}
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
	$sql = 'SELECT * FROM tb_alunoMFT where ano = '.$anoTurma.' and turma = "'.$turmaAno.'" and situacao = "A"';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		if ($linha['tamUniforme']=='2' && $linha['sexo']=='F'){$tamUniformeF2++;}
		if ($linha['tamUniforme']=='4' && $linha['sexo']=='F'){$tamUniformeF4++;}
		if ($linha['tamUniforme']=='6' && $linha['sexo']=='F'){$tamUniformeF6++;}
		if ($linha['tamUniforme']=='8' && $linha['sexo']=='F'){$tamUniformeF8++;}
		if ($linha['tamUniforme']=='10' && $linha['sexo']=='F'){$tamUniformeF10++;}
		if ($linha['tamUniforme']=='12' && $linha['sexo']=='F'){$tamUniformeF12++;}
		if ($linha['tamUniforme']=='14' && $linha['sexo']=='F'){$tamUniformeF14++;}
		if ($linha['tamUniforme']=='16' && $linha['sexo']=='F'){$tamUniformeF16++;}
		if ($linha['tamUniforme']=='P' && $linha['sexo']=='F'){$tamUniformeFP++;}
		if ($linha['tamUniforme']=='M' && $linha['sexo']=='F'){$tamUniformeFM++;}
		if ($linha['tamUniforme']=='G' && $linha['sexo']=='F'){$tamUniformeFG++;}
		if ($linha['tamUniforme']=='GG' && $linha['sexo']=='F'){$tamUniformeFGG++;}
		if ($linha['tamUniforme']=='2' && $linha['sexo']=='M'){$tamUniforme2++;}
		if ($linha['tamUniforme']=='4' && $linha['sexo']=='M'){$tamUniforme4++;}
		if ($linha['tamUniforme']=='6' && $linha['sexo']=='M'){$tamUniforme6++;}
		if ($linha['tamUniforme']=='8' && $linha['sexo']=='M'){$tamUniforme8++;}
		if ($linha['tamUniforme']=='10' && $linha['sexo']=='M'){$tamUniforme10++;}
		if ($linha['tamUniforme']=='12' && $linha['sexo']=='M'){$tamUniforme12++;}
		if ($linha['tamUniforme']=='14' && $linha['sexo']=='M'){$tamUniforme14++;}
		if ($linha['tamUniforme']=='16' && $linha['sexo']=='M'){$tamUniforme16++;}
		if ($linha['tamUniforme']=='P' && $linha['sexo']=='M'){$tamUniformeP++;}
		if ($linha['tamUniforme']=='M' && $linha['sexo']=='M'){$tamUniformeM++;}
		if ($linha['tamUniforme']=='G' && $linha['sexo']=='M'){$tamUniformeG++;}
		if ($linha['tamUniforme']=='GG' && $linha['sexo']=='M'){$tamUniformeGG++;}
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
	<option value="0G">PréI-A</option>
	<option value="0H">PréI-B</option>
	<option value="0A">PréII-A</option>
	<option value="0B">PréII-B</option>
	<option value="0C">PréII-C</option>
	<option value="0D">PréII-D</option>
	<option value="0E">PréII-E</option>
	<option value="0F">PréII-F</option>
	<option value="1A">1ºAno-A</option>
	<option value="1B">1ºAno-B</option>
	<option value="1C">1ºAno-C</option>
	<option value="1D">1ºAno-D</option>
	<option value="1E">1ºAno-E</option>
	<option value="1F">1ºAno-F</option>
	<option value="2A">2ºAno-A</option>
	<option value="2B">2ºAno-B</option>
	<option value="2C">2ºAno-C</option>
	<option value="2D">2ºAno-D</option>
	<option value="2E">3ºAno-E</option>
	<option value="3A">3ºAno-A</option>
	<option value="3B">3ºAno-B</option>
	<option value="3C">3ºAno-C</option>
	<option value="3D">3ºAno-D</option>
	<option value="4A">4ºAno-A</option>
	<option value="4B">4ºAno-B</option>
	<option value="4C">4ºAno-C</option>
	<option value="4D">4ºAno-D</option>
	<option value="4E">4ºAno-E</option>
	<option value="5A">5ºAno-A</option>
	<option value="5B">5ºAno-B</option>
	<option value="5C">5ºAno-C</option>
	<option value="5D">5ºAno-D</option>
	<option value="FU">Falta Unif</option>
	<option value="FR">Falta Resp</option>
	<option value="RG">Rel Geral</option>
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
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme2.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme4.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme6.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme8.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme10.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme12.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme14.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniforme16.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeP.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeM.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeG.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeGG.'</td>
		</tr>
		<tr>
			<td align="center" style="border-style:solid; border-width:1px; ">
			F</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF2.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF4.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF6.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF8.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF10.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF12.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF14.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeF16.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeFP.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeFM.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeFG.'</td>
			<td align="center" style="border-style: solid; border-width: 1px">'.$tamUniformeFGG.'</td>
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