<?php
$dec = 0;
$hex = '';
$lin = 0;
echo'<table border="1" width="100%" style="border-collapse: collapse">';
//while ($lin <= 1000){
while ($dec <= 4294967295){
$lin++;
$col = 0;
echo'<tr>';
while ($col <= 10){
$dec = $dec+9;
$col++;
echo'<td width="100" bgcolor="#'.dechex($dec).'"><p align="center">'.$dec.' - #'.dechex($dec).'</td>';	
}
echo'</tr>';
}
echo'</table>';
?>
