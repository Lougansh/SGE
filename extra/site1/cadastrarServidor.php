<?php
include './conexao.php'; 
include './conf.php';
//alunosMFT();
?>
<head>
<meta http-equiv="Content-Language" content="pt-br">
</head>
	<div align="center">
	<form method="POST" action="">
	<table border="0" style="border-collapse:collapse" width="90%" bordercolorlight="#808080" bordercolordark="#000000">
		<tr>
			<td align="right" width="80%" colspan="2">
				<center><img src="../upload/logoMFT.jpg"></center>
			<hr width="50%">
			<hr width="30%">
			<hr width="10%">
<CENTER><H3> CADASTRO DE SERVIDORES</H3></CENTER></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Dados Pessoais</font></b></td>
		</tr>
		<tr>
			<td align="right">Nome:</td>
			<td><input type="text" name="nome" size="30"> Matricula:<input type="text" name="matricula" size="5"> 
			Digito:<input type="text" name="digito" size="1"></td>
		</tr>
		<tr>
			<td align="right">Sexo:</td>
			<td><select size="1" name="sexo">
			<option></option>
			<option value="M">MASCULINO</option>
			<option value="F">FEMININO</option>
			</select> Cor/Raça:<select size="1" name="corRaca">
			<option></option>
			<option>Parda</option>
			<option>Branca</option>
			<option>Negro</option>
			<option>Indigina</option>
			</select> Data Nascimento:<input type="text" name="dia" size="1">/<input type="text" name="mes" size="1">/<input type="text" name="ano" size="2"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Dados Profissionais</font></b></td>
		</tr>
		<tr>
			<td align="right">Cargo:</td>
			<td><select size="1" name="cargo">
			<option></option>
			<option>AGENTE DE APOIO</option>
			<option>AGENTE DE APOIO TEMPORARIO</option>
			<option>INSTRUTOR DE INFORMATICA</option>
			<option>PROFESSOR</option>
			<option>PROFESSOR EDUCACAO INFANTIL</option>
			<option>PROFESSOR TEMP</option>
			<option>SECRETARIO</option>
			<option>ZELADOR</option>
			</select> Função:<select size="1" name="funcao">
			
			<option></option>
			<option>AGENTE DE APOIO</option>
			<option>AGENTE DE APOIO TEMP</option>
			<option>COORDENADOR PEDAGOGICO</option>
			<option>DIRETOR</option>
			<option>INSTRUTOR DE INFORMATICA</option>
			<option>REGENTE CLASSE PRE-ESCOLA</option>
			<option>REGENTE CLASSE 1º ANO</option>
			<option>REGENTE CLASSE 2º ANO</option>
			<option>REGENTE CLASSE 3º ANO</option>
			<option>REGENTE CLASSE 4º ANO</option>
			<option>REGENTE CLASSE 5º ANO</option>
			<option>REGENTE CLASSE ESPECIAL</option>
			<option>REGENTE CLASSE EJA</option>
			<option>REGENTE CLASSE FUNDAMENTAL</option>
			
			<option>SECRETARIO</option>
			<option>ZELADOR</option>
			</select> 
			Turno:<select size="1" name="turno">
			<option></option>
			<option value="M">MANHÃ</option>
			<option value="T">TARDE</option>
			</select></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Admissão</font></b></td>
		</tr>
		<tr>
			<td align="right">Município:</td>
			<td><input type="text" name="diaA" size="1">/<input type="text" name="mes0" size="1">/<input type="text" name="ano0" size="2"> 
			Escola:<input type="text" name="diaA0" size="1">/<input type="text" name="mes1" size="1">/<input type="text" name="ano1" size="2">&nbsp; </td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Documentação</font></b></td>
		</tr>
		<tr>
			<td align="right">RG:</td>
			<td><input type="text" name="rg" size="9"> 
			OE:<select size="1" name="oe">
			<option></option>
			<option value="SSP">SSP - PR</option>
			<option value="IFMS">IFMS - RS</option>
			</select>  
			CPF:<input type="text" name="cpf" size="11"> Nacionalidade:
			<input type="text" name="nacionalidade" size="20"> Pais:
			<input type="text" name="pais" size="20"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Naturalidade</font></b></td>
		</tr>
		<tr>
			<td align="right">UF:</td>
			<td><input type="text" name="uf" size="1"> Cidade:<input type="text" name="cidade" size="70"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Deficiência</font></b></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<p align="left">
			<input type="checkbox" name="C11" value="ON">Auditiva
			<input type="checkbox" name="C12" value="ON">Física
			<input type="checkbox" name="C13" value="ON">Intelectual
			<input type="checkbox" name="C14" value="ON">Visual</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Endereço</font></b> / <b>
			<font color="#0000FF">Contato</font></b></td>
		</tr>
		<tr>
			<td align="right">Rua:</td>
			<td><input type="text" name="email0" size="30"> Nº:<input type="text" name="nr" size="1"> 
			Bairro:<input type="text" name="bairro" size="20"> CEP:<input type="text" name="cep" size="7"></td>
		</tr>
		<tr>
			<td align="right">E-Mail:</td>
			<td><input type="text" name="email" size="30"> Celular:<input type="text" name="codigo" size="1"><input type="text" name="celular" size="9"></td>
		</tr>
		<tr>
			<td align="right">Recado</td>
			<td><input type="text" name="codigo0" size="1"><input type="text" name="recado1" size="9"> 
			/ <input type="text" name="codigo1" size="1"><input type="text" name="recado2" size="9"> 
			/ <input type="text" name="codigo2" size="1"><input type="text" name="recado3" size="9"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><b><font color="#0000FF">Filiação</font></b></td>
		</tr>
		<tr>
			<td align="right">Pai:</td>
			<td><input type="text" name="pai" size="40"> Mãe:
			<input type="text" name="mae" size="30"></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<p><b><font color="#0000FF">Formação</font></b></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Ensino
			Fundamental</b></font></td>
		</tr>
		<tr>
			<td align="right">Escola:</td>
			<td>
			<input type="text" name="fundamental" size="30"> Data Inicio:<input type="text" name="diaIFundamental" size="1">/<input type="text" name="mesIFundamental" size="1">/<input type="text" name="anoIFundamental" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTFundamental" size="1">/<input type="text" name="mesTFundamental" size="1">/<input type="text" name="anoTFundamental" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Ensino Médio</b></font></td>
		</tr>
		<tr>
			<td align="right">Escola:</td>
			<td>
			<input type="text" name="medio" size="30"> Data Inicio:<input type="text" name="diaIMedio" size="1">/<input type="text" name="mesIMedio" size="1">/<input type="text" name="anoIMedio" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTMedio" size="1">/<input type="text" name="mesTMedio" size="1">/<input type="text" name="anoTMedio" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Ensino
			Técnico</b></font></td>
		</tr>
		<tr>
			<td align="right">Escola:</td>
			<td>
			<input type="text" name="tecnico" size="30"> Curso:<input type="text" name="cursoTecnico" size="20"> 
			Data Inicio:<input type="text" name="diaITecnico" size="1">/<input type="text" name="mesITecnico" size="1">/<input type="text" name="anoITecnico" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTTecnico" size="1">/<input type="text" name="mesTTecnico" size="1">/<input type="text" name="anoTTecnico" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Graduação</b></font></td>
		</tr>
		<tr>
			<td align="right">Instituição:</td>
			<td>
			<input type="text" name="graduacao" size="30"> Curso:<input type="text" name="cursoGraduacao" size="20"> 
			Data Inicio:<input type="text" name="diaIGraduacao" size="1">/<input type="text" name="mesIGraduacao" size="1">/<input type="text" name="anoIGraduacao" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTGraduacao" size="1">/<input type="text" name="mesTGraduacao" size="1">/<input type="text" name="anoTGraduacao" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Pós-Graduação</b></font></td>
		</tr>
		<tr>
			<td align="right">Instituição:</td>
			<td>
			<input type="text" name="posgraduacao" size="30"> Curso:<input type="text" name="cursoPosGraducao" size="20"> 
			Data Inicio:<input type="text" name="diaIPosGraducao" size="1">/<input type="text" name="mesIPosGraducao" size="1">/<input type="text" name="anoIPosGraducao" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTPosGraducao" size="1">/<input type="text" name="mesTPosGraducao" size="1">/<input type="text" name="anoTPosGraducao" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Mestrado</b></font></td>
		</tr>
		<tr>
			<td align="right">Instituição:</td>
			<td>
			<input type="text" name="mestrado" size="30"> Curso:<input type="text" name="cursoMestrado" size="20"> 
			Data Inicio:<input type="text" name="diaIMestrado" size="1">/<input type="text" name="mesIMestrado" size="1">/<input type="text" name="anoIMestrado" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTMestrado" size="1">/<input type="text" name="mesTMestrado" size="1">/<input type="text" name="anoTMestrado" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<font color="#00FF00"><b>Doutorado</b></font></td>
		</tr>
		<tr>
			<td align="right">Instituição:</td>
			<td>
			<input type="text" name="doutorado" size="30"> Curso:<input type="text" name="cursoDoutorado" size="20"> 
			Data Inicio:<input type="text" name="diaIDoutorado" size="1">/<input type="text" name="mesIDoutorado" size="1">/<input type="text" name="anoIDoutorado" size="2">&nbsp; 
			Data Término:<input type="text" name="diaTDoutorado" size="1">/<input type="text" name="mesTDoutorado" size="1">/<input type="text" name="anoTDoutorado" size="2">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td>
			<b><font color="#0000FF">Tamanhos de roupa e calçados</font></b></td>
		</tr>
		<tr>
			<td align="right">Camiseta:</td>
			<td>
			<select size="1" name="camiseta">
			<option></option>
			<option>P</option>
			<option>M</option>
			<option>G</option>
			<option>GG</option>
			<option>EG</option>
			</select> Jaleco:<select size="1" name="jaleco">
			<option></option>
			<option>P</option>
			<option>M</option>
			<option>G</option>
			<option>GG</option>
			<option>EG</option>
			</select> Calça:<select size="1" name="calca">
			<option></option>
			<option>P</option>
			<option>M</option>
			<option>G</option>
			<option>GG</option>
			<option>EG</option>
			</select> Sapato:<select size="1" name="sapato">
			<option></option>
     		<option>35</option>
			<option>36</option>
			<option>37</option>
			<option>38</option>
			<option>39</option>
			<option>40</option>
			<option>41</option>
			<option>42</option>
			<option>43</option>
			<option>44</option>
			<option>45</option>
			</select> </td>
		</tr>
	</table>
</form>
</div>