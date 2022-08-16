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
			window.location="verConteudos.php"	
		</SCRIPT>
	';}
}
if (isset($_POST['excluir'])){
    $ID = $_SESSION['ID'];
        $sql = "delete from tb_planejamento where ID = $ID";
    $result = mysqli_query($connection, $sql);
    if($result){echo'
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert ("Exluido com sucesso!!!")
			window.location="verConteudos.php"	
		</SCRIPT>
	';}
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
		$sql = "select * from tb_planejamento where turma = $ano order by ID";
		$result = mysqli_query($connection, $sql);
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$i++;
      	$ID = $row['ID'];
      	$turma = $row['turma'];
        $_SESSION['turma'] = $turma;
        $conteudo = $conteudo.'<li>'.$row['ID'].' - '.$row['conteudo'].'</li>';
        $_SESSION['conteudo'] = $conteudo;
		$encaminhamento = $row['encaminhamento'];
        $objetivo = $row['objetivo'];
		}
	}
}
echo
	'<html>
	<head>
	<title>Ver Conteúdo</title>
	</head>
	<body>
		<div align="center">
                <a href="verConteudos.php?ano=0">Infantil V</a>
				<a href="verConteudos.php?ano=1">1º Ano</a>
				<a href="verConteudos.php?ano=2">2º Ano</a>
				<a href="verConteudos.php?ano=3">3º Ano</a>
				<a href="verConteudos.php?ano=4">4º Ano</a>
				<a href="verConteudos.php?ano=5">5º Ano</a>
        <h2>'.$_SESSION['titulo'].'</h2><hr width="70%">
			<hr width="70%">
            <h1>'.$tituloConteudo.'</h1>
            <div align="left"
            <ol>'.$_SESSION['conteudo'].'</ol>;
            </div>
        </div>
	</body>
</html>
';
/*
Infantil V
Foram trabalhado os seguintes conteúdos:
1º Ano
Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, Breve Histórico das Tecnologias,
Partes Externas de Um Computador, Manipulação do Mouse, Manipulação do Teclado, Como Manipular os Softwares Operacionais, Em Formato de Janelas,
2º Ano
Foram trabalhado os seguintes conteúdos:
3º Ano
Foram trabalhado os seguintes conteúdos:
4º Ano
Foram trabalhado os seguintes conteúdos:
5º Ano
Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, História da Tecnologia: o Homem e as Invenções Em Tecnologia da Informação e da Comunicação do Ábaco Ao Smartphone,Por Que Foram Inventados os Computadores; as Guerras e os Avanços Tecnológicos; História da Tecnologia no Brasil e na Educação, O Funcionamento dos Programas; Editores de Imagens; Editores de Áudio; Editores de Vídeo.
*/

?>
