<?php 
session_start("agenda");
date_default_timezone_set('America/Sao_Paulo');
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
$sql = "select * from tb_aluno_projeto where equipe = 'Presencial' and situacao = 'A' order by nomeAluno";
	$query = mysql_query($sql) or die("SQL:" . $sql . " - ERRO:" . mysql_error());
	echo '<center><H1>Relatório Descritivo dos Alunos da Robótica</H1></center><div align="justify">';
	while ($linha = mysql_fetch_array($query)) {
		$sexo = $linha['sexo'];
		$aluno = (($linha['nomeAluno']));
		$dataNascimento = $linha['dataNascimento'];
		$dia = date('d',strtotime($linha['dataNascimento']));
		$mes = date('m',strtotime($linha['dataNascimento']));
		$ano = date('Y',strtotime($linha['dataNascimento']));
		$date = new DateTime( $linha['dataNascimento'] );
		$interval = $date->diff( new DateTime( date() ) );
		$anos = ltrim($interval->format( '%Y Anos' ), '0');
		$signo = strtolower(signo($dia,$mes));
		if ($sexo == 'M'){
			$nativo = 'Nativo';
		}else{
			$nativo = 'Nativa';
		}
		if ($signo == 'aries'){
			if ($sexo == 'F'){
			$retSigno = '
			Aventureira e intensa. Confiante e ousada, é capaz de, com jeitinho, conquistar tudo aquilo que deseja. Possui excelente senso de humor. Dotada de muita energia e dinamismo, competitiva, autêntica, empreendedora e uma ótima líder. Ambiciosa e persistente na conquista de seus objetivos. Decidida e de opinião, dificilmente se dobra à vontade dos outros.
			'; 
			}else{
				$retSigno = '
			Aventureiro e intenso. confiante e ousado, é capaz de, com jeitinho, conquistar tudo aquilo que deseja. Possui excelente senso de humor. Dotado de muita energia e dinamismo, competitivo, autêntico, empreendedor e um ótimo líder. Ambicioso e persistente na conquista de seus objetivos. Decidido e de opinião, dificilmente se dobra à vontade dos outros.
				';
			}
		}
		else if ($signo == 'touro'){
			if ($sexo == 'F'){
			$retSigno = '
			Perseverante, paciente e pé no chão, é a pessoa que  todo mundo vai querer ter por perto. Confiante e confiável, é prática, planejadora, determinada. Costuma ser decidida e de opinião forte e está sempre em busca por constantes conquistas. Desperta admiração por onde passa, enquanto todos desistem de algo no primeiro obstáculo, ela não perde a esperança. Gosta de estabilidade, tranquilidade, paz e de rotina. Sempre prevenida, preza pela segurança e conforto.
			';
			}else{
			$retSigno = '
			Perseverante, paciente e pé no chão, é a pessoa que  todo mundo vai querer ter por perto. Confiante e confiável, prático, planejador, determinado. Costuma ser decidido e de opinião forte e está sempre em busca por constantes conquistas. Desperta admiração por onde passa, enquanto todos desistem de algo no primeiro obstáculo, ele não perde a esperança. Gosta de estabilidade, tranquilidade, paz e de rotina. Sempre prevenido, preza pela segurança e conforto.	
			';
			}
		}
		else if ($signo == 'gemeos'){
			if ($sexo == 'F'){
			$retSigno = '
			Faz amigos rapidamente, muito espirituosa, animada e sempre deixa sua marca nas pessoas. Com um sorriso cativante, é divertida, curiosa, muito comunicativa. Possui grande poder de persuasão.
			';
			}else{
			$retSigno = '
			Faz amigos rapidamente, muito espirituoso, animado e sempre deixa sua marca nas pessoas. Com um sorriso cativante, é divertido, curioso, muito comunicativo. Possui grande poder de persuasão.
			';
			}
		}
		else if ($signo == 'cancer'){
			if ($sexo == 'F'){
			$retSigno = '
			Protege os amigos acima de qualquer coisa, sabe dar valor a quem está ao seu lado. Segura, emotiva, tímida e simpática.
			';
			}else{
			$retSigno = '
			Protege os amigos acima de qualquer coisa, sabe dar valor a quem está ao seu lado. Seguro, emotivo, tímido e simpático.
			';	
			}
		}
		else if ($signo == 'leao'){
			if ($sexo == 'F'){
			$retSigno = '
			De espírito acolhedor, atrai as pessoas a sua volta, entusiasta, criativa, leal, generosa e extrovertida, além de uma líder nata. Forte, livre, responsável por um magnetismo de dar inveja, sempre alegre, otimista, preza pela independência e pela sinceridade sempre.
			';
			}else{
			$retSigno = '
			De espírito acolhedor, atrai as pessoas a sua volta, entusiasta, criativo, leal, generoso e extrovertido, além de um líder nato. Forte, livre, responsável por um magnetismo de dar inveja, sempre alegre, otimista, preza pela independência e pela sinceridade sempre.
			';
			}
		}
		else if ($signo == 'virgem'){
			if ($sexo == 'F'){
			$retSigno = '
			Calma e serena. Com uma inteligência acima da média, modesta, confiável, cautelosa, paciente,  eficiente, cuida harmoniosamente cada detalhe, ao mesmo tempo é muito prática. Perfeccionista, quer tudo bem organizado e limpo, discreta, amigável e divertida.
			';
			}else{
			$retSigno = '
			Calmo e sereno. Com uma inteligência acima da média, modesto, confiável, cauteloso, paciente,  eficiente, cuida harmoniosamente cada detalhe, ao mesmo tempo é muito prático. Perfeccionista, quer tudo bem organizado e limpo, discreto, amigável e divertido.
			';
			}
		}
		else if ($signo == 'libra'){
			if ($sexo == 'F'){
			$retSigno = '
			Com uma grande capacidade de fazer amigos, sempre  em busca novas aventuras. simpática, está sempre em busca de harmonia e equilíbrio. Com uma forte intuição, cautelosa, educada e gentil. Com um grande senso de justiça. Sempre sorridente.
			';
			}else{
			$retSigno = '
			Com uma grande capacidade de fazer amigos, sempre  em busca novas aventuras. simpático, está sempre em busca de harmonia e equilíbrio. Com uma forte intuição, cauteloso, educado e gentil. Com um grande senso de justiça. Sempre sorridente.
			';
			}
		}
		else if ($signo == 'escorpiao'){
			if ($sexo == 'F'){
			$retSigno = '
			Intensa, com uma intuição poderosa. Possui grande sensibilidade e compreende muito bem as situações e as pessoas. Tem ótima memória e uma personalidade muito forte, emotiva, determinada, valoriza muito a própria opinião. Não gosta de perder o controle de nada. É muito curiosa quer saber como tudo funciona.
			';
			}else{
			$retSigno = '
			Intenso, com uma intuição poderosa. Possui grande sensibilidade e compreende muito bem as situações e as pessoas. Tem ótima memória e uma personalidade muito forte, emotivo, determinado, valoriza muito a própria opinião. Não gosta de perder o controle de nada. É muito curioso quer saber como tudo funciona.
			';
			}
		}
		else if ($signo == 'sagitario'){
			if ($sexo == 'F'){
			$retSigno = '
			Sempre de bem com a vida e um grande coração, otimista, amigável, aventureira, tem capacidade de liderança e é amante da liberdade. Com uma personalidade forte, é uma pessoa  disciplinada, alegre, está sempre em busca de novas amizades e de novos horizontes. Generosa, organizada, não suporta ver injustiças. Precisa sempre estar de bem consigo mesmo e com todo mundo.
			';
			}else{
			$retSigno = '
			Sempre de bem com a vida e um grande coração, otimista, amigável, aventureiro, tem capacidade de liderança e é amante da liberdade. Com uma personalidade forte, é uma pessoa  disciplinada, alegre, está sempre em busca de novas amizades e de novos horizontes. Generoso, organizado, não suporta ver injustiças. Precisa sempre estar de bem consigo mesmo e com todo mundo.
			';
			}
		}
		else if ($signo == 'capricornio'){
			if ($sexo == 'F'){
			$retSigno = '
			Está sempre tentando alcançar um determinado objetivo na vida, e dificilmente confia em outra pessoa para compartilhar os seus sonhos. É bastante realista, pé-no-chão, gosta de economizar dinheiro. Confiável, forte, reservada, organizada, cautelosa, paciente e conservadora. Sua melhor característica é a persistência. Com uma criatividade e a imaginação invejável.
			';
			}else{
			$retSigno = '
			Está sempre tentando alcançar um determinado objetivo na vida, e dificilmente confia em outra pessoa para compartilhar os seus sonhos. É bastante realista, pé-no-chão, gosta de economizar dinheiro. Confiável, forte, reservado, organizado, cauteloso, paciente e conservador. Sua melhor característica é a persistência. Com uma criatividade e a imaginação invejável.
			';
			}
		}
		else if ($signo == 'aquario'){
			if ($sexo == 'F'){
			$retSigno = '
			Gosta de fazer as pessoas rirem. Leal, inventiva, lógica, independente, determinada, com uma personalidade forte. Humanitária e idealista, possui a mente e a criatividade muito aguçadas.
			';
			}else{
			$retSigno = '
			Gosta de fazer as pessoas rirem. Leal, inventivo, lógico, independente, determinado, com uma personalidade forte. Humanitário e idealista, possui a mente e a criatividade muito aguçadas.
			';
			}
		}
		else if ($signo == 'peixes'){
			if ($sexo == 'F'){
			$retSigno = '
			Sensitiva, psíquica, visionária, imaginativa, sensível, gentil, amável, serena, bastante sonhadora e talentosa. É muito sentimental, prestativa, sempre se coloca no lugar do outro e sofre as dores de quem está ao seu redor. Só se sente bem quando consegue praticar o bem.
			';
			}else{
			$retSigno = '
			Sensitivo, psíquico, visionário, imaginativo, sensível, gentil, amável, sereno, bastante sonhador e talentoso. É muito sentimental, prestativo, sempre se coloca no lugar do outro e sofre as dores de quem está ao seu redor. Só se sente bem quando consegue praticar o bem.
			';
			}
		}
	echo '<font color="#0000FF"><i><b>'.(($linha['nomeAluno'])).' </b></i></font>  nasceu no dia '.$dia.'/'.$mes.'/'.$ano.'. Hoje está com '.$anos.'. '.$retSigno.' '.$linha['obs'].' ';
	}
	mysql_free_result($query);
	//----------------------------------------------------------------------------------------		
?>