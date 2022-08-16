<?php
session_start();
include("conexao.php");
include("conf.php");
menu();
//Sei la pqp kct
if (isset($_POST['Lista']) && $_POST['Lista'] != ''){
$ano = $_POST['Lista'];
    $sql = "select * from tb_planejamento where turma = '$ano' order by ID";
    $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $i++;
            $montaLista  = $montaLista.'
            <input type="checkbox" name= "ID[]" value="'.$row['ID'].'">
            '. $row['conteudo'] .' '<br>';
        }
        <input type="submit" value="Excluir" name="excluir" onchange="form.submit()">';
    }
    $_SESSION["formulario"] = $montaLista;
}	
if (isset($_POST['enviar'])) {
    $ID = $_POST['ID'];
    
    foreach($_POST['ID'] AS $key => $value){
    $sql = "delete * from tb_aluno where ID = $value";
    $result = mysqli_query($connection, $sql);
    }
    echo'<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("Excluido comn sucesso")</SCRIPT>';
    echo "<script>window.setTimeout(\"location.href=deletaConteudo.php'\",1)</script>";
    }
	echo '
	<html>
		<head><title>Manutençao de Conteudos</title></head>
		<body>	
			<form method="POST" action="?id=aproveitamento" onchange="form.submit()">
				<div align="center"><h2>Manutenção de Conteudos</h2>
                <input type="radio" value="0" name="Lista" onchange="form.submit()">Infantil
                <input type="radio" value="1" name="Lista" onchange="form.submit()">1ºAno
                <input type="radio" value="2" name="Lista" onchange="form.submit()">2ºAno
                <input type="radio" value="3" name="Lista" onchange="form.submit()">3ºAno
                <input type="radio" value="4" name="Lista" onchange="form.submit()">4ºAno
                <input type="radio" value="5" name="Lista" onchange="form.submit()">5ºAno
                <hr width="50%"><hr width="70%"></div>
				<div align="left">
				'.$_SESSION["formulario"].'
				</div>
			</form>
		</body>
	</html>
	';
?>