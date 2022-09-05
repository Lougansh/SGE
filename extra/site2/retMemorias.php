<?php
include './conexao.php';
if (isset($_POST['enviar']) && $_POST['nome'] != ''){
	$nome=                  $_POST['nome'];
	$sexo=                  $_POST['sexo'];
	if ($sexo=='M'){
		$preposicao = 'o';
		$pronome = 'ele';
		$genero = 'menino';
	}
	if ($sexo=='F'){
		$preposicao = 'a';
		$pronome = 'ela';
		$genero = 'menina';
	}
	$nascimento=            $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia']; 
	$date = 				new DateTime($nascimento);
	$interval = 			$date->diff( new DateTime( date() ) );
	$pai=      				$_POST['pai'];
	$mae=      				$_POST['mae'];
	$pessoaMaisGosta=      	$_POST['pessoaMaisGosta'];
	$idade = 				date(Y)-$_POST['ano'];
	$serQuandoCrescer=      $_POST['serQuandoCrescer'];
	$qualidade=             $_POST['qualidade'];
	$defeito=               $_POST['defeito'];
	$admiraNasPessoas=      $_POST['admiraNasPessoas'];
	$naoSuporta=            $_POST['naoSuporta'];
	$corFavorita=           $_POST['corFavorita'];
	$melhorMomento=         $_POST['melhorMomento'];
	$diaNoite=              $_POST['diaNoite'];
	$campoPraia=            $_POST['campoPraia'];
	$solChuva=              $_POST['solChuva'];
	$musicaPreferida=       $_POST['musicaPreferida'];
	$filmeFavorito=         $_POST['filmeFavorito'];
	$livroFavorito=         $_POST['livroFavorito'];
	$estarAgora=            $_POST['estarAgora'];
	$desenhoAnimadoFavorito=$_POST['desenhoAnimadoFavorito'];
	$comidaFavorita=        $_POST['comidaFavorita'];
	$comidaOdeia=           $_POST['comidaOdeia'];
	$diaIdeal=              $_POST['diaIdeal'];
	$animalFavorito=        $_POST['animalFavorito'];
	$criseDeRiso=           $_POST['criseDeRiso'];
	$outraPessoa=           $_POST['outraPessoa'];
	$escola=           		$_POST['escola'];
	$aulaPreferida=         $_POST['aulaPreferida'];
	$deixarMensagem=        $_POST['deixarMensagem'];
	$historia= '
<h1 align="center">A historia de '.ucwords(strtolower($nome)).'<br>
</h1>
<div align="center">
	<table border="0" width="90%">
		<tr>
			<td>
			<p align="justify"><font size="4">Hoje é dia '.date('d/m/Y').'<br>Meu nome é '.ucwords(strtolower($nome)).', nasci no dia '.date('d/m/Y', strtotime($nascimento)).', hoje estou com '.$interval->format( '%Y Anos' ).'.
			<br>
			O nome do meu pai é '.$pai.', e minha mãe se chama '.$mae.'.<br>
			A pessoa que mais gosto é: '.$pessoaMaisGosta.'. 
			Quando eu crescer vou ser '.$serQuandoCrescer.'. <br>
			Minha maior qualidade é ser '.$qualidade.' e meu pior defeito é ser '.$defeito.'.
			<br>
			O que eu mais admiro nas pessoas: '.$admiraNasPessoas.', por outro lado eu odeio: '.$naoSuporta.'.<br>
			Minha cor favorita é o '.$corFavorita.'.<br>
			O melhor momento da minha vida foi: '.$melhorMomento.', entre o dia e a noite eu prefiro: '.$diaNoite.'.<br>
			Quando penso em sair de ferias prefiro '.$campoPraia.', entre sol e chuva prefiro: '.$solChuva.'. 
			<br>
			Minha musica preferida é '.$musicaPreferida.'.<br>
			O filme que mais gostei foi '.$filmeFavorito.'. <br>
			Meu livro favorito é '.$livroFavorito.'.<br>
			Se neste momento eu pudesse estar em outro lugar adoraria estar em '.$estarAgora.'.<br>
			Meu Desenho animado preferido é '.$desenhoAnimadoFavorito.'.<br>
			Adoro comer '.$comidaFavorita.', mas odeio '.$comidaOdeia.'.<br>
			Um dia ideal pra mim é '.$diaIdeal.'.<br>
			Adoro '.$animalFavorito.'.<br>
			O que me da crise de risos é '.$criseDeRiso.'.<br>
			Se eu pudesse ser outra pessoa seria: '.$outraPessoa.'
			Na escola meu lugar preferido é: '.$escola.' e a aula que mais gosto é: '.$aulaPreferida.'.</font></p>
			<p align="center"><font size="5">'.$deixarMensagem.'. </font> </td>
		</tr>
	</table>
</div>
';
$sql = "insert into tb_historia (historia) values ('$historia')"; 
$query = mysql_query($sql); 
if($query){echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Historia escrita com sucesso!!!")</SCRIPT>';}

}
echo'
<form method="POST" action="memorias.php">
'.$historia.'
<p align="center"><input type="submit" value="Contar Outra Historia" name="enviar"></p>
</form>
</body>
';
?>