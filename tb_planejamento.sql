-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10/08/2022 às 18:47
-- Versão do servidor: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adolival`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_planejamento`
--

CREATE TABLE `tb_planejamento` (
  `ID` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `conteudo` varchar(500) NOT NULL,
  `objetivo` text DEFAULT NULL,
  `encaminhamento` text DEFAULT NULL,
  `recurso` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_planejamento`
--

INSERT INTO `tb_planejamento` (`ID`, `turma`, `conteudo`, `objetivo`, `encaminhamento`, `recurso`) VALUES
(2, 0, 'Interfaces', '1', '2', '3'),
(3, 0, 'Mundo digital e real', NULL, NULL, NULL),
(4, 0, 'Eletrônicos', NULL, NULL, NULL),
(5, 0, 'Códigos', NULL, NULL, NULL),
(6, 0, 'Computadores', NULL, NULL, NULL),
(7, 0, 'Transmissão de dados entre máquinas', NULL, NULL, NULL),
(8, 0, 'Relevância de informações', NULL, NULL, NULL),
(9, 0, 'Algoritmos', NULL, NULL, NULL),
(10, 0, 'Identificação de padrões', NULL, NULL, NULL),
(11, 1, 'Tecnologias Digitais', 'asldkas hfasflajksdghfla hslfjkasdjk fasgdfasgljfgalsjhfasghafsdgfasgasg flasgfa sja sgfjasgf jlasg fahsgdfha jgfjlashgfla sgfh gashlfhlagshgfhla sjhfasjdgf jagsgfsjldfhasglfagsljgfajlsgfjlsdgjflasgfagsdfjasgdjlgfjlasgfhajsdg fjasgdjf asjfg lajsg fasgd fjasg fa gsslf alsgf gasgf haslg fjlagslfga sdgf slgf asjldgf jlag fljasg fjasgf alsg lasdg flajsg jlashg fasg fjlasgfjl gasj gfasgjlf ajlgsdf', 'alsbf slgdfjha sggfjlashg fjalsg fjlashgfjlgsdjl gfajs gfasjlhgf asjlhgf lasgf asfjl gasdjfg asjlgfa jlgfajlsgfjlasgfjlasg falsgf jasgfjlgalsjdg flajsdgf jlag flasg fasgh fajlsf', 'aslbfa shldbfljasgfjasg fasjlg fgh flajsg fljasg fajsgl fajlsg flasg flajg slfjagjlfgajgf ajsgdfajlsdgf alsg flags fajlsg fsgjfajsgfjlagsdfasjlg dflagsdflasgf aslgf aslgf'),
(12, 1, 'Classificação indicativa', NULL, NULL, NULL),
(13, 1, 'Tecnologias no cotidiano', NULL, NULL, NULL),
(14, 1, 'Classificação e agrupamento', NULL, NULL, NULL),
(15, 1, 'Hardwares e Softwares', NULL, NULL, NULL),
(16, 1, 'Acesso à internet', NULL, NULL, NULL),
(17, 1, 'Introdução a programação', NULL, NULL, NULL),
(18, 1, 'Algoritmos', NULL, NULL, NULL),
(19, 1, 'Decomposição', NULL, NULL, NULL),
(20, 1, 'Identificação de softwares', NULL, NULL, NULL),
(21, 2, 'Mídia digitais', NULL, NULL, NULL),
(22, 2, 'Edição de textos', NULL, NULL, NULL),
(23, 2, 'Tecnologias no cotidiano', NULL, NULL, NULL),
(24, 2, 'Impactos da tecnologia no cotidiano', NULL, NULL, NULL),
(25, 2, 'Mecanismos de busca', NULL, NULL, NULL),
(26, 2, 'Representando informações', NULL, NULL, NULL),
(27, 2, 'Hardwares: Dispositivos periféricos', NULL, NULL, NULL),
(28, 2, 'Softwares: Aplicativos', NULL, NULL, NULL),
(29, 2, 'Mecanismos de busca', NULL, NULL, NULL),
(30, 2, 'Classificação de dados', NULL, NULL, NULL),
(31, 2, 'Laços de repetição', NULL, NULL, NULL),
(32, 2, 'Identificação de estruturas', NULL, NULL, NULL),
(33, 2, 'Operações relacionais', NULL, NULL, NULL),
(34, 2, 'Identificação de sensores', NULL, NULL, NULL),
(35, 2, 'Tecnologias no cotidiano', NULL, NULL, NULL),
(36, 3, 'Fluência digital', NULL, NULL, NULL),
(37, 3, 'Fluência digital', NULL, NULL, NULL),
(38, 3, 'Softwares educacionais', NULL, NULL, NULL),
(39, 3, 'Relacionar o uso da tecnologia com as questões socioeconômicas, locais e regionais', NULL, NULL, NULL),
(40, 3, 'Uso crítico da internet', NULL, NULL, NULL),
(41, 3, 'Impactos da tecnologia no cotidiano', NULL, NULL, NULL),
(42, 3, 'Tecnologia digital, economia e sociedade', NULL, NULL, NULL),
(43, 3, 'Representação de dados', NULL, NULL, NULL),
(44, 3, 'Mídias digitais', NULL, NULL, NULL),
(45, 3, 'Arquivos digitais', NULL, NULL, NULL),
(46, 3, 'Hardware: dispositivos de entrada e saída', NULL, NULL, NULL),
(47, 3, 'Dispositivos de armazenamento', NULL, NULL, NULL),
(48, 3, 'Tipos de rede', NULL, NULL, NULL),
(49, 3, 'Internet: conceitos básicos', NULL, NULL, NULL),
(50, 3, 'Dados x informação', NULL, NULL, NULL),
(51, 3, 'numeração binária', NULL, NULL, NULL),
(52, 3, 'Diagramação', NULL, NULL, NULL),
(53, 3, 'Sequência de passos computacionais', NULL, NULL, NULL),
(54, 3, 'Variáveis', NULL, NULL, NULL),
(55, 3, 'decomposição de algoritmos', NULL, NULL, NULL),
(56, 3, 'Reconhecimento de Padroes', NULL, NULL, NULL),
(57, 3, 'Algoritimo', NULL, NULL, NULL),
(58, 4, 'Autoria, Produção Colaborativa e Multiletramento.', NULL, NULL, NULL),
(59, 4, 'Autoria, Produção Colaborativa e Multiletramento.', NULL, NULL, NULL),
(60, 4, 'Curadoria e utilização de recursos digitais para a aprendizagem.', NULL, NULL, NULL),
(61, 4, 'Ética e segurança no meio digital.', NULL, NULL, NULL),
(62, 4, 'Ética e segurança no meio digital.', NULL, NULL, NULL),
(63, 4, 'Ética e segurança no meio digital.', NULL, NULL, NULL),
(64, 4, 'Autoria, Produção Colaborativa e Multiletramento.', NULL, NULL, NULL),
(65, 4, 'Ética e segurança no meio digital.', NULL, NULL, NULL),
(66, 4, 'Unidades da informação - Sistema de numeração binário.', NULL, NULL, NULL),
(67, 4, 'Unidades da informação - Bit e byte.', NULL, NULL, NULL),
(68, 4, 'Unidades da informação - Arquivos.', NULL, NULL, NULL),
(69, 4, 'Processador e Memória.', NULL, NULL, NULL),
(70, 4, 'Tipos de Memória.', NULL, NULL, NULL),
(71, 4, 'Tráfego de informações.', NULL, NULL, NULL),
(72, 4, 'Interpretação e elaboração de códigos.', NULL, NULL, NULL),
(73, 4, 'Organização de dados.', NULL, NULL, NULL),
(74, 4, 'Execução de algoritmos.', NULL, NULL, NULL),
(75, 4, 'Organização de dados.', NULL, NULL, NULL),
(76, 4, 'Decomposição e categorização.', NULL, NULL, NULL),
(77, 4, 'Iteração.', NULL, NULL, NULL),
(78, 5, 'Compactação de dados', NULL, NULL, NULL),
(79, 5, 'Arquivos digitais', NULL, NULL, NULL),
(80, 5, 'Mídias digitais', NULL, NULL, NULL),
(81, 5, 'Notícias falsas', NULL, NULL, NULL),
(82, 5, 'confiáveis', NULL, NULL, NULL),
(83, 5, 'Fontes e referências', NULL, NULL, NULL),
(84, 5, 'Uso crítico da internet', NULL, NULL, NULL),
(85, 5, 'Tecnologia e trabalho', NULL, NULL, NULL),
(86, 5, 'Tecnologia e Sociedade (Leandro)', NULL, NULL, NULL),
(87, 5, 'Cidadania Digital', NULL, NULL, NULL),
(88, 5, 'Sistemas operacionais', NULL, NULL, NULL),
(89, 5, 'Mecanismos de busca', NULL, NULL, NULL),
(90, 5, 'Métodos de pesquisa e ordenação', NULL, NULL, NULL),
(91, 5, 'Abstração', NULL, NULL, NULL),
(92, 5, 'Não Informado', NULL, NULL, NULL),
(93, 5, 'Algoritimos', NULL, NULL, NULL),
(94, 5, 'Decompsição', NULL, NULL, NULL),
(95, 5, 'Reconhecimento de Padroes', NULL, NULL, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_planejamento`
--
ALTER TABLE `tb_planejamento`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
