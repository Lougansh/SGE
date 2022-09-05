<?php
session_start("historico");
include './conexao.php';
include './conf.php';
menuA();
echo"
<html>
<head>
<title>Add Pontos</title>
<script>
        document.addEventListener('DOMContentLoaded', ()=> {
            const form = document.querySelector('form');
            form.addEventListener('submit', (e)=> {
                e.preventDefault();
            });
        });
</script>
</head>
";
//------------>
$sql = "SELECT * from tb_turma turma where Ano <> 'P1' order by ano desc, turma desc";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano'] == 0){$decodAno = 'Pre';}else{$decodAno = $linha['Ano'];}
$retTurma = '<input type="radio" value="'.$linha['Ano'].$linha['Turma'].'"  name="R1" onchange="form.submit()">'.$decodAno.$linha['Turma'].$retTurma;
}
mysql_free_result($query);
$retTurma = '
<input type="radio" value="3A"  name="R1" onchange="form.submit()" >3º A 
<input type="radio" value="3B"  name="R1" onchange="form.submit()" >3º B 
<input type="radio" value="3C"  name="R1" onchange="form.submit()" >3º C

<input type="radio" value="4A"  name="R1" onchange="form.submit()" >4º A 
<input type="radio" value="4B"  name="R1" onchange="form.submit()" >4º B 
<input type="radio" value="4C"  name="R1" onchange="form.submit()" >4º C

<input type="radio" value="5A"  name="R1" onchange="form.submit()" >5º A 
<input type="radio" value="5B"  name="R1" onchange="form.submit()" >5º B
';
//------------>
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$_SESSION["ano"] = substr($_POST['R1'],0,1);
$_SESSION["turma"] = substr($_POST['R1'],1,1);
$sql = 'select * from tb_aluno where situacao <> "T" and Ano = '.$_SESSION["ano"].' and Turma = "'.$_SESSION["turma"].'" Order By ano desc,nome desc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
$explodeNome = explode(" ",$linha['Nome']);
$primeiroNome = current($explodeNome);
$foto_aluno = '../images/alunos/'.$linha['ID'].'.JPG'; 	
if (file_exists($foto_aluno)) {
	$caminho = 'alunos/'.$linha["ID"].'.JPG';
}else{
	$caminho = 'semfoto.JPG';	
	}
