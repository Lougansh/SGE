<?php
if (isset($_POST['Login'])) {
require "conexao.php";
session_start();
$Login = $_POST['Login'];
$Senha = sha1($_POST['Senha']);
if (!$Login || !$Senha) {
echo "<script> alert('Preencha todos os campos'); window.setTimeout(\"location.href='login.php'\",5)</script>";
exit;
}
$SQL = "SELECT * FROM tb_login WHERE login = '$Login' and senha = '$Senha'";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);
if ($total) {
$dados = @mysql_fetch_array($result_id);
if (!strcmp($Senha, $dados['Senha'])) {
$_SESSION["Login"] = $dados['Login'];
$_SESSION["Usuario"] = $dados['Usuario'];
echo "<script>window.setTimeout(\"location.href='index.php'\",3)</script>"; exit; } 
} else {
echo "<script> alert('Login ou Senha incorreto'); window.setTimeout(\"location.href='login.php'\",3)</script>";
exit;
}
}
?>
<style type="text/css">
div.contorno {
background-color:#88ccff;
border:1px solid #888;
height: 140px; width: 420px;
position: absolute; left: 50%; top: 50%; margin-left:-200px; margin-top:-50px;
-moz-border-radius:5px; -webkit-border-radius:7px; border-radius:7px;
}
fieldset {
font-weight: bold;color: blue; font-size:20px; font-style:oblique;
background-color:#99ccff;
padding: 6px 0px 19px 0px;
height: 100px; width: 400px;
position: absolute; left: 50%; top: 50%; margin-left:-200px; margin-top:-70px;
-moz-border-radius:10px; -webkit-border-radius:7px; border-radius:7px;
}    
div.cpf {
font-weight: bold;color: gray; font-size:12px; font-style:oblique;
height: 140px; width: 420px;
position: absolute; top: 50%; margin-left:78px; margin-top:-10px;
}    
div.cpfText {
font-weight: bold;color: gray; font-size:12px; font-style:oblique;
height: 140px; width: 420px;
position: absolute; left: 50%; top: 50%; margin-left:-90px; margin-top:-15px;
}
div.Senha {
font-weight: bold;color: gray; font-size:12px; font-style:oblique;
height: 180px; width: 420px;
position: absolute; top: 50%; margin-left:60px; margin-top:15px;
}
div.SenhaText {
font-weight: bold;color: gray; font-size:12px; font-style:oblique;
height: 180px; width: 420px;
position: absolute; left: 50%; top: 50%; margin-left:-90px; margin-top:10px;
}
div.Login {
height: 20px; width: 100px;
position: absolute; left: 52%; top: 50%;margin-left:80px; margin-top:-5px;
}    
<?php
/*body {
IE9 SVG, needs conditional override of 'filter' to 'none' 
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiMxZTU3OTkiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjN2RiOWU4IiBzdG9wLW9wYWNpdHk9IjAiLz4KICA8L3JhZGlhbEdyYWRpZW50PgogIDxyZWN0IHg9Ii01MCIgeT0iLTUwIiB3aWR0aD0iMTAxIiBoZWlnaHQ9IjEwMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-radial-gradient(center, ellipse cover,  rgba(30,87,153,1) 0%, rgba(125,185,232,0) 100%); 
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,0))); 
background: -webkit-radial-gradient(center, ellipse cover,  rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: -o-radial-gradient(center, ellipse cover,  rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: -ms-radial-gradient(center, ellipse cover,  rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: radial-gradient(ellipse at center,  rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#007db9e8',GradientType=1 ); 
*/
if(empty($_SESSION['Login'])){
echo'
</style>
<form method="POST" action="login.php">
<div class="contorno"><fieldset>
<legend>Sistema de Autenticação</legend>
<div class="cpf"><label>CPF:</label></div><div class="cpfText"><input type="text" name="Login" size="20" maxlength="11"></div>
<div class="Senha"><label>SENHA:</label></div><div class="SenhaText"><input type="password" name="Senha" size="20" maxlength="10"></div>
<div class="Login"><input type="image" src="../images/btn_login.gif" value="Logar" name="B1"/> <a href="index.php"><img src="../images/sair.gif"></a></div>
</fieldset></div>
</form>';
}else{
echo'
Usuário Logado...
';
//echo "<script> alert('Usuário logado'); window.setTimeout(\"location.href='menu.php'\",3)</script>";
}
?>