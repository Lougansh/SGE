<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
include './conexao.php';
include './conf.php';
menu();
if (isset($_POST['atualizar'])){
    $ID = $_SESSION['ID'];
    $encaminhamento = $_POST['encaminhamento'];
    $objetivo = $_POST['objetivo'];
    $recurso = $_POST['recurso'];

    $sql = "update tb_planejamento set encaminhamento = '$encaminhamento', objetivo =  '$objetivo', recurso =  '$recurso' where ID = $ID";
    $result = mysqli_query($connection, $sql);
    if($result){echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Atualizado com sucesso!!!")
			window.location="turma.php"	
		</SCRIPT>
	';}
}
//----------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['conteudo']) && $_POST['conteudo'] != ''){
    $ID = $_POST['conteudo'];
    $sql = "select * from tb_planejamento where ID = '$ID'";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $i++;
        $ID = $row['ID'];
        $_SESSION['ID'] = $ID;
        $turma = $row['turma'];
        $conteudo = $conteudo.'<option value="'.$row['ID'].'">'.$row['ID'].' - '.$row['conteudo'].'</option>';
        $encaminhamento = $row['encaminhamento'];
        $objetivo = $row['objetivo'];
        $recurso = $row['recurso'];
        $tituloConteudo = $row['conteudo'];
    }
    $planejamento = 0;    
}
//----------------------------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD']=='GET') {
	if(isset($_GET['ano'])){
		$_SESSION['ano'] = $_GET['ano'];
        $ano = $_SESSION['ano'];	
        if ($ano == 0){
        $_SESSION['titulo'] = 'Planejamento do Infantil V';
        }else{
        $_SESSION['titulo'] = 'Planejamento do '.$_SESSION['ano'].'º Ano.';
        }
		$sql = "select * from tb_planejamento where turma = $ano";
		$result = mysqli_query($connection, $sql);
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$i++;
      	$ID = $row['ID'];
      	$turma = $row['turma'];
        $_SESSION['turma'] = $turma;
        $conteudo = $conteudo.'<option value="'.$row['ID'].'">'.$i.' - '.$row['conteudo'].'</option>';
        $_SESSION['conteudo'] = $conteudo;
		$encaminhamento = $row['encaminhamento'];
        $objetivo = $row['objetivo'];
		}
	}
}
echo
	'<html>
	<head>
	<title>Editar Planejamento</title>
	</head>
	<body>
		<div align="center">
        <a href="editarPlanejamento.php?ano=0">Infantil V</a>
				<a href="editarPlanejamento.php?ano=1">1º Ano</a>
				<a href="editarPlanejamento.php?ano=2">2º Ano</a>
				<a href="editarPlanejamento.php?ano=3">3º Ano</a>
				<a href="editarPlanejamento.php?ano=4">4º Ano</a>
				<a href="editarPlanejamento.php?ano=5">5º Ano</a>
        <h2>'.$_SESSION['titulo'].'</h2><hr width="70%">
			<form method="POST" action="?ano='.$ano.'" onchange="form.submit()">
			<select style="width:800px;" size="1" name="conteudo" onchange="form.submit()">
            <option></option><option value="'.$row['ID'].'">'.$row['ID'].' - '.$row['conteudo'].'</option>'.$_SESSION['conteudo'].'</select>
            <input type="submit" value="Atualizar" name="atualizar"><hr width="70%">
            <br><h1>'.$tituloConteudo.'</h1><br>Objetivos:<br>
            <textarea rows="5"  name="objetivo" cols="100">'.$objetivo.'</textarea>
            <br>Encaminhamentos:<br>
            <textarea rows="5"  name="encaminhamento" cols="100">'.$encaminhamento.'</textarea>
            <br>Recursos:<br>
            <textarea rows="5"  name="recurso" cols="100">'.$recurso.'</textarea>
		    </form>
        </div>
	</body>
</html>
';
?>