if($linha['Dificuldade'] == 'S'){
$menuFotos = '<button style="color:  red; border: 2px inset  red" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/'.$caminho.'" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
}elseif($linha['Programacao'] == 'S'){
$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/alunos/'.$linha['ID'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
}else{
$menuFotos = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['Nome'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/'.$caminho.'" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
}
}
$_SESSION["menuFotos"] = $menuFotos;
mysql_free_result($query);
}
//------------>
echo '<body><form method="POST" action="?id=18" onchange="form.submit() onkeypress=" if(event.key == 13)"><div align="Center"><font color="gray">ATIVO</font>:<b><font size="5" color="red">'.$_SESSION["ano"].$_SESSION["turma"].'</font></b> | '.$retTurma.'<br>'.$_SESSION["menuFotos"].'</div>';
//echo 'aqui:'.$_SESSION["ano"].$_SESSION["turma"];
if (isset($_POST['dropSelecionar'])) { 
$codigo = $_POST['dropSelecionar'];
$sql = "select aluno.*, turma.Professor, turma.Sala, turma.Turno, turma.Matricula Matr FROM tb_aluno aluno, tb_turma turma WHERE aluno.turma = turma.turma and aluno.ano = turma.ano and aluno.ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['Nascimento'] );
$interval = $date->diff( new DateTime( date() ) );
$$_SESSION["movimentacao"] = $linha['Situacao'];
if ($linha['Sexo'] 		== 'M') {$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
if ($linha['Dificuldade']	== 'S') {$reforco='<input type="checkbox" name="chkReforco" checked>';} else {$reforco='<input type="checkbox" name="chkReforco">';}
if ($linha['Fotografia']	== 'S') {$fotografia='<input type="checkbox" name="chkFotografia" checked>';} else {$fotografia='<input type="checkbox" name="chkFotografia">';}
if ($linha['Programacao']	== 'S') {$programacao='<input type="checkbox" name="chkProgramacao" checked>';} else {$programacao='<input type="checkbox" name="chkProgramacao">';}
if ($linha['Leitura']		== 'S') {$leitura='<input type="checkbox" name="chkLeitura" checked>';} else {$leitura='<input type="checkbox" name="chkLeitura">';}
if ($linha['Escrita']		== 'S') {$escrita='<input type="checkbox" name="chkEscrita" checked>';} else {$escrita='<input type="checkbox" name="chkEscrita">';}
if ($linha['Numerais']		== 'S') {$numerais='<input type="checkbox" name="chkNumerais" checked>';} else {$numerais='<input type="checkbox" name="chkNumerais">';}
if ($linha['Operacoes']		== 'S') {$operacoes='<input type="checkbox" name="chkOperacoes" checked>';} else {$operacoes='<input type="checkbox" name="chkOperacoes">';}
if ($linha['Relacionamento']	== 'B') {$relacionamento=  '<input type="radio" value="B" checked name="chkRelacionamento">Bom<input type="radio" value="R" name="chkRelacionamento">Ruim';} else {$relacionamento='<input type="radio" value="B" name="chkRelacionamento">Bom<input type="radio" value="R" checked name="chkRelacionamento">Ruim';}
if ($linha['preConselho']		== 'S') {$preConselhoAluno='<input type="radio" value="S" checked name="chkPreConselho">SIM   <input type="radio" value="N" name="chkPreConselho">NAO';} else {$preConselhoAluno=  '<input type="radio" value="S" name="chkPreConselho">SIM<input type="radio" value="N" checked name="chkPreConselho">NAO';}
if ($linha['avaliacaoContexto']		== 'S') {$avaliacaoContexto='<input type="radio" value="S" checked name="chkAvaliacaoContexto">SIM   <input type="radio" value="N" name="chkPreConselho">NAO';} else {$avaliacaoContexto=  '<input type="radio" value="S" name="chkAvaliacaoContexto">SIM<input type="radio" value="N" checked name="chkAvaliacaoContexto">NAO';}
if ($linha['Turma']== 'A') {$mTurma = '<select size="1" name="dropTurma">  <option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="B">B</option><option value="C">C</option><option value="D">D</option></select>';}
else if ($linha['Turma']== 'B') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="C">C</option><option value="D">D</option></select>';}
else if ($linha['Turma']== 'C') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option><option value="D">D</option></select>';}
else if ($linha['Turma']== 'D') {$mTurma = '<select size="1" name="dropTurma">	<option selected value="'.$linha['Turma'].'">'.$linha['Turma'].'</option><option value="A">A</option><option value="B">B</option><option value="C">C</option></select>';}if ($linha['Avaliacao']		== 'Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Nao Apropriou">Nao Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else if ($linha['Avaliacao']== 'Nao Apropriou') {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option></select>';}else {$avaliacaoUP = '<select size="1" name="dropAvaliacao"><option selected value="'.$linha['Avaliacao'].'">'.$linha['Avaliacao'].'</option><option value="Apropriou">Apropriou</option><option value="Apropriou Parcialmente">Apropriou Parcialmente</option><option value="Nao Apropriou">Nao Apropriou</option></select>';}
if ($linha['Situacao']		== 'A') {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="A">Matriculado</option><option value="T">Transferido</option></select>';}else {$situacaoUP='<select size="1" name="dropSituacao"><option selected value="T">Transferido</option><option value="A">Matriculado</option></select>';}
$pontos = $linha['Ponto'];
echo'
<div align="center"><table border="0" width="1026"><tr>
<td rowspan="10" align="center" valign="top" width="315"><p><font size="6"><b>'.$_SESSION["ano"].'º'.$_SESSION["turma"].'</b></font><hr width="10%"><hr width="30%"><hr width="50%">
<img src="../images/alunos/'.$linha['ID'].'.JPG" height="150"><hr width="50%"><hr width="30%"><hr width="10%"><select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select><br><hr width="10%"><hr width="30%"><hr width="50%"></td></tr><tr>	
<td  align="right" width="116" >Matricula:	</td><td colspan="3"  ><font color="gray">'.$linha['ID'].'</td></tr><tr>
<td  align="right" width="116" >Nome:	    </td><td colspan="3"  ><font color="blue">'.ucwords(strtolower($linha['Nome'])).'</font></td></tr><tr>
<td  align="right" width="116" >Nascimento:	</td><td colspan="3"  ><font color="gray">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td></tr><tr>
<td  align="right" width="116" >Idade:	    </td><td colspan="3"  ><font color="gray">'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'</td></tr><tr>
<td  align="right" width="116" >Sala:	    </td><td colspan="3"  ><font color="gray">'.$linha['Sala'].'</font> Turno:<font color="gray"> '.$linha['Turno'].'</td></tr><tr>
<td  align="right" width="116" >Ano/Turma:	</td><td width="134"  ><font color="gray"><input type="text" value="'.$linha['Ano'].'" size="1" name="dropAno" style="text-align:center">'.$mTurma.'</td>
<td width="50"  ><p align="right">PC:</td><td width="389"  ><font color="gray"><input type="text" value="'.$linha['PC'].'" size="1" name="dropPC" style="text-align:center"></td></tr><tr>
<td  align="right" width="116" >Professora:	</td><td colspan="3"  ><font color="gray">'.$linha['Matr'].' <font color="red">'.$linha['Professor'].'</td></tr><tr>
<td  align="right" width="116" >Pontuação:	</td><td colspan="3"  ><font color="gray">'.$pontos.'</td></tr><tr>
<td  align="right" width="116" ><button value="Salvar" name="btnSalvar" title="Click aqui para salvar"><img src="../images/btnSalvar.jpg" width="80" height="80"></button></td>
<td colspan="3"><font color="gray">
<input type="text" value="" size="6" name="dropPontos" style="text-align: right" autofocus> Pontos.</td></tr></table><hr width="50%">
</div></form></body>
';
}
if (isset($_POST['btnSalvar']) ){
$codigo 				= $_POST['dropCodigo'];
$pontos					= $_POST['dropPontos'];
$sql = 'update tb_aluno set Ponto = Ponto +'.$pontos.' where ID = '.$codigo;
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>