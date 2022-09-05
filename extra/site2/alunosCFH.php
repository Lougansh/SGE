<?php 
include './conexao.php';
include './conf.php';
menuA();
	$sql = 'select * from tb_aluno_projeto Order By ID desc';
		//$sql = 'select * from tb_aluno_projeto where anoProjeto >= YEAR(CURDATE()) Order By ID desc';

	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
	//------------------------------------------------------------------------------------
	/*	Serve para usar fotos como menu de seleção
	$foto_aluno = '../images/CFH/'.$linha['ID'].'.JPG'; 	
	$explodeNome = explode(" ",$linha['nomeAluno']);
	$primeiroNome = current($explodeNome);
	if (file_exists($foto_aluno)) {
	$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['ID'].'.JPG" height="50"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
	}else{
	$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/semfoto.JPG"              height="50"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
	}
	*/
	//------------------------------------------------------------------------------------
	$nomeMenu = $nomeMenu.'<option value="'.$linha['ID'].'">'.ucwords(strtolower($linha['nomeAluno'])).'</option>';
}
echo '<body><form method="POST" action="?id=18" onchange="form.submit()"><div align="Center"><select size="1" name="nomeMenu"><option value=""></option>'.$nomeMenu.'</select><input type="submit" value="Editar" name="editar"></div>';

