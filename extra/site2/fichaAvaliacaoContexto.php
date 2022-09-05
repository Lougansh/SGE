<?php
session_start("avaliacaoContextoSession");
$idAluno = $_SESSION["ID"];
include './conexao.php';
$sql = 'select * from tb_aluno where ID = '.$idAluno.'';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['Nascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$aluno = $linha['Nome'];
if ($linha['Sexo'] == 'M') { $sexo = 'ALUNO';}
if ($linha['Sexo'] == 'F') { $sexo = 'ALUNA';}
$date = new DateTime( $linha['Nascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$anoFrequencia = $linha['Ano'].'º ESCOLAR';
$desempenho = $linha['desempenho'];
$encaminhamento = $linha['encaminhamento'];
$avanco = $linha['avanco']; 

echo'
		<style type="text/css">
<!---------------------------------
*  {
    margin:0;
    padding:0;
}
html, body {height:100%;}
.geral {
    min-height:100%;
    position:relative;
    width:800px;
}
.footer {
    position:absolute;
    bottom:0;
    width:100%;
}
.content {overflow:hidden;}
.aside {width:200px;}
.fleft {float:left;}
.fright {float:right;}
<!---------------------------------
}
</style>
		<p align="center">
		<img border="0" src="../images/Brasao_cascavel.jpg" height="100"><br>
		<font size="2">MUNICÍPIO DE CASCAVEL<br>
		ESTADO DO PARANÁ<br>
		SECRETARIA MUNICIPAL DE EDUCAÇÃO<br>
		DEPARTAMENTO DE EDUCAÇÃO<br>
		DIVISÃO DE EDUCAÇÃO ESPECIAL</font></p>
<hr width="90%">
		<p align="center">INSTRUTOR DE INFORMÁTICA</td>
			<div align="center">
				<table border="0" width="90%">
					<tr>
						<td>
						DADOS DE IDENTIFICAÇÃO
			<fieldset style="padding: 2">
			<legend></legend>
			<p>'.$sexo.': '.$aluno.' </p>
			<p>DATA DE NASCIMENTO: '.date('d/m/Y', strtotime($linha['Nascimento'])).'</p>
			<p>ANO DE FREQÜÊNCIA DO ALUNO: '.$anoFrequencia.'</p>
			</fieldset>
			<br><br>
			INTERVENÇÃO PEDAGÓGICA REALIZADA PELO INSTRUTOR DE INFORMÁTICA
			<fieldset style="padding: 2" width: 500%">
			<legend></legend>
			<br>Desempenho pedagógico do aluno (a);<br>
			&nbsp;&nbsp;&nbsp; '.$desempenho.'<br>
			<br>Encaminhamentos realizados com o aluno (a);<br>
			&nbsp;&nbsp;&nbsp; '.$encaminhamento.'<br>
			<br>Avanços obtidos na aprendizagem.<br>
			&nbsp;&nbsp;&nbsp; '.$avanco.'<br>
			</fieldset>						
						</td>
					</tr>
				</table>
</div>
<div class="footer">
	<table border="0" width="95%">
		<tr>
			<td width="33%">&nbsp;</td>
			<td width="33%">&nbsp;</td>
			<td style="border-top-style: solid; border-top-width: 1px">
				<p align="center">Everaldo José de Souza<br>
				Instrutor de Informática</td>
			</tr>
	</table>
	<table border="0" width="95%">
		<tr>
			<td width="33%"><p align="right">Cascavel, '.date('d/m/Y').'</p></td>
		</tr>
		<br>
	</table>
		<hr width="90%" size="2">
		<p align="center">
		<font size="1">Rua Dom Pedro II, 1781 esquina com Rua Erechim, Centro, CEP: 85812-121 - Cascavel - PR - Fone/fax (045) 4001-2812</font></div>
</div>			
';
?>