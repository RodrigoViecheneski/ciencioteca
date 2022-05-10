-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Mar-2022 às 20:49
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciencioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nome_area` varchar(200) NOT NULL,
  `descricao_area` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

CREATE TABLE `conteudo` (
  `id_conteudo` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` varchar(2000) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_subarea` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudoarquivos`
--

CREATE TABLE `conteudoarquivos` (
  `id_conteudoarquivos` int(11) NOT NULL,
  `id_conteudo` int(11) DEFAULT NULL,
  `url_conteudo` varchar(100) NOT NULL,
  `tipo_conteudo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subarea`
--

CREATE TABLE `subarea` (
  `id_subarea` int(11) NOT NULL,
  `nome_subarea` varchar(100) NOT NULL,
  `descricao_subarea` text NOT NULL,
  `id_area` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `nome_subarea`, `descricao_subarea`, `id_area`) VALUES
(4, 'MatÃ©ria e Energia', 'fsfsdfsdfsdfsdf', '17'),
(5, 'Terra e Universo', 'Coco de cobra', '17'),
(7, 'Subarea Teste', 'jkfgklsdhfjkdhfjkdsfsdf', '18'),
(8, 'Estudo dos gases', 'gases fedidos', '19'),
(9, 'Planos sÃ³lidos', 'dfsadsadasd', '20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `telefone` varchar(32) DEFAULT NULL,
  `permissoes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `permissoes`) VALUES
(11, 'Rodrigo viecheneski', 'rodrigo@gmail.com', '$2y$10$6V3iW26MCvH3pfun9dN9uOKCA71bYg.N.gOFaSzUimmpcoRM1uHxa', '(42) 98819-2479', 'ADD,EDIT,DEL,SUPER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id_conteudo`);

--
-- Indexes for table `conteudoarquivos`
--
ALTER TABLE `conteudoarquivos`
  ADD PRIMARY KEY (`id_conteudoarquivos`);

--
-- Indexes for table `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`id_subarea`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conteudoarquivos`
--
ALTER TABLE `conteudoarquivos`
  MODIFY `id_conteudoarquivos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
