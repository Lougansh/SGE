<?php 
	include './conexao.php';
	include './conf.php';
	alunosMFT();
	if (isset($_POST['pesquisar'])) { 
		$pesquisaAluno = $_POST['textPesquisa'] ;
		$_SESSION["pesquisar"] = $_POST['pesquisar'];
		if($_POST['pesquisar'] == 'cgm'){$sql = "select * from tb_alunoMFT where cgm = '$pesquisaAluno' Order By ID desc";}
		if($_POST['pesquisar'] == 'cgm'){$sql = "select * from tb_alunoMFT where cgm = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'local'){$sql = "select * from tb_alunoMFT where local like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'anoProjeto'){$sql = "select * from tb_alunoMFT where anoProjeto = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'ano'){$sql = "select * from tb_alunoMFT where ano = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'turma'){$sql = "select * from tb_alunoMFT where turma = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'situacao'){$sql = "select * from tb_alunoMFT where situacao = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'prof'){$sql = "select * from tb_alunoMFT where prof like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'relacionamento'){$sql = "select * from tb_alunoMFT where relacionamento = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'nomeAluno'){$sql = "select * from tb_alunoMFT where nomeAluno like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'dataNascimento'){$sql = "select * from tb_alunoMFT where dataNascimento = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'rgAluno'){$sql = "select * from tb_alunoMFT where rgAluno = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'cpfAluno'){$sql = "select * from tb_alunoMFT where cpfAluno = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'nomePai'){$sql = "select * from tb_alunoMFT where nomePai like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'nomeMae'){$sql = "select * from tb_alunoMFT where nomeMae like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'cidade'){$sql = "select * from tb_alunoMFT where cidade like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'UF'){$sql = "select * from tb_alunoMFT where UF = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'bairro'){$sql = "select * from tb_alunoMFT where bairro like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'rua'){$sql = "select * from tb_alunoMFT where rua like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'nr'){$sql = "select * from tb_alunoMFT where nr = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'tel1'){$sql = "select * from tb_alunoMFT where tel1 like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'tel2'){$sql = "select * from tb_alunoMFT where tel2 like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'tel3'){$sql = "select * from tb_alunoMFT where tel3 like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'tel4'){$sql = "select * from tb_alunoMFT where tel4 like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'escolaridade'){$sql = "select * from tb_alunoMFT where escolaridade like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'profissaoPai'){$sql = "select * from tb_alunoMFT where profissaoPai like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'nomeResponsavel'){$sql = "select * from tb_alunoMFT where nomeResponsavel like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'cpfResponsavel'){$sql = "select * from tb_alunoMFT where cpfResponsavel = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'rgResponsavel'){$sql = "select * from tb_alunoMFT where rgResponsavel = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'emailResponsavel'){$sql = "select * from tb_alunoMFT where emailResponsavel like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'sexo'){$sql = "select * from tb_alunoMFT where sexo = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'profissaoMae'){$sql = "select * from tb_alunoMFT where profissaoMae like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'obs'){$sql = "select * from tb_alunoMFT where obs like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'cadastro'){$sql = "select * from tb_alunoMFT where cadastro = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'equipe'){$sql = "select * from tb_alunoMFT where equipe like '%$pesquisaAluno%' Order By ID desc";}
		else if($_POST['pesquisar'] == 'turno'){$sql = "select * from tb_alunoMFT where turno = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'covid19'){$sql = "select * from tb_alunoMFT where covid19 = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'oferta'){$sql = "select * from tb_alunoMFT where oferta = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'tamUniforme'){$sql = "select * from tb_alunoMFT where tamUniforme = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'tamTenis'){$sql = "select * from tb_alunoMFT where tamTenis = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'dataMatricula'){$sql = "select * from tb_alunoMFT where dataMatricula = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'chamada'){$sql = "select * from tb_alunoMFT where chamada = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'salaRecurso'){$sql = "select * from tb_alunoMFT where salaRecurso = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'copel'){$sql = "select * from tb_alunoMFT where copel = '$pesquisaAluno' Order By ID desc";}
		else if($_POST['pesquisar'] == 'cep'){$sql = "select * from tb_alunoMFT where cep = '$pesquisaAluno' Order By ID desc";}
		$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
		while ($linha = mysql_fetch_array($query)) {
			$turma = $linha['turma'];
			$foto_aluno = '../images/CFH/'.$linha['cgm'].'.JPG'; 	
			$explodeNome = explode(" ",$linha['nomeAluno']);
			$primeiroNome = current($explodeNome);
			if (file_exists($foto_aluno)) {
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'">	<table border="0" style="display:inline;">	<tr><td><img style="margin: 0px; padding: 0px" src="../images/CFH/'.$linha['cgm'].'.JPG" height="100">	</td></tr><tr><td><p align="center">	<font size="1">	'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
			}
			else{
				$mostraFotos = '<button value="' . $linha['ID'] . '" name="menu" title="'.$linha['nomeAluno'].'">	<table border="0" style="display:inline;">	<tr><td><img style="margin: 0px; padding: 0px" src="../images/semfoto.JPG" height="100">	</td></tr><tr><td><p align="center">	<font size="1">	'.$primeiroNome.'</font></td></tr></table>'.$mostraFotos;
				$_SESSION["secMostraFotos"] = $mostraFotos;
			}
		}
	}
		mysql_free_result($query);
		echo'
		<form method="POST" action="?id=18" onchange="form.submit()">	
		<div align="Center">	
		<p align="center">	
		<select size="1" name="pesquisar">
         <option value="'.$_SESSION["pesquisar"].'">'.strtoupper($_SESSION["pesquisar"]).'</option>		
		<option value="cgm">CGM</option>
		<option value="nomeAluno">	Aluno	</option>
		<option value="ano">	Ano	</option>
		<option value="turma">	Turma	</option>
		<option value="situacao">	Situação	</option>
		<option value="prof">	Professor	</option>
		<option value="relacionamento">	Relacionamento	</option>
		<option value="dataNascimento">	Nascimento	</option>
		<option value="rgAluno">	RG	</option>
		<option value="cpfAluno">	CPF	</option>
		<option value="nomePai">	Pai	</option>
		<option value="nomeMae">	Mãe	</option>
		<option value="cidade">	Naturalidade	</option>
		<option value="UF">	UF	</option>
		<option value="bairro">	Bairro	</option>
		<option value="rua">	Rua	</option>
		<option value="nr">	Nº	</option>
		<option value="tel1">	Celular	</option>
		<option value="tel2">	Telefone	</option>
		<option value="tel3">	Contato	</option>
		<option value="tel4">	Recado	</option>
		<option value="escolaridade">	Escolaridade	</option>
		<option value="profissaoPai	Profissão do Pai	</option>
		<option value="nomeResponsavel">	Responsável	</option>
		<option value="cpfResponsavel">	CPF do Responsável	</option>
		<option value="rgResponsavel">	RG do Responsável	</option>
		<option value="emailResponsavel">	Email do Responsável	</option>
		<option value="sexo">	Sexo	</option>
		<option value="profissaoMae	Profissão da Mãe	</option>
		<option value="obs">	Observações	</option>
		<option value="cadastro">	Data do Cadastro	</option>
		<option value="equipe">	Equipe	</option>
		<option value="turno">	Turno	</option>
		<option value="tamUniforme">	Uniforme	</option>
		<option value="tamTenis">	Tenis	</option>
		<option value="dataMatricula">	Data da Matricula	</option>
		<option value="chamada">	Numero da Chamada	</option>
		<option value="salaRecurso">	Sala de Recurso	</option>
		<option value="copel">	Copel	</option>
		<option value="cep">	CEP	</option>
		</select>
		<input type="text" value="" size="10" name="textPesquisa" autofocus>	
		</div>
		</form>
		<form method="POST" action="editarAlunoMFT.php" onchange="form.submit()">	<div align="center">	'.$mostraFotos.'</div>
		</form>
	';
?>