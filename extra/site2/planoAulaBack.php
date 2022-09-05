<?php
include './conexao.php';
include './conf.php';
head();
menuVertical();
echo '
<div class="Body"><form method="POST" action="?id=18" onchange="form.submit()"><p align="right"><select size="1" name="dropAula" onchange="form.submit()">
<option value="00" selected>Aula...</option>
<option value="21">Aula 21</option>
<option value="20">Aula 20</option>
<option value="19">Aula 19</option>
<option value="18">Aula 18</option>
<option value="17">Aula 17</option>
<option value="16">Aula 16</option>
<option value="15">Aula 15</option>
<option value="14">Aula 14</option>
<option value="13">Aula 13</option>
<option value="12">Aula 12</option>
<option value="11">Aula 11</option>
<option value="10">Aula 10</option>
<option value="09">Aula 09</option>
<option value="08">Aula 08</option>
<option value="07">Aula 07</option>
<option value="06">Aula 06</option>
<option value="05">Aula 05</option>
<option value="04">Aula 04</option>
<option value="03">Aula 03</option>
<option value="02">Aula 02</option>
<option value="01">Aula 01</option></select></p></form>
'; 
if (isset($_POST['dropAula']) ) {
$aula = $_POST['dropAula'];
include 'aulas/aula'.$aula.'.php'; 
}else{
include 'aulas/aula00.php';
}
?>