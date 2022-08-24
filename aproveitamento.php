<?php
session_start();
include("conexao.php");
include("conf.php");
menu();
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = substr($_POST['Lista'],0,1);
$turma = substr($_POST['Lista'],1,1);
    if ($ano >=0 && $turma != 'U'){
    $titulo = $ano.'º Ano '.$turma;
    if($ano=='L') {
    $sql = "select * from tb_aluno where situacaoMatricula = 'M' order by ano, turma, nome asc";
    }else{
        $sql = "select * from tb_aluno where ano = '$ano' and turma = '$turma' and situacaoMatricula = 'M' order by nome asc";
    }
    $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $i++;
            $montaLista  = $montaLista.'
            <input type="checkbox" name= "cgm[]" value="'.$row['cgm'].'">
            '. $row['nome'] .'<br>';
        }
        $turmaQTDE = $titulo.' - '.$i.' alunos';
        $formulario =  $montaLista.'
        <center><textArea name="observacao" rows="4" cols="50"></textArea><br>
        <input type="submit" value="Enviar" name="enviar" onchange="form.submit()"></center>';
        $_SESSION["formulario"] = $formulario;
        $_SESSION["anoTurma"] = $ano.'º'.$turma;
        $_SESSION["turmaQTDE"] = $turmaQTDE;
    }
}	
if (isset($_POST['enviar'])) {
    $observacaoAtual = $_POST['observacao'];
    
    foreach($_POST['cgm'] AS $key => $value){
    $sql = "select * from tb_aluno where cgm = $value";
    $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $observacao = $row['observacao'];
            $observacao = $observacao.' '.$observacaoAtual;
        }        
    $sqlUpdate = "update tb_aluno set observacao = '$observacao' where cgm = $value";
    $resultUpdate = mysqli_query($connection, $sqlUpdate);
    }
    echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Aproveitamento atualizado com sucesso")</SCRIPT>';
    echo "<script>window.setTimeout(\"location.href=aproveitamento.php'\",1)</script>";
    }
	echo '
	<html>
		<head><title> Lista de alunos '.$_SESSION["anoTurma"].'</title></head>
		<body>	
			<form method="POST" action="?id=aproveitamento" onchange="form.submit()">
				<div align="center"><h2>Aproveitamento de Alunos'.$mostraCaixaSuspensa.'</h2>'.$_SESSION["turmaQTDE"].'
                <hr width="50%">
                '.$hoje.'
                <hr width="70%"></div>
				<div align="left">
				'.$_SESSION["formulario"].'
				</div>
			</form>
		</body>
	</html>
	';
?>