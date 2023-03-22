-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22-Mar-2023 às 10:25
-- Versão do servidor: 10.1.48-MariaDB-0+deb9u2
-- versão do PHP: 5.6.40-0+deb8u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fichacatalog`
--
CREATE DATABASE IF NOT EXISTS `fichacatalog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fichacatalog`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursosdedoutorado`
--

CREATE TABLE `cursosdedoutorado` (
  `id` int(11) NOT NULL,
  `unidade` varchar(5) NOT NULL,
  `nomedocurso` text NOT NULL,
  `programa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursosdedoutorado`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cursosdeespecializacao`
--

CREATE TABLE `cursosdeespecializacao` (
  `id` int(11) NOT NULL,
  `unidade` varchar(5) NOT NULL,
  `nomedocurso` text NOT NULL,
  `programa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursosdeespecializacao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cursosdegraduacao`
--

CREATE TABLE `cursosdegraduacao` (
  `id` int(11) NOT NULL,
  `unidade` varchar(5) NOT NULL,
  `nomedocurso` text NOT NULL,
  `programa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursosdegraduacao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cursosdemestrado`
--

CREATE TABLE `cursosdemestrado` (
  `id` int(11) NOT NULL,
  `unidade` varchar(5) NOT NULL,
  `nomedocurso` text NOT NULL,
  `programa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursosdemestrado`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `elaboradores`
--

CREATE TABLE `elaboradores` (
  `elaborador` varchar(50) DEFAULT NULL,
  `unidade` int(11) DEFAULT NULL,
  `crb` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `elaboradores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `newareadoconhecimento`
--

CREATE TABLE IF NOT EXISTS `oldareadoconhecimento` (
`id` int(11) NOT NULL,
  `COD_AREA_CONHECIMENTO` varchar(27) DEFAULT NULL,
  `DESC_AREA_CONHECIMENTO` varchar(253) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14860 DEFAULT CHARSET=utf8;


CREATE TABLE `newareadoconhecimento` (
  `id` int(11) NOT NULL,
  `COD_AREA_CONHECIMENTO` varchar(27) NOT NULL,
  `DESC_AREA_CONHECIMENTO` varchar(253) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `newareadoconhecimento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `ID` int(5) NOT NULL,
  `unidade` varchar(20) NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` varchar(50) DEFAULT NULL,
  `curso` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registros`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `unidadesacademicas`
--

CREATE TABLE `unidadesacademicas` (
  `id` int(11) NOT NULL,
  `nomedaunidade` text NOT NULL,
  `sigla` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidadesacademicas`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `unidadesacademicasteste`
--

CREATE TABLE `unidadesacademicasteste` (
  `id` int(11) NOT NULL,
  `nomedaunidade` text NOT NULL,
  `sigla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidadesacademicasteste`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosficat`
--

CREATE TABLE `usuariosficat` (
  `id` int(5) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariosficat`
--

INSERT INTO `usuariosficat` (`id`, `usuario`, `senha`) VALUES
(4, 'usuario', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursosdedoutorado`
--
ALTER TABLE `cursosdedoutorado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursosdeespecializacao`
--
ALTER TABLE `cursosdeespecializacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursosdegraduacao`
--
ALTER TABLE `cursosdegraduacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursosdemestrado`
--
ALTER TABLE `cursosdemestrado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `elaboradores`
--
ALTER TABLE `elaboradores`
  ADD KEY `unidade` (`unidade`);

--
-- Índices para tabela `newareadoconhecimento`
--
ALTER TABLE `newareadoconhecimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `oldareadoconhecimento`
--
ALTER TABLE `oldareadoconhecimento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Índices para tabela `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `unidadesacademicas`
--
ALTER TABLE `unidadesacademicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`);

--
-- Índices para tabela `unidadesacademicasteste`
--
ALTER TABLE `unidadesacademicasteste`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`);

--
-- Índices para tabela `usuariosficat`
--
ALTER TABLE `usuariosficat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursosdedoutorado`
--
ALTER TABLE `cursosdedoutorado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `cursosdeespecializacao`
--
ALTER TABLE `cursosdeespecializacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `cursosdegraduacao`
--
ALTER TABLE `cursosdegraduacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de tabela `cursosdemestrado`
--
ALTER TABLE `cursosdemestrado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `newareadoconhecimento`
--
ALTER TABLE `newareadoconhecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14176;

--
-- AUTO_INCREMENT de tabela `oldareadoconhecimento`
--
ALTER TABLE `oldareadoconhecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14861;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18072;

--
-- AUTO_INCREMENT de tabela `unidadesacademicas`
--
ALTER TABLE `unidadesacademicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `unidadesacademicasteste`
--
ALTER TABLE `unidadesacademicasteste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `usuariosficat`
--
ALTER TABLE `usuariosficat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
