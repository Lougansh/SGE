<?php
     $id = $_GET["id"];

     include 'conexao.php';
     $deleta = mysql_query("DELETE FROM tb_arquivo_morto WHERE id = $id");
    
     if($deleta){
         echo "O registro foi excluido";
 
     }else{
         echo "Infelizmente não foi possivel excluir";
    }
?>