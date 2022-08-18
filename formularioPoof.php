<?php
	session_start();
	//include './conexao.php';
	//include './conf.php';
	//menu();
?>
<html>
	<head><title>Formulario Proof</title></head>
	<body>
		<div align="justify">
			<ul>
				<font color="red"><b>Quais são os três pilares da segurança da informação? Qual a importância de cada um? Seja detalhista.</b></font>
					<ul>
						<li>Confidencialidade, integridade e disponibilidade.</li>
						Confidencialidade faz com que a informação seja restrita e esteja somente disponível para usuários autorizados. Integridade identifica se as informações não sofreram alterações durante o seu processamento. Disponibilidade garante que as informações e os recursos estejam disponíveis para aqueles que precisam deles, 24 horas por dia, sete dias por semana.
						<li>Prevenção, Detecção e Correção.</li>
						Prevenção é uma política de segurança da informação a fim de conscientizar das boas práticas de segurança e estabelecer níveis de acesso aos colaboradores. Detecção usa recursos físicos (como firewall e servidores espelhados), sistemas de detecção, planejamento e estratégias para a segurança da informação e até honeypots. Correção em alguns casos, as vulnerabilidades aparecem por inúmeros fatores então é necessario a adoção de sistemas de segurança da informação, políticas de segurança de maior aplicabilidade, restrição de acessos a níveis hierárquicos, profissionais qualificados e/ou empresas de consultoria em Segurança da Informação.
						<li>Tecnologia, Processos e Pessoas.</li>
						Classificamos como tecnologia todas as ferramentas, sejam elas hardware ou software, que permitam a prevenção, detecção e resposta aos incidentes de segurança, incluímos aqui antivírus, firewalls, IDS (Sistemas de Detecção de Intrusão), IPS(Sistemas de Prevenção de Intrusões), aplicações de análise forense, SIEMs, etc.
					</ul>
				<font color="red"><b>O que é não repúdio? Qual sua importância para segurança da informação?</b></font>
					<ul>
						<li>Um sistema no qual as partes confiem nos dados que são compartilhados e utilizados nas transações diárias. O não repúdio é importante no comércio eletrônico para prevenir que as partes integrantes de uma transação venham a contestar ou negar uma transação após sua realização. O primeiro objetivo de um sistema de não repúdio é provar quem foi o autor de determinada ação e manter as necessárias evidências de tal informação para resolver eventuais disputas ou auditorias.</li>
					</ul>
				<font color="red"><b>O que é MFA? Qual sua utilidade para segurança da informação?</b></font>
					<ul>
						<li>MFA ou Multi-Factor Authentication (Autenticação de varios fatores).
					Entendendo o MFA. Em termos mais práticos, é a utilização de dois ou mais métodos para atestar a identidade de alguém para concessão de acesso a um sistema, documento ou informação.</li>
					</ul>
				<font color="red"><b>O que é um ataque DDoS? Cite um exemplo real.</b></font>
					<ul>
						<li>Chamados de ataques de negação de serviço distribuído (DDoS). O ataque DDoS envia múltiplas solicitações para o recurso Web invadido com o objetivo de exceder a capacidade que o site tem de lidar com diversas solicitações, impedindo seu funcionamento correto. Em 28 de fevereiro de 2018, o GitHub – plataforma para desenvolvedores de software – foi atingida por um ataque DDoS com pico de 1,35 terabits por segundo. Durou cerca de 20 minutos. O ataque foi possível pela exploração de um comando padrão do Memcached, um sistema de cache de banco de dados para acelerar sites e redes. A técnica de DDoS por Memcached é particularmente eficaz, pois fornece um fator de amplificação de até 51,2 mil vezes.</li>
					</ul>
				<font color="red"><b>O que é uma vulnerabilidade zero-day? Qual seu impacto na segurança da informação?</b></font>
					<ul>
						<li>Zero day quando um sistema é comprometido por um malware antes que o fabricante tenha consciência disso, descobrindo a vulnerabilidade apenas no momento do ataque. A classificação desse tipo de problema se dá de duas formas: falhas de segurança graves, mas que ainda não foram descobertas e utilizadas por hackers. vulnerabilidades de segurança graves que são desconhecidas dos desenvolvedores, mas já são utilizadas para ataques.</li>
					</ul>
				<font color="red"><b>Aponte a principal característica ou a diferença de:</b></font>
					<ul>
						<li>Malware palavra proveniente de “Malicious Software”, são ameaças virtuais desenvolvidas com o intuito de executar atividades maliciosas em computadores e smartphones.</li>
						<li>Ransomware essa ameaça virtual é capaz de sequestrar os documentos, arquivos e informações de um usuário, tornando-os inacessíveis, geralmente mediante criptografia, e apenas os liberando através de pagamento (ransom) da vítima. Além disso, ele também é capaz de impedir o acesso do proprietário ao seu equipamento infectado. Uma maneira de amenizar os prejuízos causados por esse malware é realizar um backup regular dos seus arquivos, de modo que, caso um invasor os sequestre, haverá uma cópia desses documentos.</li>
						<li>Vírus é um software, geralmente malicioso, que atua se replicando e infectando arquivos e programas de computadores. Desse modo, quando esses arquivos são executados, ele é ativado e espalhado, podendo comprometer de maneira muito grave os sistemas computacionais, causando lentidão através do consumo de recursos, corrompendo arquivos, roubando informações, danificando softwares, entre outras consequências.</li>
						<li>Worm diferentemente do vírus, é um programa independente e que possui a característica de se autorreplicar em sistemas informatizados, sem a necessidade de utilizar um programa hospedeiro. Ele possui a capacidade de causar danos sem a necessidade de ser ativado pela execução do usuário. A sua atuação engloba a exploração de falhas e vulnerabilidades de sistemas de informação, podendo ocasionar graves danos à sua funcionalidade, além da possibilidade de realizar o roubo de informações, entre outros danos.</li>
						<li>Spyware ou Software Espião, é um tipo de malware cuja função é se infiltrar em sistemas computacionais, com o intuito de coletar informações pessoais ou confidenciais do usuário, sem o seu conhecimento, e as enviar ao invasor remotamente pela internet.</li>
						<li>Key logger esse tipo de spyware é capaz de coletar, armazenar e enviar a criminosos todas as informações que são digitadas no teclado pelo usuário, como sites visitados, senhas, entre outras informações.</li>
					</ul>
				<font color="red"><b>O que é engenharia social? Cite 03 técnicas de engenharia social.</b></font>
					<ul>
						<li>Engenharia Social é o nome utilizado para definir o método mais habitual de se obter informações confidenciais de acesso a sistemas restritos a usuários autorizados. É o caso em que uma pessoa, dotada de má-fé, abusa da ingenuidade ou da confiança de um usuário para persuadi-lo, ainda que de forma velada, a fornecer informações como números de cartões de crédito, senhas, documentos pessoais, entre outros.</li>
						<li>Baiting: Nessa técnica, que acontece mais em ambientes de trabalho, o criminoso infecta um dispositivo — geralmente um pen drive — com um malware e o deixa em algum lugar aleatório. A pessoa que encontra o dispositivo o conecta, por curiosidade, em um algum PC ou notebook para tomar conhecimento do conteúdo que está ali. Não raras as vezes, essa pessoa instala os arquivos que ali estão para saber do que se tratam. Feito isso, o criminoso passa a ter acesso a praticamente todos os sistemas do dispositivo infectado.</li>
						<li>Phishing: Apesar de ser uma técnica antiga da Engenharia Social, o e-mail de phishing ainda é muito eficiente. Ele ocorre quando um cibercriminoso forja comunicações com a vítima, que acredita estar diante de um e-mail legítimo. Em geral, o normal é que os fraudadores se passem por bancos ou empresas de cartão de crédito solicitando informações sensíveis, como senhas e dados de cadastro, ou mesmo solicitando a instalação de falsos softwares de segurança etc.</li>
						<li>Pretexting: Essa técnica é aquela na qual fraudadores se passam por pessoas ou empresas de confiança da vítima. De posse de informações básicas, dessas que ficam disponíveis em uma breve pesquisa na internet, o criminoso solicita confirmação de dados e atualizações de cadastro, inclusive de senhas. A vítima, achando que está em contato com alguém de confiança, fornece os dados tranquilamente, sem saber que se trata de um golpe.</li>
						<li>Quid pro quo: O ataque de quid pro quo acontece quando um hacker solicita informações confidenciais de alguém em troca de algo. O próprio termo é traduzido como “isso por aquilo”, no qual o cibercriminoso oferece à vítima algo em troca desses dados sensíveis. A estratégia mais usual consiste em se passar por alguém do setor de tecnologia e abordar vítimas que tenham problemas relacionados à esfera. Conforme as instruções do criminoso, a vítima fornece acesso aos códigos, desabilita programas importantes e instala malwares, presumindo que conseguirá solucionar seu problema.
						<li>Spear phishing é uma versão mais direcionada do phishing, focada em indivíduos e empresas específicas. Nesse tipo de ataque, o criminoso se passa por algum executivo ou membro da organização, e se aproxima dos colaboradores com o objetivo de obter informações sensíveis, por meio de uma demanda urgente exigindo uma transação financeira imediata para uma conta específica, por exemplo.</li>
					</ul>
					<font color="red"><b>Qual a diferença entre um spam, um phishing e um spear phishing?</b></font>
						<ul>
							<li>Spam são e-mails indesejados pelo usuário. Podem ser propagandas, propagandas enganosas ou até mesmo correntes. Phishing geralmente, são campanhas massivas, enviadas para milhares ou milhões de usuários ao mesmo tempo. Mesmo que apenas uma pequena porcentagem dos usuários caia no golpe, ainda assim será rentável. Spear phishing por outro lado, é altamente segmentado. Os cibercriminosos estudam e aprendem sobre as suas vítimas e usam muitas táticas de engenharia social para dar mais credibilidade à mensagem. A Fraude do CEO é um golpe de BEC (Business Email Compromise).</li>
						</ul>
						<font color="red"><b>9. Descreva como um atacante poderia levantar informações para lançar um spear phishing em uma grande empresa listada na bolsa de valores.
						<font color="red"><b>10. Explique brevemente as seguintes normas:
						<ul>
							<li>BACEN 4658</li>
							<li>LGPD</li>
							<li>PCI:DSS</li>
							<li>GDPR</li>
							<li>SOX</li>
							<li>ISO 27001</li>
						</ul>
						<font color="red"><b>11. Quais são as fases do ciclo de resposta a incidentes de acordo com o NIST 800-61 REV 2?</b></font>
						<font color="red"><b>12. Explique o que é um ativo, uma vulnerabilidade e uma ameaça. Relacione os três em um exemplo.</b></font>
						<font color="red"><b>13. Explique o que é um APT e cite um exemplo real.</b></font>
						<font color="red"><b>14. Quais são os fatores de autenticação? Cite exemplos reais de sua utilização.</b></font>
						<font color="red"><b>15. Qual a diferença entre criptografia simétrica e criptografia assimétrica? Cite exemplos reais.</b></font>
						<font color="red"><b>16. Aponte as diferenças entre os protocolos TCP e UDP. Depois aponte 02 casos de uso para cada um dos protocolos.</b></font>
						<font color="red"><b>17. Cite um exemplo de um ator de ameaça sofisticado e um simples. Explique a natureza da sofisticação.</b></font>
						<font color="red"><b>18. O que é o OWASP TOP 10? Cite pelo menos 02 itens presentes no OWASP TOP 10.</b></font>
						<font color="red"><b>19. O que é um SGSI? Aponte qual norma exige sua elaboração.</b></font>
						<font color="red"><b>20. O que são NIST e SANS? Qual relevância para comunidade de segurança da informação? Cite pelo menos um exemplo de trabalho de cada um. </b></font>
						<font color="red"><b>21. O que é um SOC? E um CSIRT?</b></font>
						<font color="red"><b>22. O que é um plano de resposta a incidentes? Descreva sua importância para uma organização bem como seus principais elementos.</b></font>
						<font color="red"><b>23. Explique a necessidade e utilidade do protocolo NAT. Demonstre com um exemplo.</b></font>
						<font color="red"><b>24. O que é um plano de recuperação de desastres? Descreva sua importância para uma organização bem como seus principais elementos.</b></font>
						<font color="red"><b>25. O que é um pentest? Quais são suas principais modalidades? Qual sua importância em uma estratégia de segurança?</b></font>
						26. Descreva um processo de gestão de vulnerabilidades ideal.
						27. Você assumiu como líder de cibersegurança em uma empresa de tecnologia emergente, quais seriam as principais medidas que você tomaria nos primeiros 100 dias de trabalho?
						28. O que é Cyber Kill Chain? Qual sua utilidade? Ela se aplica principalmente a qual tipo de adversário? 
						29. O que é MITRE ATT&CK? Qual sua importância para a comunidade de segurança da informação?
						30. Explique com detalhes o que é, onde e como é utilizado o "Three-way handshake".
						31. O que é CTI? Cite uma aplicação em cada nível, estratégico, tático e operacional. 
						32. Descreva de maneira detalhada como você iniciaria um ataque a um website.
						33. Descreva de maneira detalhada como você iniciaria um ataque a uma empresa prestes a fazer um IPO e aponte o que você buscaria nesse ataque.
						34. O que é um WAF? Qual sua principal função?
						35. O que é um SIEM? Qual sua principal função?
						36. Explique para que serve e como funciona uma DMZ.
						37. O que é um purple team?
						38. Qual importância da conscientização de riscos cibernéticos para estratégia de segurança de uma organização?
						39. O que é DevSecOps? Qual sua importância para estratégia de segurança e negócio de uma organização?
						40. O que é o Common Vulnerability Scoring System (CVSS)? Qual sua função?
						41. O que são indicadores de comprometimento (IoC)? Cite exemplos reais.
						42. O que é STRIDE? Qual sua utilidade?
						43. O que é CVE?
						44. O que é Zero Trust?
						45. O que é NVD e CNNVD?
						46. O que é Service Level Agreement (SLA)?
						47. O que são TTPs?
						48. O que é DLP e para que serve?
						49. O que é CI/CD?
						50. O que é SAST?
			</ul>
		</div>
	</body>
</html>