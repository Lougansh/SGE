<?php
   include './conexao.php';
   include './conf.php';
   head();
   menuVertical();
   $sql = "select * from tb_login";
   $query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
   $mostraLogin = '';
   while ($linha = mysql_fetch_array($query)) {
   	$mostraLogin = '<li>'.$linha[Usuario].' / '.$linha[Login].'</li>'.$mostraLogin;
   }
   
   if (isset($_POST['btnCriar'])){
	$usuario = $_POST['textUsuario'];
   	$login = $_POST['textLogin'];
   	$senha = sha1($_POST['textSenha']);
   	$sql = "insert into tb_login (Usuario, Login, Senha) values ('$usuario', '$login', '$senha')"; 
   	$query = mysql_query($sql); 
   	if($query){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="gerenciaLogin.php">';}
	//echo 'Teste:'.$usuario.$login.$senha;
   }
   if (isset($_POST['btnAlterar'])){
   	$login = $_POST['textLoginAlterar'];
   	$senha = sha1($_POST['textSenhaAlterar']);
   	$sql = "update tb_login set Senha = '$senha' where Login = '$login'"; 
   	$query = mysql_query($sql); 
   	if($query){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="gerenciaLogin.php">';}
   }
   if (isset($_POST['btnExcluir'])){
   	$login = $_POST['textExcluir'];
   	$sql = "delete from  tb_login where Login = '$login'"; 
   	$query = mysql_query($sql); 
   	if($query){echo'<meta HTTP-EQUIV="refresh" CONTENT= "1"; URL="gerenciaLogin.php">';}
   }
   ?>
<head>
   <meta http-equiv="Content-Language" content="pt-br">
</head>
<div class="Body">
<div align="center">
<h1>GERENCIADOR DE LOGIN</h1>
<form method="POST" action="gerenciaLogin.php">
   <table border="0" width="100%">
      <tr>
         <td width="50%" align="center">
            <fieldset align="left" style="padding: 2; width:550; height:100px">
               <legend>Criar Login</legend>
               <div align="center">
                  <table border="0" width="70%">
                     <tr>
                        <td align="right" width="55">USUARIO:</td>
                        <td width="218">
                           <input name="textUsuario" size="30" style="float: right" value="">
                        </td>
                        <td width="61" rowspan="3">
                           <p align="center">
                              <input type="submit" value="CRIAR" name="btnCriar">
                        </td>
                     </tr>
                     <tr>
                        <td align="right" width="55">CPF:</td>
                        <td width="218">
                           <input name="textLogin" size="30" maxlength="11" style="float: right" value="">
                        </td>
                     </tr>
                     <tr>
                        <td align="right" width="55">SENHA:</td>
                        <td width="218">
                           <input type="password" name="textSenha" size="30" style="float: right" value="">
                        </td>
                     </tr>
                  </table>
               </div>
            </fieldset>
         </td>
         <td width="50%" align="center">
            <fieldset align="left" style="padding: 2; width:550; height:100px">
               <legend>Alterar Login</legend>
               <div align="center">
                  <table border="0" width="70%">
                     <tr>
                        <td align="right" width="55">CPF:</td>
                        <td width="218">
                           <input type="text" name="textLoginAlterar" size="30" maxlength="11">
                        </td>
                        <td width="61" rowspan="2">
                           <p align="center">
                              <input type="submit" value="ALTERAR" name="btnAlterar">
                        </td>
                     </tr>
                     <tr>
                        <td align="right" width="55">SENHA:</td>
                        <td width="218">
                           <input type="password" name="textSenhaAlterar" size="30">
                        </td>
                     </tr>
                  </table>
               </div>
            </fieldset>
         </td>
      </tr>
      <tr>
         <td width="50%" align="center">
            <fieldset align="left" style="padding: 2; width:550px; height:150px">
               <legend>Excluir Login</legend>
               <div align="center">
                  <table border="0" width="70%">
                     <tr>
                        <td align="right" width="55">CPF:</td>
                        <td width="218">
                           <input type="text" name="textExcluir" size="30" maxlength="11">
                        </td>
                        <td width="61">
                           <p align="center">
                              <input type="submit" value="EXCLUIR" name="btnExcluir">
                        </td>
                     </tr>
                  </table>
               </div>
            </fieldset>
         </td>
         <td width="50%" align="center">
            <fieldset align="left" style="padding: 2; width:550; height:150px">
               <legend align="left">Listar Usuarios</legend>
               <div align="center">
                  <table border="0" width="70%">
                     <tr>
                        <td align="left" width="334"><?php echo $mostraLogin;?></td>
                     </tr>
                  </table>
               </div>
               <p></p>
            </fieldset>
         </td>
      </tr>
   </table>
</form>