<?php 
include './conexao.php';
include './conf.php';
	function signo($d, $m) {
		  if ($m == "3"  AND $d >= "20") { $signo = "Aries";       }   //Áries       20/03 a 20/04
	  elseif ($m == "4"  AND $d <= "20") { $signo = "Aries";       }   //Áries       20/03 a 20/04
	  elseif ($m == "4"  AND $d >= "21") { $signo = "Touro";       }   //Touro       21/04 a 20/05
	  elseif ($m == "5"  AND $d <= "20") { $signo = "Touro";       }   //Touro       21/04 a 20/05
	  elseif ($m == "5"  AND $d >= "21") { $signo = "Gemeos";      }   //Gêmeos      21/05 a 20/06
	  elseif ($m == "6"  AND $d <= "20") { $signo = "Gemeos";      }   //Gêmeos      21/05 a 20/06
	  elseif ($m == "6"  AND $d >= "21") { $signo = "Cancer";      }   //Câncer      21/06 a 21/07
	  elseif ($m == "7"  AND $d <= "21") { $signo = "Cancer";      }   //Câncer      21/06 a 21/07
	  elseif ($m == "7"  AND $d >= "22") { $signo = "Leao";        }   //Leão        22/07 a 22/08
	  elseif ($m == "8"  AND $d <= "22") { $signo = "Leao";        }   //Leão        22/07 a 22/08
	  elseif ($m == "8"  AND $d >= "23") { $signo = "Virgem";      }   //Virgem      23/08 a 22/09
	  elseif ($m == "9"  AND $d <= "22") { $signo = "Virgem";      }   //Virgem      23/08 a 22/09
	  elseif ($m == "9"  AND $d >= "23") { $signo = "Libra";       }   //Libra       23/09 a 22/10
	  elseif ($m == "10" AND $d <= "22") { $signo = "Libra";       }   //Libra       23/09 a 22/10
	  elseif ($m == "10" AND $d >= "23") { $signo = "Escorpiao";   }   //Escorpião   23/10 a 21/11
	  elseif ($m == "11" AND $d <= "21") { $signo = "Escorpiao";   }   //Escorpião   23/10 a 21/11
	  elseif ($m == "11" AND $d >= "22") { $signo = "Sagitario";   }   //Sagitário   22/11 a 21/12
	  elseif ($m == "12" AND $d <= "21") { $signo = "Sagitario";   }   //Sagitário   22/11 a 21/12
	  elseif ($m == "12" AND $d >= "22") { $signo = "Capricornio"; }   //Capricórnio 22/12 a 21/01
	  elseif ($m == "1"  AND $d <= "21") { $signo = "Capricornio"; }   //Capricórnio 22/12 a 21/01
	  elseif ($m == "1"  AND $d >= "21") { $signo = "Aquario";     }   //Aquário     21/01 a 18/02
	  elseif ($m == "2"  AND $d <= "18") { $signo = "Aquario";     }   //Aquário     21/01 a 18/02    
	  elseif ($m == "2"  AND $d >= "19") { $signo = "Peixes";      }   //Peixes      19/02 a 19/03
	  elseif ($m == "3"  AND $d <= "19") { $signo = "Peixes";      }   //Peixes      19/02 a 19/03
	  else { $signo = "Não Reconhecido"; }
	return $signo;
	}
	$sql = 'select distinct(nome), dataNascimento, cargo from tb_servidorMFT where sexo = "F" order by dataNascimento';
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	while ($linha = mysql_fetch_array($query)) {
		$nome = ucwords(strtolower($linha['nome']));
		$dataNascimento = $linha['dataNascimento'];
		$dia = date('d', strtotime($linha['dataNascimento']));
		$mes = date('m', strtotime($linha['dataNascimento']));
		$ano = date('Y', strtotime($linha['dataNascimento']));
		$date = new DateTime( $linha['dataNascimento'] );
		$interval = $date->diff( new DateTime( date() ) );
		$signo = strtolower(signo($dia,$mes));
		$cargo = strtolower($linha['cargo']);
		if ($signo == 'aries'){
			$retSigno = 'Aventureira e intensa. Assertiva, confiante e ousada, é capaz de, com jeitinho, conquistar tudo aquilo que deseja. Charmosa e conquistadora possui excelente senso de humor. Dotada de muita energia e dinamismo, competitiva, autêntica, empreendedora e uma ótima líder. Ambiciosa e persistente na conquista de seus objetivos. Onde ela esta, o ambiente nunca será monótono. Decidida e de opinião, dificilmente se dobra à vontade dos outros.'; 
		}
		if ($signo == 'touro'){
			$retSigno = 'Perseverante, paciente e pé no chão, é a pessoa que  todo mundo vai querer ter por perto. Confiante e confiável, é prática, planejadora, determinada e tem muito senso comum. Costuma ser decidida e de opinião forte e esta sempre na busca por constantes conquistas. Desperta admiração por onde passa e, enquanto todos desistem de algo no primeiro obstáculo, ela não perde a esperança. Gosta de estabilidade, tranquilidade, paz e de rotina. Sempre prevenida, preza pela estabilidade, segurança e conforto.';
		}
		if ($signo == 'gemeos'){
			$retSigno = 'Faz amigos rapidamente, muito espirituosa, animada e sempre deixa sua marca nas pessoas. Com um sorriso cativante, é divertida,  animada, curiosa, amante da diversão e muito, muito comunicativa. Adora  uma festa, esta sempre rodeada de amigos e possui grande poder de persuasão. Adora estar sempre bonita.';
		}
		if ($signo == 'cancer'){
			$retSigno = 'Protege os amigos acima de qualquer coisa, sabe dar valor a quem esta ao seu lado. Segura, emotiva, carinhosa, sensível, tímida e simpática, doce, romântica e apaixonada pela família.';
		}
		if ($signo == 'leao'){
			$retSigno = 'De espírito acolhedor, atrai as pessoas a sua volta, e sua leveza de espirito levanta o ânimo de todo mundo. É afetiva, entusiasta, romântica, calorosa, criativa, leal, generosa e extrovertida, além de uma líder nata. Forte, livre e extravagante. Responsável por um magnetismo de dar inveja, sempre alegre, otimista, preza pela independência e pela sinceridade sempre.';
		}
		if ($signo == 'virgem'){
			$retSigno = 'Calma e serena. Com uma inteligência acima da media, possui uma enorme facilidade em analisar com precisão a personalidade de seus amigos. Guerreira, modesta, confiável, cautelosa, paciente, metódica e eficiente, cuida harmoniosamente cada detalhe, ao mesmo tempo é muito prática. Perfeccionista, quer tudo bem organizado e limpo. Muito discreta, amigável e divertida e principalmente sempre muito charmosa.';
		}
		if ($signo == 'libra'){
			$retSigno = 'Com uma grande capacidade de fazer amigos sempre  procura novas aventuras. Romântica, graciosa, simpática e encantadora, está sempre em busca de harmonia e equilíbrio. Sempre com uma forte intuição, cautelosa, educada e gentil. Com um grande senso de justiça. Sempre sorridente, ao lado dela o mundo e belo.';
		}
		if ($signo == 'escorpiao'){
			$retSigno = 'Intensa, com uma intuição poderosa. Possui grande sensibilidade e compreende muito bem as situações e as pessoas. Tem ótima memória e uma personalidade muito forte, emotiva, determinada, valoriza muito a própria opinião. Não gostam de perder o controle de nada. É muito curiosa quer saber como tudo funciona';
		}
		if ($signo == 'sagitario'){
			$retSigno = 'Sempre de bem com a vida e um grande coração, otimista, amigável, aventureira, tem capacidade de liderança e é amante da liberdade. Com uma personalidade forte, é uma pessoa  disciplinada, alegre, esta sempre em busca de novas amizades e de novos horizontes. Generosa, organizada, não suporta ver injustiças. Precisa sempre estar de bem consigo mesmo e com todo mundo.';
		}
		if ($signo == 'capricornio'){
			$retSigno = 'Esta sempre tentando alcançar um determinado objetivo na vida, e dificilmente confia em outra pessoa para compartilhar os seus sonhos. É bastante realista, pé-no-chão, gosta de economizar dinheiro. Confiável, forte, reservada, organizada, cautelosa, paciente e conservadora. Sua melhor característica é a persistência. Com uma criatividade e a imaginação invejável.';
		}
		if ($signo == 'aquario'){
			$retSigno = 'Ela é a alma da festa sua presença sempre deixa o ambiente mais divertido, pois gosta de fazer as pessoas rirem. Leal, inventiva, lógica, independente, determinada, com uma personalidade forte. Humanitária e idealistaa, possui a mente e a criatividade muito aguçadas.';
		}
		if ($signo == 'peixes'){
			$retSigno = 'Sensitiva, psíquica, visionária, imaginativa, sensível, gentil, amável e caridosa, serena, bastante sonhadora e talentosa. É muito sentimental, prestativa, sempre se coloca no lugar do outro e sofre as dores de quem está ao seu redor. Só se sente bem quando consegue praticar o bem.';
		}
	$retorno = $retorno.'
	<fieldset style="text-align: left; text-indent: 3; word-spacing: 3; line-height: 150%; margin: 10 10 10 10; padding: 2">
	<legend align="left"><b><font size="5">'.$nome.'</font></b></legend>
	<p align="justify">   Nasceu no dia '.$dia.'/'.$mes.'/'.$ano.'. Nossa querida '.$cargo.' esta com '.$interval->format( '%Y Anos' ).'.. '.$retSigno.'</p>
</fieldset>
	';
	}
echo'
<html>
<head>
<title>Personalidade</title>
</head>
<body>
<div align="center">
<h1 style: align="center">Perfil dos Servidores</h1>
<table border="0" width="90%">
	<tr>
		<td>
		<p align="left">'.$retorno.'</p>
		</td>
	</tr>
</table>
</div>
</body>
</html>
';
?>