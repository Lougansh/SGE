<?php
include './conexao.php';
include './conf.php';
head();
//menuVertical();
echo '
<div align="center"><h3>PLANEJAMENTO 2018</h3></div>
<form method="POST" action="?id=10" onchange="form.submit()"><div align="center">
<table border="0" width="90%"><tr>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>Pré Escola</legend><div align="center"><input type="radio" value="0a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>1º Ano    </legend><div align="center"><input type="radio" value="1a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>2º Ano    </legend><div align="center"><input type="radio" value="2a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>3º Ano    </legend><div align="center"><input type="radio" value="3a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>4º Ano    </legend><div align="center"><input type="radio" value="4a" name="R1" onchange="form.submit()"></fieldset></div></td>
<td><div align="center"><fieldset style="padding: 1; width:80"><legend>5º Ano    </legend><div align="center"><input type="radio" value="5a" name="R1" onchange="form.submit()"></fieldset></div></td>
</div></td></tr></table></form>
';
if (isset($_POST['R1']) && $_POST['R1'] != ''){
    $ano = substr($_POST['R1'],0,1);
	$sql = 'SELECT * from tb_planejamento where turma = '.$ano.' order by ID desc';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		//$previsao = '<li>'.$linha['Conteudo'].'</li>'.$previsao;
		$objetivo =       str_replace( "\n",'<li>',$linha['Objetivo']);
		$encaminhamento = str_replace( "\n",'<li>',$linha['Encaminhamento']);
		$recurso =        str_replace( "\n",'<li>',$linha['Recurso']);
		
		$conteudo = '<p><b>CONTEÚDO: '.$linha['Conteudo'].'</b></p><p><b>          OBJETIVOS:</b></p><ul>
		                             '.$objetivo.'</ul><p><b>  ENCAMINHAMENTOS METODOLÓGICOS:</b></p><ul>
									 '.$encaminhamento.'</ul><b>RECURSOS AUXILIARES EXTERNOS:</b><ul>
									 '.$recurso.'</ul><hr>'.$conteudo;
	}
	mysql_free_result($query);
	echo'
<table border="0" width="90%"><tr><td>
<div align="center"><h3>INFORMÁTICA EDUCACIONAL '.$ano.'º ANO</h3></div>
<div align="left">
<ul><ul>
	'.$previsao.'
</ul>
</li>
</ul>
	'.$conteudo.'
	</td></tr></table>';
}

?>

INSERT INTO tb_planejamento (Turma, Conteudo) values (, 