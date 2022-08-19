<?php 
session_start("editar");
include './conexao.php';
include './conf.php';
menu();
//----------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['btnSalvar']) && $_POST['textCGM'] != ''){
		$cgm = $_POST['textCGM'];
      $ano = $_POST['textAno'];
      $turma = $_POST['textTurma'];
		$nome = $_POST['textNome'];
		$nascimento = $_POST['textAnoNascimento'].'-'.$_POST['textMesNascimento'].'-'.$_POST['textDiaNascimento'];
		$sexo = $_POST['textSexo'];
		$situacao = $_POST['textSituacaoMatricula'];
		$matriculado = $_POST['textAnoMatricula'].'-'.$_POST['textMesMatricula'].'-'.$_POST['textDiaMatricula'];
		$observacao = $_POST['textObservacao'];
		$dificuldade = $_POST['dificuldade'];
		$robotica = $_POST['robotica'];

$sql = "update tb_aluno set cgm='$cgm', ano='$ano',turma='$turma',nome='$nome',nascimento='$nascimento',sexo='$sexo',situacaoMatricula='$situacao',dataMatricula='$matriculado',observacao='$observacao',dificuldade='$dificuldade',robotica='$robotica' where cgm = '$cgm'"; 
$result = mysqli_query($connection, $sql);
if($result){echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Atualizado com sucesso!!!")
			window.location="listar.php"	
		</SCRIPT>
	';}
}
//----------------------------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['cgm'])){
		$aluno = $_GET['cgm'];		
		$sql = "select * from tb_aluno where cgm = $aluno";
		$result = mysqli_query($connection, $sql);
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$i++;
      	$cgm = $row['cgm'];
      	$ano = $row['ano'];
      	$turma = $row['turma'];
			$nome = $row['nome'];
			$diaNascimento = date("d", strtotime($row['nascimento']));
			$mesNascimento = date("m", strtotime($row['nascimento']));
			$anoNascimento = date("Y", strtotime($row['nascimento']));
			$sexo = $row['sexo'];
			$situacao = $row['situacaoMatricula'];
			$diaMatricula = date("d", strtotime($row['dataMatricula']));
			$mesMatricula = date("m", strtotime($row['dataMatricula']));
			$anoMatricula = date("Y", strtotime($row['dataMatricula']));
			$observacao = $row['observacao'];
			$dificuldade = $row['dificuldade'];
			$robotica = $row['robotica'];
		}
	}
