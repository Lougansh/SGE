<?php
$host = "localhost";
$usuario = "everaldo";
$senha = "slackware";
$banco = "adolival";

//$mysqli = new mysqli($host, $usuario, $senha, $banco);
$connection = mysqli_connect($host, $usuario, $senha, $banco);

if (mysqli_connect_errno()) {
  echo "Falhou ao conectar ao banco: " . mysqli_connect_error();
  exit();
}
?>