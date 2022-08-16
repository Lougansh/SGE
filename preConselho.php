<?php
include("conexao.php");
include("conf.php");
//include("retornoDados.php");
menu();
//----------------------------------------------------------------------
$sql = "select * from tb_aluno where situacaoMatricula = 'M' order by ano, turma, nome";		
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    $ID = $row['ID'];
    $ano = $row['ano'];
    $turma = $row['turma'];
    $nome = $row['nome'];
    $nascimentp = $row['nascimento'];
    $sexo = $row['sexo'];
    $status = $row['status'];
    $situacaoMatricula = $row['situacaoMatricula'];
    $dataMatricula = $row['dataMatricula'];
    $observacao = $row['observacao'];
    if ($situacaoMatricula == 'M'){
        $qtdeAlunos++;
    }
    if ($situacaoMatricula == 'M' && $ano == 0){
        $qtdeAlunosEducacaoInfantil++;
    }
    if ($situacaoMatricula == 'M' && $ano >= 1){
        $qtdeAlunosEnsinoFundamental++;
    }
}
//----------------------------------------------------------------------

$sqlTurma = "select * from tb_turma where status = 'A' order by ano, turma";		
$resultTurma = mysqli_query($connection, $sqlTurma);
$CT=[
    'Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, Breve Histórico das Tecnologias, Partes Externas de Um Computador, Manipulação do Mouse, Manipulação do Teclado, Como Manipular os Softwares Operacionais, Em Formato de Janelas.',
    'Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, Breve Histórico das Tecnologias, Partes Externas de Um Computador, Manipulação do Mouse, Manipulação do Teclado, Como Manipular os Softwares Operacionais, Em Formato de Janelas.',
    'Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, História da Tecnologia: O Homem e as Invenções Em Tecnologia de Comunicação Digital, Conceitos Básicos para o Funcionamento do Computador, da Internet, Modos de Salvamento, Arquivamento e Captura, O Computador Em Sua Estrutura e Possibilidades, O Funcionamento dos Programas.',
    'Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, Breve História das Tecnologias; de Onde Vieram os Computadores; Onde São Usados os Computadores, Tipos de Computadores; Partes Externas de Um Computador, Manipulação do Teclado; Manipulação do Mouse, Introdução Aos Principais Sistemas Operacionais (reconhecimento); Como Ligar/desligar o Computador, Como Executar Programas Instalados no Computador; Programas Tecnológicos Adequados à Execução dos Projetos Estabelecidos, Introdução a Navegação na Internet.',
    'Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, História da Tecnologia: o Homem e as Invenções Em Tecnologia da Informação e da Comunicação do Ábaco Ao Smartphone, Por Que Foram Inventados os Computadores; as Guerras e os Avanços Tecnológicos; História da Tecnologia no Brasil e na Educação, O Computador – Sua Estrutura e Possibilidades; Partes Internas de Um Computador; Hardware e Software, Como Se Comunicam; Como Identificar Um Computador e Suas Capacidades.',
    'Foram trabalhado os seguintes conteúdos: Sistematização das Regras do Laboratório de Informática, História da Tecnologia: o Homem e as Invenções Em Tecnologia da Informação e da Comunicação do Ábaco Ao Smartphone,Por Que Foram Inventados os Computadores; as Guerras e os Avanços Tecnológicos; História da Tecnologia no Brasil e na Educação, O Funcionamento dos Programas; Editores de Imagens; Editores de Áudio; Editores de Vídeo.',
];
while($rowTurma = mysqli_fetch_array($resultTurma,MYSQLI_ASSOC)) {
    $ID = $rowTurma['ID'];
    $turma = $rowTurma['turma'];
    $ano = $rowTurma['ano'];
    $status = $rowTurma['status'];
    $obs = '<font color="red">'.$rowTurma['obs'].' '.$CT[$ano].' </font>';
    $texto = $texto.$obs;
    $sqlAluno = "select * from tb_aluno where ano = $ano and turma = '$turma' and situacaoMatricula = 'M' and observacao <> '' and dificuldade = 'S' order by nome";		
    $resultAluno = mysqli_query($connection, $sqlAluno);
    
        while($rowAluno = mysqli_fetch_array($resultAluno,MYSQLI_ASSOC)) {
        $cgm = $rowAluno['cgm'];
		$ano = $rowAluno['ano'];
		$turma = $rowAluno['turma'];
		$nome = '<font color="blue"><b>'.$rowAluno['nome'].' </b></font>';
		$diaNascimento = date("d", strtotime($rowAluno['nascimento']));
		$mesNascimento = date("m", strtotime($rowAluno['nascimento']));
		$anoNascimento = date("Y", strtotime($rowAluno['nascimento']));
		$sexo = $rowAluno['sexo'];
		$situacao = $rowAluno['situacaoMatricula'];
		$diaMatricula = date("d", strtotime($rowAluno['dataMatricula']));
		$mesMatricula = date("m", strtotime($rowAluno['dataMatricula']));
		$anoMatricula = date("Y", strtotime($rowAluno['dataMatricula']));
        $observacao = '<font color="black">'.$rowAluno['observacao'].' </font>';
        $texto = $texto.$nome.' '.$observacao;
        }
        //-----------------------------------------------------------
}
echo'
<html>
<head><title>Pré Conselho Informática Educacional</title></head>
<body>
<h1 align="center">PRÉ CONSELHO</h1>
<h3 align="center">INFORMÁTICA EDUCACIONAL</h3>
<p align="justify">
A Informática Educacional atende na escola Adolival Pian '.$qtdeAlunos.', alunos sendo '.$qtdeAlunosEnsinoFundamental.' alunos, do Ensino 
fundamental e '.$qtdeAlunosEducacaoInfantil.' alunos, da educação infantil. As aulas ocorrem uma vez por semana num periodo de 40 minutos. 
Os conteúdos ministrados seguem o planejamento da Secretaria de Educação, conforme instruções recebidas.
'.$texto.'; 
</p>
</body>
</html>
';
?>