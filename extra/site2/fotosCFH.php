<?php 
include './conexao.php';
$contador = 0;
	$sql = 'select * from tb_aluno_projeto where anoProjeto >= YEAR(CURDATE()) Order By ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		
	$foto_aluno = '../images/CFH/'.$linha['ID'].'.JPG'; 	
	$explodeNome = explode(" ",$linha['nomeAluno']);
	$primeiroNome = current($explodeNome);
	if (file_exists($foto_aluno)) {
	$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['ID'].'.JPG" height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
	}else{
	$menuFotos = '<button style="color: blue; border: 2px inset blue" value="' . $linha['ID'] . '" name="dropSelecionar" title="'.$linha['nomeAluno'].'"><table border="0" style="display:inline;"><tr><td><img style="margin: 0px; padding: 0px" src="../images/semfoto.JPG"              height="100"></td></tr><tr><td><p align="center"><font size="1">'.$primeiroNome.'</font></td></tr></table>'.$menuFotos;
	}
}
echo '<body><form method="POST" action="?id=18" onchange="form.submit()"><div align="Center">'.$menuFotos.'</div>';

if (isset($_POST['dropSelecionar'])) { 
$codigo = $_POST['dropSelecionar'];
$sql = "select * FROM tb_aluno_projeto WHERE ID = $codigo";
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$linha = mysql_fetch_array($query);
$date = new DateTime( $linha['dataNascimento'] );
$interval = $date->diff( new DateTime( date() ) );
if ($linha['Sexo'] 		== 'M') {$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Masculino</option><option value="F">Feminino</option></select>';}else{$sexo = '<select size="1" name="dropSexo"><option selected value="'.$linha['Sexo'].'">Feminino</option><option value="M">Masculino</option></select>';}
$obs = $linha['Obs'];
echo'
<div align="center"><table border="0" width="1026">
		<tr>
			<td rowspan="12" align="center" valign="top" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
				<img src="../images/alunos/'.$linha['ID'].'.JPG" height="300">
				<hr width="50%"><hr width="30%">
				<hr width="10%">
				<select size="1" name="dropCodigo"><option selected value="'.$linha['ID'].'">'.$linha['ID'].'</option></select><br>
				<hr width="10%"><hr width="30%"><hr width="50%">
			</td>
		</tr>
		<tr>	
			<td align="right" width="116" >Local: 
			</td>
			<td>
				<input type="text" value="'.strtoupper($linha['local']).'" size="40" name="local">
			</td>
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
				<input style="text-align:center" type="text" value="'.date('Y', strtotime($linha['dataNascimento'])).'" size="3" name="ano">
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
			<td>'.$sexo.' RG: <input type="text" value="'.$linha['rgAluno'].'" size="18" name="dropRG" maxlength="9"> CPF: 
				<input type="text" value="'.$linha['cpfAluno'].'" size="19" name="dropCPF" maxlength="11">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Pai: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomePai'])).'" size="40" name="dropPai"> Profissão: 
				<input type="text" value="'.ucwords(strtolower($linha['profissaoPai'])).'" size="20" name="dropProfissaoPai">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Mãe: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomeMae'])).'" size="40" name="dropMae"> Profissão: 
				<input type="text" value="'.ucwords(strtolower($linha['profissaoMae'])).'" size="20" name="dropProfissaoMae">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Responsável:
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['nomeResponsavel'])).'" size="40" name="dropResponsavel"> RG: 
				<input type="text" value="'.$linha['rgResponsavel'].'" size="20" name="dropRGResponsavel">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Contato: 
			</td>
			<td>
				<input style="text-align:center" type="text" value="'.$linha['tel1'].'" size="10" name="dropContato"> 
				<input style="text-align:center" type="text" value="'.$linha['tel2'].'" size="10" name="dropContato2">
				<input style="text-align:center" type="text" value="'.$linha['tel3'].'" size="10" name="dropContato3">
				<input style="text-align:center" type="text" value="'.$linha['tel4'].'" size="10" name="dropContato4">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >Bairro: 
			</td>
			<td>
				<input type="text" value="'.ucwords(strtolower($linha['bairro'])).'" size="15" name="dropBairro"> Rua: 
				<input type="text" value="'.ucwords(strtolower($linha['rua'])).'" size="28" name="dropRua"> Nº: 
				<input type="text" value="'.$linha['nr'].'" size="4" name="dropNr" style="text-align:center">
			</td>
		</tr>
		<tr>
			<td align="right" width="116" >
				<button value="Salvar" name="btnSalvar" title="Click aqui para salvar">
					<img src="../images/btnSalvar.jpg" width="80" height="80">
				</button>
			</td>
			<td>
				<textarea rows="7" name="tedHistorico" cols="70">' . $obs .'
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
?>