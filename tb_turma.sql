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
-- Estrutura para tabela `tb_turma`
--

CREATE TABLE `tb_turma` (
  `ID` int(2) NOT NULL,
  `ano` int(1) NOT NULL,
  `turma` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `obs` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_turma`
--

INSERT INTO `tb_turma` (`ID`, `ano`, `turma`, `status`, `obs`) VALUES
(1, 0, 'A', 'A', 'Pré Escola A - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(2, 0, 'B', 'A', 'Pré Escola B - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(3, 0, 'C', 'A', 'Pré Escola C - Os alunos ainda estão em fase de adaptação, alguns não quiseram fazer as atividades, por isso foi necessário utilizar duas atividades e deixar que cada criança escolhe-se o que queria fazer. Enquanto alguns realizaram as atividades no computador, outros assistiram a atividade na projeção.'),
(4, 0, 'D', 'A', 'Pré Escola D - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(5, 0, 'E', 'D', 'Pré Escola E - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(6, 0, 'F', 'D', 'Pré Escola F - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(7, 0, 'G', 'D', 'Pré Escola G - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(8, 1, 'A', 'A', 'Primeiro Ano A - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(9, 1, 'B', 'A', 'Primeiro Ano B - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(10, 1, 'C', 'A', 'Primeiro Ano C - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(11, 1, 'D', 'A', 'Primeiro Ano D - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(12, 1, 'E', 'A', 'Primeiro Ano E - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(13, 1, 'F', 'D', 'Primeiro Ano F - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(14, 1, 'G', 'D', 'Primeiro Ano G - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(15, 2, 'A', 'A', 'Segunda Ano A - No geral a turma apresentou bom comportamento, porem ainda falta autonomia. Perdem o foco na aula rapidamente com conversas desnecessárias. Não prestam atenção nas explicações feitas com o projetor e depois demonstram dificuldades para fazer as atividades.'),
(16, 2, 'B', 'A', 'Segunda Ano B - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(17, 2, 'C', 'A', 'Segunda Ano C - No geral a turma apresentou bom comportamento, porem ainda não conseguem manter o foco na aula, qualquer coisa tira atenção dos alunos foi necessário muitas vezes chamar a atenção da turma. É notável a falta autonomia e confiança em fazer as atividades. '),
(18, 2, 'D', 'A', 'Segunda Ano D - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(19, 2, 'E', 'A', 'Segunda Ano E - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(20, 2, 'F', 'D', 'Segunda Ano F - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(21, 2, 'G', 'D', 'Segunda Ano G - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(22, 3, 'A', 'A', 'Terceiro Ano A - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(23, 3, 'B', 'A', 'Terceiro Ano B - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(24, 3, 'C', 'A', 'Terceiro Ano C - Durante as aulas foram necessário por diversas vezes chamar a atenção da turma que perde rapidamente o foco, prejudicando a apresentação do conteúdo. No geral os alunos conseguem realizar as atividades.'),
(25, 3, 'D', 'A', 'Terceiro Ano D - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(26, 3, 'E', 'D', 'Terceiro Ano E - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(27, 3, 'F', 'D', 'Terceiro Ano F - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(28, 3, 'G', 'D', 'Terceiro Ano G - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(29, 4, 'A', 'A', 'Quarto Ano A - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(30, 4, 'B', 'A', 'Quarto Ano B - No geral a turma apresentou bom comportamento, porem ainda se faz necessário muitas vezes chamar a atenção para não perderem o foco na aula, possuem um nível de autonomia muito pequeno, mas estão evoluindo rapidamente. '),
(31, 4, 'C', 'A', 'Quarto Ano C - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(32, 4, 'D', 'A', 'Quarto Ano D - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(33, 4, 'E', 'D', 'Quarto Ano E - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(34, 4, 'F', 'D', 'Quarto Ano F - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(35, 4, 'G', 'D', 'Quarto Ano G - Apresentaram bom comportamento, a turma realizou todas as atividades.'),
(36, 5, 'A', 'A', 'Quinto Ano A - No geral apresentaram um bom comportamento e realizaram as atividades, na avaliação diagnostica obtiveram uma media de 57% de acertos.'),
(37, 5, 'B', 'A', 'Quinto Ano B - No geral apresentaram um bom comportamento e realizaram as atividades, na avaliação diagnostica obtiveram uma media de 65% de acertos.'),
(38, 5, 'C', 'A', 'Quinto Ano C - No geral apresentaram um bom comportamento e realizaram as atividades, na avaliação diagnostica obtiveram uma media de 41% de acertos.'),
(39, 5, 'D', 'A', 'Quinto Ano D - No geral apresentaram um bom comportamento e realizaram as atividades, na avaliação diagnostica obtiveram uma media de 49% de acertos.'),
(40, 5, 'E', 'A', 'Quinto Ano E - No geral apresentaram um bom comportamento e realizaram as atividades, na avaliação diagnostica obtiveram uma media de 56% de acertos.'),
(41, 5, 'F', 'A', 'Quinto Ano F - No geral apresentaram um bom comportamento e realizaram as atividades, na avaliação diagnostica obtiveram uma media de 55% de acertos.'),
(42, 5, 'G', 'D', 'Quinto Ano G - Apresentaram bom comportamento, a turma realizou todas as atividades.');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
