<?php
include './conexao.php';
include './conf.php';
head();
menuVertical();
echo '
<div class="Body">
<div align="center"><h3>PLANEJAMENTO 2018</h3></div>
<form method="POST" action="?id=10" onchange="form.submit()"><div align="center"><table border="0" width="90%"><tr>
<td><div align="center"><fieldset style="padding: 2; width:88"><legend>Pré Escola</legend><div align="center"><input type="radio" value="pe" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 2; width:88"><legend>1º Ano    </legend><div align="center"><input type="radio" value="1a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 2; width:88"><legend>2º Ano    </legend><div align="center"><input type="radio" value="2a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 2; width:88"><legend>3º Ano    </legend><div align="center"><input type="radio" value="3a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 2; width:88"><legend>4º Ano    </legend><div align="center"><input type="radio" value="4a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 2; width:88"><legend>5º Ano    </legend><div align="center"><input type="radio" value="5a" name="R1" onchange="form.submit()"></fieldset></div></td>
</div></td></tr></table></form>
';
if (isset($_POST['R1']) && $_POST['R1'] != ''){
$ano = substr($_POST['R1'],0,1);
}
if ($ano==p){
include '../conteudo/pre.htm';
}
if ($ano==1){
include '../conteudo/1a.htm';
}
if ($ano==2){
include '../conteudo/2a.htm';
}
if ($ano==3){
include '../conteudo/3a.htm';
}
if ($ano==4){
include '../conteudo/4a.htm';
}
if ($ano==5){
include '../conteudo/5a.htm';
}
?>