<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
//Configuracao do Banco
//==============================
//header('Content-Type: text/html; charset=utf-8');
header('Content-Type: text/html; charset=windows-1252');
$servidor = "localhost";
$banco = "u491843745_prof";
$usuario = "u491843745_prof";
$senha = "slackware";
//===============================
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
mysql_connect("$servidor", "$usuario", "$senha") or die("Erro MySql_Connect :(");
mysql_select_db("$banco") or die("Erro MySqls select_db :(");
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>