if (isset($_POST['editar'])&& $_POST['nomeMenu'] != '') { 
$codigo = $_POST['nomeMenu'] ;
$sql = "select * FROM tb_aluno_projeto WHERE ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['dataNascimento'] );
$interval = $date->diff( new DateTime( date() ) );
if ($linha['sexo'] 		== 'M') {$Sexo = '<select size="1" name="sexo"><option selected value="'.$linha['sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$Sexo = '<select size="1" name="sexo"><option selected value="'.$linha['sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
echo'
<div align="center"><table border="0" width="1080">
		<tr>
			<td rowspan="13" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../images/CFH/'.$linha['ID'].'.JPG" height="300">
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
			<td align="right" width="116" >Local: 
			</td>
			<td>
				<input type="text" value="'.strtoupper($linha['local']).'" size="40" name="local">&nbsp; 
				Ano: 
				<input type="text" value="'.$linha['anoProjeto'].'" size="4" name="anoProjeto" style="text-align:center"></td>
		</tr>
		<tr>
			<td align="right" width="116" >Nome: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomeAluno'])).'" size="40" name="nomeAluno">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Nascimento: 
			</td>
			<td>
				<input style="text-align:center" type="text" value="'.date('d', strtotime($linha['dataNascimento'])).'" size="3" name="dia">
				<input style="text-align:center" type="text" value="'.date('m', strtotime($linha['dataNascimento'])).'" size="3" name="mes">
				<input style="text-align:center" type="text" value="'.date('Y', strtotime($linha['dataNascimento'])).'" size="3" name="ano"> Escolaridade: 
				<input style="text-align:center" type="text" value="'.ucwords(strtolower($linha['escolaridade'])).'" size="15" name="escolaridade">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Idade: 
			</td>
			<td>'.$interval->format( '%Y Anos, %m Meses e %d Dias' ).'
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Sexo: 
			</td>
			<td>'.$Sexo.' RG: 
			<input type="text" value="'.$linha['rgAluno'].'" size="18" name="rgAluno" maxlength="9"> CPF: 
				<input type="text" value="'.$linha['cpfAluno'].'" size="19" name="cpfAluno" maxlength="11">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Pai: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomePai'])).'" size="40" name="nomePai"> Profissão: 
				<input type="text" value="'.ucwords(strtolower($linha['profissaoPai'])).'" size="20" name="profissaoPai">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Mãe: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomeMae'])).'" size="40" name="nomeMae"> Profissão: 
				<input type="text" value="'.ucwords(strtolower($linha['profissaoMae'])).'" size="20" name="profissaoMae">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Responsável:
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomeResponsavel'])).'" size="30" name="nomeResponsavel"> RG: 
				<input type="text" value="'.$linha['rgResponsavel'].'" size="15" name="rgResponsavel">
				CPF: 
				<input type="text" value="'.$linha['cpfResponsavel'].'" size="15" name="cpfResponsavel"></td>
		</tr>
		<tr>
			<td align="right" width="116" >Email:
			</td>
			<td>
				<input type="text" value="'.strtolower($linha['emailResponsavel']).'" size="30" name="emailResponsavel"></td>
		</tr>

		<tr>
			<td align="right" width="116" >Contato: 
			</td>
			<td>
				<input style="text-align:center" type="text" value="'.$linha['tel1'].'" size="10" name="tel1"> 
				<input style="text-align:center" type="text" value="'.$linha['tel2'].'" size="10" name="tel2">
				<input style="text-align:center" type="text" value="'.$linha['tel3'].'" size="10" name="tel3">
				<input style="text-align:center" type="text" value="'.$linha['tel4'].'" size="10" name="tel4">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Bairro: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['bairro'])).'" size="15" name="bairro"> Rua: 
				<input type="text" value="'.ucwords(strtolower($linha['rua'])).'" size="28" name="rua"> Nº: 
				<input type="text" value="'.$linha['nr'].'" size="4" name="nr" style="text-align:center">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >
				<button value="Salvar" name="btnSalvar" title="Click aqui para salvar">
					<img src="../images/btnSalvar.jpg" width="80" height="80">
				</button>
			</td>
			<td>
				<textarea rows="7" name="obs" cols="70">' .$linha['obs'].'
				</textarea>
			</td>
		</tr>
	</table>
	<hr width="50%">
</div>
</form>
</body>
';
}
if (isset($_POST['btnSalvar']) ){
$codigo 				= $_POST['dropCodigo'];
$local 					= $_POST['local'];
$anoProjeto 			= $_POST['anoProjeto'];
$nomeAluno 				= $_POST['nomeAluno'];
$dataNascimento 		= $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
$sexo 					= $_POST['sexo'];
$rgAluno 				= $_POST['rgAluno'];
$cpfAluno 				= $_POST['cpfAluno'];
$nomePai 				= $_POST['nomePai'];
$nomeMae 				= $_POST['nomeMae'];
$profissaoPai 			= $_POST['profissaoPai'];
$profissaoMae 			= $_POST['profissaoMae'];
$nomeResponsavel 		= $_POST['nomeResponsavel'];
$rgResponsavel 			= $_POST['rgResponsavel'];
$escolaridade 			= $_POST['escolaridade'];
$cpfResponsavel 		= $_POST['cpfResponsavel'];
$emailResponsavel 		= $_POST['emailResponsavel'];
$tel1 					= $_POST['tel1'];
$tel2					= $_POST['tel2'];
$tel3 					= $_POST['tel3'];
$tel4 					= $_POST['tel4'];
$bairro 				= $_POST['bairro'];
$rua 					= $_POST['rua'];
$nr 					= $_POST['nr'];
$obs 					= $_POST['obs'];
$dataHoje 				= date('Y-m-d');
$sql = "update tb_aluno_projeto set local = '$local', anoProjeto = '$anoProjeto', nomeAluno = '$nomeAluno', dataNascimento = '$dataNascimento', rgAluno = '$rgAluno', cpfAluno = '$cpfAluno', nomePai = '$nomePai', nomeMae = '$nomeMae', bairro = '$bairro', rua = '$rua', nr = '$nr', tel1 = '$tel1', tel2 = '$tel2', tel3 = '$tel3', tel4 = '$tel4', rgResponsavel = '$rgResponsavel', escolaridade = '$escolaridade', profissaoPai = '$profissaoPai', nomeResponsavel = '$nomeResponsavel', cpfResponsavel = '$cpfResponsavel', emailResponsavel = '$emailResponsavel', sexo = '$sexo', profissaoMae = '$profissaoMae', obs = '$obs', cadastro = '$dataHoje'
where ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
}
?>