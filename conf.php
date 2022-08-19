<?php
function menu(){
	echo '
			<div align="center" class="botao"><div id="menu">
					<ul>
						<li><a href="./">Inicio</a></li>
						<li><a href="./cadastrar.php" title=" Cadastrar alunos">Cadastrar</a></li>
						<li><a href="./listar.php" title=" Listar alunos">Listar</a></li>
						<li><a href="./pesquisar.php" title=" Pesquisar alunos">Pesquisar</a></li>
						<li><a href="./preConselho.php" title=" Pré Conselho">Pré Conselho</a></li>
                  		<li><a href="./enviarFotos.php" title="Enviar Fotos">Enviar Fotos</a></li>
                  		<li><a href="./verFotos.php" title="Ver Fotos">Ver Fotos</a></li>
				  		<li><a href="./turma.php" title="Turmas">Turmas</a></li>
						<li><a href="./editarPlanejamento.php" title="Planejamento">Planejamento</a></li>
				  		<li><a href="./aproveitamento.php" title="Turmas">Aproveitamento</a></li>
						<li><a href="./relatorio.php" title=" Relatorio de  alunos">Relatório</a></li>
                  		<li><a href="./modJogos.php" title="Jogos Flash">Jogos</a></li>
					</ul>
				</div>
			</div>
	';
}
echo'
<head>
	<link rel="stylesheet" href="./main.css">
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.ico">
</head>';
$mostraMenu = '
<input type="radio" value="0A" name="Lista" onchange="form.submit()">PA
<input type="radio" value="0B" name="Lista" onchange="form.submit()">PB
<input type="radio" value="0C" name="Lista" onchange="form.submit()">PC
<input type="radio" value="0D" name="Lista" onchange="form.submit()">PD

<input type="radio" value="1A" name="Lista" onchange="form.submit()">1ºA
<input type="radio" value="1B" name="Lista" onchange="form.submit()">1ºB
<input type="radio" value="1C" name="Lista" onchange="form.submit()">1ºC
<input type="radio" value="1D" name="Lista" onchange="form.submit()">1ºD
<input type="radio" value="1E" name="Lista" onchange="form.submit()">1ºE

<input type="radio" value="2A" name="Lista" onchange="form.submit()">2ºA
<input type="radio" value="2B" name="Lista" onchange="form.submit()">2ºB
<input type="radio" value="2C" name="Lista" onchange="form.submit()">2ºC
<input type="radio" value="2D" name="Lista" onchange="form.submit()">2ºD
<input type="radio" value="2E" name="Lista" onchange="form.submit()">2ºE

<input type="radio" value="3A" name="Lista" onchange="form.submit()">3ºA
<input type="radio" value="3B" name="Lista" onchange="form.submit()">3ºB
<input type="radio" value="3C" name="Lista" onchange="form.submit()">3ºC
<input type="radio" value="3D" name="Lista" onchange="form.submit()">3ºD

<input type="radio" value="4A" name="Lista" onchange="form.submit()">4ºA
<input type="radio" value="4B" name="Lista" onchange="form.submit()">4ºB
<input type="radio" value="4C" name="Lista" onchange="form.submit()">4ºC
<input type="radio" value="4D" name="Lista" onchange="form.submit()">4ºD


<input type="radio" value="5A" name="Lista" onchange="form.submit()">5ºA
<input type="radio" value="5B" name="Lista" onchange="form.submit()">5ºB
<input type="radio" value="5C" name="Lista" onchange="form.submit()">5ºC
<input type="radio" value="5D" name="Lista" onchange="form.submit()">5ºD
<input type="radio" value="5E" name="Lista" onchange="form.submit()">5ºE
<input type="radio" value="5F" name="Lista" onchange="form.submit()">5ºF
';

$mostraCaixaSuspensa = '
	<select size="1" name="Lista" onchange="form.submit()">
		<option>TURMA</option>
		
		<option>0A</option>
		<option>0B</option>
		<option>0C</option>
		<option>0D</option>
		
		<option>1A</option>
		<option>1B</option>
		<option>1C</option>
		<option>1D</option>
		<option>1E</option>

		<option>2A</option>
		<option>2B</option>
		<option>2C</option>
		<option>2D</option>
		<option>2E</option>

		<option>3A</option>
		<option>3B</option>
		<option>3C</option>
		<option>3D</option>

		<option>4A</option>
		<option>4B</option>
		<option>4C</option>
		<option>4D</option>

		<option>5A</option>
		<option>5B</option>
		<option>5C</option>
		<option>5D</option>
		<option>5E</option>
		<option>5F</option>
		<option>LG</option>
		<option>AD</option>
		<option>RE</option>
	</select>
';
?>
