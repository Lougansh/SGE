<?php 
session_start();
include './conexao.php';
include './conf.php';
menu();
$dicasOcorrencia = 
'
O aluno não adquiriu os conceitos, está em fase de aprendizado. <br>
Ainda não desenvolveu habilidades para convívio no ambiente escolar, pois agride outros alunos. <br>
Apresentou dificuldade de autocontrole, pois tomou para si algo que não lhe pertencia. <br>
Demonstrou agressividade em situações de conflito. Usando meios físicos para alcançar o que deseja. <br>
Foi observado que ainda não desenvolveu hábitos próprios de higiene e de cuidado com seus pertences. <br>
Aparentou ser desassistido pela família, pois usa palavras de baixo calão. <br>
Não aceitou ou compreendeu as solicitações do professor. <br>
Não quis cumprir as regras estabelecidas para o uso do laboratório. <br>
Não demonstrou interesse em participar das atividades propostas, até pareceu se desligar da realidade, envolvido em seus pensamentos. <br>
Utilizou inverdades para justificar seus atos ou relatar as atitudes dos colegas. <br>
Costuma se preocupar com os hábitos e atitudes dos colegas ou invés de fazer suas atividades. <br>
Em situações de conflito colocou-se como espectador, mesmo quando estava clara a sua participação. <br>
Não realizou as tarefas, aparentando desânimo e cansaço. Porém logo partiu para as brincadeiras e outras atividades. <br>
O tempo todo deseja atenções diferenciadas para si, solicitando que sejam feitas todas as suas vontades. <br>
Costuma falar mais que o necessário, não respeitando os momentos em que o grupo necessita de silêncio. <br>
Utilizou palavras pouco cordiais para afrontar seus colegas. <br>
Apresentou comportamento fora do comum para sua idade e para o convívio em grupo. <br>
Não soube dividir o espaço e os materiais de forma coletiva.
';
$dicasOcorrencia = str_replace('<br>', "\r", $dicasOcorrencia);
//------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['cgm'])){
		$cgm = $_GET['cgm'];		
		$sql = "select * from tb_aluno where cgm = $cgm";
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
        $ocorrencia = $row['ocorrencia'];
        $dificuldade = $row['dificuldade'];
        $robotica = $row['robotica'];
		}
	}
}
$inicio = $hoje.' - '.$nome.'.';
//------------------------------------------------------------------------------------------------------------
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
    $ocorrencia = $_POST['ocorrencia'];
    $dificuldade = $_POST['dificuldade'];
    $robotica = $_POST['robotica'];

    $sql = "update tb_aluno set ocorrencia='$ocorrencia' where cgm = '$cgm'"; 
    $result = mysqli_query($connection, $sql);
    if($result){echo'
        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert ("Ocorrência registrada com sucesso!!!")
            window.location.href = "https://wa.me/45999941833?text='.$ocorrencia.'";
        </SCRIPT>
    ';
    }
}
//------------------------------------------------------------------------------------------------------------
echo
	'<html>
	<head>
	<title>Registro de Ocorrências</title>
	</head>
	<body>
		<div align="center"><h2>Registro de Ocorrência</h2><hr width="50%"><hr width="70%"></div>
			<form method="POST" action="?id=18" onchange="form.submit()">
				<div align="center">
					<br><table border="0">
						<tr>
							<td rowspan="7" align="center" width="315">
                                <hr width="10%"><hr width="30%"><hr width="50%">
                                <img src="../uploads/logoNew.png" width="100">
                                <hr width="50%"><hr width="30%"><hr width="10%">
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
							<td align="right" width="116" >Ocorrências:</td>
							<td>
								<textarea rows="10" name="ocorrencia" cols="50">'.$ocorrencia.$inicio.'</textarea>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" >
								&nbsp;</td>
							<td valign="top">
								<input type="submit" value="Salvar" name="btnSalvar"</center></td>
						</tr>
					</table>
					<h2>Dicas para ocorrências</h2>
					<div align="center">
                    <textarea rows="10" name="dicasOcorrencia" cols="150">
                    '.$dicasOcorrencia.'
                        
                    </textarea>
					</div>
				</div>
		</form>
	</body>
</html>
';
?>