echo
	'<html>
	<head>
	<title>Cadastro de aluno</title>
	</head>
	<body>
		<div align="center"><h2>Cadastro de Aluno</h2><hr width="50%"><hr width="70%"></div>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="center">
					<br><table border="0">
						<tr>
							<td rowspan="7" align="center" width="315"><hr width="10%"><hr width="30%"><hr width="50%">
								<img src="../upload/logoMFT.jpg">
								<hr width="50%">
								<hr width="30%">
								<hr width="10%">
							</td>
						</tr>
						<tr>	
							<td align="right" width="116" >CGM: 
							</td>
							<td>
								<input style="text-align:center" type="text" size="10" name="textCGM" value="'.$cgm.'"> Ano:
								<input style="text-align:center" type="text" size="1" name="textAno" value="'.$ano.'"> Turma: 
								<input style="text-align:center" type="text" size="1" name="textTurma" value="'.$turma.'">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Aluno: 
							</td>
							<td>
								<input type="text" size="50" name="textNome" value="'.$nome.'">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Nascimento: 
							</td>
							<td>
								<input style="text-align:center" type="text" size="1" name="textDiaNascimento" value="'.$diaNascimento.'">
								<input style="text-align:center" type="text" size="1" name="textMesNascimento" value="'.$mesNascimento.'">
								<input style="text-align:center" type="text" size="3" name="textAnoNascimento" value="'.$anoNascimento.'"> 
								Dificuldade 
								<input style="text-align:center" type="text" size="1" name="dificuldade" value="'.$dificuldade.'">
								Robótica 
								<input style="text-align:center" type="text" size="1" name="robotica" value="'.$robotica.'">
							</td>
						</tr>
						<tr>
							<td align="right" width="116" style="text-align:center">
								<p style="text-align: right">Sexo: 
							</td>
							<td> 
								<input style="text-align:center" type="text" size="1" name="textSexo" maxlength="1" value="'.$sexo.'"> Situação da Matricula: 
								<input style="text-align:center" type="text" size="1" name="textSituacaoMatricula" maxlength="1" value="'.$situacao.'"> Data da Matricula: 
								<input style="text-align:center" type="text" size="1" name="textDiaMatricula" value="'.$diaMatricula.'">
								<input style="text-align:center" type="text" size="1" name="textMesMatricula" value="'.$mesMatricula.'">
								<input style="text-align:center" type="text" size="3" name="textAnoMatricula" value="'.$anoMatricula.'"> 
							</td>
						</tr>
						<tr>
							<td align="right" width="116" >Observações:</td>
							<td>
								<textarea rows="10" name="textObservacao" cols="50">'.$observacao.'</textarea>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" >
								&nbsp;</td>
							<td valign="top">
								<input type="submit" value="Salvar" name="btnSalvar"</center></td>
						</tr>
					</table>
					<h2>Dicas para Relatorios</h2>
					<div align="left">
						<ul>
						<b>Com base nos objetivos trabalhado no bimestre:</b>
							<li><b>O aluno não sabe</b> O aluno não adquiriu os conceitos, está em fase de aprendizado.</li>
							<li><b>Não tem limites</b> Apresenta dificuldades de auto-regulação, pois...</li>
							<li><b>É nervoso</b> Ainda não desenvolveu habilidades para convívio no ambiente escolar, pois...</li>
							<li><b>Tem o costume de roubar</b> Apresenta dificuldade de autocontrole, pois...</li>
							<li><b>É agressivo</b> Demonstra agressividade em situações de conflito. Usa meios físicos para alcançar o que deseja</li>
							<li><b>É bagunceiro, relaxado, porco</b> Ainda não desenvolveu hábitos próprios de higiene e de cuidado com seus pertences.</li>
							<li><b>Não sabe nada</b> Aprendeu algumas noções, mas necessita desenvolver...</li>
							<li><b>É largado da família</b> Aparenta ser desassistido pela família, pois...</li>
							<li><b>É desobediente</b> Costuma não aceitar e compreender as solicitações dos adultos, Tem dificuldades em cumprir regras.</li>
							<li><b>É apático, distraído</b> Ainda não demonstra interesse em participar das atividades propostas, Muitas vezes parece se desligar da realidade, envolvido em seus pensamentos.</li>
							<li><b>É mentiroso</b> Costuma utilizar inverdades para justificar seus atos ou relatar as atitudes dos colegas</li>
							<li><b>É fofoqueiro</b> Costuma se preocupar com os hábitos e atitudes dos colegas.</li>
							<li><b>É chiclete</b> É muito afetuoso, demonstra constantemente seu carinho...</li>
							<li><b>É sonso e dissimulado</b> Em situações de conflito coloca-se como expectador, mesmo quando está clara a sua participação.</li>
							<li><b>É preguiçoso</b> Não realiza as tarefas, aparentando desânimo e cansaço. Porém logo parte para as brincadeiras e outras atividades.</li>
							<li><b>É mimado</b> Aparenta desejar atenções diferenciadas para si, solicitando que sejam feitas todas as suas vontades.</li>
							<li><b>É deprimido, isolado, anti-social</b> Evita o contato e o diágolo com colegas e professores preferindo permanecer sozinho, Ainda não desenvolveu hábitos e atitudes próprias do convívio social.</li>
							<li><b>É tagarela</b> Costuma falar mais que o necessário, não respeitando os momentos em que o grupo necessita de silêncio.</li>
							<li><b>Tem a boca suja</b> Utiliza-se de palavras pouco cordiais para repelir ou afrontar.</li>
							<li><b>Possui distúrbio de comportamento</b> Apresenta comportamento fora do comum para sua idade e para o convívio em grupo, tais como...</li>
							<li><b>É egoísta</b> Ainda não sabe dividir o espaço e os materiais de forma coletiva</li>
							<li>Apresentou dificuldades de autorregulação, pois quer atenção o tempo todo, não respeitando a individualidade dos colegas. Demonstrou agressividade em situações de conflito; usa meios físicos para alcançar o que deseja. Costuma não aceitar e compreender as solicitações dos adultos; Tem dificuldades em cumprir regras.</li>
							<li>Apresentou grande autonomia, boa assimilação e fixação de conteúdo, realizando todas as atividades de maneira satisfatória. Destacou-se entre seus colegas de forma responsável, independente, participativa, apresentou bom comportamento e grande potencial.</li>
							<li>O aluno apresentou falta de interesse pelas atividades propostas, saindo da atividade e conversando o tempo todo. Costuma não aceitar e compreender as solicitações dos adultos. Tem dificuldades em cumprir regras.</li>
							<li>Apresentou dificuldades de auto-regulação, pois quer atenção o tempo todo, não respeitando a individualidade dos colegas. Demonstrou gressividade em situações de conflito; usa meios físicos para alcançar o que deseja. Costuma não aceitar e compreender as solicitações dos adultos; Tem dificuldades em cumprir regras.</li>
							<li>Costuma falar mais que o necessário, não respeitando os momentos em que o grupo necessita de silêncio, quando chamado sua atenção ignora completamente, sendo necessário faze-lo por varias vezes seguidas até conseguir que a mesma siga as instruções e regras do laboratório. </li>
						</ul>
					</div>
				</div>
		</form>
	</body>
</html>
';
}
?>