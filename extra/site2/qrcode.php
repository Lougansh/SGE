<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CFH</title>
    <link rel="icon" href="../imagens/favicon.png">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilo2.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
      <div class="container">
      </div><!-- /container -->
    </nav><!-- /nav -->
    <div class="capa">
      <div class="texto-capa">
			<?php 
			include 'conexao.php';
			include 'conf.php';
			$pegaID = $_GET["id"];
			$sql = 'select a.*, t.Prof  from tb_aluno a, tb_turma t where a.ano = t.ano and a.turma = t.turma and a.ID = '.$pegaID.' Order By nome desc';
			$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
			while ($linha = mysql_fetch_array($query)) {
				$ano = $linha['Ano'];
				$turma = $linha['Turma'];
				$date = new DateTime( $linha['Nascimento'] );
				$interval = $date->diff( new DateTime( date() ) );
				$nascimento = $linha['Nascimento'];
				$explodeNome = explode(" ",$linha['Responsavel']);
				$primeiroNome = current($explodeNome);
				$ID = $linha['ID'];
				$nome = ucwords(strtolower($linha['Nome']));
				$telefone = $linha['Telefone'];
				$pai = ucwords(strtolower($linha['Pai']));
				$mae = ucwords(strtolower($linha['Mae']));
				$contato = $linha['Telefone'].' '.$linha['Telefone2'].' '.$linha['Telefone3'].' '.$linha['Telefone4'];
				if ($linha['Sexo'] 		== 'M') {$sexo = 'Masculino';}else{$sexo = 'Feminino';}
				if ($ano == 0 && $turma == 'D') {$varAno = 'PRÉ ESCOLA I - '; $varTurma = 'A';}
				if ($ano == 0 && $turma <> 'D') {$varAno = 'PRÉ ESCOLA II - ';$varTurma = $turma;}
				if ($ano > 0)                   {$varAno = $ano.'º ANO ';     $varTurma = $turma;}
			echo '
			<div align="center">
				<table border="0">
					<tr>
						<td colspan="2">
						<p align="center">
						<img style="img border-radius: 10px" src="../images/alunos/'.$linha['ID'].'.JPG" height="340" ></td>
					</tr>
					<tr><td align="right">Matricula:</td><td>'.$ID.'</td></tr>
					<tr><td align="right">Nome:</td><td>'.$nome.'</td></tr>
					<tr><td align="right">Nascimento:</td><td>'.date('d/m/Y', strtotime($nascimento)).'</td></tr>
					<tr><td align="right">Idade:</td><td>'.$interval->format( '%Y Anos').'</td></tr>
					<tr><td align="right">Sexo:</td><td>'.$sexo.'</td></tr>
					<tr><td align="right">Pai:</td><td>'.$pai.'</td></tr>
					<tr><td align="right">Mãe:</td><td>'.$mae.'</td></tr>
					<tr><td align="right">Contato:</td><td>'.$contato.'</td></tr>
					<tr><td align="right">Ano/Turma:</td><td>'.$varAno.$varTurma.'</td></tr>
				</table>
			</div>
			';
			}
			?>
        </div>
    </div>
  </body>
</html>