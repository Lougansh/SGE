<?php 
include './conexao.php';
include './conf.php';
alunosProjeto();
$sql = 'select * from tb_aluno where programacao = "S" Order By ID, Nascimento asc';
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$local 								= 'TPC';
		$anoProjeto 						= date('Y', strtotime($linha['Nascimento']))+9;
		$nomeAluno 							= ucwords(strtolower($linha['Nome']));
		$dataNascimento 					= $linha['Nascimento'];
		$sexo 								= $linha['Sexo'];
		$rgAluno 							= $linha['RG'];
		$cpfAluno 							= $linha['CPF'];
		$nomePai 							= ucwords(strtolower($linha['Pai']));
		$nomeMae 							= ucwords(strtolower($linha['Mae']));
		$profissaoPai 						= ucwords(strtolower($linha['profissaoPai']));
		$profissaoMae 						= ucwords(strtolower($linha['profissaoMae']));
		$nomeResponsavel 					= ucwords(strtolower($linha['Responsavel']));
		$rgResponsavel 						= '';
		$escolaridade 						= '';
		$cpfResponsavel 					= '';
		$emailResponsavel 					= '';
		$tel1 								= $linha['Telefone'];
		$tel2								= $linha['Telefone2'];
		$tel3 								= $linha['Telefone3'];
		$tel4 								= $linha['Telefone4'];
		$bairro 							= ucwords(strtolower($linha['bairro']));
		$rua 								= ucwords(strtolower($linha['rua']));
		$nr 								= $linha['Nr'];
		$obs 								= '';
		$dataHoje 							= date('Y-m-d');
		$cgm								= $linha['ID'];
		$equipe								= $anoProjeto;
		echo "insert into tb_aluno_projeto (
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
			cgm,
			equipe) values (
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
			'$cgm',
			'$equipe')
			;<br>
		"; 
	}
?>