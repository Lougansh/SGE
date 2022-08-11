<?php
include("conexao.php");
include("conf.php");
menu();
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
    //----------------------------PRE ESCOLA
    if ($situacaoMatricula == 'M' && $ano == 0 && $turma == 'A'){
        $alunosPreA++;
    }
    if ($situacaoMatricula == 'M' && $ano == 0 && $turma == 'B'){
        $alunosPreB++;
    }
    if ($situacaoMatricula == 'M' && $ano == 0 && $turma == 'C'){
        $alunosPreC++;
    }
    if ($situacaoMatricula == 'M' && $ano == 0 && $turma == 'D'){
        $alunosPreD++;
    } 
    //----------------------------1º ANO
    if ($situacaoMatricula == 'M' && $ano == 1 && $turma == 'A'){
        $alunos1A++;
    }
    if ($situacaoMatricula == 'M' && $ano == 1 && $turma == 'B'){
        $alunos1B++;
    }
    if ($situacaoMatricula == 'M' && $ano == 1 && $turma == 'C'){
        $alunos1C++;
    }
    if ($situacaoMatricula == 'M' && $ano == 1 && $turma == 'D'){
        $alunos1D++;
    }
    if ($situacaoMatricula == 'M' && $ano == 1 && $turma == 'E'){
        $alunos1E++;
    }
    //----------------------------2º ANO
    if ($situacaoMatricula == 'M' && $ano == 2 && $turma == 'A'){
        $alunos2A++;
    }
    if ($situacaoMatricula == 'M' && $ano == 2 && $turma == 'B'){
        $alunos2B++;
    }
    if ($situacaoMatricula == 'M' && $ano == 2 && $turma == 'C'){
        $alunos2C++;
    }
    if ($situacaoMatricula == 'M' && $ano == 2 && $turma == 'D'){
        $alunos2D++;
    }
    if ($situacaoMatricula == 'M' && $ano == 2 && $turma == 'E'){
        $alunos2E++;
    }
    //----------------------------3º ANO
    if ($situacaoMatricula == 'M' && $ano == 3 && $turma == 'A'){
        $alunos3A++;
    }
    if ($situacaoMatricula == 'M' && $ano == 3 && $turma == 'B'){
        $alunos3B++;
    }
    if ($situacaoMatricula == 'M' && $ano == 3 && $turma == 'C'){
        $alunos3C++;
    }
    if ($situacaoMatricula == 'M' && $ano == 3 && $turma == 'D'){
        $alunos3D++;
    }
    if ($situacaoMatricula == 'M' && $ano == 3 && $turma == 'E'){
        $alunos3E++;
    }
    //----------------------------4º ANO
    if ($situacaoMatricula == 'M' && $ano == 4 && $turma == 'A'){
        $alunos4A++;
    }
    if ($situacaoMatricula == 'M' && $ano == 4 && $turma == 'B'){
        $alunos4B++;
    }
    if ($situacaoMatricula == 'M' && $ano == 4 && $turma == 'C'){
        $alunos4C++;
    }
    if ($situacaoMatricula == 'M' && $ano == 4 && $turma == 'D'){
        $alunos4D++;
    }
    if ($situacaoMatricula == 'M' && $ano == 4 && $turma == 'E'){
        $alunos4E++;
    }
    //----------------------------5º ANO
    if ($situacaoMatricula == 'M' && $ano == 5 && $turma == 'A'){
        $alunos5A++;
    }
    if ($situacaoMatricula == 'M' && $ano == 5 && $turma == 'B'){
        $alunos5B++;
    }
    if ($situacaoMatricula == 'M' && $ano == 5 && $turma == 'C'){
        $alunos5C++;
    }
    if ($situacaoMatricula == 'M' && $ano == 5 && $turma == 'D'){
        $alunos5D++;
    }
    if ($situacaoMatricula == 'M' && $ano == 5 && $turma == 'E'){
        $alunos5E++;
    }
    if ($situacaoMatricula == 'M' && $ano == 5 && $turma == 'F'){
        $alunos5F++;
    }

}
    $listarTudo = '
        Total de alunos atendidos: '.$qtdeAlunos.'<br>
        Total de alunos da Educação Infantil atendidos: '.$qtdeAlunosEducacaoInfantil.'<br>
        Total de alunos do Ensino Fundamental atendidos: '.$qtdeAlunosEnsinoFundamental.'<br>
        <br>
        Total de alunos da Pré Escola - A: '.$alunosPreA.'<br>
        Total de alunos da Pré Escola - B: '.$alunosPreB.'<br>
        Total de alunos da Pré Escola - C: '.$alunosPreC.'<br>
        Total de alunos da Pré Escola - D: '.$alunosPreD.'<br>
        <br>
        Total de alunos do 1º - A : '.$alunos1A.'<br>
        Total de alunos do 1º - B : '.$alunos1B.'<br>
        Total de alunos do 1º - C : '.$alunos1C.'<br>
        Total de alunos do 1º - D : '.$alunos1D.'<br>
        Total de alunos do 1º - E : '.$alunos1E.'<br>
        <br>
        Total de alunos do 2º - A : '.$alunos2A.'<br>
        Total de alunos do 2º - B : '.$alunos2B.'<br>
        Total de alunos do 2º - C : '.$alunos2C.'<br>
        Total de alunos do 2º - D : '.$alunos2D.'<br>
        Total de alunos do 2º - E : '.$alunos2E.'<br>
        <br>
        Total de alunos do 3º - A : '.$alunos3A.'<br>
        Total de alunos do 3º - B : '.$alunos3B.'<br>
        Total de alunos do 3º - C : '.$alunos3C.'<br>
        Total de alunos do 3º - D : '.$alunos3D.'<br>
        <br>
        Total de alunos do 4º - A : '.$alunos4A.'<br>
        Total de alunos do 4º - B : '.$alunos4B.'<br>
        Total de alunos do 4º - C : '.$alunos4C.'<br>
        Total de alunos do 4º - D : '.$alunos4D.'<br>
        <br>
        Total de alunos do 5º - A : '.$alunos5A.'<br>
        Total de alunos do 5º - B : '.$alunos5B.'<br>
        Total de alunos do 5º - C : '.$alunos5C.'<br>
        Total de alunos do 5º - D : '.$alunos5D.'<br>
        Total de alunos do 5º - E : '.$alunos5E.'<br>
        Total de alunos do 5º - F : '.$alunos5F.'<br>
        <br>        
    ';    
?>