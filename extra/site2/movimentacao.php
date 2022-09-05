<script>
function enviarForm() {
  document.nomeDoForm.action = "./master.php";
  abreFormEnviado();
  document.nomeDoForm.target = "formulario";
  document.nomeDoForm.submit();
}
function abreFormEnviado() {
  var newwin = window.open("", "formulario", 'width=900, height=700, scrollbars=no, toolbar=no, location=no, status=no, menubar=no, resizable=yes, left=0, top=0');
  newwin.focus();
}
</script>
<?php
include './conexao.php';
include './conf.php';
menuA();
$titulo =  'Relatorio de Movimentações no Bando de Dados';
echo '<form method="POST" action="formulario" name= "nomeDoForm" id="15">';
$sql = "select * from tb_aluno where movimentacao > '2016-12-31' and ano <= 5 order by movimentacao, Nome desc";

//---------------------------------------------------------------------------------------
$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
$i = 0;
$date = new DateTime( $linha['Nascimento'] );
$tabela = '
	<tr>
		<td width="15%" bgcolor="red" align="center">Matricula</td>
		<td width="30%" bgcolor="red" align="center">Nome</td>
		<td width="10%" bgcolor="red" align="center">Nascimento</td>
		<td width="10%" bgcolor="red" align="center">Sexo</td>
		<td width="10%" bgcolor="red" align="center">Contato</td>
		<td width="5%"  bgcolor="red" align="center">Turma</td>
		<td width="10%"  bgcolor="red" align="center">Movimentação</td>
		<td width="10%"  bgcolor="red" align="center">Tipo</td>
	</tr>
';
while ($linha = mysql_fetch_array($query)) {
if ($linha['Ano']==0){$ano = PRE;} else {$ano = $linha['Ano'];}
if ($linha['Sexo']=='M'){$sexo = Masculino;}else{$sexo = Feminino;}
if ($linha['Tipo']=='T'){$tipo = Transferido;}else{$tipo = Matriculado;}
$i++;
//$menuFotos = '<button style="color: gray; border: 2px inset gray" value="' . $linha['ID'] . '" onClick="javascript:enviarForm();" name="dropSelecionar" title="'.$linha['Nome'].'"><img src="../images/alunos/'.$linha['ID'].'.JPG" width="80" height="100"></button>'.$menuFotos;
//<a href=http://meusite.com/teste.html onclick="fazAlgumaCoisa();return false;">Link de teste</a>

$lista = '
	<tr>
		<td width="15%" bgcolor="#C0C0C0"><p align="center">'.$linha['ID'].'</td>
		<td width="30%" bgcolor="#C0C0C0"><button style="color: gray; border: 2px inset gray" name = "dropSelecionar" value="' . $linha['ID'] . '" onClick="javascript:enviarForm();">'.$linha['Nome'].'</td>
		<td width="10%" bgcolor="#C0C0C0" align="center">'.date('d/m/Y', strtotime($linha['Nascimento'])).'</td>
		<td width="10%" bgcolor="#C0C0C0" align="center">'.$sexo.'</td>
		<td width="10%" bgcolor="#C0C0C0" align="right">'.$linha['Telefone'].'</td>
		<td width="5%"  bgcolor="#C0C0C0" align="center">'.$ano.$linha['Turma'].'</td>
		<td width="10%"  bgcolor="#C0C0C0" align="center">'.date('d/m/Y', strtotime($linha['Movimentacao'])).'</td>
		<td width="10%"  bgcolor="#C0C0C0" align="center">'.$tipo.'</td>
	</tr>
	'.$lista;
}
echo $titulo.': '.$i.' alunos encontrados com essa pesquisa.<table border="1" width="100%">'.$tabela.'<hr>'.$lista.'</table>';
?>